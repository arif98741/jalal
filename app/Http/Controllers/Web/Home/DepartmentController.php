<?php

namespace App\Http\Controllers\Web\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Department;

class DepartmentController extends Controller
{
    /*
    !!======================
    !! Department Index
    !!======================
    */
    public function index()
    {
    	$departments = Department::paginate(5);
    	return view('web.department.index')->with(compact('departments'));	
    }
}
