<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use Illuminate\Http\Request;

interface ControllerInterface
{
    public function list();
    public function find(int $id);
    public function store(Request $request);
    public function update(int $id, Request $request);
    public function delete(int $id);
}
