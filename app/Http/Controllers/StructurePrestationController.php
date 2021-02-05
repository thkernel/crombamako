<?php

namespace App\Http\Controllers;

use App\Models\StructurePrestation;
use App\Models\StructureProfile;
use App\Models\Prestation;


use Illuminate\Http\Request;

class StructurePrestationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $structure_prestations =  StructurePrestation::orderBy('id', 'desc')->paginate(10)->setPath('structure_prestations');
      
        return view("structure_prestations.index", compact(['structure_prestations']) );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $prestations = Prestation::all();
        $structures = StructureProfile::all();
        $structure_prestation = new StructurePrestation;
        return view('structure_prestations.create', compact(['structure_prestation', 'prestations', 'structures']));
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
            'structure_id' => 'required',
            'prestation_id' => 'required',

        ]);

  

        StructurePrestation::create($request->all());

   
        return redirect()->route('structure_prestations.index')
            ->with('success','StructurePrestation created successfully.');


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\StructurePrestation  $structurePrestation
     * @return \Illuminate\Http\Response
     */
    public function show(StructurePrestation $structurePrestation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\StructurePrestation  $structurePrestation
     * @return \Illuminate\Http\Response
     */
    public function edit(StructurePrestation $structure_prestation)
    {
        //
        $prestations = Prestation::all();
        $structures = StructureProfile::all();

        return view('structure_prestations.edit', compact(['structure_prestation', 'prestations', 'structures']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\StructurePrestation  $structurePrestation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, StructurePrestation $structure_prestation)
    {
        //

        $request->validate([
        'structure_id' => 'required',   
        'prestation_id' => 'required',   


        ]);

  
        $structure_prestation->update($request->all());

  

        return redirect()->route('structure_prestations.index')

                        ->with('success','StructurePrestation updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\StructurePrestation  $structurePrestation
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        StructurePrestation::where('id',$id)->delete();
        return redirect()->back()->with('success','Delete Successfully');
    }
}
