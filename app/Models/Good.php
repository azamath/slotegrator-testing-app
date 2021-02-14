<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Good
 *
 * @property int id
 * @property string name
 * @property int qty
 *
 * @method static \Illuminate\Database\Eloquent\Builder available()
 */
class Good extends Model
{
    use HasFactory;

    protected $casts = [
        'qty' => 'integer',
    ];

    public function scopeAvailable(Builder $builder)
    {
        return $builder->where('qty', '>', 0);
    }
}
