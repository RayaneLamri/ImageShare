<x-app-layout>
    <div class="py-12 px-12 grid lg:grid-cols-2 md:grid-cols-2 gap-6 sm:grid-cols-1">
      <div class="">
        <img class="" id="image" src="{{ asset('storage/' . $share->image) }}">
      </div>
      <div class="">
        <h2>{{ $share->titre }}</h2>
        <p>{{ $share->description }}</p>
        <div><a href="/profile/{{ $share->user->id }}" class="underline">{{ $share->user->name }}</a></div>
        @if(Auth::user() && $share->user->id == Auth::user()->id)<button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full"><a href="/share/edit/{{ $share->id }}">Edit</a></button>@endif
      </div>

</x-app-layout>
