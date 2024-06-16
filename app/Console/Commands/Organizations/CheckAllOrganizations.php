<?php

namespace App\Console\Commands\Organizations;

use App\Jobs\Mail\SendReport;
use App\Jobs\Organizations\CheckUnreliabilityJob;
use App\Models\Organization;
use Illuminate\Bus\Batch;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Bus;
use Illuminate\Support\Facades\Log;

class CheckAllOrganizations extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:check-organizations';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     * @throws \Throwable
     */
    public function handle(): void
    {
        $organizations = Organization::all();
        $batch = [];
        foreach ($organizations as $organization) {
            $batch[] = new CheckUnreliabilityJob($organization);
        }
        $batch[] = new SendReport();
        Bus::batch($batch)
            ->catch(function (Batch $batch, \Throwable $e) {
                Log::channel('emergency')->error('Error batching jobs in batch ' . $batch->id . ', error:' . $e->getMessage());
            })
            ->name('check organizations')
            ->dispatch();
    }
}
