<?php
declare(strict_types=1);

namespace App\VO;

use DateTimeImmutable;

class TransactionDate
{
    public function __construct(private DateTimeImmutable $date)
    {
    }

    public static function now(): self
    {
        return new self(new DateTimeImmutable('now'));
    }
}