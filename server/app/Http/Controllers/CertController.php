<?php

namespace App\Http\Controllers;

use App\Http\Resources\CertificateResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CertController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['']]);

        $this->middleware(['role:instructor'], [
            'only' => ['']
        ]);
    }

    public function getAllCert()
    {
        $user = Auth::user();

        return response()->json(
            [
                'success' => true,
                'certs' => CertificateResource::collection($user->certificates),
            ],
            200
        );
    }
}
