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
        Schema::table('registry_details', function (Blueprint $table) {

             DB::statement('ALTER TABLE registry_details ADD average bigINT  AS ((n1 + n2 + n3) /3)');
            //
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('registry_detail', function (Blueprint $table) {
            //
        });
    }
};
