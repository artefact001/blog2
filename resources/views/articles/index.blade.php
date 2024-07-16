@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <h1 class="mb-4">Articles</h1>
        <a href="{{ route('articles.create') }}" class="btn btn-primary mb-4">Créer un Article</a>
        <div class="row">
            @foreach($articles as $article)
                <div class="col-md-4">
                    <div class="card mb-4">
                        @if($article->image)
                            <img src="{{ asset('storage/' . $article->image) }}" alt="{{ $article->name }}" class="card-img-top">
                        @endif
                        <div class="card-body">
                            <h5 class="card-title">{{ $article->name }}</h5>
                            <p class="card-text">{{ $article->description }}</p>
                            <p><strong>Date de création:</strong> {{ $article->creation_date }}</p>
                            <div class="d-flex justify-content-between">
                                <a href="{{ route('articles.show', $article->id) }}" class="btn btn-link p-0"><i class="fas fa-eye"></i></a>
                                <a href="{{ route('articles.edit', $article->id) }}" class="btn btn-link p-0"><i class="fas fa-edit"></i></a>
                                <form action="{{ route('articles.destroy', $article->id) }}" method="POST" style="display:inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-link p-0"><i class="fas fa-trash-alt"></i></button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
