<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::root()->with('children')->withCount('products')->get();
        $categories = Category::sumProductCountChild($categories);
        return view('category-list')->with('categories', $categories);
    }

    public function create($id)
    {

        return view('category-form')->with(['parent_id' => $id, 'editmode' => false]);
    }

    public function store(StoreCategoryRequest $request)
    {

        $category = $request->all();
        $category['published'] = $request->has('published');
        $category['parent_id'] = $category['parent_id'] == 0 ? null : $category['parent_id'];
        Category::create($category);
        return redirect()->route('admin.categories.index');
    }

    public function show(Category $category)
    {
        //
    }

    public function edit(Category $category)
    {
        return view('category-form')->with(['category'=> $category, 'editmode' => true]);
    }

    public function update(UpdateCategoryRequest $request, Category $category)
    {
        $categoryEdited = $request->all();
        $categoryEdited['published'] = $request->has('published');
        $category->update($categoryEdited);
        return redirect()->route('admin.categories.index');
    }

    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->route("admin.categories.index");
    }

    public function getAll()
    {
        $categories = Category::root()->with('children')->withCount('products')->get();
        $categories = Category::sumProductCountChild($categories);
        return $categories;
    }
}
