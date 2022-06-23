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
            'items' => Like::likeLIst(Auth::user()->id)
        ]);
    }

    public function isLike(Request $request)
    {
        $item_id = $request->item_id;
        $liked_id = $request->liked_id;

        if ($liked_id !== null) {
            Like::find($liked_id)->first()->delete();
            return 'delete';
        } else {
            Like::create([
                'user_id' => Auth::user()->id,
                'item_id' => $item_id,
            ]);
            return 'create';
        }
    }
}