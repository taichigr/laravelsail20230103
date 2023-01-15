@csrf
<div class="mb-4">
    <label class="block text-gray-700 text-sm font-bold mb-2" for="title">
        title
    </label>
    <input
        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
        id="title" type="text" placeholder="title" name="title" value="{{ $article->title ?? old('title') }}">
    <x-input-error :messages="$errors->get('title')" class="mt-2" />
</div>
<div class="mb-6">
    <label class="block text-gray-700 text-sm font-bold mb-2" for="body">
        contents
    </label>
    <textarea
        class="shadow appearance-none border rounded w-full h-40 py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline"
        id="body" name="body">{{ $article->body ?? old('body') }}</textarea>
    <x-input-error :messages="$errors->get('body')" class="mt-2" />
</div>
<div class="flex items-center justify-between">
    <button
        class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-6 rounded focus:outline-none focus:shadow-outline"
        type="submit">
        post!
    </button>
</div>