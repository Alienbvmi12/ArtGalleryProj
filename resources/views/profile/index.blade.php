@extends('layout.nav')

@section('container')
    <div class="profile-page-wrapper">
        <div class="profile-head"
            style="background-image : url('https://picsum.photos/{{ rand(600, 1500) }}/{{ rand(600, 1000) }}?nocache{{ microtime() }} ')">
            <div class="d-grid" style="height:100%; width : 100% ; place-items: center; background-color : rgba(0,0,0,0.5)">
                <div class="d-flex" style="width : 26rem; flex-direction : column; height : 70%;">
                    <div class="d-grid" style="place-items: center; height : 50%;">
                        <div class="shadow-lg"
                            style="height : 100px; width : 100px; overflow : hidden; border-radius : 10px;">
                            <img src="@if ($user->profile_photo) {{ $user->profile_photo }} @else ../img/profile.jpeg @endif"
                                alt="your profile" style="object-fit : fill; width : 100%; height : 100%;">
                        </div>
                    </div>
                    <div class="d-grid text-white"
                        style="place-items : center; text-align : center; text-shadow : 0 0 5px rgba(0,0,0,0.2);">
                        <table>
                            <tr>
                                <td>
                                    <h1><b
                                            style="font-family: 'Oufit', sans-serif; text-shadow : 0 0 10px rgba(0,0,0,0.2)">{{ $user->username }}</b>
                                    </h1>
                                </td>
                                @if (auth()->user()->id === $user->id)
                                    <td class="ps-2">
                                        <a class="text-white" style="text-shadow : 0 0 5px rgba(0,0,0,0.2); cursor:pointer"
                                            data-bs-toggle="modal" data-bs-target="#exampleModal">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                                fill="currentColor" class="bi bi-pencil-fill" viewBox="0 0 16 16">
                                                <path
                                                    d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z" />
                                            </svg>
                                        </a>
                                    </td>
                                @endif
                            </tr>
                        </table>
                        <span style="text-shadow : 0 0 10px rgba(0,0,0,1)"> 8B followers | 10k follows | 1 art </span>
                    </div>
                </div>
            </div>
        </div>
        <div class="profile-body">
            <div class="container mb-5">

                <!--Nav-->

                <nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-5 shadow"
                    style="border-radius : 50px; margin-top : -20px;">
                    <div class="container-fluid d-flex justify-content-around alien-nav">
                        <a class="nav-link text-white active" href="/profile/{{ $user->username }}">Bio</a>
                        <a class="nav-link text-white active" href="/profile/{{ $user->username }}?section=arts">Arts</a>
                        <a class="nav-link text-white" href="/profile/{{ $user->username }}?section=posts">Posts</a>
                        <a class="nav-link text-white" href="/profile/{{ $user->username }}?section=albums">Albums</a>
                        <a class="nav-link text-white" href="/profile/{{ $user->username }}?section=like">Liked Contents</a>
                    </div>
                </nav>

                <div class="card " style="width : 100%">
                    @if ($errors->any())
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                    @if (request('section'))
                        @if (request('section') == 'posts')
                            <div class="container my-3">
                                <label for="">Album</label>
                                <select class="form-control mb-4" style="width : 200px" name="" id="">
                                    <option value="all">All</option>
                                    @foreach ($albums as $album)
                                        <option value="{{ $album->id }}">{{ $album->title }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="card-body row">
                                @if (auth()->user()->id == $user->id)
                                    <div class="col-sm-3">
                                        <div class="card mb-3" style="width:100%; cursor : pointer">
                                            <div class="card-body" style="overflow : hidden; height : 200px"
                                                data-bs-toggle="modal" data-bs-target="#modalPost">
                                                <div class="row" style="height : 80%">
                                                    <div class="col-sm-12 d-grid" style="place-items: center">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="60"
                                                            height="60" fill="currentColor"
                                                            class="bi bi-plus-square-dotted" viewBox="0 0 16 16">
                                                            <path
                                                                d="M2.5 0c-.166 0-.33.016-.487.048l.194.98A1.51 1.51 0 0 1 2.5 1h.458V0H2.5zm2.292 0h-.917v1h.917V0zm1.833 0h-.917v1h.917V0zm1.833 0h-.916v1h.916V0zm1.834 0h-.917v1h.917V0zm1.833 0h-.917v1h.917V0zM13.5 0h-.458v1h.458c.1 0 .199.01.293.029l.194-.981A2.51 2.51 0 0 0 13.5 0zm2.079 1.11a2.511 2.511 0 0 0-.69-.689l-.556.831c.164.11.305.251.415.415l.83-.556zM1.11.421a2.511 2.511 0 0 0-.689.69l.831.556c.11-.164.251-.305.415-.415L1.11.422zM16 2.5c0-.166-.016-.33-.048-.487l-.98.194c.018.094.028.192.028.293v.458h1V2.5zM.048 2.013A2.51 2.51 0 0 0 0 2.5v.458h1V2.5c0-.1.01-.199.029-.293l-.981-.194zM0 3.875v.917h1v-.917H0zm16 .917v-.917h-1v.917h1zM0 5.708v.917h1v-.917H0zm16 .917v-.917h-1v.917h1zM0 7.542v.916h1v-.916H0zm15 .916h1v-.916h-1v.916zM0 9.375v.917h1v-.917H0zm16 .917v-.917h-1v.917h1zm-16 .916v.917h1v-.917H0zm16 .917v-.917h-1v.917h1zm-16 .917v.458c0 .166.016.33.048.487l.98-.194A1.51 1.51 0 0 1 1 13.5v-.458H0zm16 .458v-.458h-1v.458c0 .1-.01.199-.029.293l.981.194c.032-.158.048-.32.048-.487zM.421 14.89c.183.272.417.506.69.689l.556-.831a1.51 1.51 0 0 1-.415-.415l-.83.556zm14.469.689c.272-.183.506-.417.689-.69l-.831-.556c-.11.164-.251.305-.415.415l.556.83zm-12.877.373c.158.032.32.048.487.048h.458v-1H2.5c-.1 0-.199-.01-.293-.029l-.194.981zM13.5 16c.166 0 .33-.016.487-.048l-.194-.98A1.51 1.51 0 0 1 13.5 15h-.458v1h.458zm-9.625 0h.917v-1h-.917v1zm1.833 0h.917v-1h-.917v1zm1.834-1v1h.916v-1h-.916zm1.833 1h.917v-1h-.917v1zm1.833 0h.917v-1h-.917v1zM8.5 4.5a.5.5 0 0 0-1 0v3h-3a.5.5 0 0 0 0 1h3v3a.5.5 0 0 0 1 0v-3h3a.5.5 0 0 0 0-1h-3v-3z" />
                                                        </svg>
                                                    </div>
                                                </div>
                                                <div class="row" style="height : 20%">
                                                    <div class="col-sm-12">
                                                        <h5 class="card-title text-center">Create New Post</h5>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                                @foreach ($posts as $post)
                                    <div class="col-sm-3">
                                        <div class="card mb-3" style="width:100%">
                                            <div style="overflow : hidden; height : 150px">
                                                <?php
                                                $img = explode('://', $post->cover_image)[0];
                                                if (!($img == 'http' or $img == 'https')) {
                                                    $post->cover_image = '../storage/' . $post->cover_image;
                                                }
                                                ?>
                                                <img src="{{ $post->cover_image }}" style="object-fit: cover"
                                                    class="card-img-top" alt="...">
                                            </div>
                                            <div class="card-body">
                                                <h5 class="card-title">{{ $post->title }}</h5>
                                                <p class="card-text" style="height : 50px; overflow : hidden">
                                                    {!! $post->excerpt !!}</p>
                                                <a href="/post/{{ $post->slug }}" class="">Read more...</a>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        @elseif(request('section') == 'albums')
                            <div class="card-body row">
                                @foreach ($albums as $album)
                                    <div class="col-sm-3">
                                        <div class="card mb-3"
                                            style="width:100%; border-radius : 20px; overflow : hidden">
                                            <div class="card-body" style="padding : 0;">
                                                <div class="album-cover"
                                                    style="overflow : hidden; height : 150px; background-image : url('{{ $album->cover_image }}')">
                                                    <div class="album-cover-title">
                                                        <h5 class="card-title">{{ $album->title }}</h5>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        @elseif(request('section') == 'like')
                            <div class="card-body rowa">
                                <?php 
                        for($i = 0; $i < 4; $i++){
                            echo "<div class='columna'>";
                            for($u = 0; $u < 7; $u++){?>
                                <img src="https://picsum.photos/{{ rand(300, 1000) }}/{{ rand(300, 1000) }}?nocache{{ microtime() }}"
                                    style="width : 100%">
                                <?php
                            } 
                            echo "</div>";
                        }?>
                            </div>
                        @elseif(request('section') == 'arts')
    
                            <div class="container my-3">
                                <label for="">Album</label>
                                <select class="form-control mb-4" style="width : 200px" name="" id="">
                                    <option value="all">All</option>
                                    @foreach ($albums as $album)
                                        <option value="{{ $album->id }}">{{ $album->title }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="card-body row">
                                @if (auth()->user()->id == $user->id)
                                <div class="col-sm-12">
                                    <div class="card mb-3" style="width:100%; cursor : pointer">
                                        <div class="card-body" style="overflow : hidden; height : 200px; width : 100%"
                                            data-bs-toggle="modal" data-bs-target="#modalArt">
                                            <div class="row" style="height : 80%">
                                                <div class="col-sm-12 d-grid" style="place-items: center">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="60" height="60"
                                                        fill="currentColor" class="bi bi-plus-square-dotted"
                                                        viewBox="0 0 16 16">
                                                        <path
                                                            d="M2.5 0c-.166 0-.33.016-.487.048l.194.98A1.51 1.51 0 0 1 2.5 1h.458V0H2.5zm2.292 0h-.917v1h.917V0zm1.833 0h-.917v1h.917V0zm1.833 0h-.916v1h.916V0zm1.834 0h-.917v1h.917V0zm1.833 0h-.917v1h.917V0zM13.5 0h-.458v1h.458c.1 0 .199.01.293.029l.194-.981A2.51 2.51 0 0 0 13.5 0zm2.079 1.11a2.511 2.511 0 0 0-.69-.689l-.556.831c.164.11.305.251.415.415l.83-.556zM1.11.421a2.511 2.511 0 0 0-.689.69l.831.556c.11-.164.251-.305.415-.415L1.11.422zM16 2.5c0-.166-.016-.33-.048-.487l-.98.194c.018.094.028.192.028.293v.458h1V2.5zM.048 2.013A2.51 2.51 0 0 0 0 2.5v.458h1V2.5c0-.1.01-.199.029-.293l-.981-.194zM0 3.875v.917h1v-.917H0zm16 .917v-.917h-1v.917h1zM0 5.708v.917h1v-.917H0zm16 .917v-.917h-1v.917h1zM0 7.542v.916h1v-.916H0zm15 .916h1v-.916h-1v.916zM0 9.375v.917h1v-.917H0zm16 .917v-.917h-1v.917h1zm-16 .916v.917h1v-.917H0zm16 .917v-.917h-1v.917h1zm-16 .917v.458c0 .166.016.33.048.487l.98-.194A1.51 1.51 0 0 1 1 13.5v-.458H0zm16 .458v-.458h-1v.458c0 .1-.01.199-.029.293l.981.194c.032-.158.048-.32.048-.487zM.421 14.89c.183.272.417.506.69.689l.556-.831a1.51 1.51 0 0 1-.415-.415l-.83.556zm14.469.689c.272-.183.506-.417.689-.69l-.831-.556c-.11.164-.251.305-.415.415l.556.83zm-12.877.373c.158.032.32.048.487.048h.458v-1H2.5c-.1 0-.199-.01-.293-.029l-.194.981zM13.5 16c.166 0 .33-.016.487-.048l-.194-.98A1.51 1.51 0 0 1 13.5 15h-.458v1h.458zm-9.625 0h.917v-1h-.917v1zm1.833 0h.917v-1h-.917v1zm1.834-1v1h.916v-1h-.916zm1.833 1h.917v-1h-.917v1zm1.833 0h.917v-1h-.917v1zM8.5 4.5a.5.5 0 0 0-1 0v3h-3a.5.5 0 0 0 0 1h3v3a.5.5 0 0 0 1 0v-3h3a.5.5 0 0 0 0-1h-3v-3z" />
                                                    </svg>
                                                </div>
                                            </div>
                                            <div class="row" style="height : 20%">
                                                <div class="col-sm-12">
                                                    <h5 class="card-title text-center">Create New Image Art</h5>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endif
                                <div class="card-body rowi">
                                    <?php 
                                    $artLength = count($arts);
                                    $cnt = 0;
                                    for($i = 0; $i < $artLength; $i++){
                                        echo "<div class='columni'>";
                                        ?>
                                        <img src="../storage/{{ $arts[$i]->content_url }}">
                                    <?php
                                        echo "</div>";
                                    }?>
                                </div>
                            </div>
                        @else
                            <div class="card-body row">
                                <div class="col-sm-2">
                                    @if (auth()->user()->id === $user->id)
                                        <a class="text-white" data-bs-toggle="modal" data-bs-target="#example">
                                            <i class="bi bi-pencil-square text-dark"></i>
                                        </a>
                                    @endif
                                </div>
                                <div class="col-sm-8">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <table style="width : 100%">
                                                <tr>
                                                    <td><i class="bi bi-person-fill"></i></td>
                                                    <td> </td>
                                                    <td>{{ $biodata->first_name . ' ' . $biodata->last_name }} @if ($biodata->gender == 'male')
                                                            <i class="bi bi-gender-male"></i>
                                                        @elseif($biodata->gender == 'female')
                                                            <i class="bi bi-gender-female"></i>
                                                        @else
                                                            ?
                                                        @endif
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                            height="16" fill="currentColor" class="bi bi-balloon-fill"
                                                            viewBox="0 0 16 16">
                                                            <path fill-rule="evenodd"
                                                                d="M8.48 10.901C11.211 10.227 13 7.837 13 5A5 5 0 0 0 3 5c0 2.837 1.789 5.227 4.52 5.901l-.244.487a.25.25 0 1 0 .448.224l.04-.08c.009.17.024.315.051.45.068.344.208.622.448 1.102l.013.028c.212.422.182.85.05 1.246-.135.402-.366.751-.534 1.003a.25.25 0 0 0 .416.278l.004-.007c.166-.248.431-.646.588-1.115.16-.479.212-1.051-.076-1.629-.258-.515-.365-.732-.419-1.004a2.376 2.376 0 0 1-.037-.289l.008.017a.25.25 0 1 0 .448-.224l-.244-.487ZM4.352 3.356a4.004 4.004 0 0 1 3.15-2.325C7.774.997 8 1.224 8 1.5c0 .276-.226.496-.498.542-.95.162-1.749.78-2.173 1.617a.595.595 0 0 1-.52.341c-.346 0-.599-.329-.457-.644Z" />
                                                        </svg>
                                                    </td>
                                                    <td> </td>
                                                    <td>{{ $biodata->born }}</td>
                                                </tr>
                                                <tr>
                                                    <td><i class="bi bi-geo-alt-fill"></i></td>
                                                    <td> </td>
                                                    <td>{{ $biodata->country }}</td>
                                                </tr>
                                                <tr>
                                                    <td><i class="bi bi-heart-fill"></i></td>
                                                    <td> </td>
                                                    <td>{{ $biodata->hobby }}</td>
                                                </tr>
                                            </table>
                                        </div>
                                        <div class="col-sm-8">
                                            <h2>About me</h2>
                                            <p>
                                                {!! $biodata->descriptions !!}
                                            <p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-2"></div>
                            </div>
                        @endif
                    @else
                        <div class="card-body row">
                            <div class="col-sm-2">
                                @if (auth()->user()->id === $user->id)
                                    <a class="text-white" data-bs-toggle="modal" data-bs-target="#example">
                                        <i class="bi bi-pencil-square text-dark"></i>
                                    </a>
                                @endif
                            </div>
                            <div class="col-sm-8">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <table style="width : 100%">
                                            <tr>
                                                <td><i class="bi bi-person-fill"></i></td>
                                                <td> </td>
                                                <td>{{ $biodata->first_name . ' ' . $biodata->last_name }}
                                                    @if ($biodata->gender == 'male')
                                                        <i class="bi bi-gender-male"></i>
                                                    @elseif($biodata->gender == 'female')
                                                        <i class="bi bi-gender-female"></i>
                                                    @else
                                                        ?
                                                    @endif
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                        fill="currentColor" class="bi bi-balloon-fill"
                                                        viewBox="0 0 16 16">
                                                        <path fill-rule="evenodd"
                                                            d="M8.48 10.901C11.211 10.227 13 7.837 13 5A5 5 0 0 0 3 5c0 2.837 1.789 5.227 4.52 5.901l-.244.487a.25.25 0 1 0 .448.224l.04-.08c.009.17.024.315.051.45.068.344.208.622.448 1.102l.013.028c.212.422.182.85.05 1.246-.135.402-.366.751-.534 1.003a.25.25 0 0 0 .416.278l.004-.007c.166-.248.431-.646.588-1.115.16-.479.212-1.051-.076-1.629-.258-.515-.365-.732-.419-1.004a2.376 2.376 0 0 1-.037-.289l.008.017a.25.25 0 1 0 .448-.224l-.244-.487ZM4.352 3.356a4.004 4.004 0 0 1 3.15-2.325C7.774.997 8 1.224 8 1.5c0 .276-.226.496-.498.542-.95.162-1.749.78-2.173 1.617a.595.595 0 0 1-.52.341c-.346 0-.599-.329-.457-.644Z" />
                                                    </svg>
                                                </td>
                                                <td> </td>
                                                <td>{{ $biodata->born }}</td>
                                            </tr>
                                            <tr>
                                                <td><i class="bi bi-geo-alt-fill"></i></td>
                                                <td> </td>
                                                <td>{{ $biodata->country }}</td>
                                            </tr>
                                            <tr>
                                                <td><i class="bi bi-heart-fill"></i></td>
                                                <td> </td>
                                                <td>{{ $biodata->hobby }}</td>
                                            </tr>
                                        </table>
                                    </div>
                                    <div class="col-sm-8">
                                        <h2>About me</h2>
                                        <p>
                                            {!! $biodata->descriptions !!}
                                        <p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-2"></div>
                        </div>
                    @endif
                </div>

            </div>
        </div>
        <div class="profile-foot">
        </div>
    </div>



    <!--Modal-->

    @if ($user->id == auth()->user()->id)
        <!--Modal account-->

        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <b>
                            <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                        </b>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form method="post" action="/profile" class="row">
                            @csrf
                            <div class="col-sm-12">
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Username</label>
                                    <input type="text" class="form-control" id="exampleFormControlInput1"
                                        placeholder="username">
                                </div>
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Email</label>
                                    <input type="email" class="form-control" id="exampleFormControlInput1"
                                        placeholder="name@example.com">
                                </div>
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Password</label>
                                    <input type="password" class="form-control" id="exampleFormControlInput1"
                                        value="awokawok">
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Save changes</button>
                    </div>
                </div>
            </div>
        </div>

        <!--Modal bio-->

        <div class="modal fade" id="example" tabindex="-1" aria-labelledby="exampleLabel" aria-hidden="true">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <div class="modal-header">
                        <b>
                            <h5 class="modal-title" id="exampleLabel">Edit Your Profile</h5>
                        </b>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form method="post" action="/profile/{{ $biodata->id }}">
                        <div class="modal-body row">
                            @csrf
                            @method('put')
                            <div class="col-sm-4">
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">First Name</label>
                                    <input type="text" class="form-control" name="first_name"
                                        placeholder="first name" value="{{ $biodata->first_name }}">
                                </div>
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Last
                                        Name</label>
                                    <input type="text" class="form-control" name="last_name" placeholder="last name"
                                        value="{{ $biodata->last_name }}">
                                </div>
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Born</label>
                                    <input type="date" class="form-control" name="born"
                                        value="{{ $biodata->born }}">
                                </div>
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Region</label>
                                    <select name="country" name="country" class="form-control">
                                        <option disabled selected hidden>Select your country</option>
                                        @foreach ($helper::$countries as $country)
                                            <option value="{{ $country }}">{{ $country }}</option>
                                        @endforeach
                                        <!-- Add more options as needed -->
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1"class="form-label">Hobby</label>
                                    <input type="text" class="form-control" name="hobby" placeholder="hobbies"
                                        value="{{ $biodata->hobby }}">
                                </div>
                                <div class="mb-3">
                                    @if ($biodata->gender == 'male')
                                        <input class="" type="radio" name="gender" id="male"
                                            value="male" required checked>Male
                                        <input class="" type="radio" name="gender" id="female"
                                            value="female" required>Female
                                    @elseif($biodata->gender == 'female')
                                        <input class="" type="radio" name="gender" id="male"
                                            value="male" required>Male
                                        <input class="" type="radio" name="gender" id="female"
                                            value="female" required checked>Female
                                    @else
                                        <input class="" type="radio" name="gender" id="male"
                                            value="male" required>Male
                                        <input class="" type="radio" name="gender" id="female"
                                            value="female" required>Female
                                    @endif
                                </div>
                            </div>
                            <div class="col-sm-8">
                                <h2>Descriptions</h2>
                                <textarea id="summernote" name="descriptions">
                               {{ $biodata->descriptions }}
                            </textarea>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!--Modal Post-->

        <div class="modal fade" id="modalPost" tabindex="-1" aria-labelledby="modalPostLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalPostLabel">New Post</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form method="post" action="/post" enctype="multipart/form-data">
                        <div class="modal-body">
                            @csrf
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="mb-3">
                                        <label for="exampleFormControlInput1" class="form-label">Cover Image</label>
                                        <input class="form-control" type="file" id="cover_image" name="cover_image"
                                            accept="image/*">
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleFormControlInput1" class="form-label">Title</label>
                                        <input type="text" class="form-control" name="title" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleFormControlInput1" class="form-label">Albums</label>
                                        <select class="form-control" name="album_id" id="">
                                            <option disabled selected hidden>Select Album</option>
                                            @foreach ($albums as $album)
                                                <option value="{{ $album->id }}">{{ $album->title }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <img id="previewImage" style="max-width: 300px;" />
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Body</label>
                                <textarea id="winternote" name="body" required>
                                </textarea>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!--Modal Art-->

        <div class="modal fade" id="modalArt" tabindex="-1" aria-labelledby="modalArtLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalArtLabel">New Art</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form method="post" action="/art" enctype="multipart/form-data">
                        <div class="modal-body">
                            @csrf
                            <div class="row">
                                <div class="col-sm-6">
                                    <input type="hidden" name="type" value="image">
                                    <div class="mb-3">
                                        <label for="exampleFormControlInput1" class="form-label">Image</label>
                                        <input class="form-control" type="file" id="content" name="content"
                                            accept="image/*">
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleFormControlInput1" class="form-label">Title</label>
                                        <input type="text" class="form-control" name="title" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleFormControlInput1" class="form-label">Albums</label>
                                        <select class="form-control" name="album_id" id="">
                                            <option disabled selected hidden>Select Album</option>
                                            @foreach ($albums as $album)
                                                <option value="{{ $album->id }}">{{ $album->title }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <img id="previewImageArt" style="max-width: 300px;" />
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Descriptions</label>
                                <textarea id="autumnote" name="descriptions" required>
                                </textarea>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endif

    <script>
        $('#summernote').summernote({
            placeholder: 'Type something...',
            tabsize: 2,
            height: 310,
            toolbar: [
                ['style', ['style']],
                ['font', ['bold', 'underline', 'clear', 'font']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['table', ['table']],
                ['insert', ['link', 'picture', 'video']],
                ['view', ['help']]
            ]
        });

        $('#winternote').summernote({
            placeholder: 'Type something',
            tabsize: 2,
            height: 310,
            toolbar: [
                ['style', ['style']],
                ['font', ['bold', 'underline', 'clear', 'font']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['table', ['table']],
                ['insert', ['link', 'picture', 'video']],
                ['view', ['help']]
            ]
        });

        $('#autumnote').summernote({
            placeholder: 'Type something',
            tabsize: 2,
            height: 310,
            toolbar: [
                ['style', ['style']],
                ['font', ['bold', 'underline', 'clear', 'font']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['table', ['table']],
                ['insert', ['link', 'video']],
                ['view', ['help']]
            ]
        });

        function previewImage(event, id) {
            var input = event.target;

            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    var previewElement = document.getElementById('previewImage');
                    var previewElement2 = document.getElementById('previewImageArt');
                    previewElement.src = e.target.result;
                    previewElement2.src = e.target.result;
                };

                reader.readAsDataURL(input.files[0]);
            }
        }

        var uploadInput = document.getElementById('cover_image');
        uploadInput.addEventListener('change', previewImage);
        var uploadInput = document.getElementById('content');
        uploadInput.addEventListener('change', previewImage);
    </script>

@endsection
