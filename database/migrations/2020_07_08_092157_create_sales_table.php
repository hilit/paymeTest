<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sales', function (Blueprint $table) {
            $table->id();
            $table->foreignId('seller_payme_id');
            $table->string('currency');
            $table->integer('price');
            $table->longText('description');
            $table->string('status_code');
            $table->longText('sale_url');
            $table->foreignId('payme_sale_id');
            $table->string('payme_sale_code');
            $table->foreignId('transaction_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sales');
    }
}
