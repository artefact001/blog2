@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <h1 class="mb-4">Modifier le Commentaire</h1>
            @if($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form action="{{ route('comments.update', [$article->id, $comment->id]) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="content">Commentaire</label>
                    <textarea class="form-control" id="content" name="content" required>{{ $comment->content }}</textarea>
                </div>
                <button type="submit" class="btn btn-primary">Modifier</button>
            </form>
        </div>
    </div>
@endsection
