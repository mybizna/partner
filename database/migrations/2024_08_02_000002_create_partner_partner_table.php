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
        Schema::create('partner_partner', function (Blueprint $table) {
            $table->id();

            $table->foreignId('user_id')->nullable()->constrained('users')->onDelete('set null');

            $table->string('first_name', 60)->nullable();
            $table->string('last_name', 60)->nullable();
            $table->enum('type_str', ['customer', 'suppier'])->nullable()->default('customer');
            $table->enum('gender', ['male', 'female'])->nullable()->default('male');
            $table->string('company', 60)->nullable();
            $table->string('email', 100)->nullable();
            $table->string('phone', 100)->nullable();
            $table->string('birth_date')->nullable();
            $table->string('mobile', 100)->nullable();
            $table->string('other', 50)->nullable();
            $table->string('website', 100)->nullable();
            $table->string('fax', 20)->nullable();
            $table->text('notes')->nullable();
            $table->string('address')->nullable();
            $table->string('city', 80)->nullable();
            $table->string('state', 50)->nullable();
            $table->string('postal_code', 10)->nullable();
            $table->foreignId('country_id')->nullable()->constrained('core_country')->onDelete('set null');
            $table->foreignId('currency_id')->nullable()->constrained('core_currency')->onDelete('set null');
            $table->string('life_stage')->nullable();
            $table->string('hash', 40)->nullable();

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
        Schema::dropIfExists('partner_partner');
    }
};
