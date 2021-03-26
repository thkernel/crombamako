<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Town;
use App\Models\Neighborhood;
use App\Models\StructureProfile;
use App\Models\DoctorProfile;
use App\Models\StructureCategory;
use App\Models\Speciality;

class DoctorSituationController extends Controller
{
   

    public function situation_locality(Request $request)
    {
        //

        $results = null;
        $towns =  Town::all();
        $neighborhoods = Neighborhood::all();
        $structure_categories =  StructureCategory::all();
        $specialities =  Speciality::all();

       
        // Get search term

        $speciality_id = $request['speciality_id'];
        $town_id = $request['town_id'];
        $neighborhood_id = $request['neighborhood_id'];
        $approval = $request['approval'];
        $business_license = $request['business_license'];

        

        
        // 1 - cas Structure
        
        if ($speciality_id && $town_id && $neighborhood_id){
            $results = DoctorProfile::where('speciality_id', $speciality_id)->where('town_id', $town_id)->where('neighborhood_id', $neighborhood_id)->get();
        }
        
        else if ($speciality_id && $town_id){
            $results = DoctorProfile::where('speciality_id', $speciality_id)->where('town_id', $town_id)->get();

        }else if ($speciality_id && $neighborhood_id){
            $results = DoctorProfile::where('speciality_id', $speciality_id)->where('neighborhood_id', $neighborhood_id)->get();
        }else if ($town_id && $neighborhood_id){
            $results = DoctorProfile::where('town_id', $town_id)->where('neighborhood_id', $neighborhood_id)->get();
        }else if ($speciality_id){
            $results = DoctorProfile::where('speciality_id', $speciality_id)->get();
            
        }
        else if ($town_id){
            $results = DoctorProfile::where('town_id', $town_id)->get();
            
        }

        

        
    

        //dd($request);

        return view("doctor_situation.situation_locality", compact(['results', 'towns', 'specialities', 'neighborhoods','town_id', 'neighborhood_id', 'speciality_id']) );
    }

    public function situation_approval(Request $request){
         //

        $results = null;
       
        $specialities =  Speciality::all();

       
        // Get search term

       
        $speciality_id = $request['speciality_id'];
        $approval = $request['approval'];
        $business_license = $request['business_license'];

        

        
        // 1 - cas Structure
        
        if ($speciality_id  && $approval == "Sans agréement"){
            $results = DoctorProfile::where('speciality_id', $speciality_id)->get();

            $doctors = $results;

            $doctors_with_approval_ids = [];
            

          

            foreach ($doctors as $doctor) {
               $doctor_approval = $doctor->approval;

               if (count($doctor_approval) <= 0){
                array_push($doctors_with_approval_ids, $doctor->id);
               }
            }

            
            $results = DoctorProfile::whereIn('id', $doctors_with_approval_ids)->get();

        }
        
        else if ($speciality_id && $approval == "Avec agréement"){
            $results = DoctorProfile::where('speciality_id', $speciality_id)->get();

            $doctors = $results;

            $doctors_with_approval_ids = [];
            

          

            foreach ($doctors as $doctor) {
               $doctor_approval = $doctor->approval;

               if (count($doctor_approval) > 0){
                array_push($doctors_with_approval_ids, $doctor->id);
               }
            }

            
            $results = DoctorProfile::whereIn('id', $doctors_with_approval_ids)->get();

        }
        else if ($approval == "Avec agréement"){
            $doctors = DoctorProfile::all();

            $doctors_with_approval_ids = [];
            

          

            foreach ($doctors as $doctor) {
               $doctor_approval = $doctor->approval;

               if (count($doctor_approval) > 0){
               
                array_push($doctors_with_approval_ids, $doctor->id);
               }
            }

           
            $results = DoctorProfile::whereIn('id', $doctors_with_approval_ids)->get();

            
            

            
        }
        else if ($approval == "Sans agréement"){
            $doctors = DoctorProfile::all();

            $doctors_with_approval_ids = [];
            

          

            foreach ($doctors as $doctor) {
               $doctor_approval = $doctor->approval;

               if (count($doctor_approval) <= 0){
                array_push($doctors_with_approval_ids, $doctor->id);
               }
            }

            
            $results = DoctorProfile::whereIn('id', $doctors_with_approval_ids)->get();
        }

        

        return view("doctor_situation.situation_approval", compact(['results', 'specialities', 'approval', 'speciality_id']) );
    }

