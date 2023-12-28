<?php

namespace App\Http\Controllers\Admin\Module;

use App\Http\Controllers\Controller;
use App\Models\CompanyModule;
use Illuminate\Http\Request;

class ModuleController extends Controller
{
    public function assignModuleToCompany(Request $request)
    {
        try {
            $modules = $request->input('modules', []);

            if (empty($modules)) {
                return response()->json(['success' => false, 'message' => 'No modules selected.'], 422);
            }

            $company_id = $request->input('company_id');

            foreach ($modules as $module) {
                CompanyModule::create([
                    'company_id' => $company_id,
                    'module_id' => $module
                ]);
            }

            return response()->json(['success' => true, 'message' => 'Modules assigned successfully.']);
        } catch (\Exception $e) {
            // Log the error for debugging purposes
            \Log::error('Error assigning modules: ' . $e->getMessage());

            return response()->json(['success' => false, 'message' => 'Internal server error.'], 500);
        }
    }
}
