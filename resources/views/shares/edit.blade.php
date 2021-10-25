<script>

    function showPreviewOne(event){
      if(event.target.files.length > 0){
        let src = URL.createObjectURL(event.target.files[0]);
        let preview = document.getElementById("file-ip-1-preview");
        preview.src = src;
        preview.style.display = "block";
      }
    }
    function myImgRemoveFunctionOne() {
      document.getElementById("file-ip-1-preview").src = "https://i.ibb.co/ZVFsg37/default.png";
    }

  </script>
<x-app-layout>
    <div class="py-2">
        <form method="POST" action="/share/edit/{{ $share->id }}">
            @csrf
            @method('PATCH')
            <div>
                <label for="image">Upload your picture:</label>
                <img id="file-ip-1-preview" src="{{ asset('storage/' . $share->image) }}">
                <input type="file"
                       id="image" name="image"
                       accept="image/png, image/jpeg, image/jpg" onchange="showPreviewOne(event);">
                @if($errors->has('image'))
                    <small class="error">{{ $errors->first('image') }}</small>
                @endif
            </div>
            <div>
                <label for="title">Title</label>
                <input type="text" name="title" id="title" value="{{ $share->title }}">
                @if($errors->has('title'))
                    <small class="error">{{ $errors->first('title') }}</small>
                @endif
            </div>
            <div>
                <label for="description">Description</label>
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
