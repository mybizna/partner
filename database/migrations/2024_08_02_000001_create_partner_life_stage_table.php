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
        Schema::create('partner_life_stage', function (Blueprint $table) {
            $table->id();

            $table->string('slug', 100)->nullable()->unique('slug');
            $table->string('title', 100)->nullable();
            $table->string('title_plural', 100)->nullable();
            $table->unsignedSmallInteger('position')->default(0);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('partner_life_stage');
    }
};
