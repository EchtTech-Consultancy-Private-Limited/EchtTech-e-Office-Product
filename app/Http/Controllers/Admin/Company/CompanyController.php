<?php

namespace App\Http\Controllers\Admin\Company;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Company\CompanyStore;
use App\Models\BusinessDetail;
use App\Models\Company;
use App\Models\CompanyDatabase;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Str;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.company.index');
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
}
