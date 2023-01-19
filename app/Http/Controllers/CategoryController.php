<?php

namespace App\Http\Controllers;

use App\Http\Controllers\traits\NewsTrait;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    use NewsTrait;

    public function index()
    {
//        return \view('news.category',['categorys'=>]);
    }
}
