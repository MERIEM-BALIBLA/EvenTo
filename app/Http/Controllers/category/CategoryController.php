<?php

namespace App\Http\Controllers\category;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('admin.category.index', compact('categories'));
    }
    public function store(CategoryRequest $request)
    {
        $categoryData = $request->validated();
        Category::create($categoryData);
        return redirect()->route('category');
    }
    public function edit($id)
    {
        $category = Category::findOrFail($id);
        return view('admin.category.edit', ['category' => $category]);
    }
    public function update(CategoryRequest $request, $id)
    {
        // Valider les données
        $validatedData = $request->validated();
    
        // Mettre à jour la catégorie
        Category::where('id', $id)->update([
            'name' => $validatedData['name'],
            'description' => $validatedData['description'],
        ]);
    
        // Rediriger vers une page appropriée
        return redirect('category');
    }
    
    
    public function destroy(category $category)
    {
        $category->delete();
        return redirect('category');
    }
}
