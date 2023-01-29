<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Controllers\traits\NewsTrait;
use App\Models\News;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    use NewsTrait;
    public function index(): Factory|View|Application
    {
        $newsClass = new News();
        return \view("home", ['news'=>$newsClass->getCategoryNews(2), 'category'=>$this->getCategories()]);
    }
}
