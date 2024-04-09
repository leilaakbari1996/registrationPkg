<?php

namespace Leila\RegistrationPlatform\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens,HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'PhoneNumber',
        'password'
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

    public static function updateOrCreateByPhone($phone)
    {
//        return self::query()->where('PhoneNumber',$phone)->firstOrFail();
        return self::updateOrCreate([
            'PhoneNumber' => $phone
        ],[
            'password'    => Hash::make('123456')
        ]);
    }

}
