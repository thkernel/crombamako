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
        $approvals =  Approval::orderBy('id', 'asc')->get();
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

        if (current_user()->isDoctor()){

            $request['status'] = "enable";
            $request['doctor_id'] = current_user()->userable_id;
            $request->validate([
                'reference' => 'required|unique:approvals',
                'year' => 'required',

            ]);

      

            Approval::create($request->all());

       
            return redirect()->route('approvals.index')
                ->with('success','Agrément créée avec succès.');

        }else{
            return back()->withError("Seul un médecin peut enrigistrer son agrément.")->withInput();
        }
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

                        ->with('success','Agrément mise à jour avec succès');


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
        return redirect()->back()->with('success','Supprimer avec succès');
    }
}
