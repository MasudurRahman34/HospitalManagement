<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProducsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('product_gen_id');
            $table->string('barcode')->nullable();
            $table->string('name', 200);
            $table->text('description')->nullable();
            $table->float('buying_price', 8)->default(0);
            $table->float('selling_price', 8)->default(0);
            $table->float('quantity', 8)->default(0);
            $table->float('highest_discount', 8)->default(0);
            $table->float('total_sell', 8)->default(0);
            $table->float('total_sell_Amount', 8)->default(0);
            $table->float('total_buy', 8)->default(0);
            $table->float('total_buy_Amount', 8)->default(0);
            $table->string('image', 8)->nullable();
            $table->unsignedInteger('is_approved')->default(0)->comment('1=approved');
            $table->unsignedInteger('status')->default(0);
            $table->unsignedBigInteger('supplier_id')->comment('Supplier table');
            $table->unsignedBigInteger('unit_id')->comment('unit table');
            $table->unsignedBigInteger('catagory_id')->comment('catagory table');
            $table->unsignedBigInteger('user_id')->comment('user_table')->default(0);
            $table->unsignedBigInteger('branch_id')->comment('branch table')->default(0);
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
        Schema::dropIfExists('products');
    }
}
