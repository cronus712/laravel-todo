<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PublicUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return IlluminateHttpResponse
     */
    public function index(Request $request)
    {   
        //   $user = Auth::user();
        //  $user = User::find($user->id);
        //  $tasks = Task::latest()->paginate(5);
        //  $projects = Project::findOrFail();
         $user = User::find(auth()->user()->id);
        
         $tasks = Task::where([
            ['name', '!=', null],
            [function ($query) use ($request) {
            if (($term = $request->term)) {
                $query->orWhere('name', 'LIKE', '%'. $term. '%')->get();
            }
            }]
        ])->orderBy("id", "desc")
          ->paginate(5);
        return view('publicUser.index',compact('tasks', 'user'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }   

    
     /**
     * Display the specified resource.
     *
     * @param  ApppublicUser  $publicUser
     * @return IlluminateHttpResponses
     */
    public function show($id)
    {   $task = Task::find($id);
        // $user = User::find($user->id);
        // $project = Project::find($project->id);


        return view('publicuser.show',compact('task'));
    }
}