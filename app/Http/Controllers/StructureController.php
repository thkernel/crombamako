<?php

namespace App\Http\Controllers;

use App\Models\StructureProfile;
use App\Models\StructureType;
use App\Models\StructureCategory;
use App\Models\Town;
use App\Models\Neighborhood;

use Illuminate\Http\Request;
use Illuminate\Database\QueryException;


class StructureController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        
       

        $structures =  StructureProfile::orderBy('id', 'asc')->paginate(10)->setPath('structure_types');
        activities_logger($this->getCurrentControllerName(), $this->getCurrentActionName(),'');
        return view("structures.index", compact(['structures']) );

    }

    public function category(Request $request){
        
        $structure_category = StructureCategory::where('slug',$request->slug)->first();
        $structures = $structure_category->structures;
        
        
        return view("structures.category", compact(['structures', 'structure_category']) );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $structure = new StructureProfile;
        $structure_types =  StructureType::all();
        $structure_categories =  StructureCategory::all();
        $towns =  Town::all();
        $neighborhoods =  Neighborhood::all();

        
        return view('structures.create', compact(['structure','structure_types', 'structure_categories','towns','neighborhoods']));
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
            'name' => 'required|unique:structures',
            'phone' => 'required',
            'town_id' => 'required',
            'email' => 'required|unique:structures',
            'neighborhood_id' => 'required',
            'structure_type_id' => 'required',
            'structure_category_id' => 'required',

        ]);

        
        $account = create_account('stru', $request->email, 'Structure' );
        
        // If account is create succesfull.
        if ($account){ 
            $structure = StructureProfile::create($request->all());
            $structure->user()->save($account);
        }

        return redirect()->route('structures.index')
            ->with('success','Structure created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Structure  $structure
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        //

        $structure = StructureProfile::where('slug',$slug)->first();
        
        $structure_doctors = $structure->doctors;
        //dd($structure_doctors);
        return view("structures.show", compact(['structure', 'structure_doctors']) );

        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Structure  $structure
     * @return \Illuminate\Http\Response
     */
    public function edit(StructureProfile $structure)
    {
        //
        $structure_types =  StructureType::all();
        $structure_categories =  StructureCategory::all();
        $towns =  Town::all();
        $neighborhoods =  Neighborhood::all();

        return view('structures.edit', compact(['structure_types','structure_categories', 'structure', 'towns', 'neighborhoods']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Structure  $structure
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, StructureProfile $structure)
    {
        //
        $request->validate([
            'structure_type_id' => 'required',   
            'name' => 'required|unique:structures',  
            'phone' => 'required',
            'email' => 'required|unique:structures'
            'town_id' => 'required',
            'neighborhood_id' => 'required',
            'structure_type_id' => 'required',
            'structure_category_id' => 'required', 

        ]);

        

            $structure->update($request->all());

      

            return redirect()->route('structures.index')

                            ->with('success','Structure updated successfully');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Structure  $structure
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        StructureProfile::where('id',$id)->delete();
        return redirect()->back()->with('success','Delete Successfully');
    }
}
