<?php
declare(strict_types=1);

namespace Kilo\Payments\Laravel\Events;

use Kilo\Payments\Models\Subscription;

class SubscriptionCancelled
{
    /**
     * @var \Kilo\Payments\Models\Subscription
     */
    private $subscription;

    /**
     * SubscriptionCancelled constructor.
     *
     * @param \Kilo\Payments\Models\Subscription $subscription
     */
    public function __construct(Subscription $subscription)
    {
        $this->subscription = $subscription;
    }

    /**
     * @return \Kilo\Payments\Models\Subscription
     */
    public function subscription(): Subscription
    {
        return $this->subscription;
    }
}
