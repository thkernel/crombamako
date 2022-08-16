<?php

namespace App\Http\Controllers;

use App\Models\Resource;
use App\Models\ResourceCategory;
use Illuminate\Http\Request;

class ResourceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $resources =  Resource::orderBy('id', 'asc')->get();
        activities_logger($this->getCurrentControllerName(), $this->getCurrentActionName(),'');
        return view("resources.index", compact(['resources']) );
    }

    public function all()
    {
        //
        $resource_category = ResourceCategory::whereName("DEMARCHE ADMINISTRATIVE")->first();
        $resources =  Resource::where("resource_category_id",'!=',$resource_category->id)->orderBy('id', 'desc')->paginate(10);
        $resource_category = null;
        return view("resources.all", compact(['resources', 'resource_category']) );
    }


    public function administrative_procedures()
    {
        $resource_category = ResourceCategory::whereName("DEMARCHE ADMINISTRATIVE")->first();
        $resources =  Resource::whereResourceCategoryId($resource_category->id)->orderBy('id', 'desc')->paginate(10);
        return view("resources.all", compact(['resources', 'resource_category']) );
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
         $resource_categories =  ResourceCategory::all();
        $resource = new Resource;
        return view('resources.create', compact(['resource','resource_categories']));

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
        $request['user_id'] = current_user()->id;
        $request->validate([
            'title' => 'required',
            'resource_category_id' => 'required',

        ]);

  

        $resource = Resource::create($request->all());

        if ($request->hasFile('file')){

             // Attach record
            $allowedfileExtension = ['pdf', 'docs','jpeg','jpg','png', 'xls', 'xlsx'];

            eloquent_storage_service($resource, $request, $allowedfileExtension, 'file', 'resources');
        }
   
        return redirect()->route('resources.index')
            ->with('success','Ressource ajoutée avec succès.');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Resource  $resource
     * @return \Illuminate\Http\Response
     */
    public function show(Resource $resource)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Resource  $resource
     * @return \Illuminate\Http\Response
     */
    public function edit(Resource $resource)
    {
        //
         $resource_categories =  ResourceCategory::all();
         return view('resources.edit',compact(['resource','resource_categories' ]));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Resource  $resource
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Resource $resource)
    {
        //
         $request->validate([
        'title' => 'required',   

        ]);

  
        $resource->update($request->all());

  

        
       

        if ($request->hasFile('file')){

             // Attach record
            $allowedfileExtension = ['pdf', 'docs','jpeg','jpg','png', 'xls', 'xlsx'];

            eloquent_storage_service($resource, $request, $allowedfileExtension, 'file', 'resources');
        }

        return redirect()->route('resources.index')

                        ->with('success','Ressource mise à jour avec succès');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Resource  $resource
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        Resource::where('id',$id)->delete();
        return redirect()->back()->with('success','Supprimer avec succès');
    }
}
