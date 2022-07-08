@extends('layouts.admin')

@section('title', 'Crea il tuo post')

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
                <form id="form-create" action="{{ route('admin.posts.store') }}"
                method="POST" enctype="multipart/form-data">
                @csrf
                    {{-- Title --}}
                    <div class="mb-3">
                      <label for="title" class="form-label">Titolo</label>
                      <input type="text" name="title"
                      value="{{ old('title') }}"
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
                        <input type="file" class="form-control" id="immagine" name="immagine" accept="image/*">
                    </div>
                    @error('immagine')
                        <p class="text-danger">{{$message}}</p>
                    @enderror
                    {{-- Content --}}
                    <div class="mb-3">
                      <label for="content" class="form-label">Contenuto del post</label>
                      <textarea
                      name="content" id="content"
                      class="form-control @error('content') is-invalid @enderror" cols="30" rows="10">{{ old('content') }}</textarea>
                      @error('content')
                        <p class="text-danger">{{ $message }}</p>
                      @enderror
                      <p class="text-danger" id="error-content"></p>
                    </div>
                    {{-- Categories --}}
                    <div class="mb-3">
                        <select name="category_id" id="category_id">
                            <option value="">Seleziona una categoria</option>
                            @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Crea</button>
                  </form>
            </div>
        </div>
    </div>
@endsection
