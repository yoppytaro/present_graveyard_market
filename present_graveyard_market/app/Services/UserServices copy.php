<?php
namespace App\Services;
use Illuminate\Support\Facades\Auth;
use App\User;

class UserServices
{
    public function update($user, $request, $path)
    {
        $data = [
            'name' => $request->name,
            'profile' => $request->profile,
            'image' => $path
        ];

        if ($user and $request) {
            $user->update($data);
            return;
        }

        $user->delete();
        return;
    }
}