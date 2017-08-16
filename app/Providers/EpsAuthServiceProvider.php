<?php
/**
 * Created by PhpStorm.
 * User: abedmakki
 * Date: 8/15/17
 * Time: 11:57 AM
 */
namespace App\Providers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Contracts\Auth\Access\Gate as GateContract;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use App\EpsAuth\EpsAuthUserProvider;

class EpsAuthServiceProvider extends ServiceProvider
{
    protected $policies = [
        'App\Model' => 'App\Policies\ModelPolicy',
    ];

    public function boot(GateContract $gate)
    {
        $this->registerPolicies($gate);

        Auth::provider('eloquent.eps', function($app, array $config) {
            return new EpsAuthUserProvider($app['hash'], $config['model']);
        });
    }
}
