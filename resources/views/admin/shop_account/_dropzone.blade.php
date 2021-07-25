<form method="post" action="{{ route('admin.dropzone.store') }}" enctype="multipart/form-data"
    class="dropzone" id="dropzone">
@csrf
</form>

<script type="text/javascript">
    var images = [];
    var elems = [];
</script>

@if (!empty($shop))
<script type="text/javascript">
    var shop = {!! json_encode($shop->toArray()) !!};
    var images = JSON.parse(shop.images);
    console.log(images);
</script>
@endif

<script type="text/javascript">
    Dropzone.options.dropzone = {
        maxFilesize: 10,
        renameFile: function(file) {
            var dt = new Date();
            var time = dt.getTime();
           return time + file.name;
        },
        acceptedFiles: ".jpeg,.jpg,.png,.gif",
        addRemoveLinks: true,
        timeout: 50000,
        removedfile: function(file) {
            elems = elems.filter( el => el.src !== file.src ); 
            $('#hidden_images').val(JSON.stringify(elems));

            var fileRef;
            return (fileRef = file.previewElement) != null ?
            fileRef.parentNode.removeChild(file.previewElement) : void 0;
        },
        success: function(file, response) {
            let object = {
                file_name: response.data.file_name,
                src: response.data.src,
                size: response.data.size
            };
            elems.push(object);
            $('#hidden_images').val(JSON.stringify(elems));
        },
        error: function(file, response) {
           return false;
        },
        init: function () {
            for (let i = 0; i < images.length; i++) {
                var mockFile = { name: images[i].file_name, size: images[i].size, type: 'image/jpeg', src: images[i].src };       
                this.options.addedfile.call(this, mockFile);
                this.options.thumbnail.call(this, mockFile, images[i].src);
                mockFile.previewElement.classList.add('dz-success');
                mockFile.previewElement.classList.add('dz-complete');
                elems.push(images[i]);
            }
            $('#hidden_images').val(JSON.stringify(elems));
        }
    };
</script>