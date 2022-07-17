<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Category;
use App\Models\Image;
use App\Models\Product;
use App\Repositories\CategoryRepositoryInterface;
use App\Repositories\ProductRepositoryInterface;
use Illuminate\Contracts\Support\Jsonable;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    protected $productRepo;
    protected $categoryRepo;

    public function __construct(ProductRepositoryInterface $productRepo ,CategoryRepositoryInterface $categoryRepo)
    {
        $this->productRepo = $productRepo;
        $this->categoryRepo = $categoryRepo;
    }

    public function index(Request $filters)
    {
        $products = $this->productRepo->getProducts($filters);
        $categories = $this->categoryRepo->getAll();
        return view('product-list')->with(['products' => $products, 'categories'=> $categories, 'filters' => $filters]);
    }

    public function create()
    {
        $categories = $this->categoryRepo->getAll();
        return view('product-form')->with(['editmode' => false, 'categories'=> $categories]);
    }


    public function store(StoreProductRequest $request)
    {
        $product = $this->productRepo->create($request->all())->id;
        $categories = $this->categoryRepo->getAll();
        return redirect()->route('admin.products.edit', ['editmode' => true, 'categories'=> $categories, 'product' => $product]);
    }


    public function show(Product $product)
    {
        
    }

    public function edit(Product $product)
    {
        // dd($product);
        $categories = Category::root()->with('children')->get();
        return view('product-form')->with(['editmode' => true, 'categories'=> $categories, 'product' => $product]);
    }

    public function update(UpdateProductRequest $request, $id)
    {
        $this->productRepo->update($request->all(), $id);

        return redirect()->route('admin.products.index');
    }

    public function destroy($id)
    {
        $this->productRepo->delete($id);
        return redirect()->route('admin.products.index');
    }
}
