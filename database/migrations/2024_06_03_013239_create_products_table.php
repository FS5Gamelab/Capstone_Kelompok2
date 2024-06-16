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
            $table->string('code');
            $table->string('name');
            $table->string('description');
            $table->json('size');
            $table->integer('stock');
            $table->integer('price');
            $table->boolean('pre_order')->default(false);
            $table->string('image')->nullable();
            $table->timestamp('expired_at')->nullable();
            $table->softDeletes();
            $table->timestamps();
            
            /**
             * Gunakan 'set null' untuk menerapkan perilaku:
             * - Data pada tabel ini tidak akan hilang ketika Data yang dirujuk oleh 'constrained' dihapus.
             * 
             * Gunakan 'cascade' untuk menerapkan perilaku:
             * - Data pada tabel ini akan ikut hilang ketika Data yang dirujuk oleh 'constrained' dihapus.
             */
            $table->foreignId('category_id')->nullable()->constrained('sub_categories')->onDelete('cascade');
            $table->foreignId('brand_id')->nullable()->constrained()->onDelete('cascade');
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