    public function situation_business_license(Request $request){

         //

        $results = null;
       
        $specialities =  Speciality::all();

       
        // Get search term

       
        $speciality_id = $request['speciality_id'];
        //$approval = $request['approval'];
        $business_license = $request['business_license'];

        

        
        // 1 - cas Structure
        
        if ($speciality_id  && $business_license == "Sans licence"){
            $results = DoctorProfile::where('speciality_id', $speciality_id)->get();

            $doctors = $results;

            $doctors_with_business_license_ids = [];
            

          

            foreach ($doctors as $doctor) {
               $doctor_business_license = $doctor->business_license;

               if (count($doctor_business_license) <= 0){
                array_push($doctors_with_business_license_ids, $doctor->id);
               }
            }

            
            $results = DoctorProfile::whereIn('id', $doctors_with_business_license_ids)->get();

        }
        
        else if ($speciality_id && $business_license == "Avec licence"){
            $results = DoctorProfile::where('speciality_id', $speciality_id)->get();

            $doctors = $results;

            $doctors_with_business_license_ids = [];
            

          

            foreach ($doctors as $doctor) {
               $doctor_business_license = $doctor->business_license;

               if (count($doctor_business_license) > 0){
                array_push($doctors_with_business_license_ids, $doctor->id);
               }
            }

            
            $results = DoctorProfile::whereIn('id', $doctors_with_approval_ids)->get();

        }
        else if ($business_license == "Avec licence"){
            $doctors = DoctorProfile::all();

            $doctors_with_business_license_ids = [];
            

          

            foreach ($doctors as $doctor) {
               $doctor_business_license = $doctor->business_license;

               if (count($doctor_approval) > 0){
               
                array_push($doctors_with_business_license_ids, $doctor->id);
               }
            }

           
            $results = DoctorProfile::whereIn('id', $doctors_with_business_license_ids)->get();

            
            

            
        }
        else if ($business_license == "Sans licence"){
            $doctors = DoctorProfile::all();

            $doctors_with_business_license_ids = [];
            

          

            foreach ($doctors as $doctor) {
               $doctor_business_license = $doctor->business_license;

               if (count($doctor_business_license) <= 0){
                array_push($doctors_with_business_license_ids, $doctor->id);
               }
            }

            
            $results = DoctorProfile::whereIn('id', $doctors_with_business_license_ids)->get();
        }

        

        return view("doctor_situation.situation_business_license", compact(['results', 'specialities', 'business_license', 'speciality_id']) );

    }

