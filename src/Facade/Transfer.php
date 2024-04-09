<?php

namespace Leila\RegistrationPlatform\Facade;

use Illuminate\Support\Facades\Facade;

class Transfer extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return 'TransferFacade';
    }
}
