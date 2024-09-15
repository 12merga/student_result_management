<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentsTable extends Migration
{
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('class');
            $table->date('dob');
            $table->unsignedBigInteger('parent_id');
            $table->string('student_id')->unique();
            $table->string('password');
            $table->timestamps();

            $table->foreign('parent_id')->references('id')->on('parents')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('students');
    }
}
