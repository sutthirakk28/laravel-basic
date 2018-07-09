<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('libs', function (Blueprint $table) {
            $table->integer('id_employ');            
            $table->date('job_start');
            $table->date('job_end');
            $table->integer('y_work');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('libs', function (Blueprint $table) {
            $table->dropColumn('id_employ');
            $table->dropColumn('job_start');
            $table->dropColumn('job_end');
            $table->dropColumn('y_work');
        });
    }
}
