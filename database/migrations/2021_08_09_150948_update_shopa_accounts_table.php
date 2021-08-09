<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateShopaAccountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('shop_accounts', function (Blueprint $table) {
            $table->bigInteger('price')->change();
            $table->bigInteger('sale_price')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
         Schema::table('log_for_user', function (Blueprint $table) {
            $table->integer('error_message')->change();
            $table->integer('error_message')->nullable()->change();
        });
    }
}
