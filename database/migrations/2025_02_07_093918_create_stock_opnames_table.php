<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStockOpnamesTable extends Migration
{
    public function up()
    {
        Schema::create('stock_opnames', function (Blueprint $table) {
            $table->id();
            $table->date('date');              // Tanggal stock opname
            $table->string('status');          // Status, misalnya 'Selesai', 'Draft'
            $table->string('operator');        // Nama petugas yang melakukan stock opname
            $table->integer('difference');     // Selisih stok (bisa negatif atau positif)
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('stock_opnames');
    }
}
