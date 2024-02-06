<x-main-layout :title="config('app.name') . ' | ' . 'العملاء'">

    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">العملاء /</span> قائمة العملاء</h4>

    <!-- Basic Bootstrap Table -->
    <div class="card">
        <div class="d-flex justify-content-between align-items-center mb-3">

            {{-- title table --}}
            <h5 class="card-header">العملاء</h5>

        </div>
        <!-- A div for making the table horizontally scrollable -->
        <div class="table-responsive text-nowrap">

            <!-- The table element with Bootstrap classes for styling -->
            <table class="table table-hover table-striped">
                <thead>
                    <tr>
                        <th>الأسم</th>
                        <th>العنوان</th>
                        <th>الهاتف</th>
                        <th>تاريخ التسجيل</th>
                        <th>التحكم</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    @forelse($customers as $customer)
                        <tr>
                            <td>
                                <i class="fab fa-angular fa-lg text-danger me-3"></i>
                                <strong>
                                    <a href="{{ route('customers.show', $customer) }}">{{ $customer->name }}</a>
                                </strong>
                            </td>
                            <td>
                                {{ $customer->address }}
                            </td>
                            <td>
                                {{ $customer->phone }}
                            </td>
                            <td>
                                {{ $customer->created_at->diffForHumans() }}
                            </td>
                            <td>
                                <div class="dropdown">
                                    <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                        data-bs-toggle="dropdown"> <!-- Dropdown toggle button -->
                                        <i class="bx bx-dots-vertical-rounded"></i> <!-- Icon -->
                                    </button>
                                    <div class="dropdown-menu"> <!-- Dropdown menu items -->
                                        <a class="dropdown-item" href="{{ route('customers.edit', $customer) }}"><i
                                                class="bx bx-edit-alt me-1"></i>تعديل</a> <!-- Edit action -->
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td class="text-center" colspan="6"><strong>لا يوحد بيانات</strong></td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
            <!-- Pagination links -->
            <div class="mt-3 px-3">
                {{ $customers->links() }}
            </div>
        </div>

    </div>

</x-main-layout>
