<?php

namespace App\Http\Controllers;

use App\Models\Resource;
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
        $resources =  Resource::orderBy('id', 'desc')->paginate(10)->setPath('resources');
        return view("resources.all", compact(['resources']) );
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $resource = new Resource;
        return view('resources.create', compact(['resource']));

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
         return view('resources.edit',compact('resource'));
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
