<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Models\Category;
use App\Repositories\CategoryRepositoryInterface;

class CategoryController extends Controller
{
    protected $categoryRepo;

    public function __construct(CategoryRepositoryInterface $categoryRepo)
    {
        $this->categoryRepo = $categoryRepo;
    }

    public function index()
    {
        $categoriesChildCount = $this->categoryRepo->getCategories();
        $categoriesParentCount = Category::sumProductCountChild($categoriesChildCount);
        return view('category-list')->with('categories', $categoriesParentCount);
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
        $this->categoryRepo->create($category);
        return redirect()->route('admin.categories.index');
    }

    public function show($id)
    {
        //
    }

    public function edit(Category $category)
    {
        return view('category-form')->with(['category'=> $category, 'editmode' => true]);
    }

    public function update(UpdateCategoryRequest $request, $id)
    {
        $categoryEdited = $request->all();
        $categoryEdited['published'] = $request->has('published');

        $this->categoryRepo->update($categoryEdited, $id);
        return redirect()->route('admin.categories.index');
    }

    public function destroy($id)
    {
        $this->categoryRepo->delete($id);
        return redirect()->route("admin.categories.index");
    }
}
