<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;

use App\User;
use App\Services\UpImageServices;

use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{

    // アクセス制限
    public function __construct()
    {
        $this->middleware('auth');
    }

    // ユーザー詳細
    public function show(User $user)
    {
        return view('users.show', [
            'title' => "{$user->name}さんのプロフィール",
            'user' => $user,
            'items' => $user->items
        ]);
    }

    // ユーザー変更
    public function edit()
    {
        return view('users.edit', [
            'title' => 'プロフィール編集',
        ]);
    }

    // プロフィール更新
    public function update(UserRequest $request,UpImageServices $UpImage, User $user)
    {
        $user->update([
            'name' => $request->name,
            'profile' => $request->profile,
            'image' => $UpImage->UpImage($request->image, $user->image)
        ]);
        return redirect()->route('user.show', $user);
    }

    // ユーザー削除
    public function destroy(User $user)
    {
        Auth::logout();
        $user->delete();
        return redirect()->route('top');
    }

    // 購入した商品一覧
    public function orders()
    {
        return view('users.orders', [
            'title' => '購入した商品',
            'items' => Auth::user()->orders
        ]);
    }
}
