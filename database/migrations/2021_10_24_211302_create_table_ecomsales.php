<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableEcomsales extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ecomsales', function (Blueprint $table) {

            $table->id();
            $table->bigInteger('mt_client_id');

            $table->bigInteger('sale_ecom_id');
            $table->bigInteger('sale_id');
            $table->string('sale_channel', 20);
            $table->timestamp('sale_date');
            $table->time('sale_hour')->default('00:00:00');
            $table->float('sale_amount', 10, 2)->nullable();
            $table->float('sale_fee', 10, 2)->nullable();
            $table->float('product_cost', 10, 2)->nullable();
            $table->string('product_category', 10, 2)->nullable();

            $table->string('buyer_name', 30)->nullable();
            $table->string('buyer_doc_type', 30)->nullable();
            $table->string('buyer_doc_number', 30)->nullable();
            $table->string('buyer_province', 30)->nullable();
            $table->string('buyer_country', 30)->nullable();

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
        Schema::dropIfExists('ecomsales');
    }
}
