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

        Schema::create('registries', function (Blueprint $table) {
            $table->id();
            $table->string('description')->nullable();
            //course
            $table->bigInteger('course_id')->unsigned();
            $table->foreign('course_id')->references('id')->on('courses');
            //teacher
            $table->bigInteger('teacher_m')->unsigned();
            $table->string('teacher_t');
           $table->bigInteger('teacher_r')->unsigned();
             $table->foreign(['teacher_m','teacher_t','teacher_r'])
             ->references(['model_id','model_type','role_id'])->on('model_has_roles');
            // //assitance
            $table->bigInteger('assistance_id')->unsigned();
            $table->foreign('assistance_id')->references('id')->on('assistants');
            //coordination
        //     $table->bigInteger('coordination_m')->unsigned();
        //     $table->string('coordination_t');
        //    $table->bigInteger('coordination_r')->unsigned();
        //      $table->foreign(['coordination_m','coordination_t','coordination_r'])
        //      ->references(['model_id','model_type','role_id'])->on('model_has_roles');

              ////////////////
              $table->time('hour_start');
              $table->time('hour_end');
              $table->dateTime('fec_start');
              $table->dateTime('fec_end');
              $table->date('date_certification');
              $table->string('edition');
                $table->string('type');
              $table->string('detail')->nullable();

             $table->bigInteger('schedule_id')->unsigned();
             $table->foreign('schedule_id')->references('id')->on('schedules');
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('registries');
    }
};
