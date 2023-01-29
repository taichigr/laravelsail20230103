<?php

namespace Tests\Feature\Articles;

use App\Article\UseCase\DeleteArticleUseCase;
use App\Models\Article;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Auth;
use Tests\TestCase;

class DeleteArticleUseCaseTest extends TestCase
{
    private DeleteArticleUseCase $useCase;
    /**
     * setUpメソッドは、各テストケースが実行される前に必ず実行される
     */
    protected function setUp(): void
    {
        parent::setUp();
        $this->useCase = new DeleteArticleUseCase();
    }

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_delete_article()
    {
        
        // ログインが必要なため、強制ログイン
        $user = User::factory()->create();

        Auth::loginUsingId($user->id);

        $article = Article::factory()->for($user)->create();
        
        $this->useCase->handle($article);

        Auth::logout();

        $this->assertSoftDeleted($article);
    }
}
