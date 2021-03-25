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
   

    public function index(Request $request)
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

        

        
        // 1 - cas Structure
        
        if ($speciality_id && $town_id && $neighborhood_id){
            $results = DoctorProfile::where('speciality_id', $structure_category_id)->where('town_id', $town_id)->where('neighborhood_id', $neighborhood_id)->get();
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

        return view("doctor_situation.index", compact(['results', 'towns', 'specialities', 'neighborhoods','town_id', 'neighborhood_id', 'speciality_id']) );
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
