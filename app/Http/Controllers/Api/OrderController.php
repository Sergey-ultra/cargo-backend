<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;

use App\Http\Requests\OrderRequest;
use App\Repository\DTO\ParamsDTO;
use App\Repository\OrderRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;


class OrderController extends Controller
{
    public function index(Request $request, OrderRepository $repository): JsonResponse
    {
        $paramsDto = new ParamsDTO(
            $request->input('filter') ?? [],
            $request->input('sort', ''),
            $request->input('per_page', 30)
        );

        $result = $repository->list($paramsDto);

        return response()->json($result);
    }

    public function store(OrderRequest $request, OrderRepository $repository): JsonResponse
    {
        $data = $request->validated();
        $created = $repository->save(Auth::id(), $data);

        return response()->json(['data' => $created], Response::HTTP_CREATED);
    }

    public function deleteSelected(Request $request, OrderRepository $repository): void
    {
        $repository->deleteSelected($request->input('ids'));
    }


}
