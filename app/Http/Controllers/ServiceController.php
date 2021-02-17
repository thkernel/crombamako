<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
         $services =  Service::orderBy('id', 'asc')->paginate(10)->setPath('services');
        activities_logger($this->getCurrentControllerName(), $this->getCurrentActionName(),'');
        return view("services.index", compact(['services']) );

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
         $service = new Service;
        return view('services.create', compact(['service']));
    
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
        $request['status'] = "enable";
        $request['user_id'] = current_user()->id;
        $request->validate([
            'name' => 'required',

        ]);

  

        Service::create($request->all());

   
        return redirect()->route('services.index')
            ->with('success','Service created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function show(Service $service)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function edit(Service $service)
    {
        //
        return view('services.edit',compact('service'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Service $service)
    {
        //
         $request->validate([
        'name' => 'required',   

        ]);

  
        $service->update($request->all());

  

        return redirect()->route('services.index')

                        ->with('success','Service updated successfully');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
         Service::where('id',$id)->delete();
        return redirect()->back()->with('success','Delete Successfully');
    }
}
