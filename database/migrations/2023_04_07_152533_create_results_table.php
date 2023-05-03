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
        Schema::create('results', function (Blueprint $table) {
            $table->id();
            $table->string('remark');
            $table->unsignedInteger('time_in_seconds');
            $table->unsignedInteger('validated');
            $table->date("training_date");
            $table->string("intensity");
            $table->string("distance");
            $table->string("result_type");
            $table->string("stroke_type");
            $table->foreignId("user_id");
            $table->foreignId("squad_id")->nullable();
            $table->foreignId("gala_id")->nullable();
            
            $table->timestamps();
        });

        // $table->time("start_time");
        // $table->time("end_time");
        // $table->string("intensity");
        // $table->string("description");
        // $table->string("name");
        // $table->string("day");
        // $table->string("distance");
        // $table->string("stroke_type");
        // $table->foreignId("squad_id");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('results');
    }
};
