@extends('layouts.admin')

@section('title', 'Show')

@section('content')
    <div class="container d-flex justify-content-center">
        <div class="card" style="width: 18rem;">
            @if ($post->immagine)
            <img src="{{asset('image/'.$post->immagine)}}" class="card-img-top" alt="Immagine post">
            @else
            <img src="{{asset('image/_DSC4314-65.jpg')}}" class="card-img-top" alt="Immagine placeholder">
            @endif
            <div class="card-body text-center">
              <h6 class="card-title">#{{ $post->id }}</h6>
              <h5 class="card-title">" {{ $post->title }} "</h5>
              <p class="card-text">{{ $post->content }}</p>
            </div>
            <ul class="list-group list-group-flush">
                @if ($post->category)
                <li class="list-group-item">Categoria : {{ $post->category->name}}</li>
                @endif
            </ul>

            <div class="card-body d-flex justify-content-between">
                <a class="btn btn-success" href="{{ route('admin.posts.edit' , $post) }}" role="button">Modifica</a>
                <form
                class="d-inline"
                action="{{ route('admin.posts.destroy' , $post) }}"
                method="POST"
                onsubmit="return confirm('confermi l\'eliminazione di: {{ $post->title }}?')"
                >
                @csrf
                @method('DELETE')
                    <button type="submit" class="btn btn-danger">Cancella</button>
                </form>
            </div>
            <a href="{{ route('admin.posts.index') }}" class="btn btn-dark"><< Torna all'elenco</a>
        </div>
    </div>

@endsection
