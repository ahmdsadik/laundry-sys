<?php

namespace App\Http\Controllers;

use App\Enums\UserStatus;
use App\Http\Requests\User\UserStoreRequest;
use App\Http\Requests\User\UserUpdateRequest;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        return view('user.index',
            [
                'users' => User::whereNot('id', auth()->id())->paginate()
            ]
        );
    }

    public function create()
    {
        return view('user.create');
    }

    public function store(UserStoreRequest $request)
    {
        try {
            User::create($request->validated());
        } catch (\Exception $e) {
            toast('حدث خطأ اتثاء محاولة اضافة مستخدم', 'error');
            return to_route('users.index');
        }
        toast('تم إضافة مستخدم بنجاح', 'success');
        return to_route('users.index');
    }

//    public function show(User $user)
//    {
//    }

    public function edit(User $user)
    {
        return view('user.edit',
            [
                'user' => $user
            ]
        );
    }

    public function update(UserUpdateRequest $request, User $user)
    {
        try {
            $user->update($request->validated());
        } catch (\Exception $e) {
            toast('حدث خطأ اتثاء محاولة تعديل بيانات مستخدم', 'error');
            return to_route('users.index');
        }
        toast('تم تحديث بيانات مستخدم بنجاح', 'success');
        return to_route('users.index');
    }

    public function destroy(User $user)
    {
        try {
            $user->delete();
        } catch (\Exception $e) {
            toast('حدث خطأ اتثاء محاولة حذف مستخدم', 'error');
            return to_route('users.index');
        }
        toast('تم حذف مستخدم بنجاح', 'success');
        return to_route('users.index');
    }

    public function resetPassword(User $user)
    {
        try {
            $user->update(['password' => User::DEFAULT_PASSWORD]);
        } catch (\Exception $e) {
            toast('حدث خطأ اتثاء إستعادة كلمة مرور مستخدم', 'error');
            return to_route('users.index');
        }
        toast('تم إستعادة كلمة مرور مستخدم بنجاح', 'success');
        return to_route('users.index');
    }

    public function toggleSuspension(User $user)
    {
        try {
            $status = $user->status === UserStatus::ACTIVE ? UserStatus::SUSPENDED : UserStatus::ACTIVE;
            $user->update(['status' => $status]);
        } catch (\Exception $e) {
            toast('حدث خطأ اتثاء محاولة تغيير حالة مستخدم', 'error');
            return to_route('users.index');
        }
        toast('تم تغيير حالة مستخدم بنجاح', 'success');
        return to_route('users.index');
    }
}
