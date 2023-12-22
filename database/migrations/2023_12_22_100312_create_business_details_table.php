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
        Schema::create('business_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('company_id');
            $table->string('lin_number')->nullable();
            $table->string('cin_number')->nullable();
            $table->string('tan_number')->nullable();
            $table->string('esic_number')->nullable();
            $table->string('epf_number')->nullable();
            $table->string('aadhar_udhyam')->nullable();
            $table->string('dipt_certificate_number')->nullable();
            $table->string('cmmi_level')->nullable();
            $table->string('iso_certification_file')->nullable();
            $table->string('ministry_name')->nullable();
            $table->string('registered_address')->nullable();
            $table->string('corporate_office_address')->nullable();
            $table->string('billing_address')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('business_details');
    }
};
