<html>

<head>
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <title>@yield('title')</title>
    @yield('header')

    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }

        /* Chrome, Safari, Edge, Opera */
        input::-webkit-outer-spin-button,
        input::-webkit-inner-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }

        /* Firefox */
        input[type=number] {
            -moz-appearance: textfield;
        }

        /* Show it is fixed to the top */
        body {
            min-height: 75rem;
            padding-top: 4.5rem;
        }

        nav {
            background-color: #9DC183;
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-md fw-semibold fixed-top text-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Persuratan</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse"
                aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <ul class="navbar-nav me-auto mb-2 mb-md-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="{{ url('dashboard/surat') }}">Dashboard</a>
                    </li>
                    @if (Auth::check() && Auth::user()->role == 'admin')
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('admin/user') }}">Manage User</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('jenis/surat') }}">Jenis Surat</a>
                        </li>
                    @endif
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('transaksi/surat') }}">Transaksi Surat</a>
                    </li>
                </ul>
                <div class="d-flex">
                    <a href="{{ url('/logout') }}"><button class="btn btn-secondary">Logout</button></a>
                </div>
            </div>
        </div>
    </nav>

    <div class="container">
        @include('layout.flash-message')
        @yield('content')
    </div>
</body>
<footer>
    @yield('footer')
</footer>
<html>
