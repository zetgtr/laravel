<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index(): string
    {
        return "Show news list";
    }

    public function show(int $id): string
    {
        return "Show news with #id " . $id;
    }
}
