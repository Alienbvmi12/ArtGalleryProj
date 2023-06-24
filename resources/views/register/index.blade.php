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

                    <div class="g-recaptcha" data-sitekey="6LfJB7MmAAAAAMp6z8x3tw3u6ANRgRZU8UXJUv79"></div>

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
                        <a href="/auth/google"
                            class="login100-form-social-item flex-c-m bg-light m-r-5" style="box-shadow : 0 0 10px 0.5px rgba(0,0,0,0.1)">
                            <img src="https://upload.wikimedia.org/wikipedia/commons/5/53/Google_%22G%22_Logo.svg" width="20" height="20">
                        </a>

                        <a href="/auth/facebook" style="text-decoration: none; box-shadow : 0 0 10px 0.5px rgba(0,0,0,0.2)"
                            class="login100-form-social-item flex-c-m bg1 m-r-5">
                            <i class="fa fa-facebook" aria-hidden="true"></i>
                        </a>

                        <a href="/auth/twitter" style="text-decoration: none; box-shadow : 0 0 10px 0.5px rgba(0,0,0,0.2)"
                            class="login100-form-social-item flex-c-m bg-info m-r-5">
                            <i class="fa fa-twitter" aria-hidden="true"></i>
                        </a>

                        <a href="/auth/github" style="text-decoration: none; box-shadow : 0 0 10px 0.5px rgba(0,0,0,0.2)"
                            class="login100-form-social-item flex-c-m bg-dark m-r-5">
                            <i class="fa fa-github" aria-hidden="true"></i>
                        </a>

                        <a href="/auth/gitlab"
                            style="text-decoration: none; box-shadow : 0 0 10px 0.5px rgba(0,0,0,0.2); background-color : orange;"
                            class="login100-form-social-item flex-c-m m-r-5">
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
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
@endsection
