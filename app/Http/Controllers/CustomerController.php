<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Http\Requests\StoreCustomerRequest;
use App\Http\Requests\UpdateCustomerRequest;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view(
            'customer.index',
            [
                'customers' => Customer::paginate()
            ]
        );
    }

    /**
     * Show the form for creating a new resource.
     */

    /**
     * Display the specified resource.
     */
    public function show(Customer $customer)
    {
        return view(
            'customer.show',
            [
                'customer' => $customer->load('orders')
            ]
        );
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Customer $customer)
    {
        return view(
            'customer.edit',
            [
                'customer' => $customer
            ]
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCustomerRequest $request, Customer $customer)
    {
        try {
            $customer->update($request->validated());
        } catch (\Exception $e) {
            toast('حدث خطأ اتثاء محاولة تعديل بيانات مستخدم', 'error');
            return to_route('customers.index');
        }
        toast('تم تحديث بيانات مستخدم بنجاح', 'success');
        return to_route('customers.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Customer $customer)
    {
        //
    }
}
