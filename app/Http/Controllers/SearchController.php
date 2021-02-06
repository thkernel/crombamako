<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Town;
use App\Models\Neighborhood;
use App\Models\StructureProfile;
use App\Models\StructureCategory;

class SearchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    public function search_structures(Request $request)
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



        if ($structure_category_id){
            $results = StructureProfile::where('structure_category_id', $structure_category_id)->get();
        }
        else if ($structure_category_id && $town_id){
            $results = StructureProfile::where('structure_category_id', $structure_category_id)->where('town_id', $town_id)->get();

        }else if ($structure_category_id && $neighborhood_id){
            $results = StructureProfile::where('structure_category_id', $structure_category_id)->where('neighborhood_id', $neighborhood_id)->get();
        }
        else if ($structure_category_id && $town_id && $neighborhood_id){
            $results = StructureProfile::where('structure_category_id', $structure_category_id)->where('town_id', $town_id)->where('neighborhood_id', $neighborhood_id)->get();
        }

        



        //dd($request);

        return view("search.search_doctors", compact(['results', 'towns', 'structure_categories', 'neighborhoods', 'structure_category_id']) );
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
