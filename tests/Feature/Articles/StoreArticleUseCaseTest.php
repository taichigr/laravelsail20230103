<?php

namespace Tests\Feature\Articles;

use App\Article\UseCase\StoreArticleUsecase;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Tests\TestCase;

class StoreArticleUseCaseTest extends TestCase
{

    private StoreArticleUsecase $useCase;

    /**
     * setUpメソッドは、各テストケースが実行される前に必ず実行される
     */
    protected function setUp(): void
    {
        parent::setUp();
        $this->useCase = new StoreArticleUsecase();
    }
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_save_correct_data()
    {

        // ログインが必要なため、強制ログイン
        $testUser = User::query()->first();
        Auth::loginUsingId($testUser->id);

        $title = 'sample title';
        $body = 'コメントコメントコメント body';
        $this->useCase->handle($title, $body);

        Auth::logout();

        $this->assertDatabaseHas('articles', [
            'title' => $title,
            'body' => $body,
            'user_id' => $testUser->id,
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
