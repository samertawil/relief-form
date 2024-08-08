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
        Schema::create('missing_people', function (Blueprint $table) { // جثث المفقودين تحت الانقاض - الدفاع المدني
            $table->id();
            $table->foreignId('idc')->constrained('ssn_login_ques_tb');
            $table->string('missing_full_name');
            $table->foreignId('living_type')->constrained('statuses'); // مقيم ام نازح
            $table->foreignId('created_by')->constrained('citizen_profiles'); //  مدخل البيانات , في حال نظام المواطنين فسيكون مدخل البيانات هو نفسه صاحب التبليغ اما في حال نظام الوزارة فسيكون هذا الحقل هو الموظف المدخل للبيان اما صاحب التبليغ فسيكون اسمه provider     
            $table->date('missing_date'); // تاريخ الفقدان 
            $table->string('building_name');
            $table->unsignedInteger('floor');
            $table->foreignId('building_type')->constrained('statuses');
            $table->foreignId('address_id')->constrained('addresses');
            $table->enum('active',[0,1])->default(1);
        
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('missing_people');
    }
};
