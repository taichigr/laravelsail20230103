<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Profile Information') }}
        </h2>
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
