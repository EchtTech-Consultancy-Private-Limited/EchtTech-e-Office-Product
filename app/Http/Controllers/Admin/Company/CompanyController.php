<?php

namespace App\Http\Controllers\Admin\Company;

use App\Helpers\EmailHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Company\CompanyStore;
use App\Models\BusinessDetail;
use App\Models\Company;
use App\Models\CompanyDatabase;
use App\Models\ContactDetail;
use App\Models\Role;
use App\Models\User;
use App\Models\UserCompany;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $companies = Company::all();
        return view('admin.company.index',compact('companies'));
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

    public function generateUsername(Request $request)
    {
        $companyName = str_replace(' ', '', $request->companyName);

        $serialNumber = Company::count() + 1;

        $serialDigits = str_pad($serialNumber, 2, '0', STR_PAD_LEFT);

        $firstFourChars = substr($companyName, 0, 4);

        // Use random_int for secure random numbers
        $randomDigits = str_pad(random_int(0, 9999), 4, '0', STR_PAD_LEFT);

        $username = $serialDigits . $firstFourChars . $randomDigits;

        // Optimize the loop to avoid unnecessary function calls
        $userExists = User::where('username', $username)->exists();

        while ($userExists) {
            $randomDigits = str_pad(random_int(0, 9999), 4, '0', STR_PAD_LEFT);
            $username = $serialDigits . $firstFourChars . $randomDigits;

            $userExists = User::where('username', $username)->exists();
        }

        return response()->json(['success' => true, 'username' => $username]);
    }

    public function saveDatabase(Request $request){
        $dbName = $request->dbName;

        // Remove special characters and spaces, only allow underscore
        $cleanedDbName = preg_replace('/[^A-Za-z0-9_]/', '_', $dbName);

        $db = CompanyDatabase::create([
            'name' => $cleanedDbName,
        ]);

        return response()->json(['success' => true, 'database' => $db]);
    }

    public function saveBasicDetails(Request $request){
//        dd($request->all());
        $logo = $request->file('logo');
        $logoFileName = uniqid() . '_' . $logo->getClientOriginalName();
        $directory = 'public/company/logos/';
        Storage::putFileAs($directory, $logo, $logoFileName);
        $fullPath = URL::to("/storage/company/logos/{$logoFileName}");

        $company = Company::create([
            'country_id' => $request->country,
            'state_id' => $request->state,
            'city_id' => $request->city,
            'company_database_id' => $request->database,
            'company_name' => $request->company_name,
            'company_email' => $request->company_email,
            'app_name' => $request->app_name,
            'logo' => $logoFileName,
            'logo_path' => $fullPath,
            'gov_tax_number_ein' => $request->govt_tax_ein_number,
            'legal_trading_name'  => $request->legal_trading_name,
            'registration_number' => $request->registration_number,
            'description' => $request->description,
            'website' => $request->website,
            'phone' => $request->phone,
            'address_line_1' => $request->address_line_1,
            'address_line_2' => $request->address_line_2,
            'pincode' => $request->pincode,
        ]);

        return response()->json(['success' => true, 'data' => $company]);
    }

    public function saveBusinessDetails(Request $request){
        $businessDetail = BusinessDetail::create([
            'company_id' => $request->input('company'),
            'lin_number' => $request->input('lin_number'),
            'cin_number' => $request->input('cin_number'),
            'tan_number' => $request->input('tan_number'),
            'esic_number' => $request->input('esic_number'),
            'epf_number' => $request->input('epf_number'),
            'aadhar_udhyam' => $request->input('aadhar_udhyam'),
            'aadhar_udhyam_type' => $request->input('aadhar_udhyam_type'),
            'dpiit_certificate_number' => $request->input('dpiit_certificate_number'),
            'cmmi_level' => $request->input('cmmi_level'),
            'ministry_name' => $request->input('ministry_name'),
            'registered_address' => $request->input('registered_address'),
            'corporate_office_address' => $request->input('corporate_office_address'),
            'billing_address' => $request->input('billing_address'),
        ]);

        if ($businessDetail){
            return response()->json(['success' => true, 'businessDetail' => $businessDetail]);
        }
    }

    public function saveContactDetails(Request $request){
        $contactDetails = ContactDetail::create([
            'company_id' => $request->company_id,
            'phone' => $request->phone,
            'fax' => $request->fax,
            'website' => $request->website,
            'facebook' => $request->facebook,
            'twitter' => $request->twitter,
            'linkedin' => $request->linkedin,
        ]);
        if ($contactDetails){
            return response()->json(['success' => true,'data' => $contactDetails]);
        }
        return response()->json(['success'=>false,"message"=>'contact details not saved. something went wrong!']);
    }

    public function assignCompanyToUser(Request $request) {
        try {
            // Check if the email or username is already used
            $this->validate($request, [
                'email' => 'required|email|unique:users,email',
                'username' => 'required|unique:users,username',
            ]);

            $role = Role::where('name', 'admin')->first()->id;

            // Create a new user
            $user = User::create([
                'name' => $request->name,
                'username' => $request->username,
                'email' => $request->email,
                'password' => Hash::make(Str::random(10)), // Hash the password
                'mobile' => $request->mobile,
                'role_id' => $role
            ]);

            // Create a record in the UserCompany table
            $companyUser = UserCompany::create([
                'company_id' => $request->company_id,
                'user_id' => $user->id
            ]);

            $this->__sendWelcomeMail($user);

            return response()->json(['success' => true, 'message' => 'User assigned to company successfully.']);
        } catch (ValidationException $e) {
            // Validation error, return the error messages
            return response()->json(['success' => false, 'message' => $e->errors()], 422);
        } catch (\Exception $e) {
            // Log the error for debugging purposes
            \Log::error('Error assigning user to company: ' . $e->getMessage());

            return response()->json(['success' => false, 'message' => 'Internal server error.'], 500);
        }
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

    public function companiesList(Request $request)
    {
        $perPage = $request->input('perPage', 10);
        $page = $request->input('page', 1);
        $search = $request->input('search', ''); // Get the search parameter from the request

        $query = Company::query();

        // Add the search condition if a search term is provided
        if (!empty($search)) {
            $query->where('company_name', 'like', '%' . $search . '%');
        }



        $departments = $query->paginate($perPage, ['*'], 'page', $page);

        return response()->json($departments);
    }
}
