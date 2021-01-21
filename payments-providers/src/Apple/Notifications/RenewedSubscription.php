<?php
declare(strict_types=1);

namespace Kilo\Payments\Apple\Notifications;

use Kilo\Payments\Notifications\RenewedSubscription as RenewedSubscriptionAlias;
use Kilo\Payments\ValidatesReceipt;

class RenewedSubscription extends RenewedSubscriptionAlias implements ValidatesReceipt
{
    /**
     * @var array
     */
    private $data;

    public function __construct(array $data)
    {
        parent::__construct(
            $data['auto_renew_product_id'],
            $data['auto_renew_product_id']
        );

        $this->data = $data;
    }

    public function validate(): void
    {
        // validate Apple receipt. All data available in $this->data

    }
}
