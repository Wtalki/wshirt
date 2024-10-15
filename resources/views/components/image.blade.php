@props(['name','type' => 'info', 'message' => '', 'dismissible' => false, 'placeholder' => '/default/default.png','isMultiple'])

<div class="form-group mt-5 border p-6 text-center">
    <label for="imageUpload" class="btn btn-primary">Upload Image</label>
    @if($type == 'createImage')
        <input type="file" name="{{$name}}" class="form-control" style="display: none;" id="imageUpload" @if ($isMultiple) multiple @endif  accept="image/*">
        <div class="row mt-3" id="imagePreviewContainer">
            <img src="{{ asset($placeholder) }}" class="showImg img-thumbnail" alt="Default Image" id="imagePreview" width="150" height="150">
            @error($name)
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
    @elseif($type == 'editImage')
        <input type="file" name="{{$name}}" class="form-control" style="display: none;" id="imageUpload" @if ($isMultiple) multiple @endif  accept="image/*">
        <div class="row mt-3" id="imagePreviewContainer">
            <img src="{{ asset($placeholder) }}" class="showImg img-thumbnail" alt="Default Image" id="imagePreview" width="150" height="150">
            @error($name)
            <div class="text-danger">{{ $message }}</div>
        @enderror
        </div>
    @elseif ($type == 'productImage')
        <input type="file" name="{{$name}}" class="form-control" style="display: none;" id="imageUpload" @if ($isMultiple) multiple @endif  accept="image/*">
        <div class="row mt-3" id="imagePreviewContainer">
            <img src="{{ asset($placeholder) }}" class="showImg img-thumbnail" alt="Default Image" id="imagePreview" width="150" height="150">
        </div>
    @endif

</div>

@section('scriptSource')

<script>
    $('#imageUpload').on('change', function(event) {
    $('#imagePreviewContainer').empty();
    const files = event.target.files;
    for (let i = 0; i < files.length; i++) {
        let file = files[i];
        if (file.type.startsWith('image/')) {
            let reader = new FileReader();

            reader.onload = function(e) {
                let img = $('<img/>', {
                    src: e.target.result,
                    alt: 'Preview Image ' + (i + 1),
                });
                $('#imagePreviewContainer').append(img);
            };

            reader.readAsDataURL(file);
        }
    }
});
</script>
@endsection
