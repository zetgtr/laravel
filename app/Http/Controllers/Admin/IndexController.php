<?php

declare(strict_types=1);

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;

class IndexController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param Request $request
     * @return View
     */
    public function __invoke(Request $request) : View
    {
        return \view("admin.index");
    }
}
