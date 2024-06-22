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
        Schema::create('form_lists', function (Blueprint $table) {
            $table->id();
            $table->foreignId('form_id')->constrained('statuses');
            $table->foreignId('status_id')->nullable()->constrained('statuses');
            $table->foreignId('responsible')->nullable()->constrained('statuses');
            $table->date('start_date')->nullable();
            $table->date('end_date')->nullable();
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
        Schema::dropIfExists('form_lists');
    }
};
