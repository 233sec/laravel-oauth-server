<?php namespace App\Providers;

use Illuminate\Auth\EloquentUserProvider;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Support\Str;

class OauthServerEloquentUserProvider extends EloquentUserProvider
{
    /**
     * @param  $input
     * @param  $user
     * @throws GeneralException
     */
    private function checkUserByEmail($input, $user)
    {
        //Figure out if email is not the same
        if ($user->email != $input['email'] && $user->phone != $input['email']) {
            //Check to see if email exists
            if (User::where('email', '=', $input['email'])->orWhere('phone', '=', $input['email'])->first()) {
                throw new GeneralException(trans('exceptions.backend.access.users.email_error'));
            }
        }
    }


    /**
     * 取用户的方法 请在这里修改为连接到您业务取出用户的逻辑
     *
     * @param  array  $credentials
     * @return \Illuminate\Contracts\Auth\Authenticatable|null
     */
    public function retrieveByCredentials(array $credentials)
    {
        if (empty($credentials) || !isset($credentials['email']) ) {
            return;
        }

        // First we will add each credential element to the query as a where clause.
        // Then we can execute the query and, if we found a user, return it in a
        // Eloquent User "model" that will be utilized by the Guard instances.
        $query = $this->createModel()->newQuery();

        $query->where('email', $credentials['email'])->orWhere('phone', $credentials['email']);

        return $query->first();
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
