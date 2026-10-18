use Illuminate\Support\Facades\Route;
use App\Models\PoliceStation;
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
        Schema::create('police_stations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('district_id')->constrained('districts')->cascadeOnDelete();
            $table->string('name', 100)->unique();
            $table->integer('order')->default(0);
            $table->dateTime('created_at', precision: 0)->useCurrent();
            $table->dateTime('updated_at', precision: 0)->useCurrent()->useCurrentOnUpdate();
        
        });     
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('police_stations', function (Blueprint $table) {
            $table->dropForeign(['district_id']);
            $table->dropColumn('district_id');
        });
    }
};