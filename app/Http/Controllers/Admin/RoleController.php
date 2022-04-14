<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\RoleFormRequest;
use App\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function index()
    {
        $roles = Role::whereNot('name', 'Администратор')->orderBy('id')->get();
        return view('admin.roles.index', compact('roles'));
    }

    public function create()
    {
        return view('admin.roles.create');
    }

    public function store(RoleFormRequest $request)
    {
        $validated = $request->validated();

        Role::create($validated);

        return redirect(route('admin.roles.index'))->with([
            'roleCreated' => 'Роль успшно создана.'
        ]);
    }

    public function edit(Role $role)
    {
        return view('admin.roles.edit', compact('role'));
    }

    public function update(RoleFormRequest $request, Role $role)
    {
        $validated = $request->validated();

        $role->update($validated);

        return redirect(route('admin.roles.index'))->with([
            'roleUpdated' => 'Роль успшно изменена.'
        ]);
    }

    public function destroy(Role $role)
    {
        $role->delete();
        return redirect(route('admin.roles.index'))->with(['roleDeleted' => 'Роль была удалена.']);
    }
}
