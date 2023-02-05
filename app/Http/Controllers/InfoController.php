<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\QueryBuilder\CategoriesBuilder;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class InfoController extends Controller
{
    public function index(Request $request,CategoriesBuilder $categoriesBuilder): View
    {
        return \view("news.info", ['aboutForm'=>\view('components.form.info'),'category'=>$categoriesBuilder->getAll(), 'status' => $request->query('status')]);
    }
    public function store(Request $request): RedirectResponse
    {
        $message = "Пользователь: ".$request->get('user')."\n".
            "Комментарий: ".$request->get('comment');
        file_put_contents('about.txt', $message);
        return redirect()->route('info', ['status'=>'success']);
    }
}
