<?php
declare(strict_types=1);

namespace Kilo\Payments\Notifications;

use Kilo\Payments\Notification;

abstract class AbstractNotification implements Notification
{
    /**
     * @var string
     */
    protected $transactionId;

    /**
     * @var string
     */
    protected $productId;

    /**
     * AbstractNotification constructor.
     *
     * @param string $transactionId
     * @param string $productId
     */
    public function __construct(string $transactionId, string $productId)
    {
        $this->transactionId = $transactionId;
        $this->productId = $productId;
    }

    /**
     * @return string
     */
    public function productId(): string
    {
        return $this->productId;
    }

    /**
     * @return string
     */
    public function transactionId(): string
    {
        return $this->transactionId;
    }
}
