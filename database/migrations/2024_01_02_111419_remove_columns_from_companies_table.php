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
        Schema::table('companies', function (Blueprint $table) {
            $table->dropColumn('registration_number');
            $table->dropColumn('legal_trading_name');
            $table->dropColumn('gov_tax_number_ein');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('companies', function (Blueprint $table) {
            $table->string('registration_number')->nullable();
            $table->string('legal_trading_name')->nullable();
            $table->string('gov_tax_number_ein')->nullable();
        });
    }
};
