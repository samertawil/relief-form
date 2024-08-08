<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
 
    public function up()
    {
        Schema::create('aid_citizen_registrations', function (Blueprint $table) {
            $table->bigInteger('idc')->primary();
          
            // $table->foreign('idc')->references('idc')->on('ssn_login_ques_tb');
            $table->date('birthday')->nullable();
            $table->string('mobile_primary')->nullable();
            $table->string('mobile_secondary')->nullable();
            $table->enum('gender',[1,2])->nullable();
            $table->foreignId('marital_status')->nullable()->constrained('statuses');
            $table->smallInteger('family_count_north')->nullable()->unsigned();
            $table->smallInteger('family_count_south')->nullable()->unsigned();
            $table->foreignId('part_id')->nullable()->constrained('aid_parts');
            $table->foreignId('area_id')->nullable()->constrained('aid_areas');
            $table->foreignId('location_id')->nullable()->constrained('aid_locations');
            $table->foreignId('benefits_status')->nullable()->constrained('statuses');
            $table->longText('reasons')->nullable();
            // $table->foreignId('couple_idc')->nullable()->constrained('ssn_login_ques_tb');
            $table->integer('couple_idc')->nullable();
            $table->string('couple_name')->nullable();
            $table->text('notes')->nullable();
            $table->timestamps();
        });
    }

   
    public function down()
    {
        Schema::dropIfExists('aid_citizen_registrations');
    }
};
