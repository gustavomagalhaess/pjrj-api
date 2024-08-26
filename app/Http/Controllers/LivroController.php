<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Services\LivroService;

class LivroController extends Controller
{
    public function __construct(LivroService $service){
        parent::__construct($service);
    }
}
