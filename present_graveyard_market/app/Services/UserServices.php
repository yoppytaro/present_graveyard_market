<?php
namespace App\Services;
use App\Services\UpImageServices;

class UserServices
{
    public function __construct()
    {
        $this->upImageServices = new UpImageServices;
    }

    // ユーザー更新
    public function update($user, $request)
    {
        $path = $this->upImageServices
            ->UpImage($request->image, $user->image);

        $data = [
            'name' => $request->name,
            'profile' => $request->profile,
            'image' => $path
        ];

        $user->update($data);
    }

    // ユーザー削除
    public function delete($user)
    {
        $user->delete();
    }
}