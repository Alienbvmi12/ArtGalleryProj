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
    <style>
        * {
            font-family: 'Josefin Sans', sans-serif;
        }

        .active {}

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
    </style>
</head>

<body>

    <!--Navbar-->

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark" style="">
        <div class="container">
            <a class="navbar-brand" href="/"><b class="me-1" style="font-size : 25px">Lievmy</b><img
                    src="img/OriginalMinGi.png" width="20"></a>
            <div class="ms-4">
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
                                <path d="M10 19l-7-7m0 0l7-7m-7 7h18" stroke-linejoin="round" stroke-linecap="round">
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

    <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
        <div class="offcanvas-header">
            <span class="navbar-text">
                <a class="nav-link" href="/profile">
                    <img src="img/profile.jpeg" width="50px"
                        style="border-radius : 10px; box-shadow : 0 1px 5px 0 rgba(0,0,0,0.4)" class="rounded-circle"
                        alt="profile">

                </a>
            </span>
            <b style="font-size : 25px; color : black">{{ auth()->user()->username }}</b>
            <div></div>
        </div>
        <div class="offcanvas-body">
            <div class="d-flex" style="flex-direction : column; -flex-direction : column;">
                <ul class="list-group">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">Your Profile</li>
                        <li class="list-group-item">Create Content</li>
                        <li class="list-group-item">Liked Contents</li>
                        <li class="list-group-item">People You Follow</li>
                        <li class="list-group-item">Your Gallery</li>
                        <li class="list-group-item">
                            <form method="post" action="/logout">
                                @csrf
                                <button type="submit" style="border : none; background : none; color : black">Logout</button>
                            </form>
                        </li>
                    </ul>
                </ul>
            </div>
        </div>
    </div>

    <!--End Navbar-->

    <!--Content-->

    <div class="card" style="width : 14rem; height : 60vh; position : fixed; z-index : 2; top : 200px;">
        <b class="mt-3 mb-3" style="font-size : 20px; text-align : center">Followed Accounts</b>
        <div class="card mb-2" style="width : 100%;">
            <div class="row g-0">
                <div class="col-md-4">
                    <img src="https://picsum.photos/50/50?nocache={{ microtime() }}" class="img-fluid rounded-start"
                        alt="...">
                </div>
                <div class="col-md-8 d-flex" style="align-items : center">
                    <div>
                        <label class="card-title mt-2">User123</label>
                    </div>
                </div>
            </div>
        </div>
        <div class="card mb-2" style="width : 100%;">
            <div class="row g-0">
                <div class="col-md-4">
                    <img src="https://picsum.photos/50/50?nocache={{ microtime() }}" class="img-fluid rounded-start"
                        alt="...">
                </div>
                <div class="col-md-8 d-flex" style="align-items : center">
                    <div>
                        <label class="card-title mt-2">677SlenderGuy</label>
                    </div>
                </div>
            </div>
        </div>
        <div class="card mb-2" style="width : 100%;">
            <div class="row g-0">
                <div class="col-md-4">
                    <img src="https://picsum.photos/50/50?nocache={{ microtime() }}" class="img-fluid rounded-start"
                        alt="...">
                </div>
                <div class="col-md-8 d-flex" style="align-items : center">
                    <div>
                        <label class="card-title mt-2">Roger_Masamuni</label>
                    </div>
                </div>
            </div>
        </div>
        <div class="card mb-2" style="width : 100%;">
            <div class="row g-0">
                <div class="col-md-4">
                    <img src="https://picsum.photos/50/50?nocache={{ microtime() }}" class="img-fluid rounded-start"
                        alt="...">
                </div>
                <div class="col-md-8 d-flex" style="align-items : center">
                    <div>
                        <label class="card-title mt-2">Naruto1945</label>
                    </div>
                </div>
            </div>
        </div>
        <div class="card mb-2" style="width : 100%;">
            <div class="row g-0">
                <div class="col-md-4">
                    <img src="https://picsum.photos/50/50?nocache={{ microtime() }}" class="img-fluid rounded-start"
                        alt="...">
                </div>
                <div class="col-md-8 d-flex" style="align-items : center">
                    <div>
                        <label class="card-title mt-2">0-ban</label>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <br>
        <br>
        <h3><b>Recomended Arts For You</b></h3>
    </div>

    <div class="container d-flex justify-content-center pt-4">
        <div class="card" style="width : 100%;" id="y">
            <div class="card-body" id="image-grid">
                <?php 
                for($i = 0; $i < 10; $i++){
                    echo "<div class='row'>";
                    $var1 = rand(100, 350);
                    $var2 = rand(100, 350);
                    $var3 = rand(100, 1000 - $var1 - $var2);
                    $var4 = 1000 - $var1 - $var2 - $var3;
                    $reso = array($var1, $var2, $var3, $var4);
                    for($u = 0; $u < 4; $u++){?>
                <img src="https://picsum.photos/250/250?nocache{{ microtime() }}" style="width : 250px;"
                    class="col-sm-3" alt="">
                <?php
                    } 
                    echo "</div>";
                }?>
            </div>
        </div>
    </div>

</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
</script>

<script></script>

</html>
