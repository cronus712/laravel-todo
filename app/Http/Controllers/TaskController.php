<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return IlluminateHttpResponse
     */
    public function index(Request $request)
    {    $users = User::all();
        //  $tasks = Task::latest()->paginate(5);
         $projects = Project::all();
         $tasks = Task::where([
            ['name', '!=', null],
            [function ($query) use ($request) {
            if (($term = $request->term)) {
                $query->orWhere('name', 'LIKE', '%'. $term. '%')->get();
            }
            }]
        ])->orderBy("id", "desc")
          ->paginate(5);

  
        return view('tasks.index',compact('tasks', 'users'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }
   
    /**
     * Show the form for creating a new resource.
     *
     * @return IlluminateHttpResponse
     */
    public function create()
    {  $users = User::all();
        $projects= Project::all();

        return view('tasks.create', ['users' =>$users], ['projects' => $projects]);
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
            'name' => 'required|unique:tasks,name',
            'detail' => 'required',
            'user_id' => 'required',
            'project_id' => 'required',
            ]);
        
          

        Task::create($request->all());
   
        return redirect()->route('tasks.index')
                        ->with('success','Task created successfully.');
    }
   
    /**
     * Display the specified resource.
     *
     * @param  AppTask  $task
     * @return IlluminateHttpResponse
     */
    public function show($id, User $user, Project $project)
    {   $task = Task::find($id);
        $user = User::find($user->id);
        $project = Project::find($project->id);

        return view('tasks.show',compact('task', 'user', 'project'));
    }
   
    /**
     * Show the form for editing the specified resource.
     *
     * @param  AppTask  $task
     * @return IlluminateHttpResponse
     */
    public function edit($id)
    {    
        $task = Task::findOrFail($id);
        $user = User::all();
        $project = Project::all();

        return view('tasks.edit',compact('task', 'user', 'project'));
    }
  
    /**
     * Update the specified resource in storage.
     *
     * @param  IlluminateHttpRequest  $request
     * @param  AppTask  $task
     * @return IlluminateHttpResponse
     */
    public function update(Request $request, Task $task)
    {
        $request->validate([
            'name' => 'required|unique:tasks,name',
            'detail' => 'required',
            'user_id' => 'required',
            'project_id' => 'required',
        ]);
  
        // Task::whereId($id)->update($request);
        $task->update($request->all());

  
        return redirect()->route('tasks.index')
                        ->with('success','Task updated successfully');
    }
  
    /**
     * Remove the specified resource from storage.
     *
     * @param  AppTask  $task
     * @return IlluminateHttpResponse
     */
    public function destroy(Task $task)
    {    
        $task->delete();
  
        return redirect()->route('tasks.index')
                        ->with('success','Task deleted successfully');
    }
}