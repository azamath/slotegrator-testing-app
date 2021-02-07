<?php

namespace App\Http\Controllers;

use App\Services\GoodPrize;
use App\Services\MoneyPrize;
use App\Services\PointsPrize;
use App\Services\PrizeTypeRandomizer;
use Illuminate\Http\Request;

class PrizeController extends Controller
{

    public function dashboard()
    {
        return view('dashboard');
    }

    public function getPrize(PrizeTypeRandomizer $randomizer)
    {
        // this can be moved to separate service provider
        $randomizer->registerType(MoneyPrize::class);
        $randomizer->registerType(PointsPrize::class);
        $randomizer->registerType(GoodPrize::class);

        $prize = $randomizer->run();

        $prize->generate();

        session()->flash('prize', trans('prize.messages.won', ['prize' => $prize->name()]));

        return redirect()->back();
    }
}
