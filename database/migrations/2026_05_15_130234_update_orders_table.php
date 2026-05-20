<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('orders', function (Blueprint $table) {

            $table->string('payment_method')->after('total_price');

            $table->enum('status', [
                'pending',
                'processing',
                'shipped',
                'completed',
                'cancelled',
                'refunded'
            ])->default('pending')->change();

            $table->enum('payment_status', [
                'unpaid',
                'waiting_verification',
                'paid',
                'rejected'
            ])->default('unpaid')->change();

        });
    }

    public function down(): void
    {
        //
    }
};