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
                method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                    {{-- Titolo --}}
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
                    {{-- Immagine --}}
                    <div class="image mb-3">
                        <label for="immagine" class="form-label"><h4>Aggiungi immagine</h4></label>
                        <input type="file" class="form-control" id="immagine" name="immagine" >
                    </div>
                    @error('immagine')
                        <p class="text-danger">{{$message}}</p>
                    @enderror
                    <p id="error-immagine" class="text-danger"></p>

                    {{-- Contenuto --}}
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
                    {{-- Categoria --}}
                    <div class="mb-3">
                        <select name="category_id" id="category_id">
                            <option value="">Seleziona una categoria</option>
                            @foreach ($categories as $category)
                            <option @if($category->id == old('category_id', $post->category ? $post->category->id : ''))
                                selected
                                @endif
                                value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Modifica</button>
                    <a onclick="return confirm('Sei sicuro di voler annullare tutte le modifiche?')" href="{{route('admin.posts.index')}}" class="btn btn-danger"><< Torna alla pagina principale</a>
                  </form>

            </div>
        </div>
    </div>
@endsection
