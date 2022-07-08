@extends('layouts.admin')

@section('title', 'Show')

@section('content')
    <div class="container py-5 d-flex justify-content-center align-items-center flex-column">
        <h2>ID : {{ $post->id }}</h2>
        <h3>" {{ $post->title }} "</h3>
        <p>" {{ $post->content }} "</p>
        <a href="{{ route('admin.posts.index') }}" class="btn btn-dark"><< Torna all'elenco</a>
    </div>
@endsection
