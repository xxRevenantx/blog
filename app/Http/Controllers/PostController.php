<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Models\Category;
use App\Models\Tag;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::where("status", 2)->latest("id")->paginate(8);
        return view('posts.index', compact('posts'));
    }


    public function show(Post $post)
    {
        $similares = Post::where("category_id", $post->category_id)
            ->where("status", 2)
            ->where("id", "!=", $post->id) // Excluir el post actual
            ->latest("id") // Ordenar por id de forma descendente
            ->take(4) // Solo 4 post relacionados
            ->get();

        return view('posts.show', compact('post', 'similares')); 
    }

    public function category(Category $category)
    {
        $posts = Post::where("category_id", $category->id)
            ->where("status", 2)
            ->latest("id")
            ->paginate(2);

        return view('posts.category', compact('posts', 'category'));
    }

    public function tag(Tag $tag)
    {

        $posts = $tag->posts()->where("status", 2)->latest("id")->paginate(2);
        return view('posts.tag', compact('posts', 'tag'));
    }

}
