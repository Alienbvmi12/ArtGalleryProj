<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:ital,wght@0,400;1,300&display=swap"
        rel="stylesheet">
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <!-- Bootstrap icons-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet"
        type="text/css" />
    <!-- Google fonts-->
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet"
        type="text/css" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="css/stylesu.css" rel="stylesheet" />
    <style>
        * {
            font-family: 'Josefin Sans', sans-serif;
        }

        #wrapper {
            width: 100%;
            height: 100vh;
            overflow-y: auto;
            scroll-snap-type: y mandatory
        }


        .content {
            /* Set a position for the content section */
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
        }

        .hero {
            background-image: url("img/monten.jpg");
            height: 640px;
            width: 100%;
        }

        .wrapper {
            background-color: rgba(0, 0, 0, 0.4);
            height: 100%;
            display: grid;
            place-items: center;
        }

        .hero-text {
            display: flex;
            flex-direction: column;
            -ms-flex-direction: column;
        }

        .hero-text div {
            width: 100%;
        }

        .hero-text-header {
            color: white;
            font-size: 40px;
        }

        .hero-text-body {
            color: white;
            font-size: 11px;
            text-align: center;
        }
    </style>
</head>

<body>
    <!--Navbar-->

    <nav class="navbar navbar-expand-lg navbar-dark"
        style="position : absolute; width : 100%; background-color : rgba(0,0,0,0)">
        <div class="container">
            <a class="navbar-brand" href="#"><b class="me-1" style="font-size : 25px">Lievmy</b><img
                    src="img/OriginalMinGi.png" width="20"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Link</a>
                    </li>
                </ul>
                <span class="navbar-text">
                    <div class="dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            <img src="img/profile.jpeg" width="32px" class="rounded-circle" alt="profile">
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" style="color : black" href="/login">Sign in</a></li>
                        </ul>
                    </div>
                </span>
            </div>
        </div>
    </nav>

    <!--Content-->

    <div class="hero">
        <div class="wrapper">
            <div class="hero-text">
                <div class="hero-text-header">
                    <b>Lievmy A<text style="color : black;">rt Gallery</text></b>
                </div>
                <div class="hero-text-body">
                    <text style="color : black">Expand artist potentials to</text> limitles, draw, write, and sing
                </div>
            </div>
        </div>
    </div>
    <div class="d-flex justify-content-center" style="width : 100%">
    </div>
    <section class="features-icons bg-light text-center">
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <div class="features-icons-item mx-auto mb-5 mb-lg-0 mb-lg-3">
                        <div class="features-icons-icon d-flex"><i class="bi-window m-auto"></i></div>
                        <h3>Main Feature</h3>
                        <p class="lead mb-0">We provide the image publish as the main features</p>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="features-icons-item mx-auto mb-5 mb-lg-0 mb-lg-3">
                        <div class="features-icons-icon d-flex"><i class="bi-layers m-auto"></i></div>
                        <h3>Another Features</h3>
                        <p class="lead mb-0">Publish 3d Model, video, and audio</p>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="features-icons-item mx-auto mb-0 mb-lg-3">
                        <div class="features-icons-icon d-flex"><i class="bi-terminal m-auto"></i></div>
                        <h3>Write Your Blog</h3>
                        <p class="lead mb-0">Make a Story, and Tells everyone about your idea!!</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Image Showcases-->
    <section class="showcase">
        <div class="container-fluid p-0">
            <div class="row g-0">
                <div class="col-lg-6 order-lg-2 text-white showcase-img"
                    style="background-image: url('https://picsum.photos/1200/900?nocache={{ microtime() }}')"></div>
                <div class="col-lg-6 order-lg-1 my-auto showcase-text">
                    <h2>Share your 3d Models</h2>
                    <p class="lead mb-0">You are 3d designer and you are confusing about where to publish your work? we are solution for you!</p>
                </div>
            </div>
            <div class="row g-0">
                <div class="col-lg-6 text-white showcase-img"
                    style="background-image: url('https://picsum.photos/1200/900?nocache={{ microtime() }}')"></div>
                <div class="col-lg-6 my-auto showcase-text">
                    <h2>Share the timelapse when you works</h2>
                    <p class="lead mb-0">People won't doubt your work if you have a timelapse
                    </p>
                </div>
            </div>
            <div class="row g-0">
                <div class="col-lg-6 order-lg-2 text-white showcase-img"
                    style="background-image: url('https://picsum.photos/1200/900?nocache={{ microtime() }}')"></div>
                <div class="col-lg-6 order-lg-1 my-auto showcase-text">
                    <h2>Sing your song and write your own story</h2>
                    <p class="lead mb-0">we provide a medium to publicize your golden voice, And amaze others with your story!</p>
                </div>
            </div>
        </div>
    </section>
    <!-- Footer-->
    <footer class="footer bg-light">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 h-100 text-center text-lg-start my-auto">
                    <ul class="list-inline mb-2">
                        <li class="list-inline-item"><a href="#!" >About</a></li>
                        <li class="list-inline-item">⋅</li>
                        <li class="list-inline-item"><a href="#!" >Contact</a></li>
                        <li class="list-inline-item">⋅</li>
                        <li class="list-inline-item"><a href="#!">Terms of Use</a></li>
                        <li class="list-inline-item">⋅</li>
                        <li class="list-inline-item"><a href="#!" >Privacy Policy</a></li>
                    </ul>
                    <p class="text-muted small mb-4 mb-lg-0">&copy; Your Website 2023. All Rights Reserved.</p>
                </div>
                <div class="col-lg-6 h-100 text-center text-lg-end my-auto">
                    <ul class="list-inline mb-0">
                        <li class="list-inline-item me-4">
                            <a href="#!" class="text-primary"><i class="bi-facebook fs-3"></i></a>
                        </li>
                        <li class="list-inline-item me-4">
                            <a href="#!" class="text-info"><i class="bi-twitter fs-3"></i></a>
                        </li>
                        <li class="list-inline-item">
                            <a href="#!" class="text-danger"><i class="bi-instagram fs-3"></i></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>
    <!-- Icons Grid-->
    <!-- Bootstrap core JS-->
    <!-- Core theme JS-->
    <script src="js/scripts.js"></script>
    <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
    <!-- * *                               SB Forms JS                               * *-->
    <!-- * * Activate your form at https://startbootstrap.com/solution/contact-forms * *-->
    <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
    <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
</script>

</html>
