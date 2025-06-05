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
        Schema::create('coupons', function (Blueprint $table) {
        $table->id();
        $table->string('code')->unique();
        $table->text('description')->nullable();
        $table->integer('discount_percent')->default(0);
        $table->decimal('max_discount_value', 10, 2)->nullable();
        $table->decimal('min_order_value', 10, 2)->nullable();
        $table->date('start_date');
        $table->date('end_date');
        $table->integer('usage_limit')->default(1);
        $table->integer('usage_count')->default(0);
        $table->timestamps();
    });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('coupons');
    }
};
