<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Speciality;
use App\Models\Locality;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DoctorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $doctor = DB::table('roles')->whereName('medecin')->get()[0];
        $users =  User::where('role_id', $doctor->id)->get();
        activities_logger($this->getCurrentControllerName(), $this->getCurrentActionName(),'');
        return view("doctors.index", compact(['users']) );

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
        return view('doctors.create', compact(['specialities', 'localities', 'roles']));
        
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
            'email' => 'required',

        ]);

  

        User::create($request->all());

   
        return redirect()->route('doctors.index')
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
        //s
        $specialities =  Speciality::all();
        $localities =  Locality::all();
        $roles =  Role::all();
        return view('doctors.edit',compact(['user', 'roles']));
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
        'email' => 'required',   

        ]);

  
        $user->update($request->all());

  

        return redirect()->route('doctors.index')

                        ->with('success','Doctor updated successfully');
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



