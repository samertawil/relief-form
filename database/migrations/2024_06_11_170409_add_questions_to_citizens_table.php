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
        Schema::table('citizens', function (Blueprint $table) {
            
            $table->string('q1')->nullable() ;
            $table->string('answer_q1')->nullable() ;
            $table->string('q2')->nullable() ;
            $table->string('answer_q2')->nullable();


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('citizens', function (Blueprint $table) {
            $table->dropColumn('q1');
            $table->dropColumn('answer_q1');
            $table->dropColumn('q2');
            $table->dropColumn('answer_q2');
        });
    }
};
