<?php

namespace App\Http\Controllers;

use App\Models\Page;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StaticPageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function about()
    {
        //
        $page =  Page::where('slug', 'a-propos')->first();
        
        return view("static_pages.about", compact(['page']) );

    }

    public function administrative_procedures()
    {
        $page =  Page::where('slug', 'demarches-administratives')->first();
        
        return view("static_pages.administrative_procedures", compact(['page']) );
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function cgu()
    {
        //
        $page =  Page::where('slug', 'cgu')->first();
        
        return view("static_pages.cgu", compact(['page']) );

    }

    public function faq()
    {
        //
        $page =  Page::where('slug', 'faq')->first();
        
        return view("static_pages.faq", compact(['page']) );

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function privacy_policy()
    {
        //
        $page =  Page::where('slug', 'privacy-policy')->first();
        
        return view("static_pages.privacy_policy", compact(['page']) );

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



