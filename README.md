# registrationPkg
## leila.akbari1996@gmail.com
### Registration and login by sending SMS.
This is a registration platform with sanctum.

# Getting Started
## step1:
composer require leila-akb/registration-platform:"dev-main"
## step2:
Add provider and facade in config/app.php

'providers' => \Illuminate\Support\ServiceProvider::defaultProviders()->merge([
        
        \Leila\RegistrationPlatform\AuthServiceProvider::class // <-- add this line at the end of provider array 
    ])->toArray(),

'aliases' => [
      
        'ReturnMessage' => \Leila\RegistrationPlatform\Facade\Message::class, // <-- add this line at the end of provider array 
        "TransferFacade" => \Leila\RegistrationPlatform\Facade\Transfer::class
 ]
 ## step3:
 php artisan vendor:publish

 ## step4:
 php artisan migrate

