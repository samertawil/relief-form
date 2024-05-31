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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->integer('idc')->unique();
            $table->string('user_name')->unique();
            $table->string('full_name')->unique();
            $table->string('mobile')->unique();
            $table->string('email')->unique();
            $table->foreignId('status_id')->nullable()->constrained('statuses');
            $table->enum('user_type', ['user', 'employee', 'admin', 'superadmin'])->default('user');
            $table->enum('user_activation', [0, 1])->default(1);

            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
};
