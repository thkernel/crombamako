<?php

namespace App\Http\Controllers;

use App\Models\Neighborhood;
use App\Models\Town;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;


class NeighborhoodController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        $neighborhoods =  Neighborhood::orderBy('id', 'asc')->paginate(10)->setPath('neighborhoods');
        activities_logger($this->getCurrentControllerName(), $this->getCurrentActionName(),'');
        return view("neighborhoods.index", compact(['neighborhoods']) );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $neighborhood = new Neighborhood;
        $towns = Town::all();
         return view('neighborhoods.create', compact(['neighborhood', 'towns']));
    }

    public function getNeighborhoods($id) {
        $neighborhoods = Neighborhood::where("town_id",$id)->pluck("name","id");

        return json_encode($neighborhoods);

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
            'name' => 'required|unique:neighborhoods',

        ]);

  
        

            Neighborhood::create($request->all());

       
            return redirect()->route('neighborhoods.index')
                ->with('success','Neighborhood created successfully.');

        


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Neighborhood  $neighborhood
     * @return \Illuminate\Http\Response
     */
    public function show(Neighborhood $neighborhood)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Neighborhood  $neighborhood
     * @return \Illuminate\Http\Response
     */
    public function edit(Neighborhood $neighborhood)
    {
        //
        $towns = Town::all();
        return view('neighborhoods.edit',compact(['neighborhood', 'towns']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Neighborhood  $neighborhood
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Neighborhood $neighborhood)
    {
        //

        $request->validate([
        'name' => 'required',   
        'town_id' => 'required',   

        ]);

        try{

            $neighborhood->update($request->all());

      

            return redirect()->route('neighborhoods.index')

                            ->with('success','Neighborhood updated successfully');
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
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Neighborhood  $neighborhood
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
         Neighborhood::where('id',$id)->delete();
        return redirect()->back()->with('success','Delete Successfully');
    }
}
