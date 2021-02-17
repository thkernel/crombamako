<?php

namespace App\Http\Controllers;

use App\Models\Opportunity;
use App\Models\OpportunityType;
use Illuminate\Http\Request;

class OpportunityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $opportunities =  Opportunity::orderBy('id', 'asc')->paginate(10)->setPath('opportunities');
        activities_logger($this->getCurrentControllerName(), $this->getCurrentActionName(),'');
        return view("opportunities.index", compact(['opportunities']) );
        
    }

    public function all()
    {
        //
        $opportunities =  Opportunity::orderBy('id', 'desc')->paginate(10)->setPath('opportunities');
        return view("opportunities.all", compact(['opportunities']) );
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $opportunity = new Opportunity;
        $opportunity_types =  OpportunityType::all();
        return view('opportunities.create', compact(['opportunity_types', 'opportunity']));
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
    public function show($slug)
    {
        //
        $opportunity = Opportunity::where('slug',$slug)->first();
        
        
        return view("opportunities.show", compact(['opportunity']) );
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
    public function destroy($id)
    {
        //
        Opportunity::where('id',$id)->delete();
        return redirect()->back()->with('success','Delete Successfully');
    }
}
