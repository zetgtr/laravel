@extends('layouts.main')
@section('menu')
    <x-menu :category="$category"></x-menu>
@endsection
@section('content')
    <div class="container">
        <div class="row mb-2 mt-4">
            @foreach($news as $n)
                <div class="col-md-6">
{{--                    <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">--}}
{{--                        <div class="col p-4 d-flex flex-column position-static">--}}
{{--                            <strong class="d-inline-block mb-2 text-primary">{{$n['author']}}</strong>--}}
{{--                            <h3 class="mb-0">{{$n['title']}}</h3>--}}
{{--                            <div class="mb-1 text-muted">{{$n['created_at']}}</div>--}}
{{--                            <p class="card-text mb-auto">{{$n['description']}}</p>--}}
{{--                            <a href="{{ route('news.show', ['id' => $n['id']]) }}" class="stretched-link">Подробнее</a>--}}
{{--                        </div>--}}
{{--                        <div class="col-3 d-none d-lg-block">--}}
{{--                            <svg class="bd-placeholder-img" width="200" height="250" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"/></svg>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    {{ $n }}--}}
                    <x-home.news_big :news="$n"></x-home.news_big>
                </div>

            @endforeach
        </div>
    </div>
@endsection
