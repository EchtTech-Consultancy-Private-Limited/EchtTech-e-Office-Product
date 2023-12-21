<?php

namespace App\Http\Controllers\Admin\License;

use App\Http\Controllers\Controller;
use App\Models\License;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class LicenseController extends Controller
{
    public function generate(Request $request){
        $licenseKey = $this->generateLicenseKey();
        $validFrom = now()->format('Y-m-d'); // Valid from today
        $expireDate = now()->addYear()->format('Y-m-d'); // Expire date next 1 year

        return response()->json([
            'license_key' => $licenseKey,
            'valid_from' => $validFrom,
            'expire_date' => $expireDate,
        ], 200);
    }

    private function generateLicenseKey() {
        // Generate a unique 16-character UUID
        $licenseKey = Str::uuid()->toString();

        // Check if the generated key already exists in the database to ensure uniqueness
        while (License::where('key', $licenseKey)->exists()) {
            $licenseKey = Str::uuid()->toString();
        }

        return $licenseKey;
    }
}
