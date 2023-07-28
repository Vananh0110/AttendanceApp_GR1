<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('attendance', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('clazz_id');
            $table->unsignedInteger('student_id');
            $table->unsignedInteger('teacher_id');
            $table->json('face_image');
            $table->date('attendance_date');
            $table->time('attendance_time');
            $table->foreign('clazz_id')->references('id')->on('clazzes');
            $table->foreign('student_id')->references('id')->on('students');
            $table->foreign('teacher_id')->references('id')->on('teachers');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('attendance');
    }
};
