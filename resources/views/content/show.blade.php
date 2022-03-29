@extends('content.layout')

@section('title', 'Show')

@section('content')
    <div class="w-100 text-left bg-dark text-light" style="height: 100%">
        <h1 class="mt-3">{{ $article->title }}</h1>
        <hr>
        <h3 class="my-5">{{ $article->text }}</h3>
        <p class="text-end italic">creator: {{ $article->user->name }}</p>
    </div>
@endsection