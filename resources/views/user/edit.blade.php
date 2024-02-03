<x-main-layout :title=" config('app.name') . ' | ' . ' تعديل بيانات ' . $user->first_name ">

    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light"><a href="{{ route('users.index') }}">الموظفون</a> /</span>
        تعديل بيانات موظف</h4>

    <div class="row">
        <div class="col-md-12">
            <!-- Profile Details -->
            <div class="card mb-4">
                <h5 class="card-header">بيانات {{ $user->first_name }}</h5>
                <div class="card-body">
                    <form action="{{ route('users.update', $user) }}" method="post">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="mb-3 col-md-6">
                                <label for="first_name" class="form-label">الأسم الأول</label>
                                <input class="form-control" type="text" id="first_name" name="first_name"
                                       required
                                       value="{{ old('first_name', $user->first_name) }}"/>
                                <x-input-error key="name"/>
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="username"
                                       class="form-label">الأسم الثاني</label>
                                <input type="text" class="form-control" id="last_name"
                                       required
                                       name="last_name" value="{{ old('last_name',$user->last_name) }}"/>
                                <x-input-error key="last_name"/>
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="email"
                                       class="form-label">البريد الإلكتروني</label>
                                <input class="form-control" type="text" id="email" name="email"
                                       required
                                       value="{{ old('email',$user->email) }}"/>
                                <x-input-error key="email"/>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label"
                                       for="phone">الهاتف</label>
                                <input type="text" id="phone" name="phone"
                                       required
                                       value="{{ old('phone',$user->phone) }}"
                                       class="form-control"/>
                                <x-input-error key="phone"/>
                            </div>
                        </div>

                        <div class="col col-md-6 ecommerce-select2-dropdown">
                            <label for="role"
                                   class="form-label">الدور</label>
                            <div class="select2-dark">
                                <select id="role" class="select2 form-select" name="role">
                                    <option>أختر دور</option>
                                    <option @selected( old('role', $user->role->value) == 1) value="1">مدير</option>
                                    <option @selected( old('role',$user->role->value) == 2) value="2">موظف</option>
                                </select>
                            </div>
                            <x-input-error key="role"/>
                        </div>

                        <div class="mt-4">
                            <button type="submit"
                                    class="btn btn-primary me-2">تحديث البيانات
                            </button>
                        </div>
                    </form>
                </div>
            </div>
            <!-- /Profile Details -->
        </div>
    </div>
</x-main-layout>
