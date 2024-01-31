<?php

namespace App\Http\Controllers\Admin\Settings;

use App\Http\Controllers\Controller;
use App\Http\Resources\Admin\Settings\LicensePricingResource;
use App\Models\LicensePriceSetting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LicensePricingSettingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $licensePriceSetting = LicensePriceSetting::first();

        if ($licensePriceSetting) {
            return new LicensePricingResource($licensePriceSetting);
        } else {
            // Handle the case where no record is found, you can return an empty response or any desired result.
            return response()->json(['message' => 'No record found'], 404);
        }
    }


    public function store(Request $request)
    {
        try {
            // Start a database transaction
            DB::beginTransaction();

            $request->validate([
                'per_user_price' => 'required|numeric',
                'per_quarter_price' => 'required|numeric'
            ]);

            // Create or update LicensePriceSetting model with the validated data
            $licensePricing = LicensePriceSetting::updateOrCreate([],[
                'per_user_price' => $request->input('per_user_price'),
                'per_quarter_price' => $request->input('per_quarter_price'),
                // Add other fields as needed
            ]);

            // Commit the transaction
            DB::commit();

            return response()->json(['message' => 'License price settings saved successfully','data' => new LicensePricingResource($licensePricing)], 200);
        } catch (\Exception $e) {
            // Something went wrong, rollback the transaction
            DB::rollBack();

            return response()->json(['error' => 'Failed to save license price settings'], 500);
        }
    }

}
