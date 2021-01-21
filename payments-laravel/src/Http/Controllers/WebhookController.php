<?php
declare(strict_types=1);

namespace Kilo\Payments\Laravel\Controllers;

use Illuminate\Http\Request;
use \Illuminate\Routing\Controller;
use Kilo\Payments\Laravel\Payments\Apple\ApplePaymentsProviderFactory;
use Kilo\Payments\Providers\Apple\ApplePaymentProvider;

class WebhookController extends Controller
{
    /**
     * @var \Kilo\Payments\Laravel\Payments\Apple\ApplePaymentsProviderFactory
     */
    private $apple;

    /**
     * WebhookController constructor.
     *
     * @param \Kilo\Payments\Laravel\Payments\Apple\ApplePaymentsProviderFactory $factory
     */
    public function __construct(ApplePaymentsProviderFactory $factory)
    {
        $this->apple = $factory;
    }

    public function handleApple(Request $request)
    {
        $this->apple->create()->handleWebhook($request->json()->all());
    }

    public function handleStripe(Request $request)
    {
        $this->stripe->create()->handleWebhook($request->json()->all());
    }
}
