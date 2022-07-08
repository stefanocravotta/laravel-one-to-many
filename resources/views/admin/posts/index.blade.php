@extends('layouts.admin')

@section('title', 'Elenco dei post')

@section('content')
<div class="container py-5">
    @if (session('delete_post'))
        <div class="alert alert-danger d-flex justify-content-between" role="alert">
            <p>{{session('delete_post')}}</p>
            <a class="btn btn-danger" href="{{ route('admin.posts.index') }}">X</a>
        </div>
    @endif
    <table class="table">
        <thead>
          <tr>
            <th scope="col">ID</th>
            <th scope="col">Titolo</th>
            <th scope="col">Categoria</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
        @foreach ($posts as $post)
            <tr>
                <th scope="row">{{ $post->id }}</th>
                <td><a href="{{ route('admin.posts.show' , $post) }}" class="text-reset">{{ $post->title }}</a></td>
                <th scope="row">{{ $post->category ? $post->category->name : '-' }}</th>
                <td>
                    <a href="{{ route('admin.posts.show' , $post) }}" class="btn btn-primary">Show</a>
                    <a class="btn btn-success" href="{{ route('admin.posts.edit' , $post) }}" role="button">Edit</a>
                    <form
                    class="d-inline"
                    action="{{ route('admin.posts.destroy' , $post) }}"
                    method="POST"
                    onsubmit="return confirm('confermi l\'eliminazione di: {{ $post->title }}?')"
                    >
                    @csrf
                    @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
      </table>
      {{ $posts->links() }}
      <h2 class="text-center my-4">Lista categorie</h2>
      @foreach ($categories as $category)
        <div class="w-50 py-2 float-left">
            <h4>{{ $category->name }}</h4>
            <ul>
                @forelse ($category->posts as $post)
                    <li><a href="{{ route('admin.posts.show' , $post) }}">{{ $post->title }}</a></li>
                @empty
                    <li>Non sono presenti elementi in questa categoria</li>
                @endforelse
            </ul>
        </div>
      @endforeach
</div>
@endsection
