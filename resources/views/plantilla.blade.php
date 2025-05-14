<!DOCTYPE html>

<html>

<head>
    <meta charset="UTF-8">

    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">


    <!--<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js">
    </script>-->
</head>

<body>
    <div class="col-lg-12 container-fluid" style="width: 100vw; height: 10vh; background-color: #FB9E9E;">
        <div class="row">
                <div class="col-lg-6">
                    <h1 style="margin-top:25px; margin-left: 3vh;">Vacalog</h1>
                </div>
                <div class="col-lg-5">
                    <h3 class="float-end" style="margin-top: 3vh;">
                        <p style="margin-right: 2em;">
                            @yield('barra')
                        </p>
                    </h3>
                </div>
                <div class="col-lg-1">
                    <svg class="float-end" style="margin-top: 15px; margin-right: 3vw;" width="64px" height="64px"
                        viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                        <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                        <g id="SVGRepo_iconCarrier">
                            <path d="M4 6H20M4 12H20M4 18H20" stroke="#000000" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round"></path>
                        </g>
                    </svg>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @yield('content')

    @yield('script')
</body>


</html>