<?php
declare(strict_types=1);

namespace Kilo\Payments\Laravel\Events;

use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use Kilo\Payments\Models\Subscription;

class SubscriptionCreated
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * @var \Kilo\Payments\Models\Subscription
     */
    private $subscription;

    /**
     * SubscriptionCreated constructor.
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
