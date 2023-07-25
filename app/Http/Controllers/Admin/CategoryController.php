<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    
    
    // Display the All Category 
    public function index()
    {

        $categories = Category::all();
        return view('admin.category.index', compact('categories'));
    }
    // Create a new Category
    public function create(){
        return view('admin.category.create');
    }
    // Store the Category
    public function store(Request $request)
    {
        $request->validate([
            'category_name' => 'required||unique:categories',
        ]);
        $category_name = $request->category_name;
        Category::create([
            'category_name' => $category_name,
            'category_slug' => Str::slug($category_name),
        ]);

        return redirect(route('admin.category.index'))->with('success', 'Category created successfully');
    }
    // Edit the category
    public function edit(Request $request){
        $category = Category::find($request->id);
        return view('admin.category.edit', compact('category'));
    }

    // Update the Category
    public function update(Request $request, $id)
    {
        $request->validate([
            'category_name' => 'required|unique:categories',
        ]);
        $category_name = $request->category_name;
        Category::findORFail($id)->update([
            'category_name' => $category_name,
            'category_slug' => Str::slug($category_name),
        ]);

        return redirect(route('admin.category.index'))->with('success', 'Category updated successfully');
    }

    // Delete the Category
    public function destroy($id)
    {
        Category::findORFail($id)->delete();
        return redirect(route('admin.category.index'))->with('success', 'Category deleted successfully');
    }
}
