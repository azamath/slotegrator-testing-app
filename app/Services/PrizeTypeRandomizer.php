<?php

namespace App\Services;

use App\Contracts\Prize;
use App\Exceptions\NoPrizeTypesException;

class PrizeTypeRandomizer
{
    protected array $types = [];

    public function registerType($class)
    {
        $this->types[] = $class;
    }

    public function run(): Prize
    {
        if (!count($this->types)) {
            throw new NoPrizeTypesException('No prize types were registered.');
        }

        $which = $this->types[array_rand($this->types)];

        return new $which;
    }
}
