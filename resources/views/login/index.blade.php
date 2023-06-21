@extends('layout.nonav')

@section('container')
    <div class="limiter">
        <div class="container-login100">
            <div class="wrap-login100">
                <form class="login100-form validate-form" method="post" action="/login">
                    @if (session()->has('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    @if (session()->has('errorMsg'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            {{ session('errorMsg') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                    <span class="login100-form-title p-b-43">
                        Login to continue
                    </span>

                    @csrf

                    <div class="wrap-input100 validate-input" data-validate="Valid email is required: ex@abc.xyz">
                        <input class="input100" type="text" name="email">
                        <span class="focus-input100"></span>
                        <span class="label-input100">Email</span>
                    </div>


                    <div class="wrap-input100 validate-input" data-validate="Password is required">
                        <input class="input100" type="password" name="password">
                        <span class="focus-input100"></span>
                        <span class="label-input100">Password</span>
                    </div>

                    <div class="flex-sb-m w-full p-t-3 p-b-32">
                        <div class="contact100-form-checkbox">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                <label class="form-check-label" for="flexCheckDefault">
                                    Remember Me
                                </label>
                            </div>
                        </div>

                        <div>
                            <a href="{{ route('password.request') }}" class="txt1">
                                Forgot Password?
                            </a>
                        </div>
                    </div>


                    <div class="container-login100-form-btn">
                        <button class="login100-form-btn bg-success mb-1">
                            Login
                        </button>
                        <p>Not have account? <a href="/register">register</a></p>
                    </div>

                    <div class="text-center p-t-46 p-b-20">
                        <span class="txt2">
                            or sign up using
                        </span>
                    </div>

                    <div class="login100-form-social flex-c-m">
                        <a href="{{ route('login_with_google') }}" class="login100-form-social-item flex-c-m bg-light m-r-5"
                            style="box-shadow : 0 0 10px 0.5px rgba(0,0,0,0.1)">
                            <img src="https://upload.wikimedia.org/wikipedia/commons/5/53/Google_%22G%22_Logo.svg"
                                width="20" height="20">

                        </a>

                        <a href="{{ route('login_with_facebook') }}"
                            style="text-decoration: none; box-shadow : 0 0 10px 0.5px rgba(0,0,0,0.2)"
                            class="login100-form-social-item flex-c-m bg1 m-r-5">
                            <i class="fa fa-facebook" aria-hidden="true"></i>
                        </a>

                        <a href="{{ route('login_with_github') }}"
                            style="text-decoration: none; box-shadow : 0 0 10px 0.5px rgba(0,0,0,0.2)"
                            class="login100-form-social-item flex-c-m bg-dark m-r-5">
                            <i class="fa fa-github" aria-hidden="true"></i>
                        </a>

                        <a href="{{ route('login_with_gitlab') }}"
                            style="text-decoration: none; box-shadow : 0 0 10px 0.5px rgba(0,0,0,0.2)"
                            class="login100-form-social-item flex-c-m bg-warning m-r-5">
                            <img src="https://i0.wp.com/leeno.org/wp-content/uploads/2018/06/GitLab_Logo.svg_.png?fit=960%2C887&ssl=1"
                                width="20" height="20">
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
