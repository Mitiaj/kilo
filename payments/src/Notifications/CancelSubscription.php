<?php
declare(strict_types=1);

namespace Kilo\Payments\Notifications;

abstract class CancelSubscription extends AbstractNotification
{
    public function __construct(string $transactionId, string $productId)
    {
        parent::__construct($transactionId, $productId);
    }
}
