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
            $table->string('customer_name')->nullable();
            $table->string('order_date');
            $table->string('order_status');
            $table->string('total_products');
            $table->string('sub_total')->nullable();
            $table->string('vat')->nullable();
            $table->string('invoice_no')->nullable();
            $table->string('total')->nullable();
            $table->string('payment_method')->nullable();
            $table->string('payment_received')->nullable();
            $table->string('change_given')->nullable();
            $table->timestamps();
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