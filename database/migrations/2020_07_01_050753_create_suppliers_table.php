<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSuppliersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('suppliers', function (Blueprint $table) {
            $table->id();
            $table->string('supplier_gen_id');
            $table->string('official_name', 150);
            $table->string('official_email', 150)->nullable();
            $table->string('official_mobile', 150)->nullable();
            $table->string('country', 50)->nullable();
            $table->string('city', 50)->nullable();
            $table->string('zip_code', 30)->nullable();
            $table->text('official_address')->nullable();
            $table->json('contact_person')->comment('name, designation,phone,email')->nullable();
            $table->unsignedBigInteger('user_id')->comment('user_table')->nullable();
            //$table->unsignedBigInteger('contact_id')->comment('contact_people_table')->nullable();
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
        Schema::dropIfExists('suppliers');
    }
}
