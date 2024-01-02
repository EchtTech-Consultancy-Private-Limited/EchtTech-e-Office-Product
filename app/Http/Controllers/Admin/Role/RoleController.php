<?php

namespace App\Http\Controllers\Admin\Role;

use App\Http\Controllers\Controller;
use App\Models\Role;
use Illuminate\Http\Request;
use Silber\Bouncer\Database\Queries\Roles;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $roles = Role::all();
        return view('admin.roles.index',compact('roles'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'title' => 'required',
            'is_active' => 'boolean',
        ]);

        $role = Role::create($validatedData);

        if ($role){
            return response()->json(['status' => 201,'message' => 'Role created successfully']);
        }else{
            return response()->json(['status' => 404,'message' => 'something went wrong']);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

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

    public function getRoles(){
        $roles = Role::latest()->get();
        return response()->json($roles);
    }
}
