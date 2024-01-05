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
        Schema::create('employee_account_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('employee_id')->constrained('employees');
            $table->enum('account_type', ['pf', 'bank', 'both']);
            $table->bigInteger('account_number');
            $table->string('bank_name', 100);
            $table->string('ifsc_code')->nullable();
            $table->text('branch_address')->nullable();
            $table->string('passbook_file')->nullable();
            $table->string('doc_file')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employee_account_details');
    }
};
