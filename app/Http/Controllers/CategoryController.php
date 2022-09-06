<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequest;
use App\Models\Category\Category;
use App\Services\CategoryService;
use Exception;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Lang;
use Illuminate\View\View;

class CategoryController extends Controller
{
    private CategoryService $categoryService;

    public function __construct(CategoryService $categoryService)
    {
        $this->categoryService = $categoryService;
    }

    /**
     * Display a listing of the categories.
     *
     * @return View
     */
    public function index(): View
    {
        return view('categories.index', ['categories' => Category::all()]);
    }

    /**
     * Show the form for creating a new category.
     *
     * @return View
     */
    public function create(): View
    {
        return view('categories.create');
    }

    /**
     * Store a newly created category.
     *
     * @param CategoryRequest $request
     * @return RedirectResponse
     */
    public function store(CategoryRequest $request): RedirectResponse
    {
        try {
            $category = $this->categoryService->createCategory($request->validated());

            return RedirectResponse::success('categories.index', Lang::get('general.create_success', ['title' => $category->name]));
        } catch (Exception $exception) {
            return RedirectResponse::error(null, $exception->getMessage());
        }
    }

    /**
     * Show the form for editing the specified category.
     *
     * @param Category $category
     * @return View
     */
    public function edit(Category $category): View
    {
        return view('categories.edit', ['category' => $category]);
    }

    /**
     * Update the specified category.
     *
     * @param CategoryRequest $request
     * @param Category $category
     * @return RedirectResponse
     */
    public function update(CategoryRequest $request, Category $category): RedirectResponse
    {
        try {
            $category = $this->categoryService->updateCategory($category, $request->validated());

            return RedirectResponse::success('categories.index', Lang::get('general.update_success', ['title' => $category->name]));
        } catch (Exception $exception) {
            return RedirectResponse::error(null, $exception->getMessage());
        }
    }

    /**
     * Remove the specified category.
     *
     * @param Category $category
     * @return RedirectResponse
     */
    public function destroy(Category $category): RedirectResponse
    {
        try {
            $this->categoryService->deleteCategory($category);

            return RedirectResponse::success('categories.index', Lang::get('general.delete_success', ['title' => $category->name]));
        } catch (Exception $exception) {
            return RedirectResponse::error(null, $exception->getMessage());
        }
    }
}