    public function situation_contribution(Request $request){
        //

        $results = null;
       
        $specialities =  Speciality::all();

       
        // Get search term

       
        $speciality_id = $request['speciality_id'];
        //$approval = $request['approval'];
        $contribution_status = $request['contribution_status'];
        $selected_year = $request['year'];

        

        
        // 1 - cas Structure
        
        if ($speciality_id  && $contribution_status == "A jour" && $selected_year){
            
            $results = DoctorProfile::where('speciality_id', $speciality_id)->get();

            $doctors = $results;

            $doctors_with_contribution_ids = [];
            

            //dd($doctors);

            foreach ($doctors as $doctor) {
                $doctor_contributions = $doctor->contributions;

                $flag = false;
                foreach ($doctor_contributions as $doctor_contribution) {
                    $doctor_contribution_items = $doctor_contribution->contribution_items->where('year', $selected_year);
                    
                    if ($doctor_contribution_items->count() > 0 && $doctor_contribution->status == "Payée"){
                        $flag = true;
                        array_push($doctors_with_contribution_ids, $doctor_contribution->doctor_id);
                        break 1;
                    }



                    
                }
              
            }

            
            $results = DoctorProfile::whereIn('id', $doctors_with_contribution_ids)->get();

        }
        else if ($speciality_id  && $contribution_status == "Non à jour" && $selected_year){
            
            $results = DoctorProfile::where('speciality_id', $speciality_id)->get();

            $doctors = $results;

            $doctors_with_contribution_ids = [];
            

            //dd($doctors);

            foreach ($doctors as $doctor) {
                $doctor_contributions = $doctor->contributions;

                $flag = false;
                foreach ($doctor_contributions as $doctor_contribution) {
                    $doctor_contribution_items = $doctor_contribution->contribution_items->where('year', $selected_year);
                    
                    if ($doctor_contribution_items->count() <= 0 ){
                        $flag = true;
                        array_push($doctors_with_contribution_ids, $doctor_contribution->doctor_id);
                        break 1;
                    }



                    
                }
              
            }

            
            $results = DoctorProfile::whereIn('id', $doctors_with_contribution_ids)->get();

        }
        
        else if ($contribution_status == "A jour" &&  $selected_year){
            
            $results = DoctorProfile::all();


            $doctors = $results;

            $doctors_with_contribution_ids = [];
            

            //dd($doctors);

            foreach ($doctors as $doctor) {
                $doctor_contributions = $doctor->contributions;

                $flag = false;
                foreach ($doctor_contributions as $doctor_contribution) {
                    $doctor_contribution_items = $doctor_contribution->contribution_items->where('year', $selected_year);
                    
                    if ($doctor_contribution_items->count() > 0 && $doctor_contribution->status == "Payée"){

                        $flag = true;
                        array_push($doctors_with_contribution_ids, $doctor_contribution->doctor_id);
                        break 1;
                    }



                    
                }
              
            }

            
            $results = DoctorProfile::whereIn('id', $doctors_with_contribution_ids)->get();
            
            

            
        }
        else if ($contribution_status == "Non à jour" && $selected_year){
            $results = DoctorProfile::all();


            $doctors = $results;

            $doctors_with_contribution_ids = [];
            

            //dd($doctors);

            foreach ($doctors as $doctor) {
                $doctor_contributions = $doctor->contributions;

                $flag = false;
                foreach ($doctor_contributions as $doctor_contribution) {
                    $doctor_contribution_items = $doctor_contribution->contribution_items->where('year', $selected_year);
                    
                    if ($doctor_contribution_items->count() <= 0){

                        $flag = true;
                        array_push($doctors_with_contribution_ids, $doctor_contribution->doctor_id);
                        break 1;
                    }



                    
                }
              
            }

            
            $results = DoctorProfile::whereIn('id', $doctors_with_contribution_ids)->get();
        }

        

        return view("doctor_situation.situation_contribution", compact(['results', 'specialities', 'contribution_status','selected_year', 'speciality_id']) );

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        
        
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
        $request['user_id'] = current_user()->id;
     

        $request->validate([
            'title' => 'required',
            'opportunity_type_id' => 'required',

        ]);

        

        Opportunity::create($request->all());

   
        return redirect()->route('opportunities.index')
            ->with('success','Opportunity created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\OpportunityType  $opportunityType
     * @return \Illuminate\Http\Response
     */
    public function show(Opportunity $opportunity)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\OpprotunityType  $opprotunityType
     * @return \Illuminate\Http\Response
     */
    public function edit(Opportunity $opportunity)
    {
        //
        $opportunity_types =  OpportunityType::all();
        return view('opportunities.edit', compact(['opportunity_types', 'opportunity']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Opportunity  $opportunity
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Opportunity $opportunity)
    {
        //
         $request->validate([
            'opportunity_type_id' => 'required',   
            'title' => 'required',   

        ]);

  
        $opportunity->update($request->all());

  

        return redirect()->route('opportunities.index')

                        ->with('success','Opportunity updated successfully');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Opportunity  $opportunity
     * @return \Illuminate\Http\Response
     */
    public function destroy(Opportunity $opportunity)
    {
        //
        Opportunity::where('id',$id)->delete();
        return redirect()->back()->with('success','Delete Successfully');
    }
}
