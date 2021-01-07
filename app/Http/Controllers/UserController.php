<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Speciality;
use App\Models\Locality;
use App\Models\Role;
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
        //
        $users =  User::orderBy('id', 'desc')->paginate(10)->setPath('users');
        activities_logger($this->getCurrentControllerName(), $this->getCurrentActionName(),'');
        return view("users.index", compact(['users']) );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $specialities =  Speciality::all();
        $localities =  Locality::all();
        $roles =  Role::all();
        return view('users.create', compact(['specialities', 'localities', 'roles']));
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'name' => 'required',

        ]);

  

        User::create($request->all());

   
        return redirect()->route('users.index')
            ->with('success','User created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
        $specialities =  Speciality::all();
        $localities =  Locality::all();
        $roles =  Role::all();
        return view('users.edit',compact(['user', 'roles']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //
        $request->validate([
        'name' => 'required',   

        ]);

  
        $user->update($request->all());

  

        return redirect()->route('users.index')

                        ->with('success','User updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        User::where('id',$id)->delete();
        return redirect()->back()->with('success','Delete Successfully');
    }
}



