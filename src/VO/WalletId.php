<?php
declare(strict_types=1);

namespace App\VO;

use Symfony\Component\Uid\Uuid;

class WalletId
{
    public function __construct(private string $id)
    {
    }

    public static function create(): self
    {
        return new self(Uuid::v6()->toRfc4122());
    }

    public function toString(): string
    {
        return $this->id;
    }
}