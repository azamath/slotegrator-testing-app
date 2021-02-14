<?php

namespace App\Console\Commands;

use App\Models\MoneyPrize;
use Illuminate\Console\Command;
use Illuminate\Database\Eloquent\Collection;

class WithdrawMoneyPrizesCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'prizes:withdraw-money {--chunk=10}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Withdraws all pending money prizes';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        MoneyPrize::pending()
            ->chunkById($this->option('chunk'), function (Collection $rows) {
                foreach ($rows as $moneyPrize) {
                    try {
                        $this->sendMoney($moneyPrize);
                    }
                    catch (\Exception $e) {
                    }
                }
            });

        return 0;
    }

    protected function sendMoney(MoneyPrize $moneyPrize)
    {
        if ($moneyPrize->withdraw()) {
            $this->line("Money prize <comment>[{$moneyPrize->id}]</comment> - sent.");
        }
    }
}
