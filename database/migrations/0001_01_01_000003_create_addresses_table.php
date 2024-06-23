<?php

use Illuminate\Database\Eloquent\Casts\Json;
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
        Schema::create('addresses', function (Blueprint $table, Json $default) {

            // Perlu penyesuaian dengan API Google Maps atau API Map lainnya
            $defaultDetails = [
                "negara" => null,
                "provinsi" => null,
                "kabupaten" => null,
                "kecamatan" => null,
                "detail" => null,
                "place_id" => null,
                "geometry" => null,
                "formatted_addreess" => null
            ];

            $table->id();
            $table->string('code')->unique();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->integer('phone')->nullable();
            $table->json('details')->default(json_encode($defaultDetails));
            $table->enum('label', ['office', 'home', 'apartment', 'other'])->default('other');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Schema::dropIfExists('addresses');
        Schema::table('addresses', function (Blueprint $table) {
            $table->dropSoftDeletes();
        });
    }
};
