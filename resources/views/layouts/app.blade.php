<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title> Bootstrap with Laravel </title>
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])


    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/jquery.dataTables.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">

</head>

<body>
    <div class="container-fluid">
        <div class="row bg-dark">
            <div class="d-flex justify-content-between align-items-center">
                <h2 class="text-white">
                    <a href="{{ route('dashboard') }}" class="text-white text-decoration-none">
                        Dashboard
                    </a>
                </h2>

                <div class="time-and-date-par">
                    <h5 class="mb-0 text-white">
                        {{ $currentDayName . ', ' . $currentDay . ' ' . $currentMonth . ' ' . $currentYear }} <i
                            class="bi bi-dash"></i> 08:04 PM
                    </h5>
                </div>

                <div class="login-info d-flex jusity-content-betwee align-items-center py-md-2 py-1">
                    <p class="text-white pe-md-3 pe-2 mb-0">S A Faroque</p>
                    <div class="dropdown">
                        <div class="dropdown-toggle bg-dark" id="profile1" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            <img src="https://picsum.photos/id/5/30/30" alt=""
                                class="img-fluid rounded-circle border border-white" />
                            <span class="text-white"><i class="bi bi-caret-down-fill"></i></span>
                        </div>
                        <ul class="dropdown-menu" aria-labelledby="profile1">

                            <li><a class="dropdown-item" href="{{ route('profile.edit') }}">{{ __('Profile') }}</a></li>
                            <li> <a class="dropdown-item" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                                    {{ __('Log Out') }}
                                </a> </li>


                            <li>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>


    </div>

    <div class="row d-flex justify-content-between">
        <!-- dashboard navbar start -->
        <div class="col-md-2 bg-dark vh-100 px-0">
            <ul class="nav flex-column">
                <li class="nav-item border-bottom">
                    <a class="nav-link text-white" href="{{ route('all-clients') }}">

                        <i class="bi bi-people-fill pe-md-3 pe-2"></i>
                        All Cleints
                        <span class="text-white me-md-3 me-2 float-end"> {{ __($totalClient) }} </span>
                    </a>

                </li>

                <li class="nav-item border-bottom">
                    <a class="nav-link text-white" href="{{ route('add-new-client') }}">
                        <i class="bi bi-person-plus-fill pe-md-3 pe-2"></i> Add New Cleint
                    </a>
                </li>

                <li class="nav-item border-bottom">
                    <a class="nav-link text-white" href="{{ route('add-new-service') }}">
                        <i class="bi bi-grid-3x3-gap-fill pe-md-3 pe-2"></i>Add New Service
                        <span class="text-white me-md-3 me-2 float-end"> {{ __($totalService) }} </span>
                    </a>
                </li>

                <li class="nav-item border-bottom">
                    <a class="nav-link text-white" href="{{ route('facebook-review-left-email') }}">
                        <i class="bi bi-facebook pe-md-3 pe-2"></i>Facebook Review Left Email
                        <span class="text-white me-md-3 me-2 float-end"> {{ __($facebookReview) }} </span>
                    </a>
                </li>

                <li class="nav-item border-bottom">
                    <a class="nav-link text-white" href="facebook-review-left-phone.html">
                        <i class="bi bi-facebook pe-md-3 pe-2"></i>Facebook Review Left Phone
                        <span class="text-white me-md-3 me-2 float-end"> {{ __($facebookReview) }} </span>
                    </a>
                </li>



            </ul>
        </div>
        <!-- dashboard navbar end -->

        @yield('content')
        @yield('add-new-service')
        @yield('add-new-client')
        @yield('all-clients')
        @yield('single-client-info')
        @yield('facebook-review-left-email')

    </div>

    <script src="http://ajax.aspnetcdn.com/ajax/jQuery/jquery-1.8.2.min.js"></script>
    <script src="http://ajax.aspnetcdn.com/ajax/jquery.dataTables/1.9.4/jquery.dataTables.min.js"></script>

    <script>
        $(function() {
            $("#table_id").dataTable();
        });
    </script>

</body>

</html>
