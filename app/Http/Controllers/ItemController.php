<?php

namespace App\Http\Controllers;

use App\Http\Requests\Item\ItemStoreRequest;
use App\Http\Requests\Item\ItemUpdateRequest;
use App\Models\Item;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    public function index()
    {
        return view(
            'item.index',
            [
                'items' => Item::paginate()
            ]
        );
    }

    public function create()
    {
        return view('item.create');
    }

    public function store(ItemStoreRequest $request)
    {
        try {
            Item::create($request->validated());
        } catch (\Exception $e) {
            toast('حدث خطأ اتثاء محاولة اضافة الصنف', 'error');
            return to_route('items.index');
        }
        toast('تم إضافة الصنف بنجاح', 'success');
        return to_route('items.index');
    }

    public function edit(Item $item)
    {
        return view(
            'item.edit',
            [
                'item' => $item
            ]
        );
    }

    public function update(ItemUpdateRequest $request, Item $item)
    {
        try {
            $item->update($request->validated());
        } catch (\Exception $e) {
            toast('حدث خطأ اتثاء محاولة تعديل بيانات الصنف', 'error');
            return to_route('items.index');
        }
        toast('تم تحديث بيانات الصنف بنجاح', 'success');
        return to_route('items.index');
    }

    public function destroy(Item $item)
    {
        try {
            $item->delete();
        } catch (\Exception $e) {
            return to_route('items.index');
        }
        return to_route('items.index');
    }
}