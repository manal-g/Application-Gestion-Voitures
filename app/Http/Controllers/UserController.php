<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(auth()->user()->email!= 'admin@example.com')
        {
            abort(403);//403 Forbidden machi admin
        }
        return view('users.index', [
            'users' => User::all(),
        ]);
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(auth()->user()->email!= 'admin@example.com')
        {
            abort(403);//403 Forbidden machi admin
        }
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(auth()->user()->email!= 'admin@example.com')
        {
            abort(403);//403 Forbidden machi admin
        }
        $attributes = $request->validate([
            'firstname' => ['required'],
            'lastname' => ['required'],
            'email' => ['required', 'unique:users,email'],
            'city' => ['required'],
            'zip_code' => ['required'],
            'password' => [],
        ]);

        User::factory()->create($attributes);
        
        return redirect('users')->with([
            'message' => 'Owner created successufully',
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if(auth()->user()->email!= 'admin@example.com')
        {
            abort(403);//403 Forbidden machi admin
        }
        $user = User::find($id);
        return view('users.edit', [
            'user' => $user,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if(auth()->user()->email!= 'admin@example.com')
        {
            abort(403);//403 Forbidden machi admin
        }
        $attributes = $request->validate([
            'firstname' => [],
            'lastname' => [],
            'email' => ["unique:users,email,$id"],
            'city' => [],
            'zip_code' => [],
            'password' => [],
        ]);

        User::find($id)->update($attributes);

        
        return redirect('/users')->with([
            'message' => 'Updated successfully'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(auth()->user()->email!= 'admin@example.com')
        {
            abort(403);//403 Forbidden machi admin
        }
        User::find($id)->delete();
        return redirect('/users')->with([
            'message' => 'Deleted successfully'
        ]);
    }
}
