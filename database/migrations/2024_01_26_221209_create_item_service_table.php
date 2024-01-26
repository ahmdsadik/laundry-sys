<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('item_service', function (Blueprint $table) {
            $table->id();

            $table->foreignId('service_id')->constrained('services')->cascadeOnDelete();
            $table->foreignId('item_id')->constrained('items')->cascadeOnDelete();

            $table->unsignedInteger('price')->nullable();

            $table->unique(['item_id', 'service_id']);

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('item_service');
    }
};
