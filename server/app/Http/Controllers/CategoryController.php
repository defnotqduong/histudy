<?php

namespace App\Http\Controllers;

use App\Http\Requests\ImageRequest;
use App\Http\Resources\CategoryResource;
use App\Models\Category;
use App\Services\UploadService;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

    protected $uploadService;

    public function __construct(UploadService $uploadService)
    {
        $this->middleware('auth:api', ['except' => ['getAllCategory', 'getPopularCategories']]);

        $this->middleware(['role:admin'], [
            'only' => [
                'getAllCategoryForInstructor',
                'getCategoryForInstructor',
                'createCategory',
                'updateCategory',
                'updateCategoryLogo',
                'publishCategory',
                'unpublishCategory',
                'deleteCategory'
            ]
        ]);

        $this->uploadService = $uploadService;
    }

    public function getAllCategory(Request $request)
    {
        return response()->json([
            'success' => true,
            'message' => 'Get all Categories successfully',
            'categories' => CategoryResource::collection(Category::getAllCategories())
        ], 200);
    }

    public function getPopularCategories()
    {
        return response()->json([
            'success' => true,
            'message' => 'Get popular categories successfully',
            'topics' => CategoryResource::collection(Category::getPopularCategories())
        ], 200);
    }


    public function getAllCategoryForInstructor()
    {
        $categories = Category::all();

        return response()->json([
            'success' => true,
            'message' => 'Get all Categories successfully',
            'categories' => CategoryResource::collection($categories)
        ], 200);
    }

    public function getCategoryForInstructor($id)
    {
        $category = Category::find($id);

        if (!$category) {
            return response()->json([
                'success' => false,
                'message' => 'Category not found',
            ], 404);
        }

        return response()->json([
            'success' => true,

            'category' => new CategoryResource($category),
        ], 200);
    }

    public function createCategory(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:categories,name',
        ]);

        Category::create([
            'name' => $request->name
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Category created successfully',
        ], 200);
    }

    public function updateCategory(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:categories,name,' . $id,
        ]);

        $category = Category::find($id);

        if (!$category) {
            return response()->json([
                'success' => false,
                'message' => 'Category not found',
            ], 404);
        }

        $category->update([
            'name' => $request->name
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Category updated successfully',
        ], 200);
    }

    public function updateCategoryLogo(ImageRequest $request, $id)
    {
        $category = Category::find($id);

        if (!$category) {
            return response()->json([
                'success' => false,
                'message' => 'Category not found',
            ], 404);
        }

        if ($request->hasFile('image')) {

            $file = $request->file('image');

            $uploadResult = $this->uploadService->multipartUploaderToS3('images', $file);

            if ($uploadResult['status']) {

                if ($category->logo_url) {
                    $this->uploadService->deleteObjectS3($category->logo_url);
                }

                $category->update([
                    'logo_url' => $uploadResult['filePath'],
                ]);

                return response()->json([
                    'success' => true,
                    'message' => 'Category updated successfully',
                    'category' => new CategoryResource($category)
                ], 200);
            }
            return response()->json([
                'success' => false,
                'message' => 'Failed to upload image.',
            ], 500);
        }

        return response()->json([
            'success' => false,
            'message' => 'No file uploaded.',
        ], 400);
    }

    public function publishCategory($id)
    {
        $category = Category::find($id);

        if (!$category) {
            return response()->json([
                'success' => false,
                'message' => 'Category not found',
            ], 404);
        }

        if ($category->is_published) {
            return response()->json([
                'success' => false,
                'message' => 'Category has already been published',
            ], 400);
        }

        $category->is_published = true;
        $category->save();

        return response()->json([
            'success' => true,
            'message' => 'Category published successfully',
        ], 200);
    }

    public function unpublishCategory($id)
    {
        $category = Category::find($id);

        if (!$category) {
            return response()->json([
                'success' => false,
                'message' => 'Category not found',
            ], 404);
        }

        if (!$category->is_published) {
            return response()->json([
                'success' => false,
                'message' => 'Category has already been unpublished',
            ], 400);
        }

        $category->is_published = false;
        $category->save();

        return response()->json([
            'success' => true,
            'message' => 'Category unpublished successfully',
        ], 200);
    }

    public function deleteCategory($id)
    {
        $category = Category::find($id);

        if (!$category) {
            return response()->json([
                'success' => false,
                'message' => 'Category not found',
            ], 404);
        }

        $category->delete();

        $categories = Category::all();

        return response()->json([
            'success' => true,
            'message' => 'Category deleted successfully',
            'categories' => CategoryResource::collection($categories)
        ], 200);
    }
}
