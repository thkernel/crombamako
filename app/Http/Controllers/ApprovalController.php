<?php

namespace App\Http\Controllers;

use App\Models\Approval;
use Illuminate\Http\Request;

class ApprovalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $approvals =  Approval::orderBy('id', 'desc')->paginate(10)->setPath('approvals');
        activities_logger($this->getCurrentControllerName(), $this->getCurrentActionName(),'');
        return view("approvals.index", compact(['approvals']) );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $approval = new Approval;
        return view('approvals.create', compact(['approval']));
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
            'reference' => 'required',
            'year' => 'required',

        ]);

  

        Approval::create($request->all());

   
        return redirect()->route('approvals.index')
            ->with('success','Approval created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Approval  $approval
     * @return \Illuminate\Http\Response
     */
    public function show(Approval $approval)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Approval  $approval
     * @return \Illuminate\Http\Response
     */
    public function edit(Approval $approval)
    {
        //
        return view('approvals.edit', compact(['approval']));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Approval  $approval
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Approval $approval)
    {
        //

        $request->validate([
        'reference' => 'required',   
        'year' => 'required',   


        ]);

  
        $approval->update($request->all());

  

        return redirect()->route('approvals.index')

                        ->with('success','Approval updated successfully');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Approval  $approval
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        Approval::where('id',$id)->delete();
        return redirect()->back()->with('success','Delete Successfully');
    }
}
