<?php

namespace App\Services\OrganizationCheckers;

use App\DTO\OrganizationCheckers\ResponseInterface;
use App\Exceptions\InvalidInnException;
use App\Models\Organization;

interface CheckerServiceInterface
{
    /**
     * @param Organization $organization
     * @throws InvalidInnException
     * @return ResponseInterface
     */
    public function check(Organization $organization): ResponseInterface;
}
