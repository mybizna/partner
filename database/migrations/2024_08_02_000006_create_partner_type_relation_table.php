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

            $table->foreignId('partner_id')->constrained('partner_partner')->onDelete('cascade')->nullable()->index('partner_type_relation_partner_id');
            $table->foreignId('partner_type_id')->constrained('partner_type')->onDelete('cascade')->nullable()->index('partner_type_relation_partner_type_id');

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
