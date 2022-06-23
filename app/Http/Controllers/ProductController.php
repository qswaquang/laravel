<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use Illuminate\Contracts\Support\Jsonable;

class ProductController extends Controller
{

    public function index()
    {
        $products = Product::with('category')->paginate(10);
        return view('product-list')->with(['products' => $products]);
    }

    public function create()
    {
        $categories = Category::root()->with('children')->get();
        return view('product-form')->with(['editmode' => false, 'categories'=> $categories]);
    }


    public function store(StoreProductRequest $request)
    {
        $product = Product::create($request->all())->id;
        $categories = Category::root()->with('children')->get();
        return redirect()->route('admin.products.edit', ['editmode' => true, 'categories'=> $categories, 'product' => $product]);
    }


    public function show(Product $product)
    {
        
    }

    public function edit(Product $product)
    {
        $categories = Category::root()->with('children')->get();
        return view('product-form')->with(['editmode' => true, 'categories'=> $categories, 'product' => $product]);
    }

    public function update(UpdateProductRequest $request, Product $product)
    {
        $product->update($request->all());
        return redirect()->route('admin.products.index');
    }

    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('admin.products.index');
    }
}
