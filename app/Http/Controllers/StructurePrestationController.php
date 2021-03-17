<?php

namespace App\Http\Controllers;

use App\Models\StructurePrestation;
use App\Models\StructurePrestationItem;
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
        $structure_prestations =  StructurePrestation::orderBy('id', 'asc')->get();
      
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

        
        $request['user_id'] = current_user()->id;
        $request['status'] = "enable";
        
        $request->validate([
            'structure_id' => 'required',

        ]);

        //dd($request);
        $prestations = array_filter($request['prestations']);


        $structure_prestation = StructurePrestation::create($request->all());

        if ($structure_prestation && $prestations){
            foreach($prestations as $prestation){
                $item = [
                    "structure_prestation_id" => $structure_prestation->id,
                    "prestation_id" => $prestation,
                    
                    

                ];
                
                StructurePrestationItem::create($item);
            }
        }

   
        return redirect()->route('structure_prestations.index')
            ->with('success','Prestation de structure créée avec succès.');


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
         


        ]);

  
        $structure_prestation->update($request->all());

        $prestations = array_filter($request['prestations']);

        if ($structure_prestation && $prestations){
            // delete all items before.
            StructurePrestationItem::where('structure_prestation_id', $structure_prestation->id)->delete();


            foreach($prestations as $prestation){
                $item = [
                    "structure_prestation_id" => $structure_prestation->id,
                    "prestation_id" => $prestation,
                    
                ];
                
                StructurePrestationItem::create($item);
            }
        }




        return redirect()->route('structure_prestations.index')

                        ->with('success','Prestation de structure mise à jour avec succès');
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
        return redirect()->back()->with('success','Supprimer avec succès');
    }
}
