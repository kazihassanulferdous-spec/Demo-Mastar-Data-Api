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
        Schema::create('courts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('court_type_id')->constrained('court_types')->cascadeOnDelete();
            $table->string('name', 100);
            $table->string('name_bn', 100);
            $table->foreignId('court_type_id')->constrained('court_types');
            $table->foreignId('created_by')->constrained('users');
            $table->bigInteger('order')->default(0);
            $table->timestamps();
        });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('courts');
    }
};
