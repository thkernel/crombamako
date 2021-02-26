<?php

namespace App\Http\Controllers;

use App\Models\Town;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;

class TownController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $towns =  Town::orderBy('id', 'asc')->get();
        activities_logger($this->getCurrentControllerName(), $this->getCurrentActionName(),'');
        return view("towns.index", compact(['towns']) );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $town = new Town;
        return view('towns.create', compact(['town']));
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
            'name' => 'required|unique:towns',

        ]);

  
        
            Town::create($request->all());
            return redirect()->route('towns.index')
            ->with('success','Commune créée avec succès.');

        

   
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Locality  $locality
     * @return \Illuminate\Http\Response
     */
    public function show(Town $town)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Locality  $locality
     * @return \Illuminate\Http\Response
     */
    public function edit(Town $town)
    {
        //
        return view('towns.edit',compact('town'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Locality  $locality
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Town $town)
    {
        //
        $request->validate([
        'name' => 'required|unique:towns',   

        ]);

       
            $town->update($request->all());
            return redirect()->route('towns.index')

                        ->with('success','Communee mise à jour avec succès');

        

        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Locality  $locality
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        Town::where('id',$id)->delete();
        return redirect()->back()->with('success','Supprimer avec succès');
    }
}
