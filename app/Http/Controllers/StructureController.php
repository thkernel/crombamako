<?php

namespace App\Http\Controllers;

use App\Models\StructureProfile;
use App\Models\StructureType;
use App\Models\StructureCategory;
use App\Models\Town;
use App\Models\Neighborhood;

use Illuminate\Http\Request;
use Illuminate\Database\QueryException;
use Illuminate\Auth\Events\Registered;
use PDF;


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
        
       

        $structures =  StructureProfile::orderBy('id', 'asc')->get();
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
            'name' => 'required|unique:structure_profiles',
            'phone' => 'required|unique:structure_profiles',
            'town_id' => 'required',
            'email' => 'required|unique:structure_profiles',
            'neighborhood_id' => 'required',
            'structure_type_id' => 'required',
            'structure_category_id' => 'required',

        ]);


        $structure_profile = StructureProfile::create($request->all());

         create_structure_account($structure_profile, $request->email, 'Structure' );


        if ($request->hasFile('logo')){

             // Attach record
            $allowedfileExtension = ['jpeg','jpg','png'];

            eloquent_storage_service($structure_profile, $request, $allowedfileExtension, 'logo', 'logos');
        }

        
      
        
        
        

        return redirect()->route('structures.index')
            ->with('success','Structure cr????e avec succ??s.');
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
        //dd([$structure,$structure_doctors ]);
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
            'name' => 'required',  
            'phone' => 'required',
            'email' => 'required',
            'town_id' => 'required',
            'neighborhood_id' => 'required',
            'structure_type_id' => 'required',
            'structure_category_id' => 'required', 

        ]);

        

        $structure->update($request->all());
        
      if ($request->hasFile('logo')){

             // Attach record
            $allowedfileExtension = ['jpeg','jpg','png'];

            eloquent_storage_service($structure, $request, $allowedfileExtension, 'logo', 'logos');
        }

            return redirect()->route('structures.index')

                            ->with('success','Structure mise ?? jour avec succ??s');
        
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
        $structure = StructureProfile::find($id);

        
        $structure->user->delete();


        StructureProfile::where('id',$id)->delete();
        return redirect()->back()->with('success','Supprimer avec succ??s');
    }

     public function structure_situation(Request $request)
    {
        //

        $results = null;
        $towns =  Town::all();
        $neighborhoods = Neighborhood::all();
        $structure_categories =  StructureCategory::all();

       
        // Get search term

        $structure_category_id = $request['structure_category_id'];
        $town_id = $request['town_id'];
        $neighborhood_id = $request['neighborhood_id'];

        

        
        $results = _structure_situation($structure_category_id,$town_id,$neighborhood_id);
        
        


        //dd($request);

        return view("structures_situation.search_doctors", compact(['results', 'towns', 'structure_categories', 'neighborhoods', 'structure_category_id','town_id', 'neighborhood_id']) );
    }

    public function download_structure_situation_pdf(Request $request){
        $results = null;
        $towns =  Town::all();
        $neighborhoods = Neighborhood::all();
        $structure_categories =  StructureCategory::all();

       
        // Get search term

        $structure_category_id = $request['pdf_structure_category_id'];
        $town_id = $request['pdf_town_id'];
        $neighborhood_id = $request['pdf_neighborhood_id'];

        

        
        $results = _structure_situation($structure_category_id,$town_id,$neighborhood_id);


        $pdf = PDF::loadView('structures_situation.pdf.structure_situation_pdf', compact(['results',  'structure_category_id', 'town_id', 'neighborhood_id']));
        
        return $pdf->download('structure-stituation-'.get_current_timestamp().'.pdf');

        /*return view('contributions.statement_pdf',compact(['contributions','sum_total','amount_words']));*/
        
    }


}
