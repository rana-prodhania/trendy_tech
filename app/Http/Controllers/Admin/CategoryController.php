<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    // Display the Category form
    public function index()
    {
        $categories = Category::all();
        return view('admin.category.category', compact('categories'));
    }

    // Create a new Category
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

        return redirect()->back()->with('success', 'Category created successfully');
    }

    // Update the Category
    public function update(Request $request, $id)
    {
        $request->validate([
            'category_name' => 'required||unique:categories',
        ]);
        $category_name = $request->category_name;
        Category::findORFail($id)->update([
            'category_name' => $category_name,
            'category_slug' => Str::slug($category_name),
        ]);

        return redirect()->back()->with('success', 'Category updated successfully');
    }

    // Delete the Category
    public function delete($id)
    {
        Category::findORFail($id)->delete();
        return redirect()->back()->with('success', 'Category deleted successfully');
    }
}
