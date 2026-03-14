<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('orders', function (Blueprint $table) {

            $table->string('shipping_name')->after('payment_proof');
            $table->string('shipping_phone')->after('shipping_name');
            $table->text('shipping_address')->after('shipping_phone');

        });
    }

    public function down(): void
    {
        Schema::table('orders', function (Blueprint $table) {

            $table->dropColumn([
                'shipping_name',
                'shipping_phone',
                'shipping_address'
            ]);

        });
    }
};
