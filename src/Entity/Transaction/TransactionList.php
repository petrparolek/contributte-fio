<?php declare(strict_types = 1);

namespace Markette\Fio\Entity\Transaction;

use ArrayIterator;
use IteratorAggregate;
use Markette\Fio\Utils\ExportXmlGenerator;

/**
 * TransactionList
 *
 * @author Filip Suska <vody105@gmail.com>
 */
class TransactionList implements IteratorAggregate
{

    /** @var Transaction[] */
    protected $transactions = [];

    /**
     * @param Transaction $transaction
     * @return void
     */
    public function addTransaction(Transaction $transaction): void
    {
        $this->transactions[] = $transaction;
    }

    /**
     * @return ArrayIterator|Transaction[]
     */
    public function getIterator(): ArrayIterator
    {
        return new ArrayIterator($this->transactions);
    }

    /**
     * @return string
     */
    public function toXml(): string
    {
        return ExportXmlGenerator::fromArray($this->toArray());
    }

    /**
     * @return mixed[]
     */
    public function toArray(): array
    {
        $arr = [];

        /** @var Transaction $transaction */
        foreach ($this->transactions as $transaction) {
            $arr[] = [$transaction::NAME => $transaction->toArray()];
        }

        return $arr;
    }

}