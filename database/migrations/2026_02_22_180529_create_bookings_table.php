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
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->date('tanggal');
            $table->time('jam_mulai');
            $table->time('jam_selesai');
            $table->decimal('harga', 12, 2);
            $table->string('tipe_pembayaran')->nullable(); // 'dp' or 'lunas'
            $table->decimal('jumlah_bayar', 12, 2)->nullable();
            $table->string('invoice_code')->unique();
            $table->string('status')->default('waiting_payment');
            $table->string('payment_proof')->nullable();
            $table->timestamp('payment_expired_at')->nullable();
            $table->integer('payment_retry_count')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
};
