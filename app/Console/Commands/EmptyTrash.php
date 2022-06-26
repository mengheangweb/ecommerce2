<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Product;

class EmptyTrash extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'emptytrash';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Use for completely remove soft delete';

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
        $last_month = now()->subMonths(1)->format('Y-m-d');

        $queries = Product::withTrashed()->where('deleted_at', '<', $last_month);

        $count = $queries->count();

        $products = $queries->forceDelete();

        $this->info("{$count} product completely deleted.");
        return 0;
    }
}
