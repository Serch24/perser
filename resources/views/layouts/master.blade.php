<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('tittle')</title>

    <!-- Scripts -->
    <script
    src="https://code.jquery.com/jquery-3.6.0.min.js"
    integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
    crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('style.css') }}">

    <!-- Styles -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.min.css">
    <script src="{{asset('app.js')}}"></script>
</head>
<body class="bg-custome">
    <div class="wrapper">
        <!-- Sidebar -->
        <nav id="sidebar">

            <div id="dismiss">
                <i class="fas fa-arrow-left"></i>
            </div>

            <div class="sidebar-header">
                <h3><a href="{{ url('/') }}" class="text-white">Perser</a></h3>
            </div>

            <ul class="list-unstyled components">
                <p>Heading</p>
                <li>
                    <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle collapsed text-white">
                        <i class="fas fa-home"></i> Products</a>
                    <ul class="collapse list-unstyled" id="homeSubmenu">
                        <li>
                            <a href="#" class="text-white">Home 1</a>
                        </li>
                        <li>
                            <a href="#" class="text-white">Home 2</a>
                        </li>
                        <li>
                            <a href="#" class="text-white">Home 3</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="#" class="text-white">About</a>
                    <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle collapsed text-white">Pages</a>
                    <ul class="collapse list-unstyled" id="pageSubmenu">
                        <li>
                            <a href="#">Page 1</a>
                        </li>
                        <li>
                            <a href="#">Page 2</a>
                        </li>
                        <li>
                            <a href="#">Page 3</a>
                        </li>
                    </ul>
                </li>
            </ul>
        </nav>

        <!-- Page Content -->
        <div id="content">
            <nav class="navbar navbar-expand-sm navbar-light bg-light">
                <div class="container-fluid">
                    <div class="row w-100 justify-content-around">
                        <div class="col-5">
                            <div class="row w-100 h-100 align-items-center">

                                <div class="col">
                                    <button type="button" id="sidebarCollapse" class="btn btn-outline-primary">
                                        <i class="fas fa-bars"></i>
                                    </button>
                                </div>
                            </div>
                        </div> 

                        <div class="col-4">
                            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                                <ul class="nav navbar-nav ml-auto">
                                    @if (!Auth::check())
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{ route('login') }}">
                                                <i class="fas fa-sign-in-alt"></i> Login</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{ route('register') }}">
                                                <i class="fas fa-sign-out-alt"></i>Register</a>
                                        </li>
                                    @else
                                        <div class="row justify-content-md-center ">
                                            
                                            {{-- profile --}}
                                            <div class="col">
                                                <a href="{{route('profile')}}" data-placement='bottom' data-toggle="tooltip" title="Profile" class="nav-link">
                                                    <i class="fas fa-user-alt fa-2x text-primary" ></i>
                                                </a>
                                            </div>

                                            {{-- log out --}}
                                            <div class="col">
                                                <form action="/logout" method="post" id="logOutForm">
                                                    @csrf
                                                    <li class="nav-item" data-toggle="modal" data-target="#close">
                                                        <button class="btn btn-link nav-link" data-placement='bottom' data-toggle="tooltip" title="Sign out" id="logOut">
                                                            <i class="fas fa-sign-out-alt fa-2x text-primary"></i>
                                                        </button>
                                                    </li>
                                                    @include('bootstrapjs.modal-close')
                                                </form>
                                            </div>
                                        </div>
                                    @endif
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </nav>
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-12 d-flex justify-content-center">
                        @yield('bread')
                    </div>
                </div>
            </div>
            @yield('body')
        </div>
        <!-- Dark Overlay element -->
        <div class="overlay"></div>
    </div>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.concat.min.js"></script>
    <script>
        // inicializar tooltips
        $(function () {
            $('[data-toggle="tooltip"]').tooltip()
        });

        // modals 
        let logOut = document.querySelector('#logOut');
        let yesModal= document.querySelector('#yesModal');
        logOut.addEventListener('click', (event) => {
            event.preventDefault();
        });

        yesModal.addEventListener('click',() =>{
            document.querySelector('#logOutForm').submit();
        });


    </script>
    @stack('scripts')
</body>
</html>