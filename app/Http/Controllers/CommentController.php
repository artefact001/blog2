<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Request $request, Article $article)
    {
        $request->validate([
            'content' => 'required|string',
        ]);

        $comment = new Comment();
        $comment->content = $request->content;
        $comment->article_id = $article->id;
        $comment->save();

        return redirect()->route('articles.show', $article->id)->with('success', 'Commentaire ajouté avec succès!');
    }

    public function edit(Article $article, Comment $comment)
    {
        return view('comments.edit', compact('article', 'comment'));
    }

    public function update(Request $request, Article $article, Comment $comment)
    {
        $request->validate([
            'content' => 'required|string',
        ]);

        $comment->content = $request->content;
        $comment->save();

        return redirect()->route('articles.show', $article->id)->with('success', 'Commentaire modifié avec succès!');
    }

    public function destroy(Article $article, Comment $comment)
    {
        $comment->delete();

        return redirect()->route('articles.show', $article->id)->with('success', 'Commentaire supprimé avec succès!');
    }
}
