<?php

namespace App\Tests\Unit;

use App\Document\Investor;
use App\VO\AssetId;
use App\VO\AssetQuantity;
use App\VO\InvestorEmail;
use App\VO\InvestorId;
use App\VO\TransactionDate;
use App\VO\TransactionValue;
use App\VO\WalletId;
use App\VO\WalletName;
use PHPUnit\Framework\TestCase;

class BuyETFSP500Test extends TestCase
{
    public function testSomething(): void
    {
        $investor = Investor::signUp(InvestorId::create(), InvestorEmail::create('me@example.org'));
        $walletId = WalletId::create();
        $investor->newWallet($walletId, WalletName::create('Poduszka bezpieczeństwa'));
        $investor->buyAsset($walletId, AssetId::gwpEtf('ETFSP500'), TransactionDate::now(), TransactionValue::PLN(500), AssetQuantity::qty(5));

        $this->assertTrue($investor->noOfWallets() === 1);
        $this->assertTrue($investor->noOfBuyTransactions() === 1);
        $this->assertTrue($investor->noOfSellTransactions() === 0);
    }
}
