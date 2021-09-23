<?php
declare(strict_types=1);

namespace App\VO;

use Money\Money;

class TransactionValue
{
    public function __construct(private Money $value)
    {
    }

    public static function PLN(int $int): self
    {
        return new self(Money::PLN($int));
    }
}