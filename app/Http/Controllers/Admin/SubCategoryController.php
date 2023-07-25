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
        return view('admin.subcategory.index', compact('subcategories', 'categories'));
    }

    // create sub category
    public function create(){
        $categories = Category::all();
        return view('admin.subcategory.create', compact('categories'));
    }

    // store sub category
    public function store(Request $request){
        
        $request->validate([
            'subcategory_name' => 'required|unique:sub_categories',
            'category_id' => 'required|exists:categories,id',
        ]);
        
        $subcategory_name = $request->subcategory_name;
        $category_id = $request->category_id;
        SubCategory::create([
            'category_id' => $category_id,
            'subcategory_name' => $subcategory_name,
            'subcategory_slug' => Str::slug($subcategory_name),
        ]);
    
        return redirect(route('admin.subcategory.index'))->with('success', 'Sub Category created successfully');
        
    }
    // edit sub category
    public function edit($id){
        $subcategory = SubCategory::findORFail($id);
        $categories = Category::all();
        return view('admin.subcategory.edit', compact('subcategory', 'categories'));
    }


    // update sub category
    public function update( Request $request, $id){
        $request->validate([
            'subcategory_name' => 'required',
        ]);
        $subcategory_name = $request->subcategory_name;
        $category_id = $request->category_id;
        SubCategory::findORFail($id)->update([
            'category_id' => $category_id,
            'subcategory_name' => $subcategory_name,
            'subcategory_slug' => Str::slug($subcategory_name),

        ]);
        return redirect(route('admin.subcategory.index'))->with('success', 'Sub Category updated successfully');
    }
    // delete sub category
    public function destroy($id){
        SubCategory::findORFail($id)->delete();
        return redirect(route('admin.subcategory.index'))->with('success', 'Sub Category deleted successfully');
    }
}
