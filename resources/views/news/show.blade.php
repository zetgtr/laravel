@extends('layouts.main')
@section('menu')
    <x-menu :category="$category"></x-menu>
@endsection
@section('content')
    <div class="container">
        <article class="blog-post">
            <h2 class="blog-post-title mb-1 mt-4">{{ $news['title'] }}</h2>
            <hr>
            <p class="blog-post-meta">{{$news['created_at']}} от <a href="#">{{$news['author']}}</a></p>

            <p>{{ $news['description'] }}</p>

        </article>
    </div>
@endsection
