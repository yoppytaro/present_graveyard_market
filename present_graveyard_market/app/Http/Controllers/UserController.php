<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;

use App\User;
use App\Item;
use App\Services\UpImageServices;
use App\Services\UserServices;


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
            'items' => Item::WhereItem($user->id, null)->JoinCategory()->IsLIkeBy($user->id)->get()
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
    public function update(User $user,UserRequest $request,UpImageServices $UpImage, UserServices $UserUpdate)
    {
        $path = $UpImage->UpImage($request->image, $user->image);
        $UserUpdate->update($user, $request, $path);
        session()->flash('success', 'プロフィールを更新しました');
        return redirect()->route('user.show', $user);
    }

    // ユーザー削除
    public function destroy(User $user,  UserServices $UserUpdate)
    {
        Auth::logout();
        $UserUpdate->update($user, null, null);
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
