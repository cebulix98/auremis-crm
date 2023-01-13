<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('miners', function (Blueprint $table) {
          $table->id('id');
          $table->string('name');
          $table->integer('hashrateMin');
          $table->integer('hashrateMax');
          $table->integer('powerMin');
          $table->integer('powerMax');
          $table->integer('budget');
          $table->integer('provision');
          $table->integer('real_provision');
          $table->integer('miner_cost');
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
        //
    }
};
