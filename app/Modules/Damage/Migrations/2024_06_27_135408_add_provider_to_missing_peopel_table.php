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
        Schema::table('missing_people', function (Blueprint $table) {
            $table->integer('provider')->after('active'); // مقدم الاستبانة
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('missing_peopel', function (Blueprint $table) {
           $table->dropColumn('provider');
        });
    }
};
