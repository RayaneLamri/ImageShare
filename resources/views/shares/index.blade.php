<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Home') }}
        </h2>
    </x-slot>

    <div class="py-2">
        <div id="container">
            @foreach($shares as $share)
                <div class="item"><img src="{{ asset('storage/' . $share->image) }}"></div>
            @endforeach
        </div>
    </div>

    <div class="py-2">
        <div id="container">
            @foreach($shares as $share)
                <div class="item"><a href="/share/show/{{ $share->id }}"><img src="{{ asset('storage/' . $share->image) }}"></a></div>
            @endforeach
        </div>
    </div>
</x-app-layout>
