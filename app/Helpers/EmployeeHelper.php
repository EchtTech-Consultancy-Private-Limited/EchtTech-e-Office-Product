<?php

namespace App\Helpers;

use App\Models\Employee;

class EmployeeHelper
{
    public static function generateUniqueEmployeeID($companyName): string
    {
        // Extract the first 4 characters of the capitalized company name
        $companyInitials = strtoupper(substr($companyName, 0, 4));

        // Generate the date portion (e.g., "08012024")
        $datePortion = now()->format('dmY');

        // Generate a 4-digit random number
        $randomDigits = mt_rand(1000, 9999);

        // Concatenate the parts to form the employee ID
        $employeeID = "{$companyInitials}{$datePortion}{$randomDigits}";

        // Check if the generated ID already exists in the employees table
        while (Employee::where('employee_id', $employeeID)->exists()) {
            // Regenerate a new random number if it already exists
            $randomDigits = mt_rand(1000, 9999);
            $employeeID = "{$companyInitials}{$datePortion}{$randomDigits}";
        }

        return $employeeID;
    }
}
