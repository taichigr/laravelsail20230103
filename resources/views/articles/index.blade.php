<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Articles') }}
        </h2>
    </x-slot>

    <div class="py-12">
        @foreach ($articles as $article)
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6 mb-4">
                <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                    <div class="text-gray-900 font-bold text-xl mb-2">
                        {{ $article->title ?? '' }}
                    </div>
                    <p class="text-gray-700 text-base">{!! nl2br($article->body) ?? '' !!}</p>
                    <div class="px-6 pt-4 pb-2">
                        <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">#photography</span>
                        <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">#travel</span>
                        <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">#winter</span>
                    </div>
                </div>                
            </div>
        @endforeach
        {{-- ページネーション作成 --}}
        {{ $articles->links('vendor.pagination.tailwind2') }}
    </div>
</x-app-layout>