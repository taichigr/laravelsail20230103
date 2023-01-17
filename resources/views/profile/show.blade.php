{{-- アイコンをクリックした時、そのアイコンのユーザーに飛ばす
飛んだ先が自分の場合、編集ボタン表示
右上のハンバーガーのProfileをクリックした時もこのページに飛ばす --}}
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Profile show') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.profile-information')
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
