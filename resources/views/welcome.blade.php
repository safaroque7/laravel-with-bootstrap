<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title> Bootstrap with Laravel </title>
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">


</head>

<body>

    <div class="container-fluid">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h1 class="bg-success"> Install Bootstrap with Laravel </h1>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <p>
                        <a class="btn btn-primary" data-bs-toggle="collapse" href="#collapseExample" role="button"
                            aria-expanded="false" aria-controls="collapseExample">
                            Link with href
                        </a>
                        <button class="btn btn-primary" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                            Button with data-bs-target
                        </button>
                    </p>
                    <div class="collapse" id="collapseExample">
                        <div class="card card-body">
                            Some placeholder content for the collapse component. This panel is hidden by default but
                            revealed when the user activates the relevant trigger.
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="contianer-fluid">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <a href="{{ route('login') }}" class="btn btn-secondary"> {{ __('Login') }} </a>
                    <a href="{{ route('register') }}" class="btn btn-info"> {{ __('Registration') }} </a>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    
                        <a class="dropdown-item" href="{{ route('profile.edit') }}">
                            {{ __('Profile') }}
                        </a>
                        <a class="dropdown-item" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                      document.getElementById('logout-form').submit();">
                            {{ __('Log Out') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    
                </div>
            </div>
        </div>
    </div>

</body>

</html>
