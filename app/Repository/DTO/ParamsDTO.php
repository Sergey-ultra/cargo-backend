<?php

namespace App\Repository\DTO;

final class ParamsDTO
{
    public function __construct(
        public readonly array $filter,
        public readonly ?string $sort,
        public readonly int $perPage
    ){}
}
