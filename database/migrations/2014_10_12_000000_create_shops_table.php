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
        Schema::create('shops', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->foreignId('area_id')->constrained()->nullable();
            $table->string('name');
            $table->char('postcode', 7);
            $table->string('address');
            $table->string('lat');
            $table->string('lng');
            $table->string('tel');
            $table->text('hours')->nullable();
            $table->text('holiday')->nullable();
            $table->text('note')->nullable();
            $table->boolean('payable')->default(true);
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->boolean('is_active')->default(true);
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('shops');
    }
};
