<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return IlluminateHttpResponse
     */
    public function index()
    {
        $tasks = Task::latest()->paginate(5);
  
        return view('tasks.index',compact('tasks'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }
   
    /**
     * Show the form for creating a new resource.
     *
     * @return IlluminateHttpResponse
     */
    public function create()
    {
        return view('tasks.create');
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
    public function show(Task $task)
    {
        return view('tasks.show',compact('task'));
    }
   
    /**
     * Show the form for editing the specified resource.
     *
     * @param  AppTask  $task
     * @return IlluminateHttpResponse
     */
    public function edit(Task $task)
    {
        return view('tasks.edit',compact('task'));
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
            'name' => 'required',
            'detail' => 'required',
        ]);
  
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