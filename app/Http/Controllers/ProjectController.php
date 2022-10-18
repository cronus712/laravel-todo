<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return IlluminateHttpResponse
     */
    public function index() {

     $projects = Project::latest()->paginate(5);
  
        return view('projects.index',compact('projects'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }
   
    /**
     * Show the form for creating a new resource.
     *
     * @return IlluminateHttpResponse
     */
    public function create()
    {  
        $projects= Project::all();

        return view('projects.create');
    }
  
    /**
     * Store a newly created resource in storage.
     *
     * @param  IlluminateHttpRequest  $request
     * @return IlluminateHttpResponse
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'detail' => 'required',
            ]);
        
          

        Project::create($request->all());
   
        return redirect()->route('project.index')
                        ->with('success','Project created successfully.');
    }
   
    /**
     * Display the specified resource.
     *
     * @param  Appproject  $project
     * @return IlluminateHttpResponse
     */
    public function show(Project $project)
    {   $project = Project::find($project->id);

        return view('projects.show',compact('project'));
    }
   
    /**
     * Show the form for editing the specified resource.
     *
     * @param  Appproject  $project
     * @return IlluminateHttpResponse
     */
    public function edit(Project $project)
        
        {  
               $project = Project::find($project->id);

               return view('projects.edit',compact('project'));
    }
  
    /**
     * Update the specified resource in storage.
     *
     * @param  IlluminateHttpRequest  $request
     * @param  Appproject  $project
     * @return IlluminateHttpResponse
     */
    public function update(Request $request, Project $project)
    {
        $request->validate([
            'name' => 'required',
            'detail' => 'required',
            
        ]);
  
        $project->update($request->all());
  
        return redirect()->route('project.index')
                        ->with('success','Project updated successfully');
    }
  
    /**
     * Remove the specified resource from storage.
     *
     * @param  Appproject  $project
     * @return IlluminateHttpResponse
     */
    public function destroy(Project $project)
    {
        $project->delete();
  
        return redirect()->route('project.index')
                        ->with('success','Project deleted successfully');
    }
}