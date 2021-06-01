<?php

namespace App\Http\Controllers;


use App\Http\Controllers\Controller;
use App\Models\Town;
use App\Models\StructureCategory;
use App\Models\StructureProfile;
use App\Models\Neighborhood;
use App\Models\Post;
use App\Models\Opportunity;


class FrontController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       

        $towns =  Town::all();
        $neighborhoods = Neighborhood::all();
        $structure_categories =  StructureCategory::all();
        $posts =  Post::orderBy('id', 'desc')->take(3)->get();
        $opportunities =  Opportunity::orderBy('id', 'desc')->take(3)->get();
        
        
        $structure_category_id = null;
        $neighborhood_id = null;
        $town_id = null;
        $s = StructureProfile::get()->first();
        //dd($s->attachment->blob);

        
        return view("front.index", compact(['towns','neighborhoods', 'structure_categories', 'structure_category_id', 'posts','opportunities', 'town_id', 'neighborhood_id']) );
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
