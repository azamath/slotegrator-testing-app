<?php

namespace App\Services;

use App\Models\PointsPrize;
use App\Models\User;

class PointsConverter
{

    protected User $user;

    protected PointsPrize $pointsPrize;

    public function convert()
    {
        $this->user->loyalty += intval($this->pointsPrize->amount * config('prizes.points.convert_k'));
        $this->user->save();
        $this->pointsPrize->is_converted = true;
        $this->pointsPrize->save();
    }

    /**
     * @return \App\Models\User
     */
    public function getUser(): User
    {
        return $this->user;
    }

    /**
     * @param \App\Models\User $user
     *
     * @return PointsConverter
     */
    public function setUser(User $user): PointsConverter
    {
        $this->user = $user;

        return $this;
    }

    /**
     * @param \App\Models\PointsPrize $pointsPrize
     *
     * @return PointsConverter
     */
    public function setPointsPrize(PointsPrize $pointsPrize): PointsConverter
    {
        $this->pointsPrize = $pointsPrize;

        return $this;
    }
}
