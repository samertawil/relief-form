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
        Schema::create('citizenProfiles', function (Blueprint $table) {
            $table->id();
            $table->foreignId('citizen_idc')->nullable()->constrained('citizens');
           $table->foreignId('user_id')->unique()->constrained('users');
           $table->foreignId('current_address_status')->nullable()->constrained('statuses')->nullOnDelete()->comment('store address اذ كان المواطن مقيم في عنوانه الاصلي او نازح');
           $table->string('mobile1')->unique();
           $table->string('mobile2')->nullable();
           $table->string('email')->nullable()->unique();
           $table->json('attachments')->nullable();
         
            $table->timestamps();
            $table->comment('This table stores information about  citizen');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('citizenProfiles');
    }
};
