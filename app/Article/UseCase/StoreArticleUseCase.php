<?php

namespace App\Article\UseCase;

use App\Models\Article;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\ValidationException;

final class StoreArticleUsecase
{

    /**
     * 記事新規登録
     *
     * @param string $title
     * @param string $body
     * @throws ValidationException
     */
    public function handle(string $title, string $body)
    {
        try {
            $model = new Article();
            $model->title = $title;
            $model->body = $body;
            $model->user_id = Auth::id();
            $model->save();
        } catch(\Exception $e) {
            Log::error($e->getMessage());
            throw ValidationException::withMessages([
                'title' => '不具合が発生しました。お手数ですが時間を空けてから再度実行ください。'
            ]);
        }
    }
}
