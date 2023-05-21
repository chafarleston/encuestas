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
        Schema::create('qualifications', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('registry_detail_id')->unsigned();
            $table->foreign('registry_detail_id')->references('id')->on('registry_details');
            $table->bigInteger('n1')->default('0');
            $table->bigInteger('n2')->default('0');
            $table->bigInteger('n3')->default('0');
            $table->string('description');
            $table->string('detail')->nullable();
            $table->string('state')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('qualifications');
    }
};
