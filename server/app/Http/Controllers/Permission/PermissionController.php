<?php

namespace App\Http\Controllers\Permission;

use App\Http\Controllers\Controller;
use App\Http\Resources\PermissionResource;
use App\Models\Permission;
use Illuminate\Http\Request;

class PermissionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['']]);
    }

    public function getAllPermission()
    {


        $permissions = Permission::all();

        return response()->json([
            'success' => true,
            'permissions' => PermissionResource::collection($permissions)
        ], 200);
    }

    public function createPermission(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:permissions|min:3',
        ]);

        Permission::create([
            'name' => $request->name
        ]);

        $permissions = Permission::all();

        return response()->json([
            'success' => true,
            'message' => 'Permission created successfully!',
            'permissions' => PermissionResource::collection($permissions)
        ], 200);
    }

    public function updatePermission(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|min:3|unique:permissions,name,' . $id,
        ]);

        $permission = Permission::find($id);

        if (!$permission) {
            return response()->json([
                'success' => false,
                'message' => 'Permission not found'
            ], 404);
        }

        $permission->update([
            'name' => $request->name
        ]);


        $permissions = Permission::all();

        return response()->json([
            'success' => true,
            'message' => 'Permission updated successfully!',
            'permissions' => PermissionResource::collection($permissions)
        ], 200);
    }

    public function deletePermission($id)
    {

        $permission = Permission::find($id);

        if (!$permission) {
            return response()->json([
                'success' => false,
                'message' => 'Permission not found'
            ], 404);
        }

        $permission->delete();

        $permissions = Permission::all();

        return response()->json([
            'success' => true,
            'message' => 'Permission deleted successfully!',
            'permissions' => PermissionResource::collection($permissions)
        ], 200);
    }
}
