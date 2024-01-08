<?php

namespace App\Http\Controllers\Admin\Employee;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class EmploymentTypeController extends Controller
{
    public function index(){
        return view('admin.employee.employment-type.index');
    }
}
