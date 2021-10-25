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
    <div id="container" class="py-12">
        @foreach($shares->sortBy('timestamps') as $share)
            <div class="item"><a href="/share/show/{{ $share->id }}"><img class="img" src="{{ asset('storage/' . $share->image) }}"><h3>by {{ $share->user->name }}</h3></a></div>
        @endforeach
    </div>
</x-app-layout>
