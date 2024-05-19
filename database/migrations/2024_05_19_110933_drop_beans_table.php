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
        Schema::dropIfExists('beans');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('beans', function (Blueprint $table) {
            //
        });
    }
};
