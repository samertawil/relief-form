<?php

use App\Models\citizen;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
 
    public function up()
    {
        Schema::create('damaged_residential_units', function (Blueprint $table) {
            $table->id();
            $table->foreignId('places_id')->constrained('damaged_residential_places'); // للربط مع جدول ال ماستر
         
            $table->foreignId('damage_size')->constrained('statuses'); // حجم الضرر مثل هدم كلي , جزئي غير صالح للسكن
            $table->foreignId('unit_type')->constrained('statuses'); // ألوحدة السكنية ملك , ايجار , خالية
            $table->date('unit_damage_date'); // ناريخ تضرر الوحدة  
            $table->foreignId('citizen_type')->constrained('statuses'); // مواطن ام لاجئ
            $table->string('undp_number')->nullable(); // رقم كرت اللجوء
            $table->foreignId('created_by')->constrained('citizen_profiles'); // بروفايل مدخل البيان
            $table->foreignId('beneficiary_idc')->nullable()->constrained('ssn_login_ques_tb'); // هوية المستفيد
            $table->foreignId('owner_idc')->constrained('ssn_login_ques_tb'); // هوية مالك الوحدة السكنية
            $table->json('attachments')->nullable();  // مرفقات
            $table->string('notes')->nullable(); 
            $table->timestamps();
         
        });
    }

   
    public function down()
    {
        Schema::dropIfExists('damaged_residential_units');
    }
};
