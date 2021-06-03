<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Speciality;
use App\Models\Town;
use App\Models\DoctorProfile;
use App\Models\Role;
use App\Models\AdminProfile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\QueryException;


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
        $excluded_role = Role::where('name', 'superuser')->first();
        $users =  User::whereNotIn('role_id', [$excluded_role->id])->get();

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
        $excluded_roles = ['demo', 'superuser', 'Médecin', 'Structure'];
        $user = new User;
        $roles =  Role::whereNotIn('name', $excluded_roles )->get();

        return view('users.create', compact(['user','roles']));
        
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
            'login' => 'required|string|unique:users',
            'email' => 'required|email|unique:users',
            'role_id'=> 'required',
            'password' => 'required|string',
            'password_confirmation' => 'required|string',

        ]);

        //dd($request['password']);
        //"password" => Hash::make("AMOSXZIBITDE88"),
        $request['password'] =  Hash::make($request['password']);
        $request['email_verified_at'] =  date('Y-m-d H:i:s');

  
        

        $admin_user = User::create($request->all());

        $admin_user_profile = AdminProfile::create([
                "first_name" => "", 
                "last_name" => "",
                    
        ]);

        $admin_user_profile->user()->save($admin_user);

        return redirect()->route('users.index')
                ->with('success',"Compte d'utilisateur créer avec succès.");

        
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
     * Display the specified resource.
     *
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function change_password($id)
    {
        //

        $user = User::find($id);
        $roles =  Role::where('id', $user->role_id )->get();

        return view('users.change_password', compact(['user','roles']));
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
       $excluded_roles = ['demo', 'superuser', 'Médecin', 'Structure'];
        $roles =  Role::whereNotIn('name', $excluded_roles )->get();
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
            'login' => 'required|string',
            'email' => 'required|email',
            'role_id'=> 'required',
            

        ]);

        if ($request['password']){
            $request['password'] =  Hash::make($request['password']);
        }
        $user->update($request->all());

  

        return redirect()->route('users.index')

                        ->with('success',"Compte d'utilisateur mise à jour.");
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
        //dd(User::find($id));
        $user = User::find($id);
        
       
        if (class_basename($user->userable_type) == "DoctorProfile"){
            DoctorProfile::where('id',$user->userable_id)->delete();

        }else{
            User::where('id',$id)->delete();
        }
        

        return redirect()->back()->with('success','Supprimer avec succès!');
    }
}



