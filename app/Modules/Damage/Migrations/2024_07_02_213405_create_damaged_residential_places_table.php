<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
 
    public function up()
    {
        Schema::create('damaged_residential_places', function (Blueprint $table) {
            $table->id();
            $table->string('building_name'); // اسم المبنى
            $table->string('owner_name')->nullable(); // اسم المالك
            $table->foreignId('building_type')->constrained('statuses'); // نوع المبنى ك برج سكني او عمارة او منزل
            $table->unsignedInteger('floor')->nullable();
            $table->unsignedInteger('units_count')->nullable();
            $table->date('damage_date');  // تاريخ الاستهداف
            $table->foreignId('place_damage_size')->nullable()->constrained('statuses'); // حجم الضرر للمبنى , هدم كلي او جزئي قابل للسكن او غيره
            $table->foreignId('address_id')->constrained('addresses'); // عنوان المبنى
            $table->enum('active',[0,1])->default(1);
            $table->string('notes');
            $table->json('attachments')->nullable();
            $table->foreignId('created_by')->constrained('citizen_profiles'); // بروفايل مدخل البيان
            $table->enum('creator_type',['citizen','employee']); // هل مدخل البيان مواطن ام موظف
            $table->unique(['building_name','created_by']);
            $table->timestamps();
           
        });
    }

  
    public function down()
    {
        Schema::dropIfExists('damaged_residential_places');
    }
};
