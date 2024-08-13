<?php

namespace App\Http\Controllers;

use App\Http\Resources\CategoryResource;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['getAllCategories']]);
    }

    public function getAllCategory(Request $request)
    {
        return response()->json([
            'success' => true,
            'message' => 'Get all Categories successfully',
            'categories' => CategoryResource::collection(Category::getAllCategories())
        ]);
    }
}
