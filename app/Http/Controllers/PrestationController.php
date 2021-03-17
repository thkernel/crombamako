<?php

namespace App\Http\Controllers;

use App\Models\Prestation;
use Illuminate\Http\Request;

class PrestationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
         $prestations =  Prestation::orderBy('id', 'asc')->get();
        activities_logger($this->getCurrentControllerName(), $this->getCurrentActionName(),'');
        return view("prestations.index", compact(['prestations']) );

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
         $prestation = new Prestation;
        return view('prestations.create', compact(['prestation']));
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
        //
        $request['status'] = "enable";
        $request['user_id'] = current_user()->id;
        $request->validate([
            'name' => 'required|unique:prestations',

        ]);

  

        Prestation::create($request->all());

   
        return redirect()->route('prestations.index')
            ->with('success','Prestation créée avec succès.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Prestation  $prestation
     * @return \Illuminate\Http\Response
     */
    public function show(Prestation $prestation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Prestation  $prestation
     * @return \Illuminate\Http\Response
     */
    public function edit(Prestation $prestation)
    {
        //
        return view('prestations.edit',compact('prestation'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Prestation  $prestation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Prestation $prestation)
    {
        //

        $request->validate([
        'name' => 'required|unique:prestations',   

        ]);

  
        $prestation->update($request->all());

  

        return redirect()->route('prestations.index')

                        ->with('success','Prestation mise à jour avec succès');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Prestation  $prestation
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        Prestation::where('id',$id)->delete();
        return redirect()->back()->with('success','Supprimer avec succès');
    }
}
