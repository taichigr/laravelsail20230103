<?php

namespace Tests\Feature\Articles;

use App\Article\UseCase\ShowArticleUseCase;
use App\Models\Article;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ShowArticleUseCaseTest extends TestCase
{
    private ShowArticleUseCase $useCase;
    private Article $article;
    

    /**
     * setUpメソッドは、各テストケースが実行される前に必ず実行される
     */
    protected function setUp(): void
    {
        parent::setUp();
        $this->useCase = new ShowArticleUseCase();
        $this->article = Article::first();
    }

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_show_article_test()
    {
        $response = $this->useCase->handle($this->article);

        self::assertInstanceOf(Article::class, $response['article']);
    }
}
