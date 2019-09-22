<?php

namespace App\Http\Controllers\Web\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Model\Department;


class HomeController extends Controller
{
   
    public function index()
    {
       return view('web.home');
    }

   
    public function create()
    {
        //
    }

   
    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        //
    }

   
    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

   
    public function destroy($id)
    {
        //
    }
}
