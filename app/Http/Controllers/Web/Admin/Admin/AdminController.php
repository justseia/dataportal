<?php

namespace App\Http\Controllers\Web\Admin\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Admin;
use Exception;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function index(): View
    {
        $admins = Admin::query();
        $admins = $admins->paginate(20);

        return view('admin.admin.index')
            ->with(compact('admins'));
    }

    public function create(): View
    {
        return view('admin.admin.create');
    }

    public function store(Request $request): RedirectResponse
    {
        try {
            $admin = Admin::query()->create([
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'email' => $request->email,
                'password' => Hash::make($request->password),

            ]);
        } catch (Exception $e) {
            return back()->withErrors('Ошибка при создании роли: ' . $e->getMessage());
        }

        return redirect()->route('admin.admins.show', $admin)
            ->with('success', 'Успешно создано');
    }

    public function show(Admin $admin): View
    {
        return view('admin.admin.show')
            ->with(compact('admin'));
    }

    public function update(Admin $admin, Request $request): RedirectResponse
    {
        try {
            $admin->update([
                'name' => $request->name,
            ]);
        } catch (Exception $e) {
            return back()->withErrors('Ошибка при обновлении роли: ' . $e->getMessage());
        }

        return back()->with('success', 'Успешно обновлено');
    }
}
