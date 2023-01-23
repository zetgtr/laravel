<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Controllers\traits\NewsTrait;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    use NewsTrait;
    public function index(int $id = null): Factory|View|Application
    {
        return \view('news.news', ['news'=>$this->getNewsCategory($this->getNews(), $id), 'category'=>$this->getCategories()]);
    }

    public function show(int $id = null): Factory|View|Application
    {
        return \view('news.show', ['news'=>$this->getNews($id), 'category'=>$this->getCategories()]);
    }
}
