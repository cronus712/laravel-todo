<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\User;
use Illuminate\Http\Request;

class UserListController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return IlluminateHttpResponse
     */
    public function index(Request $request)
    {   $users = User::where([
        ['name', '!=', null],
        [function ($query) use ($request) {
        if (($term = $request->term)) {
            $query->orWhere('name', 'LIKE', '%'. $term. '%')->get();
        }
        }]
    ])->orderBy("id", "desc")
      ->paginate(5);
        // $users = User::latest()->paginate(5);
        // $users = User::has('task')->get();

        return view('user.index',compact('users'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }
   
    /**
     * Show the form for creating a new resource.
     *
     * @return IlluminateHttpResponse
     */
    public function create()
    {
        return view('user.create');
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
            'email' => 'required|email|unique:users,email',
            'password' => 'required|confirmed|min:6',  
            'role' => 'required',
        ]);
             
            $user = User::create(request(['name', 'email', 'password', 'role']));
        //  auth()->login($user); login new user after register
           
        return redirect()->route('user.index')
                        ->with('success','User created successfully.');
    }
   
    /**
     * Display the specified resource.
     *
     * @param  Appuser  $user
     * @return IlluminateHttpResponse
     */
    public function show(User $user)
    {     $user = User::find($user->id);
        return view('user.show',compact('user'));
    }
   
    /**
     * Show the form for editing the specified resource.
     *
     * @param  Appuser  $user
     * @return IlluminateHttpResponse
     */
    public function edit(User $user)

    {   $user = User::find($user->id);
        return view('user.edit', compact('user'));
    }
  
    /**
     * Update the specified resource in storage.
     *
     * @param  IlluminateHttpRequest  $request
     * @param  Appuser  $user
     * @return IlluminateHttpResponse
     */
    public function update(Request $request, User $user)
    {        

        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            // 'password' => 'required|confirmed|min:6',  
            'role' => 'required',
        ]);

  
        $user->update($request->all());
        return redirect()->route('user.index')
                        ->with('success','User updated successfully');
    }
  
    /**
     * Remove the specified resource from storage.
     *
     * @param  Appuser  $user
     * @return IlluminateHttpResponse
     */
    public function destroy(User $user)
    {    
        $user->delete();
  
        return redirect()->route('user.index')
                        ->with('success','User deleted successfully');
    }


}
    // public function index() {
    //     $users = User::all();
    //     return view('userList', compact('users'));

    // }

   

