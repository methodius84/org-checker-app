<?php

namespace App\Jobs\Organizations;

use App\DTO\OrganizationCheckers\CheckResponseDTO;
use App\Exceptions\InvalidInnException;
use App\Models\Organization;
use App\Services\OrganizationCheckers\CheckerServiceInterface;
use Illuminate\Bus\Batchable;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Log;

class CheckUnreliabilityJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels, Batchable;

    /**
     * Create a new job instance.
     */
    public function __construct(private readonly Organization $organization) {}

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        /** @var CheckerServiceInterface $service */
        $service = App::make(CheckerServiceInterface::class);
        try {
            /** @var CheckResponseDTO $result */
            $result = $service->check($this->organization);
            $this->organization->update([
                'unreliability' => $result->isNotValid(),
                'unreliability_description' => $result->getDescription()
            ]);
        } catch (InvalidInnException $exception) {
            $uuid = $this->organization->uuid;
            $error = $exception->getMessage();
            $code = $exception->getCode();
            $message = <<<EOT
Failed job of checking organization: $uuid
Code: $code
Message: $error
EOT;
            Log::error($message);
        }
    }
}
