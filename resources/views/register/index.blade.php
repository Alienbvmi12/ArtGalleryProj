@extends('layout.nonav')

@section('container')
    <div class="limiter">
        <div class="container-login100">
            <div class="wrap-login100">
                <form class="login100-form validate-form" method="post" action="/register">
                    @if ($errors->any())
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                    <span class="login100-form-title p-b-43">
                        Register to continue
                    </span>

                    @csrf

                    <div class="wrap-input100">
                        <input class="input100" type="text" name="name" required>
                        <span class="focus-input100"></span>
                        <span class="label-input100">Name</span>
                    </div>

                    <div class="wrap-input100">
                        <input class="input100" type="text" name="email" required>
                        <span class="focus-input100"></span>
                        <span class="label-input100">Email <Address></Address></span>
                    </div>

                    <div class="wrap-input100">
                        <input class="input100" type="text" name="username" required>
                        <span class="focus-input100"></span>
                        <span class="label-input100">Username</span>
                    </div>


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

                    <div class="flex-sb-m w-full p-t-3 p-b-32">
                    </div>


                    <div class="container-login100-form-btn">
                        <button class="login100-form-btn bg-success mb-1">
                            Submit
                        </button>
                        <p>Already have account? <a href="/login">login</a></p>
                    </div>

                    <div class="text-center p-t-46 p-b-20">
                        <span class="txt2">
                            or sign up using
                        </span>
                    </div>

                    <div class="login100-form-social flex-c-m">
                        <a href="{{ route('login_with_google') }}"
                            class="login100-form-social-item flex-c-m bg-danger m-r-5">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                class="bi bi-google" viewBox="0 0 16 16">
                                <path
                                    d="M15.545 6.558a9.42 9.42 0 0 1 .139 1.626c0 2.434-.87 4.492-2.384 5.885h.002C11.978 15.292 10.158 16 8 16A8 8 0 1 1 8 0a7.689 7.689 0 0 1 5.352 2.082l-2.284 2.284A4.347 4.347 0 0 0 8 3.166c-2.087 0-3.86 1.408-4.492 3.304a4.792 4.792 0 0 0 0 3.063h.003c.635 1.893 2.405 3.301 4.492 3.301 1.078 0 2.004-.276 2.722-.764h-.003a3.702 3.702 0 0 0 1.599-2.431H8v-3.08h7.545z" />
                            </svg>
                        </a>

                        <a href="{{ route('login_with_facebook') }}" style="text-decoration: none"
                            class="login100-form-social-item flex-c-m bg1 m-r-5">
                            <i class="fa fa-facebook" aria-hidden="true"></i>
                        </a>
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
