<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {   
        $tags = Tag::all();

        return view("admin.tags.index", compact('tags'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("admin.tags.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|unique:tags',
            'slug' => 'required|unique:tags',
            'color' => 'required|unique:tags',
        ]);

        // dd($data); return;

        Tag::create($data);

        return redirect()->route('admin.tags.index')->with('info', 'La etiqueta se creó con éxito');
    }

       

    /**
     * Display the specified resource.
     */
    public function show(Tag $tag)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tag $tag)
    {
        return view("admin.tags.edit", compact('tag'));
    
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Tag $tag)
    {
        $data = $request->validate([
            'name' => 'required|unique:tags,name,'.$tag->id,
            'slug' => 'required|unique:tags,slug,'.$tag->id,
            'color' => 'required|unique:tags,color,'.$tag->id,
        ]);

        $tag->update($data);

        return redirect()->route('admin.tags.index', $tag)->with('info', 'La etiqueta se actualizó con éxito');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tag $tag)
    {
        $tag->delete();
        return redirect()->route("admin.tags.index")->with("info", "Etiqueta Elimanda con éxito");
        
    }
}
