<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Articles') }}
        </h2>
    </x-slot>

    <div class="py-12">
        @foreach ($articles as $article)
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6 mb-4">
                {{-- TODO: 編集画面に飛ぶのはおかしい --}}
                    <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                        <div class="flex items-center">
                            <img class="w-12 h-12 rounded-full mr-4" src="https://source.unsplash.com/random" alt="">
                            <div>
                                <p class="text-gray-900 loading-none">{{ $article->user->name ?? '' }}</p>
                                <p class="text-gray-600">created_at-{{ $article->created_at->format('Y/m/j') ?? '' }}</p>
                                <p class="text-gray-600">updated_at-{{ $article->updated_at->format('Y/m/j') ?? '' }}</p>
                            </div>
                        </div>
                        <div class="text-gray-900 font-bold text-xl mb-2 mt-2">
                            <a href="{{ route('articles.show', ['article' => $article]) }}">
                                {{ $article->title ?? '' }}
                            </a>
                        </div>
                        <div class="px-6 pt-2 pb-2">
                            <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">#photography</span>
                            <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">#travel</span>
                            <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">#winter</span>
                        </div>
                        <p class="text-gray-700 text-base break-words">{!! nl2br(format_article_body($article->body)) ?? '' !!}</p>
                    </div>
            </div>
        @endforeach

        {{ $articles->links('vendor.pagination.tailwind2') }}
    </div>
</x-app-layout>