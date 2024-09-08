<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Services\BookService;

class BookController extends AbstractController
{
    public function __construct(BookService $service){
        parent::__construct($service);
    }
}
