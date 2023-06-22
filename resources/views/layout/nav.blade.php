<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Josefin+Sans:ital,wght@0,400;1,300&family=Outfit:wght@300&display=swap"
        rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@200&family=Raleway:wght@300&display=swap"
        rel="stylesheet">
    <link href="../css/style2.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet"
        type="text/css" />
    {{-- <link rel="stylesheet" type="text/css" href="https://unpkg.com/trix@2.0.0/dist/trix.css">
    <script type="text/javascript" src="https://unpkg.com/trix@2.0.0/dist/trix.umd.min.js"></script>
    <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet"> --}}

    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"></script>

    <!-- include summernote css/js -->
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>

    <style>
        * {
            font-family: 'Montserrat', sans-serif;
        }

        /* Styles for the search field */
        .search-field {
            margin-bottom: 10px;
        }

        /* Styles for the select dropdown */
        .custom-select {
            position: relative;
        }

        .custom-select select {
            width: 100%;
            padding: 5px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }


        /* From uiverse.io by @satyamchaudharydev */
        /* this button is inspired by -- whatsapp input */
        /* == type to see fully interactive and click the close buttom to remove the text  == */

        .form {
            --input-bg: #FFf;
            /*  background of input */
            --padding: 1.5em;
            --rotate: 80deg;
            /*  rotation degree of input*/
            --gap: 2em;
            /*  gap of items in input */
            --icon-change-color: #15A986;
            /*  when rotating changed icon color */
            --height: 40px;
            /*  height */
            width: 200px;
            padding-inline-end: 1em;
            /*  change this for padding in the end of input */
            background: var(--input-bg);
            position: relative;
            border-radius: 4px;
        }

        .form label {
            display: flex;
            align-items: center;
            width: 100%;
            height: var(--height);
        }

        .form input {
            width: 100%;
            padding-inline-start: calc(var(--padding) + var(--gap));
            outline: none;
            background: none;
            border: 0;
        }

        /* style for both icons -- search,close */
        .form svg {
            /* display: block; */
            color: #111;
            transition: 0.3s cubic-bezier(.4, 0, .2, 1);
            position: absolute;
            height: 15px;
        }

        /* search icon */
        .icon {
            position: absolute;
            left: var(--padding);
            transition: 0.3s cubic-bezier(.4, 0, .2, 1);
            display: flex;
            justify-content: center;
            align-items: center;
        }

        /* arrow-icon*/
        .swap-off {
            transform: rotate(-80deg);
            opacity: 0;
            visibility: hidden;
        }

        /* close button */
        .close-btn {
            /* removing default bg of button */
            background: none;
            border: none;
            right: calc(var(--padding) - var(--gap));
            box-sizing: border-box;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #111;
            padding: 0.1em;
            width: 20px;
            height: 20px;
            border-radius: 50%;
            transition: 0.3s;
            opacity: 0;
            transform: scale(0);
            visibility: hidden;
        }

        .form input:focus~.icon {
            transform: rotate(var(--rotate)) scale(1.3);
        }

        .form input:focus~.icon .swap-off {
            opacity: 1;
            transform: rotate(-80deg);
            visibility: visible;
            color: var(--icon-change-color);
        }

        .form input:focus~.icon .swap-on {
            opacity: 0;
            visibility: visible;
        }

        .form input:valid~.icon {
            transform: scale(1.3) rotate(var(--rotate))
        }

        .form input:valid~.icon .swap-off {
            opacity: 1;
            visibility: visible;
            color: var(--icon-change-color);
        }

        .form input:valid~.icon .swap-on {
            opacity: 0;
            visibility: visible;
        }

        .form input:valid~.close-btn {
            opacity: 1;
            visibility: visible;
            transform: scale(1);
            transition: 0s;
        }

        #image-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
        }

        #followed_button {
            width: 2rem;
            height: 20%;
            background-color: white;
            border-radius: 20px;

        }

        .rowa {
            display: flex;
            flex-wrap: wrap;
            padding: 0 4px;
        }

        /* Create four equal columns that sits next to each other */
        .columna {
            flex: 25%;
            max-width: 25%;
            padding: 0 4px;
        }

        .columna img {
            margin-top: 8px;
            vertical-align: middle;
            width: 100%;
        }

        .content-menu {
            flex-direction: column;
            align-items: center;
        }

        /* Responsive layout - makes a two column-layout instead of four columns */
        @media screen and (max-width: 800px) {
            .columna {
                flex: 50%;
                max-width: 50%;
            }
        }

        @media screen and (max-width: 575px) {
            .content-menu {
                flex-direction: row;
                justify-content: center;
            }
        }

        @media screen and (max-width: 404px) {
            .titel {
                display: none;
            }
        }
    </style>
