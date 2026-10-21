<?php

use Illuminate\Foundation\Testing\TestCase;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

final class ErpTest extends TestCase
{
    public function createApplication()
    {
        $app = require __DIR__.'/../bootstrap/app.php';
        $app->make(Illuminate\Contracts\Console\Kernel::class)->bootstrap();
        return $app;
    }

    protected function setUp(): void
    {
        parent::setUp();
        Artisan::call('migrate:fresh', ['--force' => true]);
    }

    private function user(): User
    {
        return User::create([
            'nombre' => 'Test', 'apellido' => 'User', 'email' => 'erp@example.invalid',
            'password' => Hash::make('test-password'), 'cedula' => '', 'direccion' => '',
            'estado' => 'activado', 'nivel' => 'admin',
        ]);
    }

    public function testLoginDashboardAndLogout(): void
    {
        $user = $this->user();
        $this->get('/')->assertRedirect('/login');
        $this->get('/login')->assertOk()->assertSee('_token', false);
        $this->postJson('/login', ['email' => $user->email, 'password' => 'wrong'])->assertOk()->assertJson(['success' => false]);
        $this->postJson('/login', ['email' => $user->email, 'password' => 'test-password'])->assertOk()->assertJson(['success' => true]);
        $this->assertAuthenticatedAs($user);
        $this->get('/dashboard')->assertOk()->assertSee('Test');
        $this->get('/logout')->assertRedirect('login');
        $this->assertGuest();
    }

    public function testBrowserRequestsRequireAndAcceptCsrfToken(): void
    {
        $user = $this->user();
        $this->app['env'] = 'local';
        $this->postJson('/login', ['email' => $user->email, 'password' => 'test-password'])->assertStatus(419);
        $this->withSession(['_token' => 'test-csrf-token'])->postJson('/login', [
            '_token' => 'test-csrf-token', 'email' => $user->email, 'password' => 'test-password',
        ])->assertOk()->assertJson(['success' => true]);
        $this->assertAuthenticatedAs($user);
    }

    public function testCustomerAndCategoryCrud(): void
    {
        $this->actingAs($this->user());
        $payload = ['nombre' => 'Example', 'apellido' => 'Customer', 'email' => 'customer@example.invalid', 'telefono' => '', 'direccion' => '', 'cedula' => ''];
        $id = $this->postJson('/postClientes', $payload)->assertOk()->assertJson(['success' => true])->json('id');
        $this->getJson('/getClientes')->assertOk()->assertJsonFragment(['nombre' => 'Example']);
        $this->putJson('/editarCliente/'.$id, ['nombre' => 'Changed'])->assertOk();
        $this->assertDatabaseHas('clientes', ['id' => $id, 'nombre' => 'Changed']);
        $this->deleteJson('/borrarCliente/'.$id)->assertOk();
        $this->assertDatabaseMissing('clientes', ['id' => $id]);
        $category = $this->postJson('/postCategoria', ['titulo' => 'Example', 'descripcion' => 'Test'])->assertOk()->json('id');
        $this->putJson('/editarCategoria/'.$category, ['titulo' => 'Changed'])->assertOk();
        $this->getJson('/getCategorias')->assertOk()->assertJsonFragment(['titulo' => 'Changed']);
        $this->deleteJson('/borrarCategoria/'.$category)->assertOk();
        $this->assertDatabaseCount('categorias', 0);
    }

    public function testProductStockOrderAndPurchaseFlows(): void
    {
        $this->actingAs($this->user());
        $product = $this->postJson('/postProductos', ['articulo' => 'Product', 'cantidad' => 10, 'precioVenta' => 50, 'precioCompra' => 20, 'distribuidor' => '', 'categoria' => '', 'fecha' => '2026-01-01', 'vencimiento' => ''])->assertOk()->json('id');
        $this->postJson('/actualizarStock', ['id' => $product, 'cantidad' => 2])->assertOk()->assertJson(['cantidad_actual' => 8]);
        $this->putJson('/agregarStock/'.$product, ['cantidad' => 3])->assertOk()->assertJson(['cantidad' => 11]);
        $this->getJson('/getProductos')->assertOk()->assertJsonFragment(['cantidad' => 11]);
        $order = $this->postJson('/postPedido', ['id_cliente' => 1, 'metodo' => 'efectivo', 'subtotal' => 50, 'itbis' => 9, 'total' => 59, 'estado' => 'pagado', 'tipo' => 'venta', 'fecha' => '2026-01-01'])->assertOk()->json('id');
        $this->postJson('/postPedidoDetalle', ['id_pedido' => $order, 'id_producto' => $product, 'articulo' => 'Product', 'cantidad' => 1, 'precio' => 50, 'total' => 50, 'fecha' => '2026-01-01'])->assertOk()->assertJson(['success' => true]);
        $this->getJson('/pedido/'.$order)->assertOk()->assertJsonPath('pedido.total', 59)->assertJsonCount(1, 'detalles');
        $this->getJson('/getPedido')->assertOk()->assertJsonCount(1, 'pedidos');
        $this->postJson('/postCompraPedidos', ['id_articulo' => $product, 'id_distribuidor' => 1, 'cantidad' => 2, 'articulo' => 'Product', 'precioCompra' => 20, 'total' => 40, 'fecha' => '2026-01-01'])->assertOk()->assertJson(['stock' => 13]);
        $this->assertDatabaseHas('productos', ['id' => $product, 'cantidad' => 13]);
        $this->getJson('/getCompraPedidos')->assertOk()->assertJsonCount(1, 'compras');
    }

    public function testMigrationsAndRollbackDoNotSeedKnownCredentials(): void
    {
        $this->assertDatabaseCount('users', 0);
        $this->assertDatabaseCount('clientes', 1);
        Artisan::call('migrate:rollback', ['--force' => true]);
        $this->assertFalse(DB::getSchemaBuilder()->hasTable('users'));
        $this->assertFalse(DB::getSchemaBuilder()->hasTable('distribuidores_compras'));
    }
}
