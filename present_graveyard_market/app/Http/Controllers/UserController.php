<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;

use App\User;
use App\Services\UpImageServices;

class UserController extends Controller
{
    public function show(User $user)
    {
        return view('users.show', [
            'title' => "{$user->name}さんのプロフィール",
            'user' => $user
        ]);
    }

    public function edit(User $user)
    {
        return view('users.edit', [
            'title' => 'プロフィール編集',
        ]);
    }

    public function update(UserRequest $request,UpImageServices $UpImage, User $user)
    {
        $UpImage->UpImage($request->image);

        $user->update([
            'name' => $request->name,
            'profile' => $request->profile,
            'image' => '', //$path
        ]);
    }

    public function destroy($id)
    {
        //
    }
}
