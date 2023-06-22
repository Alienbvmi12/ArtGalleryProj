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
                            <img src="{{ $user->profile_photo }}" alt="your profile"
                                style="object-fit : fill; width : 100%; height : 100%;">
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
                    @if (request('section'))
                        @if (request('section') == 'posts')
                            <label for="">Album</label>
                            <select class="form-control mb-4" style="width : 200px" name="" id="">
                                <option value="all">All</option>
                                <option value="album 1">Album 1</option>
                            </select>
                            <div class="card-body row">
                                @foreach ($posts as $post)
                                    <div class="col-sm-3">
                                        <div class="card mb-3" style="width:100%">
                                            <div style="overflow : hidden; height : 200px">
                                                <img src="{{ $post->cover_image }}" style="object-fit: cover"
                                                    class="card-img-top" alt="...">
                                            </div>
                                            <div class="card-body">
                                                <h5 class="card-title">{{ $post->title }}</h5>
                                                <p class="card-text" style="height : 100px; overflow : hidden">
                                                    {!! $post->excerpt !!}</p>
                                                <a href="/post/{{ $post->slug }}" class="">Read more...</a>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        @elseif(request('section') == 'albums')

                        @elseif(request('section') == 'like')

                        @elseif(request('section') == 'arts')
                            <label for="">Album</label>
                            <select class="form-control mb-4" style="width : 200px" name="" id="">
                                <option value="all">All</option>
                                <option value="album 1">Album 1</option>
                            </select>
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
                        @else
                            <div class="card-body row">
                                <div class="col-sm-2"></div>
                                <div class="col-sm-8">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <table>
                                                <tr>
                                                    <td>Name</td>
                                                    <td> : </td>
                                                    <td>Rayhan</td>
                                                </tr>
                                                <tr>
                                                    <td>Sex</td>
                                                    <td> : </td>
                                                    <td>Super saiyan / yang mulia</td>
                                                </tr>
                                                <tr>
                                                    <td>Born</td>
                                                    <td> : </td>
                                                    <td>May, 19 2006 / Sweet seventeen</td>
                                                </tr>
                                                <tr>
                                                    <td>Born</td>
                                                    <td> : </td>
                                                    <td>May, 19 2006 / Sweet seventeen</td>
                                                </tr>
                                            </table>
                                        </div>
                                        <div class="col-sm-6">

                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-2"></div>
                            </div>
                        @endif
                    @else
                        <div class="card-body row">
                            <div class="col-sm-2">
                                <a class="text-white" data-bs-toggle="modal" data-bs-target="#example">
                                    <i class="bi bi-pencil-square text-dark"></i>
                                </a>
                            </div>
                            <div class="col-sm-8">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <table style="width : 100%">
                                            <tr>
                                                <td><i class="bi bi-person-fill"></i></td>
                                                <td> </td>
                                                <td>Rayhan <i class="bi bi-gender-male"></i></td>
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
                                                <td>May, 19 2006</td>
                                            </tr>
                                            <tr>
                                                <td><i class="bi bi-geo-alt-fill"></i></td>
                                                <td> </td>
                                                <td>Indonesia</td>
                                            </tr>
                                            <tr>
                                                <td><i class="bi bi-heart-fill"></i></td>
                                                <td> </td>
                                                <td>Anime</td>
                                            </tr>
                                        </table>
                                    </div>
                                    <div class="col-sm-8">
                                        <h2>About me</h2>
                                        <p>
                                            Lorem ipsum dolor, sit amet consectetur adipisicing elit. Quibusdam praesentium
                                            non
                                            placeat similique vero magni culpa mollitia accusamus laudantium, officiis iusto
                                            amet perspiciatis nam aliquam ipsam accusantium eius ut! Ad perspiciatis
                                            quibusdam
                                            debitis aperiam culpa sit perferendis optio atque itaque. Doloribus blanditiis
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
            <footer class="footer bg-light">
                <div class="container">
                    <div class="row p-5">
                        <div class="col-lg-6 h-100 text-center text-lg-start">
                            <ul class="list-inline mb-3 mt-1">
                                <li class="list-inline-item"><a href="#!">About</a></li>
                                <li class="list-inline-item">⋅</li>
                                <li class="list-inline-item"><a href="#!">Contact</a></li>
                                <li class="list-inline-item">⋅</li>
                                <li class="list-inline-item"><a href="#!">Terms of Use</a></li>
                                <li class="list-inline-item">⋅</li>
                                <li class="list-inline-item"><a href="#!">Privacy Policy</a></li>
                            </ul>
                            <p class="text-muted small mb-4">&copy; Your Website 2023. All Rights Reserved.</p>
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
        </div>
    </div>

    <!--Modal-->

    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
    <div class="modal fade" id="example" tabindex="-1" aria-labelledby="exampleLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <b>
                        <h5 class="modal-title" id="exampleLabel">Modal title</h5>
                    </b>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="post" action="/profile" class="row">
                        @csrf
                        <div class="col-sm-4">
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Name</label>
                                <input type="text" class="form-control" id="exampleFormControlInput1"
                                    placeholder="username">
                            </div>
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Born</label>
                                <input type="date" class="form-control" id="exampleFormControlInput1"
                                    value="awokawok">
                            </div>
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Region</label>
                                <select name="country" class="form-control">
                                    <option disabled selected hidden>Select your country</option>
                                    <option value="option1">Option 1</option>
                                    <option value="option2">Option 2</option>
                                    <option value="option3">Option 3</option>
                                    <option value="option4">Option 4</option>
                                    <!-- Add more options as needed -->
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Hobbies</label>
                                <input type="text" class="form-control" id="exampleFormControlInput1"
                                    placeholder="hobbies">
                            </div>
                            <div class="mb-3">
                                <input class="" type="radio" name="gender" id="male" value="male"
                                    required>Male
                                <input class="" type="radio" name="gender" id="female" value="female"
                                    required>Female
                            </div>
                        </div>
                        <div class="col-sm-8">
                            <h2>Descriptions</h2>
                            <textarea id="summernote" name="editordata">
                                Aku sudah dewasa <b>aku takut kecewa</b>
                            </textarea>
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
    <script>
         $('#summernote').summernote({
        placeholder: 'Hello stand alone ui',
        tabsize: 2,
        height: 120,
        toolbar: [
          ['style', ['style']],
          ['font', ['bold', 'underline', 'clear', 'font']],
          ['color', ['color']],
          ['para', ['ul', 'ol', 'paragraph']],
          ['table', ['table']],
          ['insert', ['link', 'picture']],
          ['view', ['codeview', 'help']]
        ]
      });
    </script>

@endsection
