<?php

namespace App\Http\Controllers;

use App\Article\UseCase\CheckPostedUserUseCase;
use App\Article\UseCase\DeleteArticleUseCase;
use App\Article\UseCase\EditArticleUsecase;
use App\Article\UseCase\ShowArticleListUseCase;
use App\Article\UseCase\ShowArticleUseCase;
use App\Article\UseCase\StoreArticleUseCase;
use App\Article\UseCase\UpdateArticleUsecase;
use App\Http\Requests\ArticleRequest;
use App\Models\Article;
use Illuminate\Http\Request;


class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(ShowArticleListUseCase $useCase)
    {
        //
        // TODO: tag機能追加
        return view('articles.index', [] + $useCase->handle());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('articles.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param   App\Http\Requests\ArticleRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(ArticleRequest $request, StoreArticleUsecase $useCase)
    {
        //
        $useCase->handle($request->title, $request->body);
        return redirect()->route('articles.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  Article $article
     * @return \Illuminate\Http\Response
     */
    public function show(Article $article, ShowArticleUseCase $useCase)
    {
        //
        return view('articles.show', [] + $useCase->handle($article));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Article $article
     * @return \Illuminate\Http\Response
     */
    public function edit(Article $article, CheckPostedUserUseCase $checkPostedUserUseCase)
    {
        //
        $checkPostedUserUseCase->handle($article);
        return view('articles.edit', ['article' => $article]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param   App\Http\Requests\ArticleRequest $request
     * @param  Article $article
     * @return \Illuminate\Http\Response
     */
    public function update(ArticleRequest $request, Article $article, UpdateArticleUsecase $useCase, CheckPostedUserUseCase $checkPostedUserUseCase)
    {
        //
        $checkPostedUserUseCase->handle($article);
        $useCase->handle($article, $request->title, $request->body);
        return redirect()->route('articles.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Article $article
     * @return \Illuminate\Http\Response
     */
    public function destroy(Article $article, DeleteArticleUseCase $useCase, CheckPostedUserUseCase $checkPostedUserUseCase)
    {
        //
        $checkPostedUserUseCase->handle($article);
        $useCase->handle($article);
        return redirect()->route('articles.index');
    }
}
