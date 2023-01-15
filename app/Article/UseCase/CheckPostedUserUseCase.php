<?php

namespace App\Article\UseCase;

use App\Models\Article;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\ValidationException;

final class CheckPostedUserUseCase
{

    /**
     * 記事投稿をしたユーザーかのチェック
     *
     * @param Article $article
     * @throws ValidationException
     */
    public function handle(Article $article)
    {
        if($article->user_id !== Auth::id()) {
            abort(403);
        }
    }
}
