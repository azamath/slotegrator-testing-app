<?php

namespace App\Models;

use App\Contracts\Prize;
use App\Enums\GoodStatus;
use Illuminate\Database\Eloquent\Model;
use Konekt\Enum\Eloquent\CastsEnums;

/**
 * Class GoodPrize
 *
 * @property string good_item
 * @property \App\Enums\GoodStatus status
 */
class GoodPrize extends Model implements Prize
{
    use CastsEnums;

    public $timestamps = false;

    protected $enums = [
        'status' => GoodStatus::class
    ];

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
