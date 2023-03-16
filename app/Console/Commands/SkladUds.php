<?php

namespace App\Console\Commands;

use App\Services\ItemService;
use Illuminate\Console\Command;

class SkladUds extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'SkladUds';

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
    public function handle($id)
    {
        $skladToUds = new ItemService();
        $skladToUds->SkladToUds($id);
    }
}
