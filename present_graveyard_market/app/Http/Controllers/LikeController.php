<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\Auth;

use App\Like;
use App\Services\LikeServices;
use App\Http\Requests\LikeRequest;

class LikeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->likeServices = new LikeServices;
    }

    // お気に入り一覧
    public function index()
    {
        $title = 'お気に入り一覧';
        $items = Like::likeLIst(Auth::user()->id);

        return view('likes.index', compact('title', 'items'));
    }

    public function isLike(LikeRequest $request)
    {
        $result = $this->likeServices
            ->isLike($request);

        return response()->json($result);
    }
}