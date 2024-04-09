<?php

namespace Leila\RegistrationPlatform;
use Illuminate\Support\Facades\App;
use Illuminate\Support\ServiceProvider;
use Leila\RegistrationPlatform\Infrastructures\Message;
use Leila\RegistrationPlatform\Infrastructures\Transfer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        Schema::defaultStringLength(191);//Length strings in all Pages = 191.
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        $this->loadRoutesFrom(__DIR__.'/routes/web.php');//
        $this->loadViewsFrom(__DIR__.'/resources/views', 'LaView');
        $this->publishes([
            __DIR__.'/config/database.php' => config_path('LaConfigDataBase.php'),
        ],'laConfig');
        $this->publishes([
            __DIR__.'/resources/views' => resource_path('views/vendor/LaView'),
        ],'MyTag');
//        $this->publishes([
//            __DIR__.'/../app/Models' => app_path('Models'),
//        ],'MyTag');
        $this->publishesMigrations([
            __DIR__.'/database/migrations' => database_path('migrations'),
        ],'myMigration');
//        $this->app->bind('ReturnMessage',function (Request $request,$message="",$data=[]){
//            return new Message($request,$message,$data);
//        });
        App::alias(Message::class, 'ReturnMessage');
        App::alias(Transfer::class, 'TransferFacade');
//        $this->app->bind('TransferFacade',function (string $path){
//            return new Transfer($path);
//        });

        $this->publishes([
            __DIR__.'/../public' => public_path('/'),
        ], 'MyPublic');
        $this->mergeConfigFrom(
            __DIR__.'/config/database.php' , config_path('LaConfigDataBase.php'),
        );
    }
}
