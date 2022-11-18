<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class ProfileController extends Controller
{
       /**
     * Show the form for editing the specified resource.
     *
     * @param  Appuser  $user
     * @return IlluminateHttpResponse
     */
    public function edit(User $user)
    {
        $user = User::find($user);
        return view('profile', compact('user'));
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
            'name',
            'email' => 'email|unique:users,email',
            // 'password' => 'confirmed|min:6',  
            'role',
            'image',
        ]);

        if($request->hasFile('image')){
            $filename = $request->image->getClientOriginalName();
            $request->image->storeAs('images',$filename,'public');
            Auth()->user()->update(['image'=>$filename ]);
        }

        
        $user->update($request->all());
        // $user->update(request(['name', 'email', 'password', 'role']));
        return redirect()->route('home')
                        ->with('success','Account updated successfully');
    }

    public function upload(Request $request)
    {
        if($request->hasFile('image')){
            $filename = $request->image->getClientOriginalName();
            $request->image->storeAs('images',$filename,'public');
            Auth()->user()->update(['image'=>$filename ]);
        }
        return redirect()->back();
    }
   


}
