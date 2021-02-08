<?php

namespace App\Models;

use App\Contracts\Prize;
use Illuminate\Database\Eloquent\Model;

/**
 * Class MoneyPrize
 *
 * @property int amount
 */
class MoneyPrize extends Model implements Prize
{
    public $timestamps = false;

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

}
