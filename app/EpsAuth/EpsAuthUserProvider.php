<?php
/**
 * Created by PhpStorm.
 * User: abedmakki
 * Date: 8/15/17
 * Time: 11:43 AM
 */

namespace App\EpsAuth;

use Illuminate\Auth\EloquentUserProvider;
use Illuminate\Contracts\Auth\Authenticatable as UserContract;

class EpsAuthUserProvider extends EloquentUserProvider

{
    public function retrieveByCredentials(array $credentials)
    {
        $user = parent::retrieveById($credentials['user_id']);
        return $user;
    }
    public function validateCredentials(UserContract $user, array $credentials)
    {
        return true;
    }
    public function updateRememberToken(UserContract $user, $token)
    {
        //nothing
    }
}