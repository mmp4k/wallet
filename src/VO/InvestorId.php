<?php
declare(strict_types=1);

namespace App\VO;

use Symfony\Component\Uid\Uuid;

final class InvestorId
{
    public function __construct(private string $uuid)
    {
    }

    public static function create(): self
    {
        return new self(Uuid::v6()->toRfc4122());
    }
}