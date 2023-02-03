<?php

declare(strict_types=1);

namespace App\Http\Controllers\admin\forms;

use App\Http\Controllers\Controller;
use App\Models\Forms\Unloading;
use App\QueryBuilder\Forms\UnloadingBuilder;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;
use PHPUnit\Exception;

class UnloadingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param UnloadingBuilder $unloadingBuilder
     * @return View
     */
    public function index(UnloadingBuilder $unloadingBuilder): View
    {
        return view('admin.forms.unloading.index',['unloadingList' => $unloadingBuilder->getUnloadingPagination()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
        $unloading = new Unloading($request->except('_token'));
        if($unloading->save())
        {
            return \back()->with('success', 'Комментарий успешно оставлен');
        }
        return \back()->with('error', 'Не удалось сохранить запись');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Unloading $unloading
     * @return array
     */
    public function destroy(Unloading $unloading): array
    {
        try {
            $unloading->delete();
            $request = ['status' => true,'message' => 'Запись успешно удалена'];
        }catch (Exception $exception)
        {
            $request = ['status' => false, 'message' => $exception->getMessage()];
        }
        return $request;
    }
}