</head>

<body>
    <!--style="background-color : rgba(25,25,25,1)"-->

        <!--Navbar-->

        <nav class="navbar navbar-expand-lg navbar-dark bg-dark" style="">
            <div class="container-fluid">
                <a class="navbar-brand" href="/"><b class="ms-3 titel"
                        style="font-size : 25px; font-family: 'Josefin Sans', sans-serif;">Lievmy</b><img
                        src="../img/OriginalMinGi.png" width="20"></a>
                <div class="ms-auto me-auto">
                    <form class="form">
                        <label for="search">
                            <input required="" autocomplete="off" placeholder="Search" id="search" type="text">
                            <div class="icon">
                                <svg stroke-width="2" stroke="currentColor" viewBox="0 0 24 24" fill="none"
                                    xmlns="http://www.w3.org/2000/svg" class="swap-on">
                                    <path d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" stroke-linejoin="round"
                                        stroke-linecap="round"></path>
                                </svg>
                                <svg stroke-width="2" stroke="currentColor" viewBox="0 0 24 24" fill="none"
                                    xmlns="http://www.w3.org/2000/svg" class="swap-off">
                                    <path d="M10 19l-7-7m0 0l7-7m-7 7h18" stroke-linejoin="round"
                                        stroke-linecap="round">
                                    </path>
                                </svg>
                            </div>
                            <button type="reset" class="close-btn">
                                <svg viewBox="0 0 20 20" class="h-5 w-5" xmlns="http://www.w3.org/2000/svg">
                                    <path clip-rule="evenodd"
                                        d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                        fill-rule="evenodd"></path>
                                </svg>
                            </button>
                        </label>
                    </form>
                </div>
                <a class="nav-link text-white" style="cursor:pointer" data-bs-toggle="offcanvas"
                    data-bs-target="#offcanvasExample" aria-controls="offcanvasExample">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                        class="bi bi-three-dots-vertical" viewBox="0 0 16 16">
                        <path
                            d="M9.5 13a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0z" />
                    </svg>
                </a>
            </div>
        </nav>

        <!--Info Sidebar-->
        <div class="offcanvas offcanvas-end" style="width : 250px" tabindex="-1" id="offcanvasExample"
            aria-labelledby="offcanvasExampleLabel">
            <div class="offcanvas-header">
                <span class="navbar-text">
                    <a class="nav-link" href="/profile">
                        <img src="@if (auth()->user()->profile_photo) {{ auth()->user()->profile_photo }}  @else img/profile.jpeg @endif"
                            width="50px" style="border-radius : 10px; box-shadow : 0 1px 5px 0 rgba(0,0,0,0.4)"
                            class="rounded-circle" alt="profile">
                    </a>
                </span>
                <b style="font-size : 25px; color : black">{{ auth()->user()->username }}</b>
                <div></div>
            </div>
            <div class="offcanvas-body">
                <div class="d-flex" style="flex-direction : column; -flex-direction : column;">
                    <ul class="list-group">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item"><a href="/profile/{{ auth()->user()->username }}">Your
                                    Profile</a></li>
                            <li class="list-group-item">Create Content</li>
                            <li class="list-group-item">Liked Contents</li>
                            <li class="list-group-item">People You Follow</li>
                            <li class="list-group-item">Your Gallery</li>
                            <li class="list-group-item">
                                <form method="post" action="/logout">
                                    @csrf
                                    <button type="submit"
                                        style="border : none; background : none; color : black">Logout</button>
                                </form>
                            </li>
                        </ul>
                    </ul>
                </div>
            </div>
        </div>

        @yield('container')

</body>

<script>
    function dispose() {
        const element = document.getElementById("folcom");
        if (element.style.width == "12rem") {
            element.style.width = "0";
        } else {
            element.style.width = "12rem";
        }
    }

    document.getElementById("followed_button").click();
</script>

</html>
