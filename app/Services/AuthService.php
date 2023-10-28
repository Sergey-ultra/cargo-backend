<?php

namespace App\Services;


use App\Models\User;
use App\Services\Parser\Token;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class AuthService
{
    public function getAuthUser(string $email, string $password): Model|Builder|Authenticatable|null
    {
        $credentials = ['email' => $email, 'password' => $password];

        if (!Auth::attempt($credentials)) {
            return null;
        }

        return Auth::user();
    }


    public function saveUser(string $email, string $password, string $name = null, array $roleIds = [1]): ?Model
    {
        if (User::query()->where(['email' => $email, 'service' => null])->first()) {
            return null;
        }


        $user = User::query()->create([
            'name' => $name,
            'email' => $email,
            'password' => bcrypt($password),
        ]);

        $user->roles()->attach($roleIds);
        return $user;
    }
}
