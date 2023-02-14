<?php

namespace Tests\Feature\Articles;

use App\Article\UseCase\StoreArticleUseCase;
use App\Models\Article;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Tests\TestCase;

class StoreArticleUseCaseTest extends TestCase
{

    private StoreArticleUseCase $useCase;

    /**
     * setUpメソッドは、各テストケースが実行される前に必ず実行される
     */
    protected function setUp(): void
    {
        parent::setUp();
        $this->useCase = new StoreArticleUseCase();
    }
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_save_correct_data()
    {
        // ログインが必要なため、強制ログイン
        $user = User::factory()->create();

        Auth::loginUsingId($user->id);

        $title = 'store article';
        $body = 'コメントコメントコメント body';
        $this->useCase->handle($title, $body);

        Auth::logout();

        $this->assertDatabaseHas('articles', [
            'title' => $title,
            'body' => $body,
            'user_id' => $user->id,
        ]);

    }

    /**
     * test_save_fail
     *
     * @return void
     */
    public function test_save_fail()
    {
        // 例外処理が投げられることのテスト
        $this->expectException(ValidationException::class);
        $this->expectExceptionObject(ValidationException::withMessages([
            'title' => '不具合が発生しました。お手数ですが時間を空けてから再度実行ください。',
        ]));


        $title = 'sample title';
        $body = 'コメントコメントコメント body';
        $this->useCase->handle($title, $body);
    }
}
