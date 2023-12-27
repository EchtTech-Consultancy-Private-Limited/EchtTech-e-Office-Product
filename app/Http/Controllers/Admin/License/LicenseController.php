<?php

namespace App\Http\Controllers\Admin\License;

use App\Http\Controllers\Controller;
use App\Models\CompanyLicense;
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

    public function assignLicense(Request $request){
        $license = License::create(['key'=>$request->license_key,'created_by' => auth()->guard('admin')->id()]);
        $assigned = CompanyLicense::create([
            'company_id' => $request->company_id,
            'license_id' => $license->id,
            'license_key' => $license->key,
            'started_at' => $request->started_at,
            'expired_at' => $request->expired_at,
            'status' => 'Valid',
            'is_expired' => false,
        ]);

        return response()->json(['success'=>true,'data'=>$assigned]);
    }
}
