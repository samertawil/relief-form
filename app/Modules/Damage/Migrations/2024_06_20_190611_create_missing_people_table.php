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
        Schema::create('missing_people', function (Blueprint $table) {
            $table->id();
            $table->foreignId('created_by')->constrained('citizen_profiles'); // تم تعبئة الاستبانة بواسطة صاحب البروفايل
            $table->date('strike_date'); // تاريخ استهداف المبنى
            $table->string('building_name');
            $table->unsignedInteger('floor');
            $table->foreignId('building_type')->constrained('statuses');
            $table->foreignId('address_id')->constrained('addresses');
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
        Schema::dropIfExists('missing_people');
    }
};
