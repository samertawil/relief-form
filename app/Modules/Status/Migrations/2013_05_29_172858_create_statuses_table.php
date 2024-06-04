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
        Schema::create('statuses', function (Blueprint $table) {
            $table->id();
            $table->integer('p_id')->nullable();
            $table->integer('p_id_sub')->nullable();
            $table->string('status_name');
            $table->foreignId('used_in_system_id')->nullable()->constrained('setting_systems');
            $table->string('route_name')->nullable();
            $table->string('page_name')->nullable();
            $table->string('route_system_name')->nullable();
            $table->text('description')->nullable();
            $table->boolean('can_delete')->default(true);
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
        Schema::dropIfExists('statuses');
    }
};
