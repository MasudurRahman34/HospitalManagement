<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductPricesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_prices', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('supplier_id')->comment('Supplier table');
            $table->unsignedBigInteger('product_id')->comment('product table');
            //$table->unsignedBigInteger('catagory_id')->comment('catagory table');
            $table->unsignedBigInteger('unit_id')->comment('unit table');
            $table->float('buying_price', 8)->default(0);
            $table->float('selling_price', 8)->default(0);
            $table->float('quantity', 8)->default(0);
            $table->unsignedInteger('is_approved')->default(0)->comment('1=approved');
            $table->unsignedInteger('status')->default(0)->comment('');
            $table->unsignedBigInteger('user_id')->comment('User table')->default(0);
            $table->unsignedBigInteger('branch_id')->comment('branch table')->default(0);
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
        Schema::dropIfExists('product_prices');
    }
}
