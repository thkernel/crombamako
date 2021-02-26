<?php

namespace App\Http\Controllers;

use App\Models\StructureType;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;


class StructureTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $structure_types =  StructureType::orderBy('id', 'asc')->get();
        activities_logger($this->getCurrentControllerName(), $this->getCurrentActionName(),'');
        return view("structure_types.index", compact(['structure_types']) );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $structure_type =  new StructureType;
        return view('structure_types.create', compact(['structure_type']));
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
        /*
        $request->merge([
    'user_id' => $modified_user_id_here,
]);
*/

        $request['user_id'] = current_user()->id;
     

        $request->validate([
            'name' => 'required|unique:structure_types',

        ]);

        
        
            StructureType::create($request->all());

       
            return redirect()->route('structure_types.index')
                ->with('success','Type de structure créé avec succès.');
                
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\StructureType  $structureType
     * @return \Illuminate\Http\Response
     */
    public function show(StructureType $structureType)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\StructureType  $structureType
     * @return \Illuminate\Http\Response
     */
    public function edit(StructureType $structure_type)
    {
        //
        return view('structure_types.edit',compact('structure_type'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\StructureType  $structureType
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, StructureType $structure_type)
    {
        //
        $request->validate([
        'name' => 'required|unique:structure_types',   

        ]);

  
        $structure_type->update($request->all());

  

        return redirect()->route('structure_types.index')

                        ->with('success','Type de structure mis à jour avec succès');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\StructureType  $structureType
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        StructureType::where('id',$id)->delete();
        return redirect()->back()->with('success','Supprimer avec succès');
    }
}
