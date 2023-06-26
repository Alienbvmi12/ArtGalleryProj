@extends('layout.nav')

@section('container')
    <div class="container my-5">
        <div class="card">
            <div class="card-body">
                <h3 class="text-center my-4">{{ $post->title }}</h3>
                @if ($post->author->id == auth()->user()->id)
                    <form method="post" action="/post/{{ $post->id }}" id="delete">
                        @csrf
                        @method('delete')
                        <button type="button" class="btn btn-danger my-3" onclick="submitAct(this, 'delete')">
                            delete
                        </button>
                        <button type="button" class="btn btn-warning my-3" data-bs-toggle="modal"
                            data-bs-target="#modalPost">
                            edit
                        </button>
                    </form>
                @endif
                <small>
                    Post by
                    <a href="/profile/{{ $post->author->username }}"
                        style="text-decoration : none">{{ $post->author->biodata->first_name }}
                        {{ $post->author->biodata->last_name }}</a>
                </small>
                <div class="mt-2 mb-5">
                    {!! $post->body !!}
                </div>
                <div id="disqus_thread"></div>
                <script>
                    /**
                     *  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
                     *  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables    */
                    /*
                    var disqus_config = function () {
                    this.page.url = PAGE_URL;  // Replace PAGE_URL with your page's canonical URL variable
                    this.page.identifier = PAGE_IDENTIFIER; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
                    };
                    */
                    (function() { // DON'T EDIT BELOW THIS LINE
                        var d = document,
                            s = d.createElement('script');
                        s.src = 'https://lievmy.disqus.com/embed.js';
                        s.setAttribute('data-timestamp', +new Date());
                        (d.head || d.body).appendChild(s);
                    })();
                </script>
                <noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered
                        by Disqus.</a></noscript>
            </div>
        </div>
    </div>
    <!--Modal post-->

    @if ($post->author->id == auth()->user()->id)
        <div class="modal fade" id="modalPost" tabindex="-1" aria-labelledby="modalPostLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalPostLabel">New Post</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form method="post" action="/post/{{ $post->id }}" enctype="multipart/form-data">
                        <div class="modal-body">
                            @csrf
                            @method('put')
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="mb-3">
                                        <label for="exampleFormControlInput1" class="form-label">Cover Image</label>
                                        <input class="form-control" type="file" id="cover_image" name="cover_image"
                                            accept="image/*">
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleFormControlInput1" class="form-label">Title</label>
                                        <input type="text" class="form-control" value="{{$post->title}}" name="title" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleFormControlInput1" class="form-label">Albums</label>
                                        <select class="form-control" name="album_id" id="">
                                            <option disabled selected hidden>Select Album</option>
                                            @foreach ($albums as $album)
                                                <option value="{{ $album->id }}" @if($album->id == $post->album_id) selected @endif>{{ $album->title }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <img id="previewImage" src="../storage/{{$post->cover_image}}" style="max-width: 300px;" />
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Body</label>
                                <textarea id="winternote" name="body" required>
                                    {{$post->body}}
                                </textarea>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endif

    <script>
        function submitAct(context, act) {
            const swalWithBootstrapButtons = Swal.mixin({
                customClass: {
                    confirmButton: 'btn btn-success',
                    cancelButton: 'btn btn-danger'
                },
                buttonsStyling: false
            })

            swalWithBootstrapButtons.fire({
                title: 'Are you sure to ' + act + '?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes',
                cancelButtonText: 'No',
                reverseButtons: true
            }).then((result) => {
                if (result.isConfirmed) {
                    context.parentNode.submit();
                }
            })
        }
        $('#winternote').summernote({
            placeholder: 'Type something',
            tabsize: 2,
            height: 310,
            toolbar: [
                ['style', ['style']],
                ['font', ['bold', 'underline', 'clear', 'font']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['table', ['table']],
                ['insert', ['link', 'picture', 'video']],
                ['view', ['help']]
            ]
        });

        function previewImage(event, id) {
            var input = event.target;

            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    var previewElement = document.getElementById('previewImage');
                    previewElement.src = e.target.result;
                    previewElement2.src = e.target.result;
                };

                reader.readAsDataURL(input.files[0]);
            }
        }

        var uploadInput = document.getElementById('cover_image');
        uploadInput.addEventListener('change', previewImage);
    </script>
@endsection
