<?php

namespace App\Models;

use App\Contracts\Prize;
use App\Enums\GoodStatus;
use Illuminate\Database\Eloquent\Model;
use Konekt\Enum\Eloquent\CastsEnums;

/**
 * Class GoodPrize
 *
 * @property int id
 * @property int good_id
 * @property string good_name
 * @property \App\Enums\GoodStatus status
 *
 * @property-read \App\Models\Good goodItem
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
        return Good::query()->sum('qty') > 0;
    }

    public function generate()
    {
        /** @var \App\Models\Good $good */
        $good = Good::available()
            ->inRandomOrder()
            ->first();

        $good->decrement('qty');

        $this->good_id = $good->id;
        $this->good_name = $good->name;
    }

    public function goodItem()
    {
        return $this->belongsTo(Good::class, 'good_id');
    }

}
