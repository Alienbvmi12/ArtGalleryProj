@extends('layout.nonav')

@section('container')
    <div class="d-grid" style="width : 100%; height : 100%; place-items : center">
        @if (Session::has('message'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('message') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        <div class="alert alert-primary alert-dismissible fade show" role="alert">
            <strong>Verify first!</strong> We've sent you an email for email verification. Check your inbox or spam!!
            <p>Have not receive the email yet?
                <form method="post" action="{{ route('verification.send') }}">
                    @csrf
                    <input class="btn btn-link" type="submit" value="resend link">
                </form>
            </p>
        </div>
    </div>
@endsection
