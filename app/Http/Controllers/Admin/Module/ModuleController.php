<?php

namespace App\Http\Controllers\Admin\Module;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Module\StoreModule;
use App\Http\Resources\Admin\Modules\ModuleResource;
use App\Models\CompanyModule;
use App\Models\Module;
use Illuminate\Http\Request;

class ModuleController extends Controller
{
    public function index(Request $request){
        $modules = Module::latest()->paginate(10);
        if ($request->expectsJson()) {
            return ModuleResource::collection($modules);
        }

        return view('admin.modules.index',compact('modules'));
    }

    public function store(StoreModule $request){

        $module = Module::create($request->validated());

        return new ModuleResource($module);
    }
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
