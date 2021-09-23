<?php
declare(strict_types=1);

namespace App\VO;

class AssetId
{
    public function __construct(private string $type, private string $assetCode)
    {
    }

    public static function gwpEtf(string $assetCode): self
    {
        return new self('GPW-ETF', $assetCode);
    }
}