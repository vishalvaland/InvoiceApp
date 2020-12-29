<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateInventoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inventories', function(Blueprint $table) {
            $table->increments('id');
            $table->string('itemname');
            $table->string('itemmodelnumber');
            $table->string('HSN_SAC');
            $table->integer('quantity');
            $table->integer('rate');
            $table->integer('statetax');
            $table->integer('centraltax');
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
        Schema::drop('inventories');
    }
}
