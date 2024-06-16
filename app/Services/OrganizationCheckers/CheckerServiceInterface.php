<?php

namespace App\Services\OrganizationCheckers;

use App\DTO\OrganizationCheckers\ResponseInterface;
use App\Models\Organization;

interface CheckerServiceInterface
{
    public function check(Organization $organization): ResponseInterface;
}
