<?php

namespace App\Http\Controllers;

use App\Models\VisitSummary;
use App\Models\VisitSummaryTeam;
use Illuminate\Http\Request;
use App\Models\StructureProfile;
use App\Models\DoctorProfile;

class VisitSummaryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        $visit_summaries =  VisitSummary::orderBy('id', 'desc')->paginate(10)->setPath('visit_summaries');
        activities_logger($this->getCurrentControllerName(), $this->getCurrentActionName(),'');
        return view("visit_summaries.index", compact(['visit_summaries']) );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $visit_summary = new VisitSummary;
        $structures =  StructureProfile::all();
        $doctors =  DoctorProfile::all();
        
        return view('visit_summaries.create', compact(['visit_summary', 'doctors','structures']));
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
        $request['visit_hour'] = date('Y-m-d H:i:s');
        
        $request['status'] = "Enable";
     

        $request->validate([
            'structure_id' => 'required',

        ]);


        $visit_summary_teams = $request['visit_summary_teams'];

        //dd($request);

        $visit_summary = VisitSummary::create($request->all());


        if ($visit_summary && $visit_summary_teams){
            foreach($visit_summary_teams as $visit_summary_team){
                $item = [
                    "visit_summary_id" => $visit_summary->id,
                    "doctor_id" => $visit_summary_team,
                ];
                
                VisitSummaryTeam::create($item);
            }
        }

   
        return redirect()->route('visit_summaries.index')
            ->with('success','VisitSummary created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\VisitSummary  $visitSummary
     * @return \Illuminate\Http\Response
     */
    public function show(VisitSummary $visitSummary)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\VisitSummary  $visitSummary
     * @return \Illuminate\Http\Response
     */
    public function edit(VisitSummary $visit_summary)
    {
        //
        $structures =  StructureProfile::all();
        $doctors =  DoctorProfile::all();
        
        return view('visit_summaries.edit', compact(['visit_summary', 'structures', 'doctors']));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\VisitSummary  $visitSummary
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, VisitSummary $visit_summary)
    {
        //
        //

        $request['visit_hour'] = date('Y-m-d H:i:s');
        
        $request->validate([
            'structure_id' => 'required',   
            
        ]);

  
        $visit_summary->update($request->all());

        $visit_summary_teams = $request['visit_summary_teams'];

        if ($visit_summary && $visit_summary_teams){

            // delete all items before.
            VisitSummaryTeam::where('visit_summary_id', $visit_summary->id)->delete();


            foreach($visit_summary_teams as $visit_summary_team){
                $item = [
                    "visit_summary_id" => $visit_summary->id,
                    "doctor_id" => $visit_summary_team,
                ];
                
                VisitSummaryTeam::create($item);
            }
        }





        return redirect()->route('visit_summaries.index')

                        ->with('success','VisitSummary updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\VisitSummary  $visitSummary
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        VisitSummary::where('id',$id)->delete();
        return redirect()->back()->with('success','Delete Successfully');
    }
}
