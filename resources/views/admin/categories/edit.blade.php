@extends('layouts.admin')
@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
        <h1 class="h2">Редактировать категорию</h1>
        <div class="btn-toolbar mb-2 mb-md-0">

        </div>
    </div>
    <div>
        @if ($errors->any())
            @foreach($errors->all() as $error)
                <x-alert type="danger" :message="$error"></x-alert>
            @endforeach
        @endif
        <form method="post" action="{{ route('admin.category.update', ['category' => $category]) }}">
            @csrf
            @method('put')
            <div class="mb-3">
                <label for="title">Заголовок</label>
                <input type="text" id="title" name="title" value="{{ $category->title }}" class="form-control">
            </div>
            <div>
                <label for="description">Описание</label>
                <textarea class="form-control" id="description" name="description">{!! $category->description !!}</textarea>
            </div>

            <br>
            <button type="submit" class="btn btn-success">Сохранить</button>
        </form>
    </div>
@endsection
