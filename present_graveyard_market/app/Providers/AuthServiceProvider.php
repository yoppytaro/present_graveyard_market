<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        // ユーザーに閲覧権限の有無
        Gate::define('isAdmin', function($user ,$profile_id) {
            return $user->id == $profile_id;
        });

        // ユーザーに商品を編集する権限の有無
        Gate::define('isAccess', function($user,$item) {
            return $user->id == $item->user_id;
        });

        // 購入できる
        Gate::define('canOrder', function($user,$item) {
            return $user->id != $item->user_id && !$item->isOrderBy($item);
        });

        // 購入されている
        Gate::define('isOrdered', function($user,$item) {
            return $item->isOrderBy($item);
        });

        // 自身が購入した
        Gate::define('isFinish', function($user,$item) {
            return $user->orders->first->get()->item_id == $item->id;
        });
    }
}
