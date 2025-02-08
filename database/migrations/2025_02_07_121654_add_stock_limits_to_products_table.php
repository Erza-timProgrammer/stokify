<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('products', function (Blueprint $table) {
            // Karena kolom 'stock' sudah ada, kita tidak menambahkannya lagi.
            if (!Schema::hasColumn('products', 'minimum_stock')) {
                // Tempatkan minimum_stock setelah kolom 'stock'
                $table->integer('minimum_stock')->default(0)->after('stock');
            }
            if (!Schema::hasColumn('products', 'maximum_stock')) {
                // Tempatkan maximum_stock setelah minimum_stock
                $table->integer('maximum_stock')->default(0)->after('minimum_stock');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropColumn(['minimum_stock', 'maximum_stock']);
        });
    }
};
