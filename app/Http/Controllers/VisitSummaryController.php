<?php

namespace App\Http\Controllers;

use App\Models\VisitSummary;
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
        $request['status'] = "Enable";
     

        $request->validate([
            'structure_id' => 'required',

        ]);

        dd($request);

        VisitSummary::create($request->all());

   
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
        $structures =  Structure::all();
        
        return view('visit_summaries.edit', compact(['visit_summary', 'structures']));

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
        $request->validate([
            'structure_id' => 'required',   
            
        ]);

  
        $visit_summary->update($request->all());

  

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
