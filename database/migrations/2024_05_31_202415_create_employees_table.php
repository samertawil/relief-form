<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use League\CommonMark\Extension\Table\Table;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->integer('idc')->unique();
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->foreignId('user_id')->nullable()->constrained('users'); // اسم المستخدم على البرنامج في حال كان له صلاحيات على النظام
            $table->foreignId('work_type')->nullable()->constrained('statuses'); // عامل , موظف , مدير مركز , مشرف
            $table->string('positions')->nullable(); // تابع للحقل السابق
            $table->foreignId('facility_id')->nullable()->constrained('facilities'); // يعمل في اي منشاءه
            $table->unsignedFloat('salary')->nullable();
            $table->date('start_work_date')->nullable();
            $table->date('end_work_date')->nullable();
            $table->foreignId('current_work_status')->nullable()->constrained('statuses'); // حالة العمل الحالية : يعمل او منتهية خدماته
            $table->foreignId('current_work_status2')->nullable()->constrained('statuses'); // حالة العمل الحالية : يعمل او منتهية خدماته
           
            $table->string('phone1')->nullable();
            $table->string('phone2')->nullable();
            $table->foreignId('address_id')->nullable()->constrained('addresses'); // سلسلة العنوان
            $table->json('images')->nullable();
            $table->json('tags')->nullable(); // 
            $table->enum('active',[0,1])->default(1);
            $table->softDeletes();
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
        Schema::dropIfExists('employees');
    }
};
