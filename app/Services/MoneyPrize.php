<?php

namespace App\Services;

use App\Contracts\Prize;

class MoneyPrize implements Prize
{
    protected int $amount;

    public function name(): string
    {
        return trans('prize.money');
    }

    public function isAvailable(): bool
    {
        // TODO: Implement isAvailable() method.
        return true;
    }

    public function generate()
    {
        $this->amount = mt_rand(
            config('prizes.money.min'),
            config('prizes.money.max'),
        );
    }

    /**
     * @return int
     */
    public function getAmount(): int
    {
        return $this->amount;
    }
}
