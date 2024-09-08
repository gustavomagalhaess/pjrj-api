<?php

declare(strict_types=1);

namespace App\Services;

use Illuminate\Http\Request;

interface ServiceInterface
{
    public function list();
    public function find(int $id);
    public function delete(int $id);
    public function store(Request $request);
    public function update(int $id, Request $request);
}
