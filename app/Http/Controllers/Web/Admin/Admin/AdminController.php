<?php

namespace App\Http\Controllers\Web\Admin\Admin;

use App\Enums\AdminPermissions;
use App\Http\Controllers\Controller;
use App\Http\Requests\Web\Admin\Admin\StoreRequest;
use App\Http\Requests\Web\Admin\Admin\UpdateRequest;
use App\Models\Admin\Admin;
use Exception;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function index(): View
    {
        $admins = Admin::query();
        $admins->whereDoesntHave('roles', function ($query) {
            $query->where('name', 'super_admin');
        });
        $admins->whereNot('id', auth()->id());
        $admins = $admins->paginate(20);

        return view('admin.admin.index')
            ->with(compact('admins'));
    }

    public function create(): View
    {
        $permissionTypes = AdminPermissions::getAdminPermissions();

        return view('admin.admin.create')
            ->with(compact('permissionTypes'));
    }

    public function store(StoreRequest $request): RedirectResponse
    {
        try {
            $adminValidateData = collect($request->validated())->except('permissions')->toArray();

            DB::beginTransaction();
            $admin = Admin::query()->create($adminValidateData);

            $admin->syncPermissions($request->only('permissions'));
            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
            return back()->withInput()->withErrors('Ошибка при создании роли: ' . $e->getMessage());
        }

        return redirect()->route('admin.admins.show', $admin)
            ->with('success', 'Успешно создано');
    }

    public function show(Admin $admin): View
    {
        $permissionTypes = AdminPermissions::getAdminPermissions();

        return view('admin.admin.show')
            ->with(compact('permissionTypes'))
            ->with(compact('admin'));
    }

    public function update(Admin $admin, UpdateRequest $request): RedirectResponse
    {
        try {
            $adminValidateData = collect($request->validated())->except('permissions')->toArray();

            if (empty($adminValidateData['password'])) {
                unset($adminValidateData['password']);
            }

            DB::beginTransaction();
            $admin->update($adminValidateData);

            $admin->syncPermissions($request->only('permissions'));
            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
            return back()->withInput()->withErrors('Ошибка при обновлении роли: ' . $e->getMessage());
        }

        return back()->with('success', 'Успешно обновлено');
    }

    public function delete(Admin $admin): RedirectResponse
    {
        try {
            DB::beginTransaction();
            $admin->delete();
            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
            return back()->withInput()->withErrors('Ошибка при обновлении роли: ' . $e->getMessage());
        }

        return redirect()->route('admin.admins.index')->with('success', 'Успешно удалено');
    }
}
