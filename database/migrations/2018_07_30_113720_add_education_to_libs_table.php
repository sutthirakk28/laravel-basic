<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddEducationToLibsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('libs', function (Blueprint $table) {
            $table->integer('education')->nullable()->comment('1=มัธยมศึกษาตอนต้น 2=มัธยมศึกษาตอนปลาย 3=ปวช. (ประกาศนียบัตรวิชาชีพ) 4=  
ปวส. (ประกาศนียบัตรวิชาชีพชั้นสูง) 5=ปริญญาตรี 6=ปริญญาโท 7=ปริญญาเอก');
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
            //
        });
    }
}
