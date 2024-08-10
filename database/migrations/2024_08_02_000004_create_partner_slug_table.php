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
        Schema::create('partner_slug', function (Blueprint $table) {
            $table->id();

            $table->foreignId('partner_id')->constrained('partner_partner')->onDelete('cascade')->nullable()->index('partner_slug_partner_id');
            $table->string('slug')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('partner_slug');
    }
};
