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
        $data = [
            'name' => $request->name,
            'profile' => $request->profile,
        ];

        // 画像　　登録 or 更新
        if ($request->image) {
            // 画像更新あり
            $path = $this->upImageServices
                ->upImage($request->image, $user);
            $data['image'] = $path;
        }

        $user->update($data);
    }

    // ユーザー削除
    public function delete($user)
    {
        $user->delete();
    }
}