<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLeavesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('leaves', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_per');
            $table->integer('type_leave')->comment('1=ลาคลอด 2=ลาป่วย 3=ลากิจ 4=ลากิจ-ราชการ');
            $table->date('date_leave');
            $table->text('reason_leave')->nullable();;
            $table->date('dstart_leave');
            $table->date('dend_leave');
            $table->integer('proof_leave')->nullable()->comment('1=ใบรับรองแพทย์ 2=ใบติดต่อราชการ 3=ตารางสอบ/เรียน 4=หลักฐานอื่นๆ');
            $table->integer('approved')->comment('1=ประธานบริษัท 2=กรรมการผู้จัดการ 3=เจ้าหน้าที่ฝ่ายบุคคล 4=หัวหน้าฝ่าย');
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
        Schema::dropIfExists('leaves');
    }
}
