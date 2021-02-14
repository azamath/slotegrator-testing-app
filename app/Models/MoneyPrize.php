<?php

namespace App\Models;

use App\Contracts\Prize;
use Illuminate\Database\Eloquent\Model;

/**
 * Class MoneyPrize
 *
 * @property int amount
 * @property boolean is_withdrawn
 * @property-read \App\Models\Winning winning
 */
class MoneyPrize extends Model implements Prize
{
    /** @var string The name of the fund for getting money */
    public const FUND_NAME = 'prize';

    public $timestamps = false;

    protected $casts = [
        'is_withdrawn' => 'boolean',
    ];

    protected ?Fund $fund = null;

    public function name(): string
    {
        return trans('prize.money');
    }

    public function isAvailable(): bool
    {
        return $this->getFund()->amount > 0;
    }

    public function generate()
    {
        $this->amount = mt_rand(
            min($this->getFund()->amount, config('prizes.money.min')),
            min($this->getFund()->amount, config('prizes.money.max')),
        );

        $this->getFund()->decrement('amount', $this->amount);
    }

    public function winning()
    {
        return $this->morphOne(Winning::class, 'prize');
    }

    /**
     * @return \App\Models\Fund
     */
    protected function getFund(): Fund
    {
        if (!$this->fund) {
            $this->fund = Fund::query()->where('name', self::FUND_NAME)->sole();
        }

        return $this->fund;
    }
}
