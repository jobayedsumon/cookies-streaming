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
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->string('uuid')->unique();
            $table->string('name')->nullable();
            $table->string('email')->nullable();
            $table->string('phone_number')->unique();
            $table->string('otp')->nullable();
            $table->string('otp_verified_at')->nullable();
            $table->unsignedInteger('payout_method')->nullable();
            $table->string('beneficiary_name')->nullable();
            $table->string('payout_id')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customers');
    }
};
