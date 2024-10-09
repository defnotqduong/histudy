<?php

namespace App\Http\Controllers\Permission;

use App\Http\Controllers\Controller;
use App\Http\Resources\RoleResource;
use App\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['']]);
    }

    public function getAllRole()
    {
        $roles = Role::orderBy('created_at', 'asc')->get();

        return response()->json([
            'success' => true,
            'roles' => RoleResource::collection($roles)
        ], 200);
    }

    public function getRole($id)
    {
        $role = Role::find($id);

        if (!$role) {
            return response()->json([
                'success' => false,
                'message' => 'Role not found'
            ], 404);
        }

        return response()->json([
            'success' => true,
            'role' => new RoleResource($role)
        ], 200);
    }

    public function createRole(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:roles|min:3',
            'permissions' => 'array',
            'permissions.*' => 'exists:permissions,id',
        ]);

        $role = Role::create([
            'name' => $request->name
        ]);

        if (!empty($request->permissions)) {
            $role->permissions()->attach($request->permissions);
        }

        $roles = Role::all();

        return response()->json([
            'success' => true,
            'message' => 'Role created successfully!',
            'roles' => RoleResource::collection($roles)
        ], 200);
    }

    public function updateRole(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|min:3|unique:roles,name,' . $id,
            'permissions' => 'array',
            'permissions.*' => 'exists:permissions,id',
        ]);

        $role = Role::find($id);

        if (!$role) {
            return response()->json([
                'success' => false,
                'message' => 'Role not found'
            ], 404);
        }

        $role->update([
            'name' => $request->name
        ]);

        $currentPermissions = $role->permissions()->pluck('id')->toArray();

        $newPermissions = $request->permissions ?? [];

        $permissionsToAttach = array_diff($newPermissions, $currentPermissions);

        $permissionsToDetach = array_diff($currentPermissions, $newPermissions);

        if (!empty($permissionsToAttach)) {
            $role->permissions()->attach($permissionsToAttach);
        }

        if (!empty($permissionsToDetach)) {
            $role->permissions()->detach($permissionsToDetach);
        }

        $roles = Role::all();

        return response()->json([
            'success' => true,
            'message' => 'Role updated successfully!',
            'roles' => RoleResource::collection($roles)
        ], 200);
    }

    public function deleteRole($id)
    {

        $role = Role::find($id);

        if (!$role) {
            return response()->json([
                'success' => false,
                'message' => 'Role not found'
            ], 404);
        }

        $role->delete();

        $roles = Role::all();

        return response()->json([
            'success' => true,
            'message' => 'Permission deleted successfully!',
            'roles' => RoleResource::collection($roles)
        ], 200);
    }
}
