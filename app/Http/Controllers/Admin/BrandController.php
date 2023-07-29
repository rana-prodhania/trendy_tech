<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Yajra\DataTables\Facades\DataTables as DataTables;
use Intervention\Image\ImageManagerStatic as Image;

class BrandController extends Controller
{
    // Display the All Brand
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Brand::all();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    return '<a href="' . route('admin.brand.edit', $row->id) . '" class="edit btn btn-primary btn-sm">Edit</a> <a href="' . route('admin.brand.delete', $row->id) . '" data-id="' . $row->id . '"" data-item-type="brand" class="delete btn btn-danger btn-sm">Delete</a>';
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('admin.brand.index');
    }
    // Create a new Brand
    public function create()
    {
        return view('admin.brand.create');
    }
    // Store a new Brand
    public function store(Request $request)
    {
        $request->validate([
            'brand_name' => 'required|unique:brands',

        ]);
        $brand_name = $request->brand_name;
        $brand_slug = Str::slug($brand_name);

        // Image Upload
        $image = $request->brand_image;
        $imageName = $brand_slug . '.' . $image->getClientOriginalExtension();
        Image::make($image)->resize(100, 60)->save(public_path('uploads/brand_img/' . $imageName));
        $image_url = '/uploads/brand_img/' . $imageName;

        Brand::create([
            'brand_name' => $brand_name,
            'brand_slug' => $brand_slug,
            'brand_image' => $image_url,
        ]);

        return redirect(route('admin.brand.index'))->with('success', 'Brand created successfully');
    }
    // Edit a Brand
    public function edit($id)
    {
        $brand = Brand::find($id);
        return view('admin.brand.edit', compact('brand'));
    }
    // Update a Brand
    public function update(Request $request, $id)
    {
        $request->validate([
            'brand_name' => 'required',
        ]);
        $brand_name = $request->brand_name;
        $brand_slug = Str::slug($brand_name);

        // Image Update
        if ($request->file('brand_image')) {
            $image = $request->brand_image;
            $imageName = $brand_slug . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(240, 120)->save(public_path('uploads/brand_img/' . $imageName));
            $image_url = '/uploads/brand_img/' . $imageName;
            Brand::find($request->id)->update([
                'brand_image' => $image_url,
            ]);
        }

        Brand::find($id)->update([
            'brand_name' => $brand_name,
            'brand_slug' => $brand_slug,

        ]);
        return redirect(route('admin.brand.index'))->with('success', 'Brand updated successfully');
    }
    // Delete a Brand
    public function destroy($id)
    {
        $brand = Brand::findOrFail($id);
        // Image Delete
        if ($brand->brand_image) {
            File::delete(public_path($brand->brand_image));
        }
        $brand->delete();
        return redirect(route('admin.brand.index'))->with('success', 'Brand deleted successfully');
    }
}
