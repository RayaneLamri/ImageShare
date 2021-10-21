<x-app-layout>
    <div class="py-12">
        @foreach($shares->sortBy('timestamps') as $share)
            <div class="item"><a href="/share/show/{{ $share->id }}"><img src="{{ asset('storage/' . $share->image) }}"></a></div>
        @endforeach
    </div>
</x-app-layout>
