<?php

namespace App\Http\Controllers;

use App\Models\Staff;
use App\Models\Service;
use App\Models\Structure;
use App\Models\Speciality;
use Illuminate\Http\Request;

class StaffController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $staffs =  Staff::orderBy('id', 'desc')->paginate(10)->setPath('staffs');
        activities_logger($this->getCurrentControllerName(), $this->getCurrentActionName(),'');
        return view("staffs.index", compact(['staffs']) );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $staff = new Staff;
        $specialities =  Speciality::all();
        $services =  Service::all();
        $structures =  Structure::all();
        return view('staffs.create', compact(['staff','specialities', 'services','structures']));
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
        $request['status'] = "enable";
        $request['user_id'] = current_user()->id;
        $request->validate([
            'civility' => 'required',
            'firt_name' => 'required',
            'last_name' => 'required',
            'structure_id' => 'required',
            'speciality_id' => 'required',
            'service_id' => 'required',

        ]);

  

        Staff::create($request->all());

   
        return redirect()->route('staffs.index')
            ->with('success','Town created successfully.');


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Staff  $staff
     * @return \Illuminate\Http\Response
     */
    public function show(Staff $staff)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Staff  $staff
     * @return \Illuminate\Http\Response
     */
    public function edit(Staff $staff)
    {
        //
         $specialities =  Speciality::all();
        $services =  Service::all();
        $structures =  Structure::all();
        return view('staffs.edit', compact(['staff','specialities', 'services','structures']));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Staff  $staff
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Staff $staff)
    {
        //

        $request['status'] = "enable";
        $request['user_id'] = current_user()->id;
        $request->validate([
            'civility' => 'required',
            'firt_name' => 'required',
            'last_name' => 'required',
            'structure_id' => 'required',
            'speciality_id' => 'required',
            'service_id' => 'required',

        ]);
        
        $staff->update($request->all());

  

        return redirect()->route('staffs.index')

                        ->with('success','Town updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Staff  $staff
     * @return \Illuminate\Http\Response
     */
    public function destroy(Staff $staff)
    {
        //
    }
}
