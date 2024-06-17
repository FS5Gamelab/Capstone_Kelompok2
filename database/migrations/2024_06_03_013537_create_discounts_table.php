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
        Schema::create('discounts', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->enum('applied_to', ['global', 'product', 'brand','category', 'subCategory']);
            $table->enum('type',['fixed','percentage'])->default('fixed');
            $table->integer('value');
            $table->integer('max_value');
            $table->json('details');
            $table->softDeletes();
            $table->timestamps();
            
            /**
             * Hanya satu relasi yang diisi, berdasarkan 'applied_to'. Dan jika bernilai global, semua menjadi NULL.
             */
            $table->foreignId('product_id')->unique()->nullable()->constrained()->onDelete('cascade');
            $table->foreignId('sub_category_id')->unique()->nullable()->constrained()->onDelete('cascade');
            $table->foreignId('category_id')->unique()->nullable()->constrained()->onDelete('cascade');
            $table->foreignId('brand_id')->unique()->nullable()->constrained()->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('discounts');
    }
};
