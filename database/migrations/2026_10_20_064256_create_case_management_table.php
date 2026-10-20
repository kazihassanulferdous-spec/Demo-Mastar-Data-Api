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
        Schema::create('case_managements', function (Blueprint $table) {

            $table->id();

        // General Information
            $table->string('trade_union_name');
            $table->string('trade_union_name_bn')->nullable();
            $table->date('case_issue_date');
            $table->string('case_no_writ_petition_no')->unique();

            $table->text('trade_union_address');
            $table->string('trade_union_address_bn');

            $table->foreignId('division_id')
                ->constrained('divisions');

            $table->foreignId('district_id')
                ->constrained('districts');

            $table->foreignId('police_station_id')
                ->constrained('police_stations');

            $table->foreignId('court_type_id')
                ->constrained('court_types');

            $table->foreignId('court_id')
                ->constrained('courts');

            $table->foreignId('case_category_id')
                ->constrained('case_categories');

            $table->string('case_subject');
            $table->string('case_subject_bn');

            $table->longText('background_of_case_file')->nullable();
            $table->longText('background_of_case_file_bn')->nullable();


        // Defendant Information
            $table->string('defendant_name');

            $table->foreignId('defendant_division_id')
                ->constrained('divisions');

            $table->foreignId('defendant_district_id')
                ->constrained('districts');

            $table->foreignId('defendant_police_station_id')
                ->constrained('police_stations');

            $table->string('defendant_organization_type');


        // Case Status
            $table->string('status')->default('Pending');

        // Timestamps — only once
            $table->timestamps();
        });
    }
public function down(): void
{
    Schema::dropIfExists('case_managements');
}


};