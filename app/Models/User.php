<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;
use Laravel\Passport\PersonalAccessTokenResult;
use Laravel\Sanctum\NewAccessToken;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    public const DEFAULT_AVATAR = '/storage/icons/user_avatar.png';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'avatar',
        'service',
        'service_user_id',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];
    public function getBearerToken(): ?string
    {
        $tokenObject = $this->createToken('authToken');
        if ($tokenObject instanceof NewAccessToken) {
            return $tokenObject->plainTextToken;
        } elseif ($tokenObject instanceof PersonalAccessTokenResult) {
            return $tokenObject->accessToken;
        }
        return null;
    }

    public function roles(): BelongsToMany
    {
        return $this->belongsToMany(Role::class);
    }
}
