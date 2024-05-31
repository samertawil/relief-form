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
        Schema::create('facilities', function (Blueprint $table) {
            $table->id();
            $table->string('facility_name')->unique();
            $table->foreignId('facility_type')->nullable()->constrained('statuses'); // نوع المنشاءه : مركز توزيع او مخزن مواد او مركز تسجيل او غيره
            $table->foreignId('address_id')->nullable()->constrained('addresses'); // سلسلة العنوان
            $table->string('phone1')->nullable();
            $table->string('phone2')->nullable();
            $table->json('tags')->nullable(); // 
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
        Schema::dropIfExists('facilities');
    }
};
