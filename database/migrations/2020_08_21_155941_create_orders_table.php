<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('Invoice_id');
            $table->float('sub_total')->default(0);
            $table->float('discount')->default(0);
            $table->float('total_payable')->default(0);
            $table->float('paid_amount')->default(0);
            $table->float('due_amount')->default(0);
            $table->string('type')->comment('purchase, sell')->nullable();
            $table->integer('status')->default(0);
            $table->unsignedBigInteger('supplier_id');
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
        Schema::dropIfExists('orders');
    }
}
