<?php

namespace App\Http\Controllers;

use App\Http\Requests\ItemService\ItemServiceStoreRequest;
use App\Http\Requests\ItemService\ItemServiceUpdateRequest;
use App\Models\Item;
use App\Models\ItemService;
use App\Models\Service;

class ItemServiceController extends Controller
{
    public function index()
    {
        return view('item-service.index',
            [
                'itemServices' => ItemService::with(['service', 'item'])->paginate()
            ]
        );
    }

    public function create()
    {
        return view('item-service.create',
            [
                'services' => Service::get(['id', 'name']),
                'items' => Item::get(['id', 'name']),
            ]
        );
    }

    public function store(ItemServiceStoreRequest $request)
    {
        try {
            ItemService::create($request->validated());
        } catch (\Exception $e) {
            return to_route('items-services.index');
        }
        return to_route('items-services.index');
    }

//    public function show(ItemService $itemService)
//    {
//    }

    public function edit(ItemService $itemService)
    {
        return view('item-service.edit',
            [
                'ItemService' => $itemService
            ]
        );
    }

    public function update(ItemServiceUpdateRequest $request, ItemService $itemService)
    {
        try {
            $itemService->update($request->validated());
        } catch (\Exception $e) {
            return to_route('items-services.index');
        }
        return to_route('items-services.index');
    }

    public function destroy(ItemService $itemService)
    {
        try {
            $itemService->delete();
        } catch (\Exception $e) {
            return to_route('items-services.index');
        }
        return to_route('items-services.index');
    }
}
