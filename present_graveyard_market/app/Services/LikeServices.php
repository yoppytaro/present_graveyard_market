<?php
namespace App\Services;
use Illuminate\Support\Facades\Auth;
use App\Like;
use Facade\FlareClient\Flare;
use LDAP\Result;

class LikeServices
{
    public function __construct()
    {
        $this->item_id = null;
    }

    public function isLike($request)
    {
        $this->item_id = $request->item_id;
        $this->user_id = Auth::user()->id;
        $this->liked = Like::where('item_id', '=', $this->item_id)
            ->where('user_id', '=', $this->user_id);

        if ($this->liked->exists()) {
            $this->delete();
            return false;
        }

        $this->create();
        return true;
    }

    public function create()
    {
        Like::create([
            'user_id' => $this->user_id,
            'item_id' => $this->item_id,
        ]);
    }

    public function delete()
    {
        $this->liked
            ->first()
            ->delete();
    }
}