<?php
declare(strict_types=1);

namespace App\Document;

use App\Exception\InvestorException;
use App\VO\AssetId;
use App\VO\AssetQuantity;
use App\VO\InvestorEmail;
use App\VO\InvestorId;
use App\VO\TransactionDate;
use App\VO\TransactionValue;
use App\VO\WalletId;
use App\VO\WalletName;

class Investor
{
    private InvestorId $investorId;
    private InvestorEmail $investorEmail;
    /**
     * @var array<string, Wallet>
     */
    private array $wallets = [];
    /**
     * @var array<int, Transaction>
     */
    private array $transactions = [];

    private function __construct(InvestorId $investorId, InvestorEmail $investorEmail)
    {
        $this->investorId = $investorId;
        $this->investorEmail = $investorEmail;
    }

    public static function signUp(InvestorId $investorId, InvestorEmail $investorEmail): self
    {
        return new self($investorId, $investorEmail);
    }

    public function newWallet(WalletId $walletId, WalletName $walletName): Wallet
    {
        $wallet = Wallet::create($walletId, $walletName, $this->investorId);
        $this->wallets[$walletId->toString()] = $wallet;

        return $wallet;
    }

    public function buyAsset(WalletId $walletId, AssetId $assetId, TransactionDate $transactionDate, TransactionValue $transactionValue, AssetQuantity $assetQuantity): void
    {
        if (!isset($this->wallets[$walletId->toString()])) {
            throw InvestorException::walletDoesNotExist();
        }

        $wallet = $this->wallets[$walletId->toString()];
        $this->transactions[] = $wallet->buyAsset($assetId);
    }

    public function noOfWallets(): int
    {
        return count($this->wallets);
    }

    public function noOfBuyTransactions(): int
    {
        return count(array_filter($this->transactions, fn(Transaction $transaction) => $transaction->isBuyingTransaction()));
    }

    public function noOfSellTransactions(): int
    {
        return count(array_filter($this->transactions, fn(Transaction $transaction) => $transaction->isSellingTransaction()));
    }
}