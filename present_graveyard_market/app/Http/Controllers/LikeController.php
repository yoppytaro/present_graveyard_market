<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Like;
use App\Item;

class LikeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    // お気に入り一覧
    public function index()
    {
        return view('likes.index', [
            'title' => 'お気に入り一覧',
            'items' => Auth::user()->likeItems
        ]);
    }

    public function isLike(Request $request)
    {
        $item = Item::find($request->id);
        if ($item->isLiked(Auth::user()->id)) {
            $item->likes->where('user_id', Auth::user()->id)->first()->delete();
        } else {
            Like::create([
                'user_id' => Auth::user()->id,
                'item_id' => $item->id,
            ]);
        }
    }
}
