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
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->string('name', 255);
            $table->text('description');
            $table->date('date');
            $table->time('time');
            $table->enum('modality', ['Presential', 'Hybrid', 'Remote']);
            $table->enum('status', ['Active', 'Inactive', 'Pending'])->default('Pending');
            $table->enum('type', ['Course', 'Workshop', 'Lecture']);
            $table->string('target_audience', 255);
            $table->integer('vacancies');
            $table->integer('social_vacancies')->default(0);;
            $table->integer('regular_vacancies')->default(0);;
            $table->string('material', 255);
            $table->string('interest_area', 255);
            $table->float('price')->default(0)->nullable(true);
            
            $table->timestamps();
        });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('events');
    }
};
