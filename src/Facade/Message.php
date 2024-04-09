<?php

namespace Leila\RegistrationPlatform\Facade;

use Illuminate\Support\Facades\Facade;

class Message extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return 'ReturnMessage';
    }
}
