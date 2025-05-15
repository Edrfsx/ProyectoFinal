<!DOCTYPE html>

<html>

<head>
    <meta charset="UTF-8">

    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <!-- Bootstrap CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

<!-- Opcional: Popper.js, que Bootstrap usa internamente -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<link href="https://cdn.datatables.net/1.13.5/css/jquery.dataTables.min.css" rel="stylesheet">
<script src="https://cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js"></script>


    <!--<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js">
    </script>-->
</head>

<body>
    <div class="col-lg-12 container-fluid" style="width: 100vw; height: 10vh; background-color: #FB9E9E;
    background: linear-gradient(to bottom, #FB9E9E 60%, rgba(0, 0, 0, 0.8) 100%);">
        <div class="row">
            <div class="col-lg-6">
                <h1 style="margin-top:1vh; margin-left: 3vh;">Vacalog</h1>
            </div>
            <div class="col-lg-5">
                <h3 class="float-end" style="margin-top: 3vh;">
                    <p style="margin-right: 2em;">
                        @yield('barra')
                    </p>
                </h3>
            </div>
            <div class="col-lg-1">
                @auth
                    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        <svg width="64px" height="64px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M4 6H20M4 12H20M4 18H20" stroke="#000000" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round">
                            </path>
                        </svg>
                    </a>

                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuLink" style="padding: 1em;">
                        
                            <a href="{{ route('logout') }}" class="dropdown-item w-100 text-center">Cerrar sesión</a>
                       
                    </ul>
                @endauth

            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @yield('content')

    @yield('script')
</body>


</html>