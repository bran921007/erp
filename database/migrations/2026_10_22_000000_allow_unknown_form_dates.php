<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    private const TABLES = ['productos', 'distribuidores', 'pedidos', 'pedidosdetalles', 'distribuidores_compras'];

    public function up(): void
    {
        foreach (self::TABLES as $name) {
            Schema::table($name, function (Blueprint $table): void {
                $table->date('fecha')->nullable()->change();
            });
        }
    }

    public function down(): void
    {
        // Check every table before MySQL's non-transactional ALTERs can partially roll back.
        foreach (self::TABLES as $name) {
            if (DB::table($name)->whereNull('fecha')->exists()) {
                throw new RuntimeException('Cannot restore NOT NULL fecha: '.$name.' contains unknown dates. Reconcile them explicitly before rollback.');
            }
        }
        foreach (self::TABLES as $name) {
            Schema::table($name, function (Blueprint $table): void {
                $table->date('fecha')->nullable(false)->change();
            });
        }
    }
};
