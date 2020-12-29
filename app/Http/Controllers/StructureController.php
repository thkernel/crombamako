<?php

namespace App\Http\Controllers;

use App\Models\Structure;
use App\Models\StructureType;
use Illuminate\Http\Request;

class StructureController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $structures =  Structure::orderBy('id', 'desc')->paginate(10)->setPath('structure_types');
        return view("structures.index", compact(['structures']) );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $structure_types =  StructureType::all();
        return view('structures.create', compact(['structure_types']));
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

        ]);

        

        Structure::create($request->all());

   
        return redirect()->route('structures.index')
            ->with('success','Structure created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Structure  $structure
     * @return \Illuminate\Http\Response
     */
    public function show(Structure $structure)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Structure  $structure
     * @return \Illuminate\Http\Response
     */
    public function edit(Structure $structure)
    {
        //
        $structure_types =  StructureType::all();
        return view('structures.edit', compact(['structure_types', 'structure']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Structure  $structure
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Structure $structure)
    {
        //
        $request->validate([
            'structure_type_id' => 'required',   
            'name' => 'required',   

        ]);

  
        $structure->update($request->all());

  

        return redirect()->route('structures.index')

                        ->with('success','Structure updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Structure  $structure
     * @return \Illuminate\Http\Response
     */
    public function destroy(Structure $structure)
    {
        //
        Structure::where('id',$id)->delete();
        return redirect()->back()->with('success','Delete Successfully');
    }
}
