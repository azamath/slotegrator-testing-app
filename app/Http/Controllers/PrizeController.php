<?php

namespace App\Http\Controllers;

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
        $prize = $randomizer->run();

        session()->flash('prize', trans('prize.messages.won', ['prize' => $prize->name()]));

        return redirect()->back();
    }
}
