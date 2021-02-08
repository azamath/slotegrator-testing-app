<?php

namespace App\Models;

use App\Contracts\Prize;
use Illuminate\Database\Eloquent\Model;

/**
 * Class GoodPrize
 *
 * @property string good_item
 */
class GoodPrize extends Model implements Prize
{
    public $timestamps = false;

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
        $this->good_item = 'Some good';
    }

}
