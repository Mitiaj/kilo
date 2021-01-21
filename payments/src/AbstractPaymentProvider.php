<?php
declare(strict_types=1);

namespace Kilo\Payments;

use Kilo\Payments\Exceptions\PaymentException;

abstract class AbstractPaymentProvider implements PaymentProvider
{
    /**
     * Creates notification instance from request
     * and calls apropriate action for the instance
     *
     * @var \Kilo\Payments\Action[]
     */
    private $actions;

    /**
     * @param array $request - Json request
     * @throws \Kilo\Payments\Exceptions\PaymentException
     * @throws \Kilo\Payments\Exceptions\ReceiptValidationException
     */
    public function handleWebhook(array $request): void
    {
        $notification = $this->mapToNotification($request);

        if ($notification instanceof ValidatesReceipt) {
            $notification->validate();
        }

        $action = $this->getActionForNotification($notification);

        $action->execute($notification);
    }

    /**
     * @param string $notificationInstance
     * @param \Kilo\Payments\Action $action
     */
    public function registerAction(string $notificationInstance, Action $action): void
    {
        $this->actions[$notificationInstance] = $action;
    }

    private function getActionForNotification(Notification $notification): Action
    {
        if (!isset($this->actions[get_class($notification)])) {
            throw new PaymentException('Action for:' .get_class($notification). ' is not registered');
        }

        return $this->actions[get_class($notification)];
    }

    protected abstract function mapToNotification(array $request): Notification;
}
