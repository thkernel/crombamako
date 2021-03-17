<?php

namespace App\Http\Controllers;

use App\Models\StructureCategory;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;


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
        $structure_categories =  StructureCategory::orderBy('id', 'asc')->get();
        activities_logger($this->getCurrentControllerName(), $this->getCurrentActionName(),'');
        return view("structure_categories.index", compact(['structure_categories']) );
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function all()
    {
        //
        $structure_categories =  StructureCategory::orderBy('id', 'desc')->paginate(10)->setPath('structure_categories');
        return view("structure_categories.all", compact(['structure_categories']) );
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
            'name' => 'required|unique:structure_categories',

        ]);

        
        

            StructureCategory::create($request->all());

       
            return redirect()->route('structure_categories.index')
                ->with('success','Catégorie de structure créée avec succès.');

        
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
    public function edit(StructureCategory $structure_category)
    {
        //
            return view('structure_categories.edit',compact('structure_category'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\StructureCategory  $structureCategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, StructureCategory $structure_category)
    {
        //

        $request->validate([
        'name' => 'required|unique:structure_categories',   

        ]);

        

            $structure_category->update($request->all());

      

            return redirect()->route('structure_categories.index')

                            ->with('success','Catégorie de structure mise à jour avec succès');

        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\StructureCategory  $structureCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        StructureCategory::where('id',$id)->delete();
        return redirect()->back()->with('success','Supprimer avec succès');
    }
}
