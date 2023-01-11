<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('post articles') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="w-full max-w-2xl m-auto">
            <form method="POST" action="{{ route('articles.store') }}" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
                @csrf
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="title">
                        title
                    </label>
                    <input
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        id="title" 
                        type="text" 
                        placeholder="title"
                        name="title"
                        value="{{ old('title' ?? '') }}"
                    >
                    <x-input-error :messages="$errors->get('title')" class="mt-2" />
                </div>
                <div class="mb-6">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="body">
                        contents
                    </label>
                    <textarea
                        class="shadow appearance-none border rounded w-full h-40 py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline"
                        id="body"
                        name="body"
                    >{{ old('body') ?? '' }}</textarea>
                    <x-input-error :messages="$errors->get('body')" class="mt-2" />
                </div>
                <div class="flex items-center justify-between">
                    <button
                        class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-6 rounded focus:outline-none focus:shadow-outline"
                        type="submit"
                        >
                        post!
                    </button>
                </div>
            </form>
        </div>

    </div>
</x-app-layout>
