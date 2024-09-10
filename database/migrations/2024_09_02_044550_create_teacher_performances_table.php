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
        Schema::create('teacher_performances', function (Blueprint $table) {
            $table->id();
            $table->string('teacher_name');
            $table->string('evaluator_name');
            $table->integer('penilaian_1');
            $table->integer('penilaian_2');
            $table->integer('penilaian_3');
            $table->integer('penilaian_4');
            $table->integer('penilaian_5');
            $table->integer('penilaian_6');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('teacher_performances');
    }
};
