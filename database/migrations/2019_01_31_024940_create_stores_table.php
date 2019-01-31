<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stores', function (Blueprint $table) {
            $table->increments('id');
            $table->string('file_id')->nullable();
            $table->string('name')->nullable();
            $table->string('nature')->nullable();
            $table->string('business_type')->nullable();
            $table->string('group')->nullable(); // gp hp
            $table->integer('pvd_num')->nullable();
            $table->integer('pvd_num_ra')->nullable();
            $table->integer('pvd_num_cp')->nullable();
            $table->integer('pvd_num_compta')->nullable();
            $table->integer('pvd_num_ott')->nullable();
            $table->integer('legal_form')->nullable();
            $table->string('siren')->nullable();
            $table->string('adr1')->nullable();
            $table->string('adr2')->nullable();
            $table->string('adr3')->nullable();
            $table->string('postal_code')->nullable();
            $table->string('city')->nullable();
            $table->string('company_name')->nullable();
            $table->integer('is_main_store')->nullable();
            $table->integer('store_code')->nullable();
            $table->integer('nic')->nullable();
            $table->string('naf')->nullable();
            $table->string('collective_agrement')->nullable();
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
        Schema::dropIfExists('stores');
    }
}
