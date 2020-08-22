<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAccountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('accounts', function (Blueprint $table) {
            $table->id();
            $table->string('name',150);
            $table->string('holder_name',150);
            $table->string('account_number',150);
            $table->float('debit')->default(0);
            $table->float('credit')->default(0);
            $table->float('asset')->default(0);
            $table->float('user_id')->default(0);
            $table->float('branch_id')->default(0);
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
        Schema::dropIfExists('accounts');
    }
}
