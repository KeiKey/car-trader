<?php

namespace App\Http\Controllers;

use App\Http\Requests\RoleRequest;
use App\Services\RoleService;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Throwable;

class RoleController extends Controller
{
    private RoleService $roleService;

    public function __construct(RoleService $roleService)
    {
        $this->roleService = $roleService;
    }

    /**
     * Display a listing of the roles.
     *
     * @return View
     */
    public function index(): View
    {
        return view('roles.index', ['roles' => Role::query()->with('permissions:name')->get()]);
    }

    /**
     * Show the form for creating a new role.
     *
     * @return View
     */
    public function create(): View
    {
        return view('roles.create', ['permissions' => Permission::query()->pluck('name', 'id')]);
    }

    /**
     * Store a newly created role.
     *
     * @param RoleRequest $request
     * @return RedirectResponse
     */
    public function store(RoleRequest $request): RedirectResponse
    {
        $this->roleService->createRole($request->validated());

        return redirect()->route('roles.index');
    }

    /**
     * Show the form for editing the specified role.
     *
     * @param Role $role
     * @return View
     */
    public function edit(Role $role): View
    {
        return view('roles.edit', [
            'role'        => $role->load('permissions:id,name'),
            'permissions' => Permission::query()->pluck('name', 'id')
        ]);
    }

    /**
     * Update the specified role.
     *
     * @param RoleRequest $request
     * @param Role $role
     * @return RedirectResponse
     */
    public function update(RoleRequest $request, Role $role): RedirectResponse
    {
        $this->roleService->updateRole($role, $request->validated());

        return redirect()->route('roles.index');
    }

    /**
     * Remove the specified role.
     *
     * @param Role $role
     * @return RedirectResponse
     */
    public function destroy(Role $role): RedirectResponse
    {
        try {
            $this->roleService->deleteRole($role);

            return redirect()->route('roles.index');
        } catch (Throwable $exception) {
            return redirect()->route('roles.index');
        }
    }
}
