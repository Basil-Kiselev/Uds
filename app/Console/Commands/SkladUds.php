<?php

namespace App\Console\Commands;

use App\Models\Setting;
use App\Services\ItemService;
use Illuminate\Console\Command;

class SkladUds extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'SkladUds:create';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $skladId = '900e0d95-3aec-11ed-0a80-09f3000275ca';
        $skladToUds = new ItemService();
        $skladToUds->SkladToUds($skladId);
    }
}
