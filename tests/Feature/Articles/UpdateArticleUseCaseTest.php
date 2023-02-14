<?php

namespace Tests\Feature\Articles;

use App\Article\UseCase\UpdateArticleUseCase;
use App\Models\Article;
use App\Models\User;
use Illuminate\Validation\ValidationException;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Tests\TestCase;

class UpdateArticleUseCaseTest extends TestCase
{

    private UpdateArticleUseCase $useCase;

    /**
     * setUpメソッドは、各テストケースが実行される前に必ず実行される
     */
    protected function setUp(): void
    {
        parent::setUp();
        $this->useCase = new UpdateArticleUseCase();
    }
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_update_articletaichan()
    {
        // 例外処理発火用の処理
        // $this->expectException(ValidationException::class);
        // $this->expectExceptionObject(ValidationException::withMessages([
        //     'title' => '不具合が発生しました。お手数ですが時間を空けてから再度実行ください。',
        // ]));

        // ログインが必要なため、強制ログイン
        $testUser = User::query()->first();
        Auth::loginUsingId($testUser->id);

        $article = Article::first();
        $title = 'sample title';
        $body = 'コメントコメントコメント body';
        $this->useCase->handle($article, $title, $body);

        Auth::logout();

        $this->assertDatabaseHas('articles', [
            'id'        => $article->id,
            'title'     => $title,
            'body'      => $body,
            'user_id'   => $testUser->id,
        ]);


    }
}
