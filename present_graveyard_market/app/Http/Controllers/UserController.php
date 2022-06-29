<?php

namespace App\Http\Controllers;

use App\User;
use App\Item;
use App\Services\UserServices;
use App\Http\Requests\UserRequest;


use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function __construct()
    {
        // アクセス制限
        $this->middleware('auth');
        $this->userServices = new UserServices;
    }

    // ユーザー詳細
    public function show(User $user)
    {
        $title = "{$user->name}さんのプロフィール";
        $items = Item::WhereItem($user->id, null)
            ->JoinCategory()
            ->IsLIkeBy($user->id)
            ->get();

        return view('users.show', compact('title', 'user', 'items'));
    }

    // ユーザー変更
    public function edit()
    {
        $title = 'プロフィール編集';

        return view('users.edit', compact('title'));
    }

    // プロフィール更新
    public function update(User $user, UserRequest $request)
    {
        $this->userServices
            ->update($user, $request);

        session()->flash('success', 'プロフィールを更新しました');

        return redirect()->route('user.show', $user);
    }

    // ユーザー削除
    public function destroy(User $user)
    {
        Auth::logout();
        
        $this->userServices
            ->delete($user);

        return redirect()->route('top');
    }

    // 購入した商品一覧
    public function orders()
    {
        $title = '購入した商品';
        $items = Auth::user()->orders;

        return view('users.orders', compact('title','items'));
    }
}
