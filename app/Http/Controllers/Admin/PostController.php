<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;

use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        // $posts = Post::where('user_id', auth()->id())->get();
         return view('admin.posts.index'); 
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        $tags = Tag::all();


        return view('admin.posts.create', compact('categories', 'tags'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePostRequest $request){
      
    //   return Storage::put('posts', $request->file('file'));
      
      
        $posts = Post::create($request->all()); // Crear el post

        if($request->file('file')){  // Depues de crear el post, si hay una imagen, la guardamos en la carpeta posts y creamos un registro en la tabla images con la url de la imagen guardada en la carpeta posts
            $url = Storage::put('posts', $request->file('file'));
            $posts->image()->create([
                'url' => $url
            ]);
        }   

   

        if($request->tags){
            $posts->tags()->attach($request->tags);

        }

        return redirect()->route('admin.posts.edit', $posts);
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {

        $categories = Category::all();
        $tags = Tag::all();
        return view('admin.posts.edit', compact('post', 'categories', 'tags'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePostRequest $request, Post $post)
    {
       $post -> update($request->all());

       if($request->file('file')){  // Depues de crear el post, si hay una imagen, la guardamos en la carpeta posts y creamos un registro en la tabla images con la url de la imagen guardada en la carpeta posts
        $url = Storage::put('posts', $request->file('file'));
        if($post->image){
            Storage::delete($post->image->url);
            $post->image->update([
                'url' => $url
            ]);
        }else{
            $post->image()->create([
                'url' => $url
            ]);
        }
     }
     
     if($request->tags){
        $post->tags()->attach($request->tags);

    }


        return redirect()->route('admin.posts.edit', $post)->with('info', 'El post se actualizó con exito');
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    { 
        $post->delete();
        return redirect()->route('admin.posts.index')->with('info', 'El post se eliminó con exito');
    }
}
