<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::all();

        return view('admin.categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
         // Envía a la ruta para crear la categoría
        return view('admin.categories.create');
    }

    /**
     * Registra los datos en la BD
     */
    public function store(Request $request)
    {
        // Validar
        $data = $request->validate([
            'name' => 'required|unique:categories',
            'slug' => 'required|unique:categories'
        ]);

        // dd($data); return;

        // Crear
        Category::create($data);

        // Redireccionar
        return redirect()->route('admin.categories.index')->with('info', 'La categoría se creó con éxito');
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        return view('admin.categories.show', compact("category"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        return view('admin.categories.edit', compact("category"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        // Validar
        $data = $request->validate([
            'name' => 'required|unique:categories,name,' . $category->id,
            'slug' => 'required|unique:categories,slug,' . $category->id
        ]);

        // Asignar valores
        $category->update($data);
      

        // Redireccionar
        return redirect()->route('admin.categories.index', $category)->with('info', 'La categoría se actualizó con éxito');



    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {

        $category->delete();
        return redirect()->route("admin.categories.index")->with("info", "Elimando con éxito");
        
    }
}
