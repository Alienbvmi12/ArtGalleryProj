@extends('layout.nav')

@section('container')
    <div class="container my-5">
        <div class="card">
            <div class="card-body">
                <h3 class="text-center my-4">{{ $post->title }}</h3>
                <form method="post" action="/post/{{$post->id}}" id="delete">
                    @csrf
                    @method('delete')
                    <button type="button" class="btn btn-danger my-3" onclick="submitAct(this)">
                        delete
                    </button>
                </form>
                <small>
                    Post by
                    <a href="/profile/{{ $post->author->username }}"
                        style="text-decoration : none">{{ $post->author->biodata->first_name }}
                        {{ $post->author->biodata->last_name }}</a>
                </small>
                <div class="mt-2">
                    {!! $post->body !!}
                </div>
            </div>
        </div>
    </div>
    <script>
        function submitAct(context) {
            const swalWithBootstrapButtons = Swal.mixin({
                customClass: {
                    confirmButton: 'btn btn-success',
                    cancelButton: 'btn btn-danger'
                },
                buttonsStyling: false
            })

            swalWithBootstrapButtons.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes, delete it!',
                cancelButtonText: 'No, cancel!',
                reverseButtons: true
            }).then((result) => {
                if (result.isConfirmed) {
                    context.parentNode.submit();
                }
            })
        }
    </script>
@endsection
