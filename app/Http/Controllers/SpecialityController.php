<?php

namespace App\Http\Controllers;

use App\Models\Speciality;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;

class SpecialityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $specialities =  Speciality::orderBy('id', 'asc')->paginate(10)->setPath('specialities');
        activities_logger($this->getCurrentControllerName(), $this->getCurrentActionName(),'');
        return view("specialities.index", compact(['specialities']) );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $speciality = new Speciality;
         return view('specialities.create', compact(['speciality']));
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
            'name' => 'required|unique:specialities',

        ]);

  
        try{

            Speciality::create($request->all());

       
            return redirect()->route('specialities.index')
                ->with('success','Speciality created successfully.');
        }catch(QueryException $e){
             $error_code = $e->errorInfo[0];
             
            if($error_code == 23505){
                
                return back()->withError("'".$request['name']. "'".', existe déjà.')->withInput();
            }
            else{
                return back()->withError($e->getMessage())->withInput();
            }
            
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Speciality  $speciality
     * @return \Illuminate\Http\Response
     */
    public function show(Speciality $speciality)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Speciality  $speciality
     * @return \Illuminate\Http\Response
     */
    public function edit(Speciality $speciality)
    {
        //
        
        return view('specialities.edit',compact('speciality'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Speciality  $speciality
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Speciality $speciality)
    {
        //
        $request->validate([
        'name' => 'required|unique:specialities',   

        ]);

       

        $speciality->update($request->all());


  

        return redirect()->route('specialities.index')

                        ->with('success','Speciality updated successfully');


        
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Speciality  $speciality
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        Speciality::where('id',$id)->delete();
        return redirect()->back()->with('success','Delete Successfully');
    }
}
