<?php

use Illuminate\Foundation\Testing\TestCase;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

final class BrowserPayloadTest extends TestCase
{
    private const DATE_TABLES = ['productos', 'distribuidores', 'pedidos', 'pedidosdetalles', 'distribuidores_compras'];

    public function createApplication()
    {
        $app = require __DIR__.'/../bootstrap/app.php';
        $app->make(Illuminate\Contracts\Console\Kernel::class)->bootstrap();
        return $app;
    }

    protected function setUp(): void
    {
        parent::setUp();
        if (getenv('REQUIRE_STRICT_MYSQL')) {
            $this->assertSame('mysql', DB::connection()->getDriverName());
            $this->assertMatchesRegularExpression('/STRICT_(TRANS|ALL)_TABLES/', DB::selectOne('SELECT @@SESSION.sql_mode AS mode')->mode);
        }
        Artisan::call('migrate:fresh', ['--force' => true]);
    }

    private function product(array $extra = []): int
    {
        return $this->postJson('/postProductos', $extra + [
            'articulo' => 'Synthetic product', 'cantidad' => 10, 'categoria' => 0,
            'precioVenta' => 50, 'precioCompra' => 20, 'distribuidor' => 0,
        ])->assertOk()->assertJson(['success' => true])->json('id');
    }

    private function order(array $extra = []): int
    {
        return $this->postJson('/postPedido', $extra + [
            'id_cliente' => 1, 'metodo' => 'efectivo', 'subtotal' => 50, 'itbis' => 9,
            'total' => 59, 'estado' => 'pagado', 'tipo' => 'venta',
        ])->assertOk()->assertJson(['success' => true])->json('id');
    }

    private function supplier(array $extra = []): int
    {
        return $this->postJson('/postDistribuidor', $extra + [
            'nombre' => 'Synthetic supplier', 'empresa' => 'Synthetic',
            'cedula' => '', 'rnc' => '', 'telefono' => '', 'direccion' => '',
        ])->assertOk()->assertJson(['success' => true])->json('id');
    }

    public function testProductFormCanOmitUnavailableDateAndExpiryFields(): void
    {
        $id = $this->product();
        $this->assertDatabaseHas('productos', ['id' => $id, 'fecha' => null, 'vencimiento' => '', 'cantidad' => 10, 'precioVenta' => 50, 'precioCompra' => 20]);
    }

    public function testSupplierFormCanOmitUnavailableDateAndEmailFields(): void
    {
        $id = $this->supplier();
        $this->assertDatabaseHas('distribuidores', ['id' => $id, 'fecha' => null, 'email' => '']);
    }

    public function testOrderAndDetailBrowserPayloadsRetainAmountsAndRelationship(): void
    {
        $product = $this->product();
        $order = $this->order();
        $this->postJson('/postPedidoDetalle', [
            'id_pedido' => $order, 'id_producto' => $product, 'articulo' => 'Synthetic product', 'cantidad' => 1, 'precio' => 50,
        ])->assertOk()->assertJson(['success' => true]);
        $this->assertDatabaseHas('pedidos', ['id' => $order, 'fecha' => null, 'subtotal' => 50, 'itbis' => 9, 'total' => 59]);
        $this->assertDatabaseHas('pedidosdetalles', ['id_pedido' => $order, 'id_producto' => $product, 'fecha' => null, 'precio' => 50, 'total' => 0]);
    }

    public function testPurchaseBrowserPayloadRetainsStockAndLegacyOmittedValues(): void
    {
        $product = $this->product();
        $id = $this->postJson('/postCompraPedidos', [
            'id_articulo' => $product, 'id_distribuidor' => 0, 'cantidad' => 2, 'total' => 40,
        ])->assertOk()->assertJson(['success' => true, 'stock' => 12])->json('compra.id');
        $this->assertDatabaseHas('distribuidores_compras', ['id' => $id, 'fecha' => null, 'articulo' => '', 'precioCompra' => 0, 'cantidad' => 2, 'total' => 40]);
        $this->assertDatabaseHas('productos', ['id' => $product, 'cantidad' => 12]);
    }

