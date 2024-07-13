@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <h1 class="mb-4">{{ $article->name }}</h1>
            <div class="card mb-4">
                <div class="card-body">
                    <p>{{ $article->description }}</p>
                    <p><strong>Date de création:</strong> {{ $article->creation_date }}</p>
                    @if($article->image)
                        <img src="{{ asset('storage/' . $article->image) }}" alt="{{ $article->name }}" class="img-fluid">
                    @endif
                </div>
            </div>

            <h2>Commentaires</h2>
            @if($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form action="{{ route('comments.store', $article->id) }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="content">Commentaire</label>
                    <textarea class="form-control" id="content" name="content" required></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Ajouter un Commentaire</button>
            </form>

            <ul class="list-group mt-4">
                @foreach($article->comments as $comment)
                    <li class="list-group-item">
                        {{ $comment->content }}
                        <div class="float-right">
                            <a href="{{ route('comments.edit', [$article->id, $comment->id]) }}" class="btn btn-warning btn-sm">Modifier</a>
                            <form action="{{ route('comments.destroy', [$article->id, $comment->id]) }}" method="POST" style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Supprimer</button>
                            </form>
                        </div>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
@endsection
