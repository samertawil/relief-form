<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
 
    public function up()
    {
        Schema::create('locations', function (Blueprint $table) {
            $table->id();
            $table->string('location_name');
            $table->foreignId('neighbourhood_id')->constrained('neighbourhoods');
            $table->integer('street_id')->nullable();
            $table->integer('loc_type_id')->nullable();
            $table->string('address_name')->nullable();
            $table->integer('mark_type_id')->nullable();
            $table->string('mark_type_nameE')->nullable();
            $table->enum('active',[0,1])->default(1);
            $table->softDeletes();

            $table->timestamps();
        });
    }


    public function down()
    {
        Schema::dropIfExists('locations');
    }
};
