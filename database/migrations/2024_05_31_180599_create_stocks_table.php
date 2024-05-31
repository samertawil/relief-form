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
        Schema::create('stocks', function (Blueprint $table) {
            $table->id();
            $table->string('stock_name')->uniqid();
            $table->foreignId('address_id')->constrained('addresses');  // سلسلة العنوان
            $table->string('phone1')->nullable();
            $table->string('phone2')->nullable();
            $table->json('tags')->nullable(); // طبيعة المواد المخزنة في المخزن
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
        Schema::dropIfExists('stocks');
    }
};
