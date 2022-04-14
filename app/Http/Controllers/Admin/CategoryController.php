<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Categories\CreateCategoryRequest;
use App\Http\Requests\CategoryFormRequest;
use App\Models\Category;
use function redirect;
use function view;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::orderBy('id')->get();
        return view('admin.categories.index', compact('categories'));
    }

    public function create()
    {
        return view('admin.categories.create');
    }

    public function store(CategoryFormRequest $request)
    {
        $validated = $request->validated();

        Category::create($validated);

        return redirect(route('admin.categories.index'))->with([
            'categoryCreated' => 'Категория успшно создана.'
        ]);
    }

    public function edit(Category $category)
    {
        return view('admin.categories.edit', compact('category'));
    }

    public function update(CategoryFormRequest $request, Category $category)
    {
        $validated = $request->validated();

        $category->update($validated);

        return redirect(route('admin.categories.index'))->with([
            'categoryUpdated' => 'Категория успшно изменена.'
        ]);
    }

    public function destroy(Category $category)
    {
        $category->delete();
        return redirect(route('admin.categories.index'))->with(['categoryDeleted' => 'Категория была удалена.']);
    }
}
