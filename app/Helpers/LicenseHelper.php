<?php

namespace App\Helpers;

use App\Models\License;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class LicenseHelper
{
    public static function generate()
    {
        $licenseKey = self::generateLicenseKey();
        $validFrom = now()->format('Y-m-d'); // Valid from today
        $expireDate = now()->addYear()->format('Y-m-d'); // Expire date next 1 year

        return [
            'license_key' => $licenseKey,
            'valid_from' => $validFrom,
            'expire_date' => $expireDate,
        ];
    }

    private static function generateLicenseKey(): string
    {
        // Generate a unique 16-character UUID
        $licenseKey = Str::uuid()->toString();

        // Check if the generated key already exists in the database to ensure uniqueness
        while (License::where('key', $licenseKey)->exists()) {
            $licenseKey = Str::uuid()->toString();
        }

        return $licenseKey;
    }
}
