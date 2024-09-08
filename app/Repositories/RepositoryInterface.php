<?php

declare(strict_types=1);

namespace App\Repositories;

interface RepositoryInterface
{
    public function list();
    public function find(int $id);
    public function delete(int $id);
    public function store(array $form);
    public function update(array $form);
}
