<?php

namespace App\Http\Controllers;

use App\Models\PriceConfiguration;
use Illuminate\Http\Request;

class PriceConfigurationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        //
         $price_configurations =  PriceConfiguration::orderBy('id', 'asc')->get();

         if ($price_configurations->count() <= 0){
            $hide = false;
        }
        else{
            $hide = true;
         }  
        activities_logger($this->getCurrentControllerName(), $this->getCurrentActionName(),'');
        return view("price_configurations.index", compact(['price_configurations','hide']) );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        //
        $price_configuration = new PriceConfiguration;
         return view('price_configurations.create', compact(['price_configuration']));
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
            'contribution_amount' => 'required',

        ]);

  
        

        PriceConfiguration::create($request->all());

   
        return redirect()->route('price_configurations.index')
            ->with('success','Montant cotisation crée avec succès.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PriceConfiguration  $priceConfiguration
     * @return \Illuminate\Http\Response
     */
    public function show(PriceConfiguration $priceConfiguration)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PriceConfiguration  $priceConfiguration
     * @return \Illuminate\Http\Response
     */
    public function edit(PriceConfiguration $price_configuration)
    {
        //
        return view('price_configurations.edit',compact('price_configuration'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PriceConfiguration  $priceConfiguration
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PriceConfiguration $price_configuration)
    {
        //

        $request->validate([
        'contribution_amount' => 'required',   

        ]);

       

        $price_configuration->update($request->all());


  

        return redirect()->route('price_configurations.index')

                        ->with('success','Montant cotisation mise à jour avec succès');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PriceConfiguration  $priceConfiguration
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        PriceConfiguration::where('id',$id)->delete();
        return redirect()->back()->with('success','Supprimer avec succès');
    }
}
