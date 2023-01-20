<section>
    <header class="flex justify-between">
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Profile Information') }}
        </h2>
        @if(Auth::id() == $user->id)
        <div>
            <a class="bg-green-500 py-2 px-4 rounded-xl text-white hover:bg-green-400" href="{{ route('profile.edit') }}">edit</a>
        </div>
        @endif
    </header>

    <div>
        <x-input-label for="name" :value="__('Name')" />
        <x-text-block id="name" name="name" type="text" class="mt-1 block w-full" :value="old('name', $user->name)" required
            autofocus autocomplete="name">
            {{old('email', $user->name)}}
        </x-text-block>
        
    </div>

    <div>
        <x-input-label for="email" :value="__('Email')" />
        <x-text-block id="email" name="email" type="email" class="mt-1 block w-full" :value="old('email', $user->email)" required
            autocomplete="email">
            {{old('email', $user->email)}}
        </x-text-block>


    </div>
</section>