    public function testExplicitDatesAndOtherOptionalValuesAreNeverReplaced(): void
    {
        $product = $this->product(['fecha' => '2015-02-19', 'vencimiento' => '2015-12-31']);
        $supplier = $this->supplier(['fecha' => '2015-02-23', 'email' => 'supplier@example.invalid']);
        $order = $this->order(['fecha' => '2015-02-22']);
        $this->postJson('/postPedidoDetalle', [
            'id_pedido' => $order, 'id_producto' => $product, 'articulo' => 'Synthetic product', 'cantidad' => 1,
            'precio' => 50, 'total' => 50, 'fecha' => '2015-02-22',
        ])->assertOk();
        $this->postJson('/postCompraPedidos', [
            'id_articulo' => $product, 'id_distribuidor' => $supplier, 'cantidad' => 2, 'total' => 40,
            'articulo' => 'Recorded product', 'precioCompra' => 20, 'fecha' => '2015-02-24',
        ])->assertOk()->assertJson(['stock' => 12]);
        $this->assertDatabaseHas('productos', ['id' => $product, 'fecha' => '2015-02-19', 'vencimiento' => '2015-12-31']);
        $this->assertDatabaseHas('distribuidores', ['id' => $supplier, 'fecha' => '2015-02-23', 'email' => 'supplier@example.invalid']);
        $this->assertDatabaseHas('pedidos', ['id' => $order, 'fecha' => '2015-02-22', 'total' => 59]);
        $this->assertDatabaseHas('pedidosdetalles', ['id_pedido' => $order, 'fecha' => '2015-02-22', 'total' => 50]);
        $this->assertDatabaseHas('distribuidores_compras', ['id_articulo' => $product, 'fecha' => '2015-02-24', 'articulo' => 'Recorded product', 'precioCompra' => 20, 'total' => 40]);
    }

    public function testDateMigrationPreservesExistingValidAndZeroDates(): void
    {
        Artisan::call('migrate:rollback', ['--step' => 1, '--force' => true]);
        $mysql = DB::connection()->getDriverName() === 'mysql';
        $mode = $mysql ? DB::selectOne('SELECT @@SESSION.sql_mode AS mode')->mode : null;
        if ($mysql) {
            DB::statement("SET SESSION sql_mode = ''");
        }
        try {
            foreach (['2015-02-19', '0000-00-00'] as $date) {
                $product = $this->product(['fecha' => $date, 'vencimiento' => 'historical']);
                $supplier = $this->supplier(['fecha' => $date, 'email' => 'historical@example.invalid']);
                $order = $this->order(['fecha' => $date]);
                $this->postJson('/postPedidoDetalle', ['id_pedido' => $order, 'id_producto' => $product, 'articulo' => 'Historical', 'cantidad' => 1, 'precio' => 50, 'total' => 50, 'fecha' => $date])->assertOk();
                $this->postJson('/postCompraPedidos', ['id_articulo' => $product, 'id_distribuidor' => $supplier, 'articulo' => 'Historical', 'cantidad' => 2, 'precioCompra' => 20, 'total' => 40, 'fecha' => $date])->assertOk();
            }
        } finally {
            if ($mysql) {
                DB::statement('SET SESSION sql_mode = ?', [$mode]);
            }
        }
        $before = [];
        foreach (self::DATE_TABLES as $table) {
            $before[$table] = DB::table($table)->orderBy('id')->get()->toArray();
        }
        Artisan::call('migrate', ['--force' => true]);
        foreach (self::DATE_TABLES as $table) {
            $this->assertEquals($before[$table], DB::table($table)->orderBy('id')->get()->toArray(), $table);
            $this->assertTrue($this->dateIsNullable($table), $table);
        }
        Artisan::call('migrate:rollback', ['--step' => 1, '--force' => true]);
        foreach (self::DATE_TABLES as $table) {
            $this->assertFalse($this->dateIsNullable($table), $table);
            $this->assertEquals($before[$table], DB::table($table)->orderBy('id')->get()->toArray(), $table);
        }
    }

    public function testRollbackRejectsLastTableNullBeforeAlteringAnyTable(): void
    {
        $product = $this->product(['fecha' => '2015-02-19']);
        $this->postJson('/postCompraPedidos', ['id_articulo' => $product, 'id_distribuidor' => 0, 'cantidad' => 2, 'total' => 40])->assertOk();
        try {
            Artisan::call('migrate:rollback', ['--step' => 1, '--force' => true]);
            $this->fail('Rollback must reject unknown dates without inventing replacements.');
        } catch (RuntimeException $exception) {
            $this->assertStringContainsString('distribuidores_compras', $exception->getMessage());
        }
        foreach (self::DATE_TABLES as $table) {
            $this->assertTrue($this->dateIsNullable($table), $table);
        }
        $this->assertDatabaseHas('distribuidores_compras', ['id_articulo' => $product, 'fecha' => null, 'total' => 40]);
    }

    private function dateIsNullable(string $table): bool
    {
        foreach (Schema::getColumns($table) as $column) {
            if ($column['name'] === 'fecha') {
                return $column['nullable'];
            }
        }
        throw new RuntimeException('Missing fecha column: '.$table);
    }
}
