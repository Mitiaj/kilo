<?php
declare(strict_types=1);

namespace Kilo\Payments\Laravel\Payments\Apple\Actions;

use Kilo\Payments\Action;
use Kilo\Payments\Laravel\Events\SubscriptionCreated;
use Kilo\Payments\Models\Subscription;
use Kilo\Payments\Notification;

class CreateSubscription implements Action
{
    /**
     * @param \Kilo\Payments\Notification $notification
     */
    public function execute(Notification $notification): void
    {
        /** @var Subscription $subscription */
        $subscription = (new Subscription())->newQuery()->create([
            'product_id' => $notification->productId()
        ]);

        event(new SubscriptionCreated($subscription));
    }
}
