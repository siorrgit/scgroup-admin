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
            $table->unsignedBigInteger('user_id')->references('id')->on('users')->nullable();
            $table->string('guest_first_name')->nullable();
            $table->string('guest_last_name')->nullable();
            $table->string('guest_email')->nullable();
            $table->string('guest_phone')->nullable();
            $table->string('shop_id')->references('id')->on('shops');
            $table->boolean('is_spot')->default(false);
            $table->dateTime('receiving_at')->nullable();
            $table->dateTime('received_at')->nullable();
            $table->string('status');
            // 下書き - draft
            // 未完了（送信済み） - incomplete_sent
            // 未完了（来店依頼済み） - incomplete_notified
            // 完了（事前登録決済済み） - complete_apppayed
            // 完了（店頭決済済み） - complete_shoppayed
            // 完了（キャンセル） - complete_canceled
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
