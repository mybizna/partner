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

            $table->foreignId('partner_id')->nullable()->constrained('partner_partner')->onDelete('set null');
            $table->string('meta_key')->nullable();
            $table->longText('meta_value')->nullable();
            $table->unsignedBigInteger('country_id')->nullable()->change();
            $table->unsignedBigInteger('currency_id')->nullable()->change();

            $table->foreignId('created_by')->nullable()->constrained('users')->onDelete('set null');
            $table->foreignId('updated_by')->nullable()->constrained('users')->onDelete('set null');
            $table->foreignId('deleted_by')->nullable()->constrained('users')->onDelete('set null');

            $table->timestamps();
            $table->softDeletes();
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
