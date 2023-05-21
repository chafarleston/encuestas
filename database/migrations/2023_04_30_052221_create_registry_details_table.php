<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('registry_details', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('registry_id')->unsigned();
            $table->foreign('registry_id')->references('id')->on('registries');
            //student

                //  $table->bigInteger('student_id')->unsigned();

                //   $table->foreign('student_id')
                //   ->references('id')->on('students');

                   $table->bigInteger('n1')->default("0");
                   $table->bigInteger('n2')->default("0");
                   $table->bigInteger('n3')->default("0");

            //student
             $table->bigInteger('student_m')->unsigned();
             $table->string('student_t');
            $table->bigInteger('student_r')->unsigned();

            $table->foreign(['student_m','student_t','student_r'])
            ->references(['model_id','model_type','role_id'])->on('model_has_roles');
            $table->string('code_certification')->nullable();
            $table->string('url_certification')->nullable();
            $table->string('state_certification')->nullable();
            $table->timestamps();



        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('registry_details');
    }
};
