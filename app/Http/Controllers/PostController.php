<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\PostCategory;
use Illuminate\Http\Request;
use App\Models\EloquentStorageBlob;

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
        $this->authorize('read-post', Post::class);
        
        $posts =  Post::orderBy('id', 'asc')->get();
        activities_logger($this->getCurrentControllerName(), $this->getCurrentActionName(),'');
        return view("posts.index", compact(['posts']) );
    }

    public function all()
    {
        //
        //$posts =  Post::orderBy('id', 'desc')->paginate(3)->setPath('posts');
        $posts =  Post::orderBy('id', 'desc')->paginate(10);
        return view("posts.all", compact(['posts']) );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $post = new Post;
        $post_categories =  PostCategory::all();
        return view('posts.create', compact(['post_categories', 'post']));
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

        

        $post = Post::create($request->all());

        if ($request->hasFile('thumbnail')){

             // Attach record
            $allowedfileExtension = ['jpeg','jpg','png'];

            eloquent_storage_service($post, $request, $allowedfileExtension, 'thumbnail', 'posts');
        }

   
        return redirect()->route('posts.index')
            ->with('success','Article créé avec succès.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        //
        $post = Post::where('slug',$slug)->first();
        
        
        return view("posts.show", compact(['post']) );
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


        
        $post->update($request->all());

        if ($request->hasFile('thumbnail')){

             // Attach record
            $allowedfileExtension = ['jpeg','jpg','png'];

            eloquent_storage_service($post, $request, $allowedfileExtension, 'thumbnail', 'posts');
        }

  

        return redirect()->route('posts.index')

                        ->with('success','Article mis à jour avec succès');
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
        $post = Post::find($id);

        $blob_id = $post->attachment->blob_id;
        $post->attachment()->delete();

        $post->delete();
        
        EloquentStorageBlob::where('id',$blob_id)->delete();
        
        return redirect()->back()->with('success','Supprimer avec succès');
    }
}
