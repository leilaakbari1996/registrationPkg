<?php


namespace Leila\RegistrationPlatform\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model as Eloquent;

class TemporaryUser extends Eloquent
{
    use HasFactory;

    protected $table = 'temporary_user';
    protected $fillable =
    [
        'Otp'           ,
        'PhoneNumber'
    ];

    public static function DeleteByPhone($phone)
    {
        self::query()->where('PhoneNumber', $phone)->delete();
    }

    public static function FindRow($dara)
    {
        return self::query()->where([
            'Otp'           => $dara['Otp'],
            'PhoneNumber'   => $dara['PhoneNumber']
        ])->orderByDesc('created_at')->first();
    }
}
