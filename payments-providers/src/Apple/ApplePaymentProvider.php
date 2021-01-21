<?php
declare(strict_types=1);

namespace Kilo\Payments\Providers\Apple;

use Kilo\Payments\AbstractPaymentProvider;
use Kilo\Payments\Action;
use Kilo\Payments\Apple\Notifications\CancelSubscription;
use Kilo\Payments\Apple\Notifications\InitialSubscription;
use Kilo\Payments\Apple\Notifications\RenewedSubscription;
use Kilo\Payments\Apple\Notifications\UnsuccessfulRenewal;
use Kilo\Payments\Exceptions\PaymentException;
use Kilo\Payments\Notification;

class ApplePaymentProvider extends AbstractPaymentProvider
{
    public function handleWebhook(array $request): void
    {
        parent::handleWebhook($request);
    }

    protected function mapToNotification(array $request): Notification
    {
        switch ($request['notification_type']) {
            case 'INITIAL_BUY':
                return new InitialSubscription($request);

            case 'DID_RENEW':
                return new RenewedSubscription($request);

            case 'DID_FAIL_TO_RENEW':
                return new UnsuccessfulRenewal($request);

            case 'CANCEL':
                return new CancelSubscription($request);

            default:
                throw new PaymentException("Support for {$request['notification_type']} not implemented.");
        }
    }
}
