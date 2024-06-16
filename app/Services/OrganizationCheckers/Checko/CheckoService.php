<?php

namespace App\Services\OrganizationCheckers\Checko;

use App\DTO\OrganizationCheckers\CheckResponseDTO;
use App\Models\Organization;
use App\Services\OrganizationCheckers\CheckerServiceInterface;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;

final class CheckoService implements CheckerServiceInterface
{
    private readonly Client $client;
    public function __construct()
    {
        $this->client = new Client([
            'base_uri' => config('services.checko.base_uri')
        ]);
    }

    /**
     * @param Organization $organization
     * @return CheckResponseDTO
     * @throws GuzzleException
     */
    public function check(Organization $organization): CheckResponseDTO
    {
        $url = 'company?key=' . config('services.checko.api_key') . '&inn=' . $organization->inn;

        $response = $this->client->get($url);
        $data = json_decode($response->getBody()->getContents(), true)['data'];
        $address = $data['ЮрАдрес'];
        return CheckResponseDTO::fromArray($address);
    }
}
