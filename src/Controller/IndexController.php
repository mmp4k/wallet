<?php

declare(strict_types=1);

namespace App\Controller;

use App\Document\Transaction;
use App\Document\TransactionMoney;
use App\Document\User;
use Doctrine\ODM\MongoDB\DocumentManager;
use Money\Money;
use Symfony\Component\HttpFoundation\JsonResponse;

class IndexController
{
    public function __construct(private DocumentManager $documentManager)
    {
    }
    public function __invoke()
    {
//        $user = new Transaction(new TransactionMoney(2000), new \DateTimeImmutable());
//        $this->documentManager->persist($user);
//        $this->documentManager->flush();
        $result = $this->documentManager->getRepository(Transaction::class)->findAll();
        return new JsonResponse($result);
    }
}
