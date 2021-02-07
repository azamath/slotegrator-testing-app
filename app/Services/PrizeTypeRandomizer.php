<?php

namespace App\Services;

use App\Contracts\Prize;
use App\Exceptions\NoPrizeTypesException;

class PrizeTypeRandomizer
{
    /**
     * @var Prize[]
     */
    protected array $types = [];

    /**
     * Register some prize type
     *
     * @param string $class Prize type class name
     */
    public function registerType(string $class)
    {
        $this->types[] = app($class);
    }

    public function run(): Prize
    {
        if (!count($this->types)) {
            throw new NoPrizeTypesException('No prize types were registered.');
        }

        $available = $this->available();

        return $this->types[array_rand($available)];
    }

    protected function available()
    {
        return array_filter($this->types, fn(Prize $type) => $type->isAvailable());
    }
}
