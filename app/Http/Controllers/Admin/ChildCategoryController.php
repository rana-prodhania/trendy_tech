<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\ChildCategory;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ChildCategoryController extends Controller
{
    // Display Child Category
    public function index()
    {
        $childCategories = DB::table('child_categories')->leftJoin('sub_categories', 'child_categories.subcategory_id', '=', 'sub_categories.id')->select('child_categories.*', 'sub_categories.subcategory_name')->get();

        return view('admin.child_category.index', compact('childCategories'));
    }
    // Create Child Category
    public function create()
    {
        $subCategories = SubCategory::all();
        return view('admin.child_category.create', compact('subCategories'));
    }
    // Store Child Category
    public function store(Request $request)
    {
        $request->validate([
            'child_category_name' => 'required|unique:child_categories',
            'subcategory_id' => 'required',
        ]);

        $child_category_name = $request->child_category_name;
        $subcategory_id = $request->subcategory_id;
        ChildCategory::create([
            'subcategory_id' => $subcategory_id,
            'child_category_name' => $child_category_name,
            'child_category_slug' => Str::slug($child_category_name),
        ]);
        return redirect(route('admin.childCategory.index'))->with('success', 'Child Category created successfully');
    }
    // Edit Child Category
    public function edit($id)
    {
        $childCategory = ChildCategory::findORFail($id);
        $subCategories = SubCategory::all();
        return view('admin.child_category.edit', compact('childCategory', 'subCategories'));
    }
    // Update Child Category
    public function update(Request $request, $id)
    {
        $request->validate([
            'child_category_name' => 'required',
        ]);
        $child_category_name = $request->child_category_name;
        $subcategory_id = $request->subcategory_id;
        ChildCategory::findORFail($id)->update([
            'subcategory_id' => $subcategory_id,
            'child_category_name' => $child_category_name,
            'child_category_slug' => Str::slug($child_category_name),
        ]);
        return redirect(route('admin.childCategory.index'))->with('success', 'Child Category updated successfully');
    }
    // Delete Child Category
    public function destroy($id)
    {
        ChildCategory::findORFail($id)->delete();
        return redirect(route('admin.childCategory.index'))->with('success', 'Child Category deleted successfully');
    }
}
