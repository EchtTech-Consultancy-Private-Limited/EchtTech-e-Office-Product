<?php

namespace App\Http\Controllers\Admin\Designation;

use App\Http\Controllers\Controller;
use App\Models\Designation;
use Illuminate\Http\Request;

class DesignationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.designation.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.designation.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validation rules
        $validated = $request->validate([
            'name' => 'required',
            'title' => 'required',
            'description' => 'nullable|string',
            'is_active' => 'boolean'
        ]);

        $validated['is_active'] = $request->is_active ?? 0;
        // Create a new Designation instance with the validated data
        $designation = Designation::create($validated);

        // Optional: Flash a success message to the session
        session()->flash('success', 'Designation created successfully!');

        // Redirect to the index page for designations in the admin panel
        return redirect()->route('admin.designations.index');
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

    public function designationList(Request $request)
    {
        $perPage = $request->input('perPage', 10);
        $page = $request->input('page', 1);
        $search = $request->input('search', ''); // Get the search parameter from the request

        $query = Designation::query();

        // Add the search condition if a search term is provided
        if (!empty($search)) {
            $query->where('name', 'like', '%' . $search . '%');
        }

        $designations = $query->paginate($perPage, ['*'], 'page', $page);

        return response()->json($designations);
    }
}
