<?php

namespace App\Http\Controllers;

use App\Http\Controllers\traits\NewsTrait;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    use NewsTrait;
    public function index(): Factory|View|Application
    {
       return \view("home", ['news'=>$this->getNewsCategory($this->getNews(), null), 'category'=>$this->getCategories()]);
    }

    public function show(string $name): string
    {
        return \view("home",['name'=>$name]);
    }
}
