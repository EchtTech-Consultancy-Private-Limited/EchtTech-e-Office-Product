<?php

namespace App\Http\Controllers\Admin\Company;

use App\Helpers\CompanyHelper;
use App\Helpers\EmailHelper;
use App\Helpers\LicenseHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Company\CompanyStore;
use App\Http\Resources\Admin\Company\CompanyResource;
use App\Models\Company;
use App\Models\CompanyLicense;
use App\Models\CompanyModule;
use App\Models\Module;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $companies = Company::where('status','active')->latest()->paginate(10);
        return CompanyResource::collection($companies);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.company.create');
    }

    /**
     * Store a newly created resource in storage.
     */

    public function store(CompanyStore $request)
    {
        try {
            // Start a database transaction
            DB::beginTransaction();

            // user creation
            $userData = [
                'name' => $request->admin_name,
                'email' => $request->admin_email,
                'mobile' => $request->admin_mobile
            ];

            $username = CompanyHelper::generateUniqueUsername($request->admin_name,$request->admin_email);
            $userData['username'] = $username;
            $userData['role_id'] = Role::where('name','admin')->first()->id ?? 0;
            $user = User::create($userData);

            // Validating the request using the CompanyStore form request
            $validatedData = $request->validated();

            $validatedData['pincode'] = $validatedData['pin_code'];

            $validatedData['status'] = $request->status ?? 'disabled';
            $validatedData['created_by'] = Auth::id();

            $validatedData['company_type_id'] = $request->company_type_id;
            $modules = $request->modules;

            $license = LicenseHelper::generate();

            $validatedData['owner_id'] = $user->id;
            // Create a new company instance within the transaction
            $company = Company::create($validatedData);

            foreach ($modules as $module) {
                $moduleId = Module::where('module_name', $module)->first()->id ?? '';
                if ($moduleId) {
                    CompanyModule::create([
                        'company_id' => $company->id,
                        'module_id' => $moduleId
                    ]);
                } else {
                    // Rollback the transaction and return a response
                    DB::rollBack();
                    return response()->json(['error' => true, 'message' => 'Module not found. Please create a new module']);
                }
            }

            // Assign license
            CompanyLicense::create([
                'created_by' => Auth::id(),
                'company_id' => $company->id,
                'license_key' => $license['license_key'],
                'started_at' => $license['valid_from'],
                'expired_at' => $license['expire_date'],
                'is_expired' => 0,
                'status' => 'active',
            ]);

            // Commit the transaction
            DB::commit();

            // Save the company instance after the transaction is committed
            $company->save();

            return new CompanyResource($company);

        } catch (\Exception $e) {
            // Handle exceptions and rollback the transaction
            DB::rollBack();
            return response()->json(['error' => true, 'message' => $e->getMessage()]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }


    private function __sendWelcomeMail($user)
    {
        try {
            $userCompany = $user->companyDetails;
            $emailData = [
                'email' => $user->email,
                'company_name' => $userCompany->company->company_name ?? 'not found!',
            ];

            // Assuming EmailHelper::sendWelcomeEmail() returns a boolean indicating success
            $sent = EmailHelper::sendWelcomeEmail($emailData);

            if ($sent) {
                // Additional logic after successfully sending the email
                // For example, update the user's welcome email sent status in the database
                $user->update(['welcome_email_sent' => true]);
            } else {
                // Handle the case where the email wasn't sent successfully
                // Log an error or perform other error-handling actions
                Log::error('Failed to send welcome email to ' . $user->email);
            }
        } catch (\Exception $e) {
            // Log or handle the exception
            Log::error('Exception in __sendWelcomeMail: ' . $e->getMessage());
            // Optionally, you can throw the exception again if you want it to propagate
            // throw $e;
        }
    }
}
