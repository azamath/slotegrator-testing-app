<?php

namespace App\Models;

use App\Contracts\Prize;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class PointsPrize
 *
 * @property int amount
 * @property boolean is_converted
 * @property-read \App\Models\Winning winning
 */
class PointsPrize extends Model implements Prize
{
    use HasFactory;

    public $timestamps = false;

    protected $casts = [
        'amount' => 'integer',
        'is_converted' => 'boolean',
    ];

    public function name(): string
    {
        return trans('prize.points');
    }

    public function isAvailable(): bool
    {
        return true;
    }

    public function generate()
    {
        $this->amount = mt_rand(
            config('prizes.points.min'),
            config('prizes.points.max'),
        );
    }

    public function winning()
    {
        return $this->morphOne(Winning::class, 'prize');
    }

}
