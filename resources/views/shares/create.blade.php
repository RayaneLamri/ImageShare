<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Home') }}
        </h2>
    </x-slot>
    <form method="POST" enctype="multipart/form-data" action="/share/create">
        @csrf
        <div>
            <label for="image">Upload your picture:</label>
            <input type="file"
                   id="image" name="image"
                   accept="image/png, image/jpeg, image/jpg">
            @if($errors->has('image'))
                <small class="error">{{ $errors->first('image') }}</small>
            @endif
        </div>
        <div>
            <label for="title">Title of the share</label>
            <input type="text" name="title" id="title">
            @if($errors->has('title'))
                <small class="error">{{ $errors->first('title') }}</small>
            @endif
        </div>
        <div>
            <label for="description">Description of the share</label>
            <input type="text" name="description" id="description">
            @if($errors->has('description'))
                <small class="error">{{ $errors->first('description') }}</small>
            @endif
        </div>
        <input type="submit" value="Submit">
    </form>
</x-app-layout>
