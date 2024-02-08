<x-main-layout :title="config('app.name') . ' | ' . ' تعديل بيانات ' . $customer->first_name">

    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light"><a href="{{ route('customers.index') }}">العملاء</a>
            /</span>
        تعديل بيانات موظف</h4>

    <div class="row">
        <div class="col-md-12">
            <!-- Profile Details -->
            <div class="card mb-4">
                <h5 class="card-header">بيانات {{ $customer->first_name }}</h5>
                <div class="card-body">
                    <form action="{{ route('customers.update', $customer) }}" method="post">
                        @csrf
                        @method('PUT')
                        <div class="row">

                            {{-- first name --}}
                            <div class="mb-3 col-md-6">
                                <label for="first_name" class="form-label">الأسم الأول</label>
                                <input class="form-control" type="text" id="first_name" name="first_name" required
                                    value="{{ old('first_name', $customer->first_name) }}" />
                                <x-input-error key="first_name" />
                            </div>

                            {{-- last name --}}
                            <div class="mb-3 col-md-6">
                                <label for="customername" class="form-label">الأسم الثاني</label>
                                <input type="text" class="form-control" id="last_name" required name="last_name"
                                    value="{{ old('last_name', $customer->last_name) }}" />
                                <x-input-error key="last_name" />
                            </div>

                            {{-- address --}}
                            <div class="mb-3 col-md-6">
                                <label for="address" class="form-label">العنوان</label>
                                <input class="form-control" type="text" id="address" name="address" required
                                    value="{{ old('address', $customer->address) }}" />
                                <x-input-error key="address" />
                            </div>

                            {{-- phone --}}
                            <div class="col-md-6">
                                <label class="form-label" for="phone">الهاتف</label>
                                <input type="text" id="phone" name="phone" required
                                    value="{{ old('phone', $customer->phone) }}" class="form-control" />
                                <x-input-error key="phone" />
                            </div>
                        </div>

                        <div class="mt-4">
                            <button type="submit" class="btn btn-primary me-2">تحديث البيانات
                            </button>
                        </div>
                    </form>
                </div>
            </div>
            <!-- /Profile Details -->
        </div>
    </div>
</x-main-layout>
