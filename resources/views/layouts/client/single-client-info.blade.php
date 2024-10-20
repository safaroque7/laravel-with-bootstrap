@extends('layouts.app')

@section('single-client-info')
    <div class="col-md-10 mt-md-3">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('all-clients') }}">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Client's Profile</li>
            </ol>
        </nav>
        <div class="row">

            <!-- left arrow start -->
            <div class="col-md-1 d-flex align-items-center">
                <h1> <a href="{{ URL::to('single-client-info/' . $previous) }}"> <i class="bi bi-chevron-compact-left"></i> </a> </h1>
            </div>
            <!-- left arrow end -->


            <div class="col-md-3">
                <img src="/images/{{ $singleClientInfo->client_photo }}" alt="Client-photo" class="me-md-2 me-1 img-fluid" onerror="this.onerror=null;this.src='https://picsum.photos/id/5/354/415';" alt="Client Photo" class="img-fluid">
            </div>
            <div class="col-md-7">

                <div class="d-flex flex-column">

                    <p class="pb-2 border-bottom border-grey"> Name : <span class="fw-bold text-uppercase">
                            {{ __($singleClientInfo->name) }}
                        </span> </p>
                    <p class="pb-2 border-bottom border-grey"> Phone : <span> <a
                                href="tel:{{ __($singleClientInfo->phone) }}"> {{ __($singleClientInfo->phone) }} </a>
                        </span> </p>
                    <p class="pb-2 border-bottom border-grey"> Email : <span> <a
                                href="mailto:{{ __($singleClientInfo->email) }}">
                                {{ __($singleClientInfo->email) }} </a> </span> </p>
                    <p class="pb-2 border-bottom border-grey"> Gender : <span>
                            @if ($singleClientInfo->gender == 1)
                                {{ __('Male') }}
                            @else
                                {{ __('Female') }}
                            @endif </a>
                        </span> </p>
                    <p class="pb-2 border-bottom border-grey"> Address : <span> {{ __($singleClientInfo->address) }} </span>
                    </p>
                    <p class="pb-2 border-bottom border-grey"> Facebook Review : <span>
                            @if ($singleClientInfo->facebook_review == 1)
                                {{ __('Yes') }}
                            @else
                                {{ __('No') }}
                            @endif
                        </span> </p>
                    <p class="pb-2 border-bottom border-grey"> Google Review : <span>

                            @if ($singleClientInfo->google_review == 1)
                                {{ __('Yes') }}
                            @else
                                {{ __('No') }}
                            @endif


                        </span> </p>

                    <p class="pb-2 border-bottom border-grey"> Page Number : <span>
                            {{ __($singleClientInfo->page_number) }} </span> </p>

                    <div class="border-bottom border-grey">
                        <div class="dropdown">
                            Action :
                            <button class="btn" type="button" id="dropdownMenuButton2" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                <i class="bi bi-three-dots-vertical"></i>
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton2">

                                <li><a class="dropdown-item" href="{{ route('edit-client', $singleClientInfo->id) }}">Edit</a>
                                </li>
                                <li><a onclick="return confirm('Are you sure you want to delete this item?')"
                                        class="dropdown-item"
                                        href="{{ route('delete-client', $singleClientInfo->id) }}">Delete</a></li>

                            </ul>
                        </div>
                    </div>




                </div>
            </div>

            <!-- right arrow start -->
            <div class="col-md-1 d-flex align-items-center justify-content-end">
                <h1> <a href="{{ URL::to('single-client-info/'. $next) }}"> <i class="bi bi-chevron-compact-right"></i> </a> </h1>
            </div>
            <!-- right arrow end -->

        </div>
    </div>
@endsection
