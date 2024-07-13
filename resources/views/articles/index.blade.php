@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <h1 class="mb-4">Articles</h1>
            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nom</th>
                        <th>Description</th>
                        <th>Date de création</th>
                        <th>Image</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($articles as $article)
                        <tr>
                            <td>{{ $article->id }}</td>
                            <td>{{ $article->name }}</td>
                            <td>{{ $article->description }}</td>
                            <td>{{ $article->creation_date }}</td>
                            <td><img src="{{ asset('storage/' . $article->image) }}" alt="{{ $article->name }}" width="100"></td>
                            <td>
                                <a href="{{ route('articles.show', $article->id) }}" class="btn btn-info">Voir</a>
                                <a href="{{ route('articles.edit', $article->id) }}" class="btn btn-warning">Modifier</a>
                                <form action="{{ route('articles.destroy', $article->id) }}" method="POST" style="display:inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Supprimer</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
