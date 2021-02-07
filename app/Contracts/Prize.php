<?php

namespace App\Contracts;

interface Prize
{
    /**
     * Get the name of a price
     *
     * @return string
     */
    public function name(): string;

    /**
     * If prize is available for giving
     *
     * @return bool
     */
    public function isAvailable(): bool;

    /**
     * Generates a price value
     *
     * @return void
     */
    public function generate();
}
