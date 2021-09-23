<?php
declare(strict_types=1);

namespace App\VO;

class WalletName
{
    public function __construct(private string $walletName)
    {
    }

    public static function create(string $walletName): self
    {
        return new self($walletName);
    }
}