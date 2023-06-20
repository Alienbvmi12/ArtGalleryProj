@extends('layout.nonav')

@section('container')
    <div class="limiter">
        <div class="container-login100">
            <div class="wrap-login100">
                <form class="login100-form validate-form" method="post" action="{{ route('password.update') }}">
                    @if ($errors->any())
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                    <span class="login100-form-title">
                        Reset Password
                    </span>
                    <label class="text-center mb-4">
                        <small>
                            Insert your email again and create new password
                        </small>
                    </label>

                    @csrf

                    <input type="hidden" name="email" value="{{ request()->email }}">
                    <input type="hidden" name="token" value="{{ request()->token }}">

                    <div class="wrap-input100">
                        <input class="input100" type="password" name="password" required>
                        <span class="focus-input100"></span>
                        <span class="label-input100">Password</span>
                    </div>

                    <div class="wrap-input100">
                        <input class="input100" type="password" name="password_confirmation" required>
                        <span class="focus-input100"></span>
                        <span class="label-input100">Confirm Password</span>
                    </div>

                    <div class="container-login100-form-btn">
                        <button class="login100-form-btn bg-success mb-1">
                            Submit
                        </button>
                    </div>

                </form>

                <div class="login100-more" style="background-image: url('img/bg-01.jpg');">
                </div>
            </div>
        </div>
    </div>
    <script src="vendor/jquery/jquery-3.2.1.min.js"></script>
    <script src="js/main.js"></script>
@endsection
