<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreEntryRequest;
use Illuminate\Http\JsonResponse;
use App\Models\Entry;
use App\Http\Resources\CategoryResource;
use App\Services\EntryService;

class EntryController extends Controller
{
    private EntryService $service;

    public function __construct(EntryService $service)
    {
        $this->service = $service;
    }


    public function index(): JsonResponse 
    {
        return $this->service->index();
    }

    public function store(StoreEntryRequest $request): JsonResponse
    {
        $data = $request->all();
            return $this->store($request->validated());
    }

    public function update(UpdateEntryRequest $request, Entry $entry): JsonResponse
    {
        return $this->service->update($request->validated(), $entry);
    }

    public function destroy(Entry $entry): JsonResponse
    {
       return $this->service->destroy($entry);
    }
}
