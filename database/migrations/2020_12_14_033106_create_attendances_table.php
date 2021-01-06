<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAttendancesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('attendances', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('student_id')->unsigned()->nullable();
            $table->foreign('student_id')->references('id')->on('students')->onDelete('cascade');
            $table->bigInteger('healthcare_id')->unsigned()->nullable();
            $table->foreign('healthcare_id')->references('id')->on('students')->onDelete('cascade');
            $table->bigInteger('counselor_id')->unsigned()->nullable();
            $table->foreign('counselor_id')->references('id')->on('students')->onDelete('cascade');
            $table->bigInteger('librarian_id')->unsigned()->nullable();
            $table->foreign('librarian_id')->references('id')->on('students')->onDelete('cascade');
            $table->date('date');
            $table->enum('attendance_status',['present','late','absent'])->nullable();
            $table->enum('deleted',['0','1'])->default('0');
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
        Schema::dropIfExists('attendances');
    }
}
