<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddBalanceToStockTransactionsTable extends Migration
{
    public function up()
    {
        Schema::table('stock_transactions', function (Blueprint $table) {
            $table->integer('balance')->default(0)->after('quantity');
        });
    }

    public function down()
    {
        Schema::table('stock_transactions', function (Blueprint $table) {
            $table->dropColumn('balance');
        });
    }
}
