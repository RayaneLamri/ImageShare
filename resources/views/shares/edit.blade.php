<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Home') }}
        </h2>
    </x-slot>

    <div class="py-2">
        <form method="POST" action="/share/edit/{{ $share->id }}">
            @csrf
            @method('PATCH')
            <div>
                <label for="image">Image of the share</label>
                <img src="{{ asset('storage/' . $share->image) }}">
                <input type="file" name="image" id="image">
                @if($errors->has('image'))
                    <small class="error">{{ $errors->first('image') }}</small>
                @endif
            </div>
            <div>
                <label for="title">Title of the share</label>
                <input type="text" name="title" id="title" value="{{ $share->titre }}">
                @if($errors->has('title'))
                    <small class="error">{{ $errors->first('title') }}</small>
                @endif
            </div>
            <div>
                <label for="description">Description of the share</label>
                <input type="text" name="description" id="description" value="{{ $share->description }}">
                @if($errors->has('description'))
                    <small class="error">{{ $errors->first('description') }}</small>
                @endif
            </div>
            <input type="submit" value="Submit">
        </form>
        <form method="POST" action="/share/delete/{{ $share->id }}">
            @csrf
            @method('delete')
            <input type="submit" value="Delete">
        </form>
    </div>
</x-app-layout>
