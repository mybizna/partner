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
        Schema::create('partner_type_relation', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('partner_id')->nullable()->index('partner_id');
            $table->unsignedInteger('partner_types_id')->nullable()->index('partner_types_id');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('partner_type_relation');
    }
};
