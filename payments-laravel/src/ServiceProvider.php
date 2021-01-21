<?php
declare(strict_types=1);

namespace Kilo\Payments\Laravel;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Kilo\Payments\Laravel\Payments\Apple\Actions\CreateSubscription;
use Kilo\Payments\Laravel\Payments\Apple\Actions\UpdateSubscription;
use Kilo\Payments\Laravel\Payments\Apple\ApplePaymentsProviderFactory;
use Kilo\Payments\Laravel\Payments\Apple\StripePaymentsProviderFactory;
use Kilo\Payments\Notifications\InitialSubscription;
use Kilo\Payments\Notifications\RenewedSubscrition;

class ServiceProvider extends \Illuminate\Support\ServiceProvider
{
    public function boots()
    {
        $this->registerRoutes();
    }
    
    public function register()
    {
        $this->registerMiddlewares();
        $this->registerServices();
    }

    private function registerRoutes()
    {
        if (! $this->app->routesAreCached()) {
            Route::group([
                'namespace' => 'Kilo\Payments\Laravel\Http\Controllers'],
                function ($router) {
                    require __DIR__ . '/Http/routes.php';
                }
            );
        }
    }

    private function registerMiddlewares()
    {
        
    }
    
    private function registerServices()
    {
        $this->app->singleton(ApplePaymentsProviderFactory::class, function (Application  $app) {
            return new ApplePaymentsProviderFactory([
                InitialSubscription::class => $app->get(CreateSubscription::class),
                // feel free to add as much as you want
            ]);
        });

        $this->app->singleton(StripePaymentsProviderFactory::class, function (Application  $app) {
            return new StripePaymentsProviderFactory([
                RenewedSubscrition::class => $app->get(UpdateSubscription::class),
                // feel free to add as much as you want
            ]);
        });
    }
}
