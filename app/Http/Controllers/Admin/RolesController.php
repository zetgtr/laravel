<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\RolesRequest;
use App\Models\Admin\Roles;
use App\QueryBuilder\RolesBuilder;
use Exception;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;

class RolesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(RolesBuilder $rolesBuilder): View
    {
        return view('admin.roles.index', ['roles' => $rolesBuilder->getAll()]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(RolesRequest $request): RedirectResponse
    {
        $roles = Roles::create($request->validated());
        if ($roles) {
            return \redirect()->route('admin.roles.index');
        }

        return \back();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id): Response
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id): Response
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id): RedirectResponse
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Roles $role): RedirectResponse|array
    {
        try {
            $role->delete();
            $response = ['status' => true,'message' => __('messages.admin.news.destroy.success')];
        } catch (Exception $exception)
        {
            $response = ['status' => false,'message' => __('messages.admin.news.destroy.fail').$exception->getMessage()];
        }

        return $response;
    }
}
