<?php

namespace App\Article\UseCase;

use App\Models\Article;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\ValidationException;

final class DeleteArticleUseCase
{

    /**
     * 記事投稿削除処理
     *
     * @param Article $article
     * @param string $title
     * @param string $body
     * @throws ValidationException
     */
    public function handle(Article $article)
    {
        if($article->user_id !== Auth::id()) {
            abort(403);
        }
        $article->delete();
    }
}
