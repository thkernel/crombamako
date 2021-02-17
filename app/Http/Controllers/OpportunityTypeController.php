<?php

namespace App\Http\Controllers;

use App\Models\OpportunityType;
use Illuminate\Http\Request;

class OpportunityTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $opportunity_types =  OpportunityType::orderBy('id', 'asc')->paginate(10)->setPath('opportunity_types');
        activities_logger($this->getCurrentControllerName(), $this->getCurrentActionName(),'');
        return view("opportunity_types.index", compact(['opportunity_types']) );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $opportunity_type = new OpportunityType;
        return view('opportunity_types.create', compact(['opportunity_type']));
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
            'name' => 'required',
            'user_id' => 'required',

        ]);

        

        OpportunityType::create($request->all());

   
        return redirect()->route('opportunity_types.index')
            ->with('success','OpportunityType created successfully.');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\OpprotunityType  $opprotunityType
     * @return \Illuminate\Http\Response
     */
    public function show(OpportunityType $opportunity_type)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\OpprotunityType  $opprotunityType
     * @return \Illuminate\Http\Response
     */
    public function edit(OpportunityType $opportunity_type)
    {
        //

        return view('opportunity_types.edit',compact('opportunity_type'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\OpprotunityType  $opprotunityType
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, OpportunityType $opportunity_type)
    {
        //

        $request->validate([
        'name' => 'required', 
        

        ]);

  
        $opportunity_type->update($request->all());

  

        return redirect()->route('opportunity_types.index')

                        ->with('success','OpportunityType updated successfully');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\OpprotunityType  $opprotunityType
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        OpportunityType::where('id',$id)->delete();
        return redirect()->back()->with('success','Delete Successfully');
    }
}
