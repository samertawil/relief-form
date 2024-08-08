<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
 
    public function up()
    {
        Schema::create('aid_parts', function (Blueprint $table) {
            $table->id();
            $table->string('part_name');
            $table->timestamps();
        });
    }

 
    public function down()
    {
        Schema::dropIfExists('aid_parts');
    }
};
