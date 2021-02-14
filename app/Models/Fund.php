<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property integer amount
 */
class Fund extends Model
{
    use HasFactory;

    protected $casts = [
        'amount' => 'integer',
    ];
}
