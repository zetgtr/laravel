
@extends('layouts.admin')
@section('title', __('admin/page.menu_settings'))
@section('content')
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xl-12">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xl-12">
                    <div class="card overflow-hidden">
                        <x-admin.navigation :links="$menuLinks" />
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-8">
                                    <div class="dd nestable" id="nestable">
                                        <x-admin.settings.menu.dd :menu="$menu" :menus="$menus" />
                                    </div>
                                    <br>
                                </div>
                                <form action="{{ route('admin.settings.menu.store') }}" id="menu_form" method="post" class="col-lg-4">
                                    @csrf
                                    @if ($errors->any())
                                        @foreach($errors->all() as $error)
                                            <x-alert type="danger" :message="$error"></x-alert>
                                        @endforeach
                                    @endif
                                    <input type="hidden" name="position" value="{{ $menu }}">
                                    <h3 class="menu_title">Добавить меню</h3>
                                    <div class="form-group">
                                        <label for="menu_name" class="col-md-3 form-label">Название</label>
                                        <input type="text" id="menu_name" name="name" value="{{old('name')}}" class="form-control @error('name') is-invalid @enderror">
                                        <x-error error-value="name" />
                                    </div>
                                    <div class="form-group">
                                        <label for="menu_logo" class="col-md-3 form-label" >Лого</label>
                                        <input type="text" id="menu_logo" name="logo" value="{{old('logo')}}" class="form-control @error('logo') is-invalid @enderror">
                                        <x-error error-value="logo" />
                                    </div>
                                    <div class="form-group">
                                        <label for="menu_url" class="col-md-3 form-label">url</label>
                                        <input type="text" id="menu_url" name="url" value="{{old('url')}}" class="form-control @error('url') is-invalid @enderror" >
                                        <x-error error-value="url" />
                                    </div>
                                    <button class="btn btn-success menu_success btn-lg mb-3 me-2">Добавить</button>
                                    <button class="btn btn-danger d-none menu_danger btn-lg mb-3 me-2" >Отменить</button>
                                </form>
                            </div>
                        </div>
                    </div>
            </div>
        </div>
    </div>
        <input type="hidden" id="route_dd" value="{{  route('admin.settings.menu.order') }}">
        <input type="hidden" id="route_store" value="{{  route('admin.settings.menu.store') }}">
        <input type="hidden" name="_method" id="route_put" value="put">
        <script src="{{asset('assets/js/admin/delete.js')}}" ></script>
        <script src="{{asset('assets/js/admin/dnd.js')}}" ></script>
        <script src="{{asset('assets/js/admin/settings/menu/edit.js')}}" ></script>
@endsection
