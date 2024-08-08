<?php

use App\Models\citizen;
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
        Schema::create('transport_damages', function (Blueprint $table) {
            $table->id();
            $table->foreignId('transport_category')->constrained('statuses'); // النوع : مركبة ام منشأءه
            $table->foreignId('transport_type')->constrained('statuses'); // نوع المركبة او نوع المنشاءه مثل ملاكي , عمومي , مدرسة تعليم سواقة , ورشة فنية
            $table->string('transport_no')->nullable()->unique(); // رقم المنشأه ,  رقم المركبة
            $table->integer('regestraion_idc')->constrained('ssn_login_ques_tb','idc'); //مالك المركبة حسب تسجيل الرخصة
             $table->integer('owner_idc')->nullable()->constrained('ssn_login_ques_tb','idc'); //رقم هوية الحائز
             $table->string('owner_name')->nullable(); //اسم الحائز  
            $table->date('damage_date');
            $table->foreignId('transport_damage_size')->nullable();
            $table->string('damage_description');
            $table->json('attachments')->nullable();
            $table->foreignId('created_by')->constrained('citizen_profiles'); // بروفايل مدخل البيان
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
        Schema::dropIfExists('transport_damages');
    }
};
