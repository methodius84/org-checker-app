<?php

namespace App\DTO\OrganizationCheckers;

class CheckResponseDTO implements ResponseInterface
{
    private bool $isNotValid;
    private ?string $description;

    public static function fromArray(array $data): self
    {
        $item = new self();
        $item->isNotValid = $data['Недост'];
        $item->description = $data['НедостОпис'] ?? null;
        return $item;
    }

    public function isNotValid(): bool
    {
        return $this->isNotValid;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }
}
