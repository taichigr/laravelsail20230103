<?php

namespace App\Article\UseCase;

use App\Models\Article;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\ValidationException;

final class ShowArticleUseCase
{

    /**
     * 記事表示
     *
     * @throws ValidationException
     */
    public function handle(Article $article): array
    {
        return [
            'article' => $article,
        ];
    }
}
