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
     * Generates a price value
     *
     * @return void
     */
    public function generate();
}
