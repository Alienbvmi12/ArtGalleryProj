@extends('layout.nav')

@section('container')
    <!--End Navbar-->

    <!--Content-->

    <div class="" id="followed" style="width : 1rem; height : 60vh; position : fixed; z-index : 2; top : 200px;">
        <table width="100%" height="100%">
            <tr>
                <td class="collapse collapse-horizontal" id="collapseWidthExample">
                    <div class="card" style="width : 12rem; height : 100%; overflow : hidden">
                        <b class="mt-3 mb-3" style="font-size : 20px; text-align : center">Followed Accounts</b>
                        <div class="card mb-2" style="width : 100%;">
                            <div class="g-0">
                                <table style="width : 100%">
                                    <tr>
                                        <td>
                                            <div>
                                                <img src="https://picsum.photos/50/50?nocache={{ microtime() }}"
                                                    class="img-fluid rounded-start" alt="...">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="d-flex" style="align-items : center">
                                                <div>
                                                    <label class="card-title mt-2">User123</label>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                        <div class="card mb-2" style="width : 100%;">
                            <div class="g-0">
                                <table style="width : 100%">
                                    <tr>
                                        <td>
                                            <div>
                                                <img src="https://picsum.photos/50/50?nocache={{ microtime() }}"
                                                    class="img-fluid rounded-start" alt="...">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="d-flex" style="align-items : center">
                                                <div>
                                                    <label class="card-title mt-2">Use_Vixing</label>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                        <div class="card mb-2" style="width : 100%;">
                            <div class="g-0">
                                <table style="width : 100%">
                                    <tr>
                                        <td>
                                            <div>
                                                <img src="https://picsum.photos/50/50?nocache={{ microtime() }}"
                                                    class="img-fluid rounded-start" alt="...">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="d-flex" style="align-items : center">
                                                <div>
                                                    <label class="card-title mt-2">Alien_bvmi12</label>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                        <div class="card mb-2" style="width : 100%;">
                            <div class="g-0">
                                <table style="width : 100%">
                                    <tr>
                                        <td>
                                            <div>
                                                <img src="https://picsum.photos/50/50?nocache={{ microtime() }}"
                                                    class="img-fluid rounded-start" alt="...">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="d-flex" style="align-items : center">
                                                <div>
                                                    <label class="card-title mt-2">Erpan1945</label>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                        <div class="card mb-2" style="width : 100%;">
                            <div class="g-0">
                                <table style="width : 100%">
                                    <tr>
                                        <td>
                                            <div>
                                                <img src="https://picsum.photos/50/50?nocache={{ microtime() }}"
                                                    class="img-fluid rounded-start" alt="...">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="d-flex" style="align-items : center">
                                                <div>
                                                    <label class="card-title mt-2">Frost@Ruby</label>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </td>
                <td style="width : 4rem">
                    <div class="card d-grid" style="place-items : center; cursor : pointer" id="followed_button"
                        type="button" data-bs-toggle="collapse" data-bs-target="#collapseWidthExample"
                        aria-expanded="false" aria-controls="collapseWidthExample">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-chevron-compact-right" viewBox="0 0 16 16">
                            <path fill-rule="evenodd"
                                d="M6.776 1.553a.5.5 0 0 1 .671.223l3 6a.5.5 0 0 1 0 .448l-3 6a.5.5 0 1 1-.894-.448L9.44 8 6.553 2.224a.5.5 0 0 1 .223-.671z" />
                        </svg>
                    </div>
                </td>
            </tr>
        </table>
    </div>

    <div class="container">
        <br>
        <br>
        <h3><b>Recomended Arts For You</b></h3>
    </div>

    <div class="container pt-4">
        <div class="row">

            <!--Art Nav-->

            <div class="col-sm-1 d-flex pt-3 content-menu">
                <div class="m-3 " data-bs-toggle="tooltip" data-bs-placement="right" title="Images">
                    <a href="/" class="text-dark">
                        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor"
                            class="bi bi-images" viewBox="0 0 16 16">
                            <path d="M4.502 9a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3z" />
                            <path
                                d="M14.002 13a2 2 0 0 1-2 2h-10a2 2 0 0 1-2-2V5A2 2 0 0 1 2 3a2 2 0 0 1 2-2h10a2 2 0 0 1 2 2v8a2 2 0 0 1-1.998 2zM14 2H4a1 1 0 0 0-1 1h9.002a2 2 0 0 1 2 2v7A1 1 0 0 0 15 11V3a1 1 0 0 0-1-1zM2.002 4a1 1 0 0 0-1 1v8l2.646-2.354a.5.5 0 0 1 .63-.062l2.66 1.773 3.71-3.71a.5.5 0 0 1 .577-.094l1.777 1.947V5a1 1 0 0 0-1-1h-10z" />
                        </svg>
                    </a>
                </div>
                <div class="m-3" data-bs-toggle="tooltip" data-bs-placement="right" title="Blogposts">
                    <a href="/post" class="text-dark">
                        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor"
                            class="bi bi-layout-text-window-reverse" viewBox="0 0 16 16">
                            <path
                                d="M13 6.5a.5.5 0 0 0-.5-.5h-5a.5.5 0 0 0 0 1h5a.5.5 0 0 0 .5-.5zm0 3a.5.5 0 0 0-.5-.5h-5a.5.5 0 0 0 0 1h5a.5.5 0 0 0 .5-.5zm-.5 2.5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1 0-1h5z" />
                            <path
                                d="M14 0a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h12zM2 1a1 1 0 0 0-1 1v1h14V2a1 1 0 0 0-1-1H2zM1 4v10a1 1 0 0 0 1 1h2V4H1zm4 0v11h9a1 1 0 0 0 1-1V4H5z" />
                        </svg>
                    </a>
                </div>
            </div>

            <!--displayer-->

            <div class="card col-sm-11" id="y">
                <div class="card-body" id="image-wadah">

                </div>
            </div>
        </div>
    </div>
    <script>
        var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
        var tooltipList = tooltipTriggerList.map(function(tooltipTriggerEl) {
            return new bootstrap.Tooltip(tooltipTriggerEl)
        });
        const imgs = [
            <?php
                for ($u = 0; $u < 20; $u++){
                    echo "'https://picsum.photos/". rand(300, 1000) ."/". rand(300, 1000) ."?nocache',";
                }
            ?>
        ];
        const element = document.querySelector('#image-wadah');
        const photoGrid = new PhotoGridBox(element, imgs);
    </script>
@endsection
