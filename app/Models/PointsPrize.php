<?php

namespace App\Models;

use App\Contracts\Prize;
use Illuminate\Database\Eloquent\Model;

/**
 * Class PointsPrize
 *
 * @property int amount
 */
class PointsPrize extends Model implements Prize
{
    public $timestamps = false;

    public function name(): string
    {
        return trans('prize.points');
    }

    public function isAvailable(): bool
    {
        // TODO: Implement isAvailable() method.
        return true;
    }

    public function generate()
    {
        $this->amount = mt_rand(
            config('prizes.points.min'),
            config('prizes.points.max'),
        );
    }

}
