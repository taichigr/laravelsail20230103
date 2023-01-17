<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('edit') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="w-full max-w-2xl m-auto">
            <form method="POST" action="{{ route('articles.update', ['article' => $article]) }}" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
                @method('PATCH')
                @include('articles.partials.form')
            </form>
        </div>
    </div>
</x-app-layout>