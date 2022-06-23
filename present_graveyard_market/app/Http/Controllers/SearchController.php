<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Item;
use Illuminate\Support\Facades\Auth;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        dd($request->all(), $request->input('category'));
        $item_name = $request->item_name;
        $result = Item::where('items.name', 'like', "%$item_name%")->JoinCategory()->IsLikeBy(Auth::user()->id)->get()->toJson(JSON_PRETTY_PRINT);
        return response()->json($result);
    }
}
