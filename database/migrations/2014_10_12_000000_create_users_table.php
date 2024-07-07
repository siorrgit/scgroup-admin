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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('first_kana');
            $table->string('last_kana');
            $table->string('gender');
            $table->string('birth_year');
            $table->string('birth_month');
            $table->string('birth_day');
            $table->string('phone');
            $table->string('shop_id')->references('id')->on('shops')->nullable();
            $table->boolean('notification')->nullable();
            $table->boolean('active')->default(true);
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->char('onetime_token', 4)->nullable();
            $table->dateTime('onetime_token_expiration')->nullable();
            $table->string('stripe_customer_id');
            $table->string('stripe_paymentmethod_id')->nullable();
            $table->string('stripe_cc_last4')->nullable();
            $table->rememberToken();
            $table->timestamps();

            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
