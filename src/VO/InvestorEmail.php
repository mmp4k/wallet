<?php
declare(strict_types=1);

namespace App\VO;

final class InvestorEmail
{
    public function __construct(private string $email)
    {
    }

    public static function create(string $email): self
    {
        return new self($email);
    }
}