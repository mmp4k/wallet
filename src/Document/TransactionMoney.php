<?php

declare(strict_types=1);

namespace App\Document;

use JsonSerializable;
use Money\Money;
use Doctrine\ODM\MongoDB\Mapping\Annotations as ODM;

/** @ODM\EmbeddedDocument() */
class TransactionMoney implements JsonSerializable
{
    private Money $moneyed;
    /** @ODM\Field(type="string") */
    private string $currency = 'PLN';
    /** @ODM\Field(type="int") */
    private int $value;

    public function __construct(int $value)
    {
        $this->value = $value;
        $this->moneyed = Money::PLN($this->value);
    }

    public function jsonSerialize()
    {
        return [
            'value' => $this->value,
            'currency' => $this->currency,
        ];
    }
}
