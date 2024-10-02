<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::all();
        return view('admin-panel.products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        $brands = Brand::all();
        return view('admin-panel.products.create', compact('categories', 'brands'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
       
        $product = new Product();
        $product->name = $request->name;
        $product->slug = $request->slug ?: Str::slug($request->name);
        $product->description = $request->description;
        $product->short_description = $request->short_description;
        $product->price = $request->price;
        $product->discount_price = $request->discount_price;
        $product->stock_quantity = $request->stock_quantity;
        $product->sku = $request->sku;
        $product->category_id = $request->category_id;
        $product->brand_id = $request->brand_id;
        $product->meta_title = $request->meta_title;
        $product->meta_description = $request->meta_description;
        $product->meta_keywords = $request->meta_keywords;
        $product->weight = $request->weight;
        $product->dimensions = $request->dimensions;
        $product->color = $request->color;
        $product->size = $request->size;
        $product->tags = $request->tags;
        $product->status = $request->has('status') ? true : false;


        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('products', 'public');
            $product->image = $imagePath;
        }

        if ($request->hasFile('gallery')) {
            $gallery = [];
            foreach ($request->file('gallery') as $file) {
                $path = $file->store('products', 'public');
                $gallery[] = $path;
            }
            $product->gallery = json_encode($gallery);
        }
        $product->save();
        setToastMessage('Product Created successfully.', 'success');
        return redirect()->back();


    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $product = Product::findOrFail($id);
        $categories = Category::all();
        $brands = Brand::all();
        return view('admin-panel.products.edit', compact('product', 'categories', 'brands'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);
        $product->name = $request->name;
        $product->slug = $request->slug ?: Str::slug($request->name);
        $product->description = $request->description;
        $product->short_description = $request->short_description;
        $product->price = $request->price;
        $product->discount_price = $request->discount_price;
        $product->stock_quantity = $request->stock_quantity;
        $product->sku = $request->sku;
        $product->category_id = $request->category_id;
        $product->brand_id = $request->brand_id;
        $product->meta_title = $request->meta_title;
        $product->meta_description = $request->meta_description;
        $product->meta_keywords = $request->meta_keywords;
        $product->weight = $request->weight;
        $product->dimensions = $request->dimensions;
        $product->color = $request->color;
        $product->size = $request->size;
        $product->tags = $request->tags;
        $product->status = $request->has('status') ? true : false;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('products', 'public');
            $product->image = $imagePath;
        }
        if ($request->hasFile('gallery')) {
            $gallery = [];
            foreach ($request->file('gallery') as $file) {
                $path = $file->store('products', 'public');
                $gallery[] = $path;
            }
            $product->gallery = json_encode($gallery);
        }
        $product->save();
        setToastMessage('Product updated successfully.', 'success');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();
        setToastMessage('Product deleted successfully', 'success');
        return redirect()->route('products.index');
    }
}
