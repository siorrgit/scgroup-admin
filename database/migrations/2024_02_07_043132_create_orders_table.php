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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('number');
            $table->foreignId('user_id')->constrained()->nullable();
            $table->string('guest_first_name');
            $table->string('guest_last_name');
            $table->string('guest_email');
            $table->string('guest_phone');
            $table->string('shop_id')->references('id')->on('shops');
            $table->dateTime('receiving_at');
            $table->dateTime('received_at')->nullable();
            $table->string('status');
            // 未完了 - incomplete
            // 未完了（来店依頼済み） - notified
            // 事前登録決済済み - apppayed
            // 店頭決済済み - shoppayed
            // キャンセル - canceled
            $table->text('message')->nullable();
            $table->timestamps();

            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
