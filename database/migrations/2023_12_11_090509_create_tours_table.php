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
        Schema::create('tours', function (Blueprint $table) {
            $table->unsignedBigInteger('id')->nullable(false)->primary();
            $table->string('name')->nullable(false);
            $table->text('description')->nullable(false);
            $table->string('address')->nullable(false);
            $table->foreignId('district_id');
            $table->foreignId('category_id');
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tours');
    }
};
