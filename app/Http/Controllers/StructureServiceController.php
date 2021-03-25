<?php

namespace App\Http\Controllers;

use App\Models\StructureService;
use App\Models\StructureServiceItem;
use App\Models\StructureProfile;
use App\Models\Service;


use Illuminate\Http\Request;

class StructureServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $structure_services =  StructureService::orderBy('id', 'asc')->get();
      
        return view("structure_services.index", compact(['structure_services']) );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $services = Service::all();
        $structures = StructureProfile::all();
        $structure_service = new StructureService;
        return view('structure_services.create', compact(['structure_service', 'services', 'structures']));
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
            'structure_id' => 'required|unique:structure_services',
           

        ]);

  
        $services = array_filter($request['services']);

        $structure_service = StructureService::create($request->all());

        if ($structure_service && $services){
            foreach($services as $service){
                $item = [
                    "structure_service_id" => $structure_service->id,
                    "service_id" => $service,
                    
                    

                ];
                
                StructureServiceItem::create($item);
            }
        }

   
        return redirect()->route('structure_services.index')
            ->with('success','Service de la structure créé avec succès.');


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\StructurePrestation  $structurePrestation
     * @return \Illuminate\Http\Response
     */
    public function show(StructureService $structure_service)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\StructurePrestation  $structurePrestation
     * @return \Illuminate\Http\Response
     */
    public function edit(StructureService $structure_service)
    {
        //
        $services = Service::all();
        $structures = StructureProfile::all();

        return view('structure_services.edit', compact(['structure_service', 'services', 'structures']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\StructurePrestation  $structurePrestation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, StructureService $structure_service)
    {
        //

        $request->validate([
        'structure_id' => 'required',   
         


        ]);

  
        $structure_service->update($request->all());

        $services = array_filter($request['services']);


        if ($structure_service && $services){

            // delete all items before.
            StructureServiceItem::where('structure_service_id', $structure_service->id)->delete();


            foreach($services as $service){
                $item = [
                    "structure_service_id" => $structure_service->id,
                    "service_id" => $service,
                    
                    

                ];
                
                StructureServiceItem::create($item);
            }
        }


  

        return redirect()->route('structure_services.index')

                        ->with('success','Service de la structure mis à jour avec succès');
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
        StructureService::where('id',$id)->delete();
        return redirect()->back()->with('success','Supprimer avec succès');
    }
}
