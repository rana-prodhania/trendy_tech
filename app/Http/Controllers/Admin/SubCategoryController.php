<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;


class SubCategoryController extends Controller
{
    // show sub category
    public function index()
    {
        $subcategories = DB::table('sub_categories')->leftJoin('categories', 'sub_categories.category_id', '=', 'categories.id')->select('sub_categories.*', 'categories.category_name')->get();
        $categories = Category::all();
        return view('admin.category.subcategory', compact('subcategories', 'categories'));
    }

    // store sub category
    public function store(Request $request){
        
        $request->validate([
            'subcategory_name' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id', // Make sure the selected category_id exists in the 'categories' table
        ]);
        
        $subcategory_name = $request->subcategory_name;
        $category_id = $request->category_id;
        SubCategory::create([
            'category_id' => $category_id,
            'subcategory_name' => $subcategory_name,
            'subcategory_slug' => Str::slug($subcategory_name),
        ]);
    
        return redirect()->back()->with('success', 'Sub Category created successfully');
        
    }
    // update or edit sub category
    public function update($id){
        $request->validate([
            'subcategory_name' => 'unique:sub_categories',
        ]);
        $subcategory_name = $request->subcategory_name;
        SubCategory::findORFail($id)->update([
            'subcategory_name' => $subcategory_name,
            'subcategory_slug' => Str::slug($subcategory_name),

        ]);
    }
    // delete sub category
    public function delete($id){
        SubCategory::findORFail($id)->delete();
        return redirect()->back()->with('success', 'Sub Category deleted successfully');
    }
}
