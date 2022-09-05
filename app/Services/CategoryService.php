<?php

namespace App\Services;

use App\Models\Category\Category;
use Exception;

class CategoryService
{
    /**
     * Create a new category.
     *
     * @param array $categoryData
     * @return Category
     */
    public function createCategory(array $categoryData): Category
    {
        return Category::query()->create(['name' => $categoryData['name']]);
    }

    /**
     * Update an existing category.
     *
     * @param Category $category
     * @param array $categoryData
     * @return Category
     */
    public function updateCategory(Category $category, array $categoryData): Category
    {
        $category->update(['name' => $categoryData['name']]);

        return $category;
    }

    /**
     * Delete a category.
     *
     * @param Category $category
     * @return void
     * @throws Exception
     */
    public function deleteCategory(Category $category): void
    {
        $category->delete();
    }
}
