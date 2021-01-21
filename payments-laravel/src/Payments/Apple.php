<?php
declare(strict_types=1);

namespace Kilo\Payments\Laravel\Payments;

use Illuminate\Support\Facades\Facade;
use Kilo\Payments\Laravel\Payments\Apple\ApplePaymentsProviderFactory;

/**
 * Class Apple
 */
class Apple extends Facade
{
    protected static function getFacadeAccessor()
    {
        return ApplePaymentsProviderFactory::class;
    }
}
