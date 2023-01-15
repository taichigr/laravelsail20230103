<?php

namespace App\Article\UseCase;

use App\Models\Article;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\ValidationException;

final class UpdateArticleUsecase
{

    /**
     * 記事更新
     *
     * @param Article $article
     * @param string $title
     * @param string $body
     * @throws ValidationException
     */
    public function handle(Article $article, string $title, string $body)
    {
        try {
            $article->title = $title;
            $article->body = $body;
            $article->save();
        } catch(\Exception $e) {
            Log::error($e->getMessage());
            throw ValidationException::withMessages([
                'title' => '不具合が発生しました。お手数ですが時間を空けてから再度実行ください。'
            ]);
        }
    }
}
