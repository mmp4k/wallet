<?php

declare(strict_types=1);

namespace App\Document;

use DateTimeImmutable;
use Doctrine\ODM\MongoDB\Mapping\Annotations as MongoDB;
use JsonSerializable;

/**
 * @MongoDB\Document
 */
class Transaction implements JsonSerializable
{
    /**
     * @MongoDB\Id
     */
    private string $id = '';
    /**
     * @MongoDB\EmbedOne(targetDocument="App\Document\TransactionMoney")
     */
    private TransactionMoney $value;

    /**
     * @MongoDB\Field(type="date_immutable")
     */
    private DateTimeImmutable $dateTime;

    public function __construct(TransactionMoney $value, DateTimeImmutable $dateTime)
    {
        $this->value = $value;
        $this->dateTime = $dateTime;
    }

    public function jsonSerialize()
    {
        return [
            'date' => $this->dateTime->format('c'),
            'value' => $this->value
        ];
    }
}
