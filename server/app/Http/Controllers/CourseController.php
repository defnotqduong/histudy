<?php

namespace App\Http\Controllers;

use App\Http\Requests\CourseRequest;
use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['']]);
    }

    public function createCourse(CourseRequest $request)
    {
        $validatedData = $request->validated();

        $course = Course::createCourse($validatedData);

        return response()->json(['success' => true, 'message' => 'Create course Successfully!', 'data' => $course], 200);
    }
}
