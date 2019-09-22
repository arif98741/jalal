<?php

namespace App\Http\Controllers\Web\Home;

use App\Model\Project;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProjectController extends Controller
{
   
    public function index()
    {
        $projects = Project::with(['project_category'])->paginate(5);
        //dd($projects);

        
        return view('web.project.index')->with(compact('projects'));
    }

    public function create()
    {
        //
    }

   
    public function store(Request $request)
    {
        //
    }

   
    public function show(Project $project)
    {
        //
    }

   
    public function edit(Project $project)
    {
        //
    }

    
    public function update(Request $request, Project $project)
    {
        //
    }

    
    public function destroy(Project $project)
    {
        //
    }
}
