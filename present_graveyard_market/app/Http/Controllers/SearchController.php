<?php

namespace App\Http\Controllers;

use App\Item;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\SearchRequest;

class SearchController extends Controller
{
    public function search(SearchRequest $request)
    {
        $item_name = $request->item_name;
        $category = $request->category;
        
        $result = Item::where('items.name', 'like', "%$item_name%");

        if ($category) {
            $result = $result->where('items.category_id', '=', $category);
        }

        $result = $result->JoinCategory()->IsLikeBy(Auth::user()->id)->get()->toJson(JSON_PRETTY_PRINT);

        return response()->json($result);
    }
}
