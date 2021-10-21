<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Home') }}
        </h2>
    </x-slot>

    <div class="py-12 px-12 grid lg:grid-cols-3 gap-6 sm:grid-cols-1">
        <img class="col-span-2" id="image" src="{{ asset('storage/' . $share->image) }}">
        <div class="py-12">
            <h2>{{ $share->titre }}</h2>
            <p>{{ $share->description }}</p>
            <p><a href="/profile/{{ $share->user->id }}">{{ $share->user->name }}</a></p>
        </div>
        @if(Auth::user())
        <a href="/share/edit/{{ $share->id }}">Edit</a>
            @endif
    </div>
</x-app-layout>
