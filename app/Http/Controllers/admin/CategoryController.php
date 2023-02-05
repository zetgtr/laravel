<?php

declare(strict_types=1);

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\QueryBuilder\CategoriesBuilder;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param CategoriesBuilder $CategoriesBuilder
     * @return View
     */
    public function index(CategoriesBuilder $CategoriesBuilder): View
    {
        return \view('admin.categories.index', [
            'categories' => $CategoriesBuilder->getCategoriesWithPagination(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create(): View
    {
        return \view('admin.categories.create');
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

        $category = new Category($request->except('_token'));

        if ($category->save()) {
            return \redirect()->route('admin.category.index')->with('success', 'Новость успешно добавлена');
        }

        return \back()->with('error', 'Не удалось сохранить запись');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category): View
    {
        return \view('admin.categories.edit', [
            'category' => $category,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Category $category
     * @return RedirectResponse
     */
    public function update(Request $request, Category $category): RedirectResponse
    {
        $category = $category->fill($request->except('_token'));
        if ($category->save()) {
            return \redirect()->route('admin.category.index')->with('success', 'Категория успешно обновлена');
        }

        return \back()->with('error', 'Не удалось сохранить запись');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Category $category
     * @return array
     */
    public function destroy(Category $category): array
    {
        if($category->delete())
            return ['status' => true,'message' => 'Запись успешно удалена'];
        else
            return ['status' => false,'message' => 'Ошибка удаления'];
    }
}
