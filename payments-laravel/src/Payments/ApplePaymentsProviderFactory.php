<?php
declare(strict_types=1);

namespace Kilo\Payments\Laravel\Payments\Apple;

use Kilo\Payments\PaymentProvider;
use Kilo\Payments\Providers\Apple\ApplePaymentProvider;

class ApplePaymentsProviderFactory
{
    /**
     * @var array
     */
    private $actionsMap;

    /**
     * ApplePaymentsProviderFactory constructor.
     *
     * @param array $actionsMap
     */
    public function __construct(array $actionsMap)
    {
        $this->actionsMap = $actionsMap;
    }

    public function create(): PaymentProvider
    {
        $provider = new ApplePaymentProvider();

        foreach ($this->actionsMap as $key => $value) {
            $provider->registerAction($key, $value);
        }

        return $provider;
    }
}
