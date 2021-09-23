<?php
declare(strict_types=1);

namespace App\VO;

class AssetQuantity
{
    private function __construct(private int $qty) {}
    public static function qty(int $qty): self
    {
        return new self($qty);
    }
}