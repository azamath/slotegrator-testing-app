<?php

namespace App\Enums;

use Konekt\Enum\Enum;

/**
 * Class GoodStatus
 *
 * @method static \App\Enums\GoodStatus NEW()
 * @method static \App\Enums\GoodStatus REJECTED()
 * @method static \App\Enums\GoodStatus ACCEPTED()
 * @method static \App\Enums\GoodStatus SENT()
 * @method boolean isNew()
 * @method boolean isRejected()
 * @method boolean isAccepted()
 * @method boolean isSent()
 */
class GoodStatus extends Enum
{
    public const __DEFAULT = self::NEW;
    public const NEW = 'new';
    public const REJECTED = 'rejected';
    public const ACCEPTED = 'accepted';
    public const SENT = 'sent';
}
