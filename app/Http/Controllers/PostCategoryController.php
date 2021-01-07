<?php

namespace App\Http\Controllers;

use App\Models\PostCategory;
use Illuminate\Http\Request;

class PostCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $post_categories =  PostCategory::orderBy('id', 'desc')->paginate(10)->setPath('post_categories');
        activities_logger($this->getCurrentControllerName(), $this->getCurrentActionName(),'');
        return view("post_categories.index", compact(['post_categories']) );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('post_categories.create');
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
            'name' => 'required',

        ]);

  

        PostCategory::create($request->all());

   
        return redirect()->route('post_categories.index')
            ->with('success','Speciality created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PostCategory  $postCategory
     * @return \Illuminate\Http\Response
     */
    public function show(PostCategory $postCategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PostCategory  $postCategory
     * @return \Illuminate\Http\Response
     */
    public function edit(PostCategory $post_category)
    {
        //
        return view('post_categories.edit',compact('post_category'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PostCategory  $postCategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PostCategory $post_category)
    {
        //
        //
        $request->validate([
        'name' => 'required',   

        ]);

  
        $post_category->update($request->all());

  

        return redirect()->route('post_categories.index')

                        ->with('success','PostCategory updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PostCategory  $postCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        PostCategory::where('id',$id)->delete();
        return redirect()->back()->with('success','Delete Successfully');
    }
}
