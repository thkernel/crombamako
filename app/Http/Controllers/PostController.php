<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\PostCategory;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $posts =  Post::orderBy('id', 'desc')->paginate(10)->setPath('posts');
        activities_logger($this->getCurrentControllerName(), $this->getCurrentActionName(),'');
        return view("posts.index", compact(['posts']) );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $post_categories =  PostCategory::all();
        return view('posts.create', compact(['post_categories']));
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
            'title' => 'required',
            'post_category_id' => 'required',


        ]);

        if ($request->hasFile('thumbnail')){
            $fileName = time().'.'.$request->file('thumbnail')->extension();  
            $request->file('thumbnail')->store(public_path('storage'), $fileName);
            $request['thumbnail'] = $fileName;
        }

        Post::create($request->all());

   
        return redirect()->route('posts.index')
            ->with('success','Post created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        //
        $post_categories =  PostCategory::all();
        return view('posts.edit', compact(['post_categories', 'post']));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        //
        $request->validate([
            'post_category_id' => 'required',   
            'title' => 'required',   

        ]);

        if ($request->hasFile('thumbnail')){
            $fileName = time().'.'.$request->file('thumbnail')->extension();  
            $request->file('thumbnail')->move(public_path('storage'), $fileName);
            $request['thumbnail'] = $fileName;
        }
        $post->update($request->all());

  

        return redirect()->route('posts.index')

                        ->with('success','Post updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        Post::where('id',$id)->delete();
        return redirect()->back()->with('success','Delete Successfully');
    }
}
