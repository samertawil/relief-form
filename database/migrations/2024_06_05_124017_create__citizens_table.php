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
        Schema::create('citizens', function (Blueprint $table) {
            $table->id();
            $table->integer('idc');
            $table->string('first_name');
            $table->string('sec_name');
            $table->string('thr_name');
            $table->string('last_name');
            $table->enum('gender',[0,1]);
            $table->date('birthday');
            $table->string('birthday_string');
            $table->string('mother_name');
            $table->integer('city_id')->nullable();
            $table->string('city_name')->nullable();
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
        Schema::dropIfExists('citizens');
    }
};
