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
        Schema::create('companies', function (Blueprint $table) {
            $table->id();
            $table->foreignId('created_by')->constrained('users');
            $table->foreignId('owner_id')->constrained('users');
            $table->foreignId('company_type_id');
            $table->foreignId('country_id');
            $table->foreignId('state_id');
            $table->foreignId('city_id');
            $table->string('company_name');
            $table->string('company_email');
            $table->string('company_phone')->nullable();
            $table->string('logo')->nullable();
            $table->string('logo_path')->nullable();
            $table->string('gov_tax_number_ein')->nullable();
            $table->string('registration_number')->unique();
            $table->text('description')->nullable();
            $table->string('website')->nullable();
            $table->string('address_line_1')->nullable();
            $table->string('address_line_2')->nullable();
            $table->string('pincode')->nullable();
            $table->string('status')->default('disabled');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('companies');
    }
};
