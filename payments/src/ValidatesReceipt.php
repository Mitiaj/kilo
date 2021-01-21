<?php
declare(strict_types=1);

namespace Kilo\Payments;

interface ValidatesReceipt
{
    /**
     * @throws \Kilo\Payments\Exceptions\ReceiptValidationException|\Kilo\Payments\Exceptions\PaymentException
     */
    public function validate(): void;
}
