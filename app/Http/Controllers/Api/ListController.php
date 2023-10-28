<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Lists;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Query\Builder;
use Illuminate\Http\JsonResponse;

class ListController extends Controller
{
    public function list(): JsonResponse
    {
        $lists = Lists::query()
            ->select('id', 'name')
            ->with(['fields' => function (HasMany $query) {
                   $query->select('id', 'name', 'list_id')->orderBy('name');
                 }
            ])
            ->get();

        return response()->json(['data' => $lists]);
    }
}
