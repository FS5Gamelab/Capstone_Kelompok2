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
            $table->string('code')->unique();
            $table->string('name');
            $table->enum('applied_to', ['global', 'product', 'brand','category', 'subCategory']);
            $table->unsignedBigInteger('reference_id')->unique()->nullable();
            $table->enum('type',['fixed','percentage'])->default('fixed');
            $table->integer('value');
            $table->integer('max_value');
            $table->json('details')->default('{}');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Schema::dropIfExists('discounts');
        Schema::table('categories', function (Blueprint $table) {
            $table->dropSoftDeletes();
        });
    }
};
