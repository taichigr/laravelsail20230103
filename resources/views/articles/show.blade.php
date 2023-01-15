<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Articles') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6 mb-4">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="flex justify-between">
                    <div class="text-gray-900 font-bold text-xl mb-2">
                        {{ $article->title ?? '' }}
                    </div>
                    @if ($article->user_id == Auth::id())
                        <div><a class="bg-green-500 py-2 px-4 rounded-xl text-white hover:bg-green-400"
                                href="{{ route('articles.edit', ['article' => $article]) }}">edit</a>
                        </div>
                    @endif
                </div>
                <div class="px-6 pt-4 pb-2">
                    <span
                        class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">#photography</span>
                    <span
                        class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">#travel</span>
                    <span
                        class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">#winter</span>
                </div>
                <p class="text-gray-700 text-base break-words">{!! nl2br($article->body) ?? '' !!}</p>
            </div>
        </div>
    </div>
</x-app-layout>
