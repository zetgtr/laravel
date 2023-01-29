<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\News;
use App\QueryBuilder\CategoriesBuilder;
use App\QueryBuilder\NewsBuilder;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index(int $id,NewsBuilder $newsBuilder, CategoriesBuilder $categoriesBuilder): View
    {
        return \view('news.news', [
            'news'=>$newsBuilder->getCategoriesNews($id),
            'id' => $id,
            'category'=>$categoriesBuilder->getAll()
        ]);
    }

    public function show(Request $request,int $id,NewsBuilder $newsBuilder, CategoriesBuilder $categoriesBuilder): View
    {
        return \view('news.show', ['news'=>$newsBuilder->get($id),
            'showForm'=>\view('components.form.showNews',['id'=>$id]),
            'status'=> $request->query('status'),
            'category'=>$categoriesBuilder->getAll()]);
    }

    public function store(Request $request): RedirectResponse
    {
        $message = "Пользователь: ".$request->get('user')."\n".
            "Телефон: ".$request->get('phone')."\n".
            "email: ".$request->get('email')."\n".
            "Информация: ".$request->get('info');
        file_put_contents('newsSow.txt', $message);
        return redirect()->route('news.show', ['id' => $request->get('id'), 'status'=>'success']);
    }
}
