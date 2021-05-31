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
use Illuminate\Auth\Events\Registered;
use Illuminate\Database\QueryException;


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

        $year = Carbon::parse(date('Y-m-d H:i:s'))->format("Y");

        $last_doctor_order = DoctorOrder::where('year', $year)->latest()->first();
        //dd($last_doctor_order);



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
        $request["status"] = "enable";
        $request->validate([
            'sex' => 'required',
            'first_name' => 'required',
            'last_name' => 'required',
            'phone' => 'required|unique:doctor_profiles',
            'town_id' => 'required',
            'email' => 'required|unique:doctor_profiles',
            'is_specialist' => 'required',
           

        ]);

        
        // Create doctor and his account.
        $doctor = doctor_factory($request);


        /*
        $year = Carbon::parse(date('Y-m-d H:i:s'))->format("Y");
        $reference = last_doctor_reference($year);
        


        $doctor_order = [
            "reference" => $reference,
            "doctor_id" => $doctor->id,
            "year" => $year,
            "status" => 'enable',
            "user_id" => current_user()->id
        ];

        DoctorOrder::create($doctor_order);
        */

        if ($request->hasFile('files')){

             // Attach record
       $allowedfileExtension = ['pdf','jpg','png','docx'];

            eloquent_storage_service($doctor, $request, $allowedfileExtension, 'files', 'files');
        }
   
        return redirect()->route('doctors.index')
            ->with('success','Médecin créé avec succès.');
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
            'sex' => 'required',
            'first_name' => 'required',
            'last_name' => 'required',
            'phone' => 'required',
            'town_id' => 'required',
            'email' => 'required',
            'is_specialist' => 'required',
            

        ]);

        $old_email = $doctor->email;
        $new_email = $request->email;
        $email_arr = [$old_email, $new_email];

        try{

            
                
                // Update email user table.
                $user = $doctor->user;
                
                //dd($user->update(["email" => $new_email]));
                if ($user->update(["email" => $new_email])){
                    $doctor->update($request->all());

                    if (empty($user->email_verified_at)){
                        event(new Registered($user));
                    }

                    
                    
                    
                }
            
            
            


        
        
        

        if ($request->hasFile('files')){

             // Attach record
       $allowedfileExtension = ['pdf','jpg','png','docx'];

            eloquent_storage_service($doctor, $request, $allowedfileExtension, 'files', 'files');
        }


  

        return redirect()->route('doctors.index')

                        ->with('success','Médecin mis à jour avec succès');


        }catch(QueryException $e){
            $error_code = $e->errorInfo[0];
                 
            if($error_code == 23505){
                
                return back()->withError("Un médecin avec la meme adresse email".' existe déjà.')->withInput();
            }else{
                return back()->withError($e->getMessage())->withInput();
            }
            
        }

    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function change_status($id)
    {
        //
       
        $doctor = DoctorProfile::find($id);
        if (isDoctorEnable($doctor)){
            $doctor->status = "disable";
        }
        else{
            $doctor->status = "enable";
        }
        
        //dd($doctor);
        $doctor->update();

  

        return redirect()->route('doctors.index')

                        ->with('success','Statut changé avec succès');
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

        if ($doctor->user){
            $doctor->user->delete();
        }
        DoctorProfile::where('id',$id)->delete();
       


        return redirect()->back()->with('success','Supprimer avec succès');
    }
}



