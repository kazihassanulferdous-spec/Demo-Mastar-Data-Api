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
    Schema::create('court_types', function (Blueprint $table) {
        $table->id();
        $table->string('name', 100);
        $table->string('name_bn', 100);
        $table->boolean('status')->default(true);
        $table->bigInteger('order')->default(0);
         $table->foreignId('court_type_id')
              ->constrained('court_types');
        $table->unsignedBigInteger('created_by')->nullable();
        $table->timestamps();

    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
    Schema::dropIfExists('court_types');
    }
};
