<?php

declare(strict_types=1);

namespace App\Http\Controllers\admin;

use App\Enums\NewsStatus;
use App\Http\Controllers\Controller;
use App\Models\News;
use App\QueryBuilder\CategoriesBuilder;
use App\QueryBuilder\NewsBuilder;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param NewsBuilder $newsBuilder
     * @return View
     */
    public function index(NewsBuilder $newsBuilder): View
    {
        return \view('admin.news.index', [
            'newsList' => $newsBuilder->getNewsWithPagination(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param CategoriesBuilder $categoriesBuilder
     * @return View
     */
    public function create(CategoriesBuilder $categoriesBuilder): View
    {
        return \view('admin.news.create', [
            'categories' => $categoriesBuilder->getAll(),
            'statuses' => NewsStatus::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'title' => 'required',
        ]);

        $news = new News($request->except('_token', 'category_id')); //News::create();

        if ($news->save()) {
            $news->categories()->sync((array) $request->input('category_ids'));
            return \redirect()->route('admin.news.index')->with('success', 'Новость успешно добавлена');
        }

        return \back()->with('error', 'Не удалось сохранить запись');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param News $news
     * @param CategoriesBuilder $categoriesBuilder
     * @return View
     */
    public function edit(News $news, CategoriesBuilder $categoriesBuilder): View
    {
        return \view('admin.news.edit', [
            'news' => $news,
            'categories' => $categoriesBuilder->getAll(),
            'statuses' => NewsStatus::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param News $news
     * @return RedirectResponse
     */
    public function update(Request $request, News $news): RedirectResponse
    {
        $news = $news->fill($request->except('_token', 'category_ids'));
        if ($news->save()) {
            $news->categories()->sync((array) $request->input('category_ids'));
            return \redirect()->route('admin.news.index')->with('success', 'Новость успешно обновлена');
        }

        return \back()->with('error', 'Не удалось сохранить запись');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param News $news
     * @return array
     */

    public function destroy(News $news): array
    {
        if($news->delete())
            return ['status' => true,'message' => 'Запись успешно удалена'];
        else
            return ['status' => false,'message' => 'Ошибка удаления'];
    }
}
