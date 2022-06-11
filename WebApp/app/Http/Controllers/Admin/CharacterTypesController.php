<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Account;
use App\Models\CharacterItem;
use App\Models\CharacterType;
use App\Models\Item;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CharacterTypesController extends Controller
{
    public function index(Request $request): JsonResponse
    {
        $builder = (new CharacterType())->newModelQuery();
        foreach ($request->query('query') as $key => $value) {
            $builder->where($key, 'LIKE', '%' . $value . '%');
        }

        $builder->limit(max($request->query('limit', 10), 25));
        return new JsonResponse($builder->get());
    }
}
