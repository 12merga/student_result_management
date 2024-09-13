<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::create('roles', function (Blueprint $table) {
            $table->id();  // This is equivalent to $table->bigIncrements('id');
            $table->string('name')->unique();  // Adding unique constraint for role names
            $table->string('slug')->unique();  // Adding unique constraint for slugs
            $table->timestamps();  // This adds 'created_at' and 'updated_at' columns
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists('roles');
    }
};
