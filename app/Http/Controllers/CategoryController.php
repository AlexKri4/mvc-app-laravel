<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreCategoryRequest;
use Illuminate\Http\JsonResponse;
use App\Models\Category;
use App\Http\Resources\CategoryResource;
use App\Services\CategoryService;

class CategoryController extends Controller
{
    private CategoryService $service;

    public function __construct(CategoryService $service)
    {
        $this->service = $service;
    }


    public function index(): JsonResponse 
    {
        return $this->service->index();
    }

    public function store(StoreCategoryRequest $request): JsonResponse
    {
        $data = $request->all();
            return $this->store($request->validated());
    }

    public function update(UpdateCategoryRequest $request, Category $category): JsonResponse
    {
        return $this->service->update($request->validated(), $category);
    }

    public function destroy(Category $category): JsonResponse
    {
       return $this->service->destroy($category);
    }
}
