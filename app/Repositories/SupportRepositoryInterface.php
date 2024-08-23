<?php

namespace App\Repositories;

use App\DTO\{CreateSupportDTO, UpdateSupportDTO};
use stdClass;

interface SupportRepositoryInterface {
    public function paginate(int $page, int $totalPerPage = 15, string $filter = null): PaginationInterface;
    public function getAll(string $filter = null): array;
    public function findOne(string $id): stdClass|null;
    public function delete(string $id): bool;
    public function new(CreateSupportDTO $dto): stdClass;
    public function update(UpdateSupportDTO $dto): stdClass|null;
}
