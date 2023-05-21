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
        Schema::create('certifications', function (Blueprint $table) {
              $table->id();
            $table->bigInteger('registry_detail_id')->unsigned();
            $table->foreign('registry_detail_id')->references('id')->on('registry_details');
  $table->string('description');
            $table->string('code')->nullable();
                $table->string('date')->nullable();
            $table->string('url')->nullable();
              $table->string('url_image')->nullable();
             $table->string('detail')->nullable();
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('certifications');
    }
};
