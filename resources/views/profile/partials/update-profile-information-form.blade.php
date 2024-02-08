<h5 class="card-header">معلومات عامة</h5>

<div class="card-body">
    <form action="{{ route('profile.update') }}" method="post">
        @csrf
        @method('PATCH')

        <div class="row">
            <div class="mb-3 col-md-6">
                <label for="first_name" class="form-label">الأسم الأول</label>
                <input class="form-control" type="text" id="first_name" name="first_name"
                       value="{{ old('first_name', $user->first_name) }}"/>
                <x-input-error key="first_name"/>
            </div>
            <div class="mb-3 col-md-6">
                <label for="last_name" class="form-label">الأسم الأخير</label>
                <input type="text" class="form-control" id="last_name"
                       name="last_name" value="{{ old('last_name', $user->last_name) }}"/>
                <x-input-error key="last_name"/>
            </div>
            <div class="mb-3 col-md-6">
                <label for="email" class="form-label">البريد الألكتروني</label>
                <input class="form-control" type="text" id="email" name="email"
                       value="{{ old('email', $user->email) }}"/>
                <x-input-error key="email"/>
            </div>
            <div class="mb-3 col-md-6">
                <label class="form-label" for="phone">الهاتف</label>
                    <input type="text" id="phone" name="phone"
                           value="{{ old('phone', $user->phone) }}"
                           class="form-control"/>
                    <x-input-error key="phone"/>
            </div>
        </div>
        <div class="mt-2">
            <button type="submit" class="btn btn-primary me-2">حفظ التعديل</button>
        </div>
    </form>
</div>
<!-- /Account -->
