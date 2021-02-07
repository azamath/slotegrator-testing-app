<?php

namespace App\Services;

use App\Contracts\Prize;

class GoodPrize implements Prize
{
    protected $goodItem;

    public function name(): string
    {
        return trans('prize.good');
    }

    public function isAvailable(): bool
    {
        // TODO: Implement isAvailable() method.
        return true;
    }

    public function generate()
    {
        $this->goodItem = 'Some good';
    }

    /**
     * @return mixed
     */
    public function getItem(): mixed
    {
        return $this->goodItem;
    }
}
