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
        Schema::create('products', function (Blueprint $table) {
        $table->id();
        $table->unsignedBigInteger('seller_id');
        $table->unsignedBigInteger('category_id');
        $table->string('name');
        $table->string('slug')->unique();
        $table->text('description')->nullable();
        $table->decimal('price', 12, 2);
        $table->integer('stock');
        $table->integer('sold')->default(0);
        $table->text('thumbnail')->nullable();
        $table->enum('status', ['active', 'inactive'])->default('active');
        $table->timestamps();

        $table->foreign('seller_id')->references('id')->on('users');
        $table->foreign('category_id')->references('id')->on('categories');
    });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
