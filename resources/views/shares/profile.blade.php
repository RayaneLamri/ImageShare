<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Home') }}
        </h2>
    </x-slot>

    <div class="py-2">
        <div id="container">
            {{ $user->name ?? Auth::user()->name }}
            @foreach($shares as $share)
                <div class="item"><a href="/share/show/{{ $share->id }}"><img src="{{ asset('storage/' . $share->image) }}"></a></div>
            @endforeach
        </div>
    </div>
</x-app-layout>
