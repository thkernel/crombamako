<?php

namespace App\Http\Controllers;

use App\Models\StructureCategory;
use Illuminate\Http\Request;

class StructureCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $structure_categories =  StructureCategory::orderBy('id', 'desc')->paginate(10)->setPath('structure_categories');
        activities_logger($this->getCurrentControllerName(), $this->getCurrentActionName(),'');
        return view("structure_categories.index", compact(['structure_categories']) );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $structure_category =  new StructureCategory;
        return view('structure_categories.create', compact(['structure_category']));
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

        

        StructureCategory::create($request->all());

   
        return redirect()->route('structure_categories.index')
            ->with('success','StructureCategory created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\StructureCategory  $structureCategory
     * @return \Illuminate\Http\Response
     */
    public function show(StructureCategory $structureCategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\StructureCategory  $structureCategory
     * @return \Illuminate\Http\Response
     */
    public function edit(StructureCategory $structureCategory)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\StructureCategory  $structureCategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, StructureCategory $structureCategory)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\StructureCategory  $structureCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(StructureCategory $structureCategory)
    {
        //
    }
}
