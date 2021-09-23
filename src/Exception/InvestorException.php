<?php
declare(strict_types=1);

namespace App\Exception;

use DomainException;

class InvestorException extends DomainException
{
    public static function walletDoesNotExist(): self
    {
        return new self("Wallet does not exists.");
    }
}