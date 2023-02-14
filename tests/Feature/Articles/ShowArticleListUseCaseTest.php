<?php

namespace Tests\Feature\Articles;

use App\Article\UseCase\ShowArticleListUseCase;
use App\Models\Article;
use Illuminate\Support\Facades\DB;
use Tests\TestCase;

class ShowArticleListUseCaseTest extends TestCase
{
    private ShowArticleListUseCase $useCase;

    /**
     * setUpメソッドは、各テストケースが実行される前に必ず実行される
     */
    protected function setUp(): void
    {
        parent::setUp();
        $this->useCase = new ShowArticleListUseCase();
    }

    public function test_show_article_list_test()
    {
        // テスト実行時に一旦シーダー・ファクトリーをやる
        $response = $this->useCase->handle();

        self::assertCount(5, $response['articles']);
        self::assertInstanceOf(Article::class, $response['articles'][0]);

    }
}