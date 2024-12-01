<?php

namespace App\Http\Controllers;

use App\Services\UploadService;
use Illuminate\Http\Request;

class AssessmentController extends Controller
{
    protected $uploadService;

    public function __construct(UploadService $uploadService)
    {
        $this->middleware('auth:api', ['except' => ['']]);

        $this->middleware(['role:instructor'], [
            'only' => []
        ]);

        $this->uploadService = $uploadService;
    }

    public function createQuestion(Request $request, $slug) {}
}
