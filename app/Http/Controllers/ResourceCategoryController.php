<?php

namespace App\Http\Controllers;

use App\Models\ResourceCategory;
use Illuminate\Http\Request;

class ResourceCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $resource_categories =  ResourceCategory::orderBy('id', 'asc')->get();
        activities_logger($this->getCurrentControllerName(), $this->getCurrentActionName(),'');
        return view("resource_categories.index", compact(['resource_categories']) );
    }

    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('resource_categories.create');
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

  

        ResourceCategory::create($request->all());

   
        return redirect()->route('resource_categories.index')
            ->with('success',"Catégorie de ressource a bien été créée.");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ResourceCategory  $ResourceCategory
     * @return \Illuminate\Http\Response
     */
    public function show(ResourceCategory $ResourceCategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ResourceCategory  $ResourceCategory
     * @return \Illuminate\Http\Response
     */
    public function edit(ResourceCategory $resource_category)
    {
        //
        return view('resource_categories.edit',compact('resource_category'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ResourceCategory  $ResourceCategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ResourceCategory $resource_category)
    {
        //
        
        $request->validate([
        'name' => 'required',   

        ]);

  
        $resource_category->update($request->all());

  

        return redirect()->route('resource_categories.index')

                        ->with('success',"Catégorie de ressource mise à jour avec succès");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ResourceCategory  $ResourceCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        ResourceCategory::where('id',$id)->delete();
        return redirect()->back()->with('success','Supprimer avec succès');
    }
}
