<?php

namespace App\Article\UseCase;

use App\Models\Article;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\ValidationException;

final class ShowArticleListUseCase
{

    /**
     * 記事新規登録
     *
     * @throws ValidationException
     */
    public function handle(): array
    {
        $articles = Article::query()->latest('id')->paginate(5);

        return [
            'articles' => $articles,
        ];
    }
}
