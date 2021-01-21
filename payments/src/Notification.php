<?php
declare(strict_types=1);

namespace Kilo\Payments;

interface Notification
{
    /**
     * @return string
     */
    public function transactionId(): string;

    /**
     * @return array
     */
    public function productId(): string;
}
