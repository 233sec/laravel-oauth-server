<?php namespace App\Providers;

use Illuminate\Auth\EloquentUserProvider;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Support\Str;

class OauthServerEloquentUserProvider extends EloquentUserProvider
{
    /**
     * 取用户的方法 请在这里修改为连接到您业务取出用户的逻辑
     *
     * @param  array  $credentials
     * @return \Illuminate\Contracts\Auth\Authenticatable|null
     */
    public function retrieveByCredentials(array $credentials)
    {
        return parent::retrieveByCredentials($credentials);
    }

    /**
     * 验证用户凭据的方法 请在这里修改为您业务验证用户登录凭据的逻辑
     *
     * @param  \Illuminate\Contracts\Auth\Authenticatable $user
     * @param  array $credentials
     * @return bool
     */
    public function validateCredentials(Authenticatable $user, array $credentials)
    {
        return parent::validateCredentials($user, $credentials);
    }
}
