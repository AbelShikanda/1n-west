<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function index(Request $request)
    {
        $query = Admin::query();

        if ($request->filled('role')) {
            if ($request->role === 'admin') {
                $query->where('is_admin', true);
            } elseif ($request->role === 'staff') {
                $query->where('is_staff', true);
            }
        }

        if ($request->filled('search')) {
            $search = trim((string) $request->input('search'));
            $query->where(function ($query) use ($search) {
                $query->where('name', 'like', "%{$search}%")
                    ->orWhere('username', 'like', "%{$search}%")
                    ->orWhere('email', 'like', "%{$search}%");
            });
        }

        $admins = $query->latest()->paginate(10)->withQueryString();

        return view('admin.admins.index', compact('admins'));
    }

    public function create()
    {
        return view('admin.admins.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:admins,username',
            'email' => 'required|string|email|max:255|unique:admins,email',
            'password' => 'required|string|min:8',
            'is_admin' => 'boolean',
            'is_staff' => 'boolean',
        ]);

        $validated['is_admin'] = $request->boolean('is_admin');
        $validated['is_staff'] = $request->boolean('is_staff');

        Admin::create($validated);

        return redirect()
            ->route('admin.admins.index')
            ->with('success', 'Admin created successfully.');
    }

    public function show(Admin $admin)
    {
        return view('admin.admins.show', compact('admin'));
    }

    public function edit(Admin $admin)
    {
        return view('admin.admins.edit', compact('admin'));
    }

    public function update(Request $request, Admin $admin)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:admins,username,' . $admin->id,
            'email' => 'required|string|email|max:255|unique:admins,email,' . $admin->id,
            'password' => 'nullable|string|min:8',
            'is_admin' => 'boolean',
            'is_staff' => 'boolean',
        ]);

        if (empty($validated['password'])) {
            unset($validated['password']);
        }

        $validated['is_admin'] = $request->boolean('is_admin');
        $validated['is_staff'] = $request->boolean('is_staff');

        $admin->update($validated);

        return redirect()
            ->route('admin.admins.index')
            ->with('success', 'Admin updated successfully.');
    }

    public function destroy(Admin $admin)
    {
        if (Auth::guard('admin')->id() === $admin->id) {
            return redirect()
                ->route('admin.admins.index')
                ->with('error', 'You cannot delete your own account.');
        }

        $admin->delete();

        return redirect()
            ->route('admin.admins.index')
            ->with('success', 'Admin deleted successfully.');
    }
}
