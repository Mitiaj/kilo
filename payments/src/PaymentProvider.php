<?php
declare(strict_types=1);

namespace Kilo\Payments;

interface PaymentProvider
{
    /**
     * @param array $request - Json Response
     * @throws \Kilo\Payments\Exceptions\PaymentException
     */
    public function handleWebhook(array $request): void;
}
