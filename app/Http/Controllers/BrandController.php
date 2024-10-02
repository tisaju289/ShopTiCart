<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
     
        $brands = Brand::all();
        return view('admin-panel.brands.index', compact('brands'));      
      
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        return view('admin-panel.brands.create');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'img' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'order' => 'nullable|integer',
        ]);

        // Handle file upload if present
        $imgPath = null;
        if ($request->hasFile('img')) {
            $imgPath = $request->file('img')->store('brands', 'public');
        }

        Brand::create([
            'name' => $request->input('name'),
            'slug' => $request->input('slug') ?: Str::slug($request->input('name')),
            'img' => $imgPath,
            'status' => $request->has('status') ? true : false,
            'order' => $request->input('order')
        ]);

        setToastMessage('Brand created successfully', 'success');
        return redirect()->route('brands.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Brand $brand)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $brand = Brand::findOrFail($id);
        return view('admin-panel.brands.edit', compact('brand'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Brand $brand)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'img' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'order' => 'nullable|integer',
        ]);

        // Handle file upload if present
        $imgPath = $brand->img;
        if ($request->hasFile('img')) {
            $imgPath = $request->file('img')->store('brands', 'public');
        }

        $brand->update([
            'name' => $request->input('name'),
            'slug' => $request->input('slug') ?: Str::slug($request->input('name')),
            'img' => $imgPath,
            'status' => $request->has('status') ? true : false,
            'order' => $request->input('order')
        ]);

        setToastMessage('Brand updated successfully', 'success');
        return redirect()->route('brands.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $brand =Brand::findOrFail($id);
        $brand->delete();
        setToastMessage('Brand deleted successfully', 'success');
        return redirect()->route('brands.index');
    }
}
