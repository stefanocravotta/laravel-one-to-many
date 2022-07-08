@extends('layouts.admin')

@section('title', 'Edit')

@section('content')
    <div class="container">
            @if ($errors->any())
                <div class="alert alert-danger" role="alert">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        <div class="row">
            <div class="col-8 offset-2">
                <form id="form-edit" action="{{ route('admin.posts.update', $post) }}"
                method="POST">
                @csrf
                @method('PUT')
                    <div class="mb-3">
                      <label for="title" class="form-label">Titolo</label>
                      <input type="text" name="title"
                      value="{{ old ('title', $post->title)}}"
                      class="form-control @error('title') is-invalid @enderror" id="title"
                      placeholder="Inserisci un titolo">
                      @error('title')
                        <p class="text-danger">{{ $message }}</p>
                      @enderror
                      <p class="text-danger" id="error-title"></p>
                    </div>
                    <div class="mb-3">
                      <label for="content" class="form-label">Contenuto del post</label>
                      <textarea
                      name="content" id="content"
                      class="form-control @error('content') is-invalid @enderror" cols="30" rows="10">{{ old('content' , $post->content) }}</textarea>
                      @error('content')
                        <p class="text-danger">{{ $message }}</p>
                      @enderror
                      <p class="text-danger" id="error-content"></p>
                    </div>
                    <button type="submit" class="btn btn-primary">Modifica</button>
                    <a onclick="return confirm('Sei sicuro di voler annullare tutte le modifiche?')" href="{{route('admin.posts.index')}}" class="btn btn-danger"><< Torna alla pagina principale</a>
                  </form>

            </div>
        </div>
    </div>
@endsection
