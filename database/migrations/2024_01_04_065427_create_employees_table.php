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
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->foreignId('created_by')->constrained('admins')->comment('CreatedId constrained by admin table');
            $table->foreignId('country_id');
            $table->foreignId('state_id');
            $table->foreignId('city_id');
            $table->string('employee_id',100)->unique();
            $table->string('name',100);
            $table->string('email', 100)->unique();
            $table->string('phone_number', 12)->unique();
            $table->enum('gender', ['male', 'female', 'both']);
            $table->date('date_of_birth')->nullable();
            $table->string('pincode',45)->nullable();
            $table->text('current_address')->nullable();
            $table->text('permanent_adderss')->nullable();
            $table->string('image')->nullable();
            $table->enum('status', ['0', '1'])->default('1')->comment('0- Not active, 1- active');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employees');
    }
};
