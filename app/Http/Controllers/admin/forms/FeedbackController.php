<?php

declare(strict_types=1);

namespace App\Http\Controllers\admin\forms;

use App\Http\Controllers\Controller;
use App\Models\Forms\Feedback;
use App\QueryBuilder\Forms\FeedbackBuilder;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;
use PHPUnit\Exception;

class FeedbackController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index(FeedbackBuilder $feedbackBuilder) : View
    {
        return \view("admin.forms.feedback.index", ['feedbacks'=>$feedbackBuilder->getFeedbackPagination()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
        $feedback = new Feedback($request->except('_token'));
        if($feedback->save())
        {
            return redirect()->route('info')->with('success', 'Комментарий успешно оставлен');
        }
        return \back()->with('error', 'Не удалось сохранить запись');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Feedback $feedback
     * @return array
     */
    public function destroy(Feedback $feedback): array
    {
        try {
            $feedback->delete();
            $request = ['status' => true,'message' => 'Запись успешно удалена'];
        }catch (Exception $exception)
        {
            $request = ['status' => false, 'message' => $exception->getMessage()];
        }
        return $request;
    }
}
