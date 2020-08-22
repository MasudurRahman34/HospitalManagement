<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('order_id');
            $table->unsignedBigInteger('product_id');
            $table->string('unit',150)->default(0);
            $table->float('buying_price')->default(0);
            $table->float('quantity')->default(0);
            $table->float('discount')->default(0);
            $table->float('total_amount')->default(0);
            $table->unsignedBigInteger('supplier_id');
            $table->integer('status')->default(0);
            $table->unsignedBigInteger('user_id')->default(0);
            $table->unsignedBigInteger('branch_id')->default(0);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('order_details');
    }
}
