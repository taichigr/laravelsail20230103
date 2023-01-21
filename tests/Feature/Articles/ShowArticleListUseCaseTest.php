<?php

namespace Tests\Feature\Article;

use App\Article\UseCase\ShowArticleListUseCase;
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

        $response = $this->useCase->handle();

        self::assertCount(5, $response['articles']);
    }
}