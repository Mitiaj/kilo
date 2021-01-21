<?php
declare(strict_types=1);

namespace Kilo\Payments;

interface Action
{
    /**
     * @param \Kilo\Payments\Notification $notification
     * @return mixed
     */
    public function execute(Notification $notification): void;
}
