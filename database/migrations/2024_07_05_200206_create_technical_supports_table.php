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
        Schema::create('technical_supports', function (Blueprint $table) {
            $table->id();
            $table->integer('created_by_idc');
            $table->string('name');
            $table->integer('mobile');
            $table->string('subject');
            $table->text('issue_description');
            $table->text('replay')->nullable();
            $table->date('replay_date')->nullable();
            $table->integer('status_id')->nullable();
            $table->string('status_name')->nullable();
            $table->date('fix_date')->nullable();
            $table->integer('employee_response_idc')->nullable();
            $table->string('employee_name')->nullable();

            $table->timestamps();
        });
    }


    public function down()
    {
        Schema::dropIfExists('technical_supports');
    }
};
