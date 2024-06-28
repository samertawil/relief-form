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
        Schema::create('addresses', function (Blueprint $table) {
            $table->id();
            $table->string('address_name')->nullable();
            $table->foreignId('region_id')->constrained('regions');
            $table->foreignId('city_id')->constrained('cities');
            $table->foreignId('area_id')->constrained('areas');
            $table->foreignId('neighbourhood_id')->constrained('neighbourhoods');
          
            $table->foreignId('nearest_location_type')->nullable()->constrained('statuses'); //مسجد , مدرسة , الخ
            $table->string('address_specific'); // باقي العنوان بالتفصيل
            $table->foreignId('address_type')->nullable()->constrained('statuses'); // نوع العنوان , عنوان سكن او عنوان للعمل او عنوان لمكان النزوح او عناون سكن بشكل دائم
            $table->string('gis')->nullable();
            $table->enum('active',[0,1])->default(1);
            $table->foreignId('user_id')->nullable()->constrained('users');// المستخدم الذي قام بادخال المعلومة
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
        Schema::dropIfExists('addresses');
    }
};
