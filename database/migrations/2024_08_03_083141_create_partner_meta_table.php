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
        Schema::create('partner_meta', function (Blueprint $table) {
            $table->id();

            $table->bigInteger('partner_id')->nullable()->index('partner_id');
            $table->string('meta_key')->nullable();
            $table->longText('meta_value')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('partner_meta');
    }
};
