@extends('layouts.admin')

@section('title', 'Admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <h3>Bentornato {{ Auth::user()->name }}</h3>
                </div>
            </div>
            <div class="card mt-4">
                <div class="card-header">Le mie attivit&agrave;</div>

                <div class="card-body">
                    <a class="mr-3" href="http://localhost:8888/phpMyAdmin5/">Link del DB</a>
                    <a class="mr-3 text-reset" href="{{ route('admin.posts.index') }}">Elenco dei post</a>
                    <a class="mr-3 text-reset" href="{{ route('admin.posts.create') }}">Crea un nuovo post</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
