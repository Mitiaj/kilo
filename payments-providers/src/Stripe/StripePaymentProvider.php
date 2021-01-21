<?php
declare(strict_types=1);

namespace Kilo\Payments\Providers\Stripe;

use Kilo\Payments\Notification;

class StripePaymentProvider extends \Kilo\Payments\AbstractPaymentProvider
{
    protected function mapToNotification(array $request): Notification
    {
        throw new \BadMethodCallException('Method mapToNotification() not implemented');
    }
}
