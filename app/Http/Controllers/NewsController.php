<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Controllers\traits\NewsTrait;;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    use NewsTrait;
    public function index(int $id = null): View
    {
        return \view('news.news', [
            'news'=>$this->getNewsCategory($this->getNews(), $id),
            'id' => $id,
            'category'=>$this->getCategories()
        ]);
    }

    public function show(Request $request,int $id = null): View
    {
        return \view('news.show', ['news'=>$this->getNews($id),
            'showForm'=>\view('components.form.showNews',['id'=>$id]),
            'status'=> $request->query('status'),
            'category'=>$this->getCategories()]);
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
