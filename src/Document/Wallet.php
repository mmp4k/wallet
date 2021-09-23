<?php
declare(strict_types=1);

namespace App\Document;

use App\VO\AssetId;
use App\VO\InvestorId;
use App\VO\WalletId;
use App\VO\WalletName;

/**
 * @psalm-internal App\Document
 */
class Wallet
{
    private WalletId $id;
    private WalletName $name;
    private InvestorId $investorId;

    public function __construct(WalletId $id, WalletName $name, InvestorId $investorId)
    {
        $this->id = $id;
        $this->name = $name;
        $this->investorId = $investorId;
    }

    static public function create(WalletId $id, WalletName $name, InvestorId $investorId): self
    {
        return new self($id, $name, $investorId);
    }

    public function buyAsset(AssetId $assetId): Transaction
    {
        /* @TODO: Implement construct of proper Transaction */
        return new Transaction();
    }
}