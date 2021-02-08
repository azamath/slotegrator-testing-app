<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Winning
 *
 * @property integer user_id
 * @property-read Model|\App\Contracts\Prize prize
 */
class Winning extends Model
{
    use HasFactory;

    protected $casts = [
        'user_id' => 'integer',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function prize()
    {
        return $this->morphTo('prize');
    }
}
