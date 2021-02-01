<?php

namespace App\Http\Controllers;

use App\Models\DoctorProfile;
use App\Models\DoctorOrder;
use App\Models\Speciality;
use App\Models\Town;
use App\Models\Neighborhood;
use App\Models\StructureProfile;
use App\Models\Service;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

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
        //$doctor_role = Role::whereName('Médecin')->first();
        $doctors =  DoctorProfile::all();

        activities_logger($this->getCurrentControllerName(), $this->getCurrentActionName(),'');
        return view("doctors.index", compact(['doctors']) );

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
        $towns =  Town::all();
        $services =  Service::all();
        $neighborhoods =  Neighborhood::all();
        $structures =  StructureProfile::all();
        $doctor = new DoctorProfile;
        
        return view('doctors.create', compact(['doctor', 'services', 'specialities', 'towns', 'neighborhoods', 'structures']));
        
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
            'civility' => 'required',
            'first_name' => 'required',
            'last_name' => 'required',
            'phone' => 'required',
            'town_id' => 'required',
            'neighborhood_id' => 'required',
            'email' => 'required',
            'speciality_id' => 'required',

        ]);

  
        // Create doctor and his account.
        $doctor = doctor_factory($request);

        // Add doctor to the doctor order.
        $doctor_order = [
            "reference" => "AN-". $doctor->id ."/". Carbon::parse(date('Y-m-d H:i:s'))->format("d/m/Y"),
            "doctor_id" => $doctor->id,
            "year" => date('Y-m-d H:i:s'),
            "status" => 'enable',
            "user_id" => current_user()->id
        ];

        DoctorOrder::create($doctor_order);


   
        return redirect()->route('doctors.index')
            ->with('success','Doctor created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function show(DoctorProfile $doctor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function edit(DoctorProfile $doctor)
    {
        //s
        $specialities =  Speciality::all();
        $towns =  Town::all();
        $neighborhoods =  Neighborhood::all();
        $structures =  StructureProfile::all();
        $services =  Service::all();
        return view('doctors.edit',compact(['doctor', 'specialities', 'towns', 'neighborhoods', 'structures', 'services']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DoctorProfile $doctor)
    {
        //
        $request->validate([
            'civility' => 'required',
            'first_name' => 'required',
            'last_name' => 'required',
            'phone' => 'required',
            'town_id' => 'required',
            'neighborhood_id' => 'required',
            'email' => 'required',
            'speciality_id' => 'required',

        ]);

  
        $doctor->update($request->all());

  

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
        $doctor = DoctorProfile::find($id);

        
        $doctor->user->delete();
        DoctorProfile::where('id',$id)->delete();
       


        return redirect()->back()->with('success','Delete Successfully');
    }
}



