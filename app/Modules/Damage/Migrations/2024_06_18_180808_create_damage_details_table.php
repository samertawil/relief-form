<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
 
    public function up()
    {
        Schema::create('damage_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('master_id')->constrained('damage_masters');  
            $table->foreignId('damage_specific')->constrained('statuses');  
            $table->foreignId('status_id')->nullable()->constrained('statuses');
            $table->unique(['master_id','damage_specific']);
            $table->enum('active',[0,1])->default(1);
            $table->foreignId('created_by')->nullable()->constrained('citizen_profiles'); 
            $table->json('attachments')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

 
    public function down()
    {
        Schema::dropIfExists('damage_details');
    }
};
