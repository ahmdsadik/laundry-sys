<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('order_details', function (Blueprint $table) {
            $table->id();
            $table->string('description');
            $table->string('quantity');
            $table->unsignedInteger('price');
            $table->foreignId('order_id')->constrained()->cascadeOnDelete();
            $table->foreignId('item_service_id')->nullable()->constrained('item_service')->nullOnDelete();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('order_details');
    }
};
