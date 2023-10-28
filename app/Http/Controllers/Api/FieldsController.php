<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Repository\FormFieldRepository;
use Illuminate\Http\JsonResponse;

class FieldsController extends Controller
{
    public function fields(FormFieldRepository $formFieldRepository): JsonResponse
    {
        $result = $formFieldRepository->orderList();

        return response()->json(['data' => $result]);
    }
}
