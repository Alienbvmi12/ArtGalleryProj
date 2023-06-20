@extends('layout.nonav')

@section('container')
    <div class="limiter">
        <div class="container-login100">
            <div class="wrap-login100">
                <form class="login100-form validate-form" method="post" action="{{ route('password.email') }}">
                    @if (Session::has('status'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            Password reset link sent! check your email inbox
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    @if (Session::has('mail'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            {{ Session::has('mail')}}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                    <span class="login100-form-title">
                        Forgot Password
                    </span>
                    <label class="text-center mb-4">
                        <small>
                            Insert your email of your account to reset password
                        </small>
                    </label>

                    @csrf

                    <div class="wrap-input100 validate-input mb-4" data-validate="Valid email is required: ex@abc.xyz">
                        <input class="input100" type="text" name="email">
                        <span class="focus-input100"></span>
                        <span class="label-input100">Email</span>
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
