<style media="screen">
  #container
  {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
    grid-auto-rows: 15em;
    gap: 2em;
    padding: 6em;
  }

  .item
  {
    border-radius: .5em;
    object-fit: cover;
  }

  img
  {
    width: 100%;
    height: 100%;
    border-radius: .5em;
    object-fit: cover;
    transition: .5s ease;
  }

  img:hover
  {
    filter: blur(.8px);
  }
</style>
<x-app-layout>
    <div class="py-10">
      <div class="font-semibold text-xl text-gray-800 leading-tight">
        <div class="flex justify-center"><img class="h-8 w-8 rounded-full object-cover" src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" /></div>
        <div class="flex justify-center"><strong>{{ $user->name ?? Auth::user()->name }}</strong></div>
        <div class="flex justify-center"><small>{{ $user->email ?? Auth::user()->email }}</small></div>
      </div>
      <br><hr>
      <div id="container">
        @foreach($shares as $share)
          <div class="item"><a href="/share/show/{{ $share->id }}"><img class="img" src="{{ asset('storage/' . $share->image) }}"></a></div>
        @endforeach
      </div>
    </div>
</x-app-layout>
