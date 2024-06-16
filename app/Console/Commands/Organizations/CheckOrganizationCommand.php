<?php

namespace App\Console\Commands\Organizations;

use App\Models\Organization;
use App\Services\OrganizationCheckers\Checko\CheckoService;
use GuzzleHttp\Exception\GuzzleException;
use Illuminate\Console\Command;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class CheckOrganizationCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:check-org {organization}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Check validity of single organization';

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        try {
            /** @var Organization $organization */
            $organization = Organization::query()->findOrFail($this->argument('organization'));
            $service = new CheckoService();
            $result = $service->check($organization);
            $organization->update([
                'unreliability' => $result->isNotValid(),
                'unreliability_description' => $result->getDescription(),
            ]);
            print_r('Organization statues updated successfully' . PHP_EOL);
            return;
        } catch (ModelNotFoundException) {
            print_r('Unable to find organization with uuid ' . $this->argument('organization') . PHP_EOL);
            return;
        } catch (\Throwable $e) {
            print_r('Unable to check organization due to: ' . $e->getMessage() . PHP_EOL);
            return;
        }
    }
}
