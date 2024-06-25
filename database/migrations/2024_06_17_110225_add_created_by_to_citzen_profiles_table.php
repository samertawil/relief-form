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
        Schema::table('citizen_profiles', function (Blueprint $table) {
            $table->foreignId('created_by')->nullable()->constrained('users');
            $table->timestamp('last_active_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('citizen_profiles', function (Blueprint $table) {
            $table->dropColumn('created_by');
            $table->dropColumn('last_active_at');
        });
    }
};
