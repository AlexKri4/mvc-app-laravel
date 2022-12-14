<?php

namespace App\Services;

use App\Models\Category;
use App\Http\Resources\CategoryResource;

class CategoryService 
{
    public function index()
    {
       return response()->json(CategoryResource::collection(Category::all()));
    }

    public function store(array $categoryData): JsonResponse
    {
        $category = Category::create([
            'name' => $categoryData ['name'],
            'description' => $categoryData ['description'],
            'type' => $categoryData ['type']
        ]);
        return response()->json(['id' => $category -> id]);
    }

    public function update(array $categoryData, Category $category): JsonResponse
    {
            $category-> name = $categoryData ['name'];
            $category->description = $categoryData ['description'];
            $category->type = $categoryData ['type'];

            $category->save();

            return response()->json($category);
    }

    public function destroy(Category $category): JsonResponse
    {
        return response()->json($category->delete());
    }
}