<x-main-layout :title="config('app.name') . ' | ' . 'العملاء'">

    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">العملاء /</span> تفاصيل العميل</h4>

    <!-- Basic Bootstrap Table -->
    <div class="card mb-5">
        <h5 class="card-header">تفاصيل العميل {{ $customer->name }}</h5>
        <div class="row gy-2 px-4 card-body">
            <div class="col-md-6">
                <h5> الاسم: {{ $customer->name }}</h5>
            </div>
            <div class="col-md-6">
                <h5> العنوان: {{ $customer->address }}</h5>
            </div>
            <div class="col-md-6">
                <h5> رقم الهاتف: {{ $customer->phone }}</h5>
            </div>
        </div>
        <!-- A div for making the table horizontally scrollable -->


    </div>
    <div class="card">
        <div class="d-flex justify-content-between align-items-center mb-3">

            {{-- title table --}}
            <h5 class="card-header">طلبات العميل السابقه</h5>

            {{-- button create --}}

        </div>
        <!-- A div for making the table horizontally scrollable -->
        <div class="table-responsive text-nowrap">

            <!-- The table element with Bootstrap classes for styling -->
            <table class="table table-hover table-striped">
                <thead>
                    <tr>
                        <th>رقم الطلب</th>
                        <th>الاجمالى</th>
                        <th>الحاله الطلب</th>
                        <th>حاله الدفع </th>
                        <th>التحكم</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    @forelse($customer->orders as $order)
                        <tr>
                            <td>
                                <i class="fab fa-angular fa-lg text-danger me-3"></i>
                                <strong>
                                    <a href="{{ route('orders.show', $order) }}">{{ $order->order_code }}</a>
                                </strong>

                            </td>
                            <td>
                                {{ $order->total_price }}
                            </td>
                            <td>
                                {{ $order->readable_status }}
                            </td>
                            <td>
                                {{ $order->readable_payment_status }}
                            </td>
                            <td>
                                <div class="dropdown">
                                    <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                        data-bs-toggle="dropdown">
                                        <i class="bx bx-dots-vertical-rounded"></i>
                                    </button>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="{{ route('customers.edit', $customer) }}"><i
                                                class="bx bx-edit-alt me-1"></i>تعديل</a>
                                    </div>
                                    @if (auth()->user()->isAdmin())
                                        <form method="POST" action="{{ route('orders.destroy', $order) }}">
                                            @csrf
                                            @method('DELETE')
                                            <a class="dropdown-item" href="{{ route('orders.destroy', $order) }}"
                                                style="text-align:start"
                                                onclick="event.preventDefault(); if (confirm('هل تريد حذف الطلب من النظام ؟')) { this.closest('form').submit(); }">
                                                <i class="bx bx-trash me-1"></i>حذف
                                            </a>
                                        </form>
                                    @endif
                                </div>
                            </td>
                        </tr>
                    @empty <!-- If there are no customers -->
                        <tr>
                            <td class="text-center" colspan="6"><strong>لا يوحد بيانات</strong></td>
                            <!-- Table row with a message for no data -->
                        </tr>
                    @endforelse
                </tbody>
            </table>
            <!-- Pagination links -->
            {{-- <div class="mt-3 px-3">
                {{ $customers->links() }}
            </div> --}}
        </div>

    </div>



</x-main-layout>
