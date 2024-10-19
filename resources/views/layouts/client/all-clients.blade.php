@extends('layouts.app')

@section('all-clients')
    <div class="col-md-10 mt-md-3">


        @if (session('success'))
           <h2 class="text-danger">  {{ session('success') }} </h2>
        @endif


        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="dashboard.html">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">All Clients</li>
            </ol>
        </nav>

        <table id="table_id" class="display" style="width: 100%">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Phone</th>
                    <th>Email</th>
                    <th>Gender</th>
                    <th>Address</th>
                    <th>FB Review</th>
                    <th>Google Review</th>
                    
                    <th>Page No.</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>


                @foreach ($clientCollection as $clientItem)
                    <!-- client item start -->
                    <tr>
                        <td> {{ __($clientItem->id) }} </td>
                        <td class="d-flex justify-content-between image-size-custom">
                            <img src="/images/{{ $clientItem->client_photo }}" alt="Client-photo"
                                class="rounded-circle me-md-2 me-1 img-fluid" onerror="this.onerror=null;this.src='https://picsum.photos/id/5/40/40';" />
                            {{ __($clientItem->name) }}
                        </td>
                        <td>{{ __($clientItem->phone) }}</td>
                        <td> {{ __($clientItem->email) }} </td>
                        <td>
                            @if ($clientItem->gender == 1)
                                {{ __('Male') }}
                            @else
                                {{ __('Female') }}
                            @endif
                        </td>
                        <td>
                            {{ __($clientItem->address) }}
                        </td>
                        <td>
                            @if ($clientItem->facebook_review == 1)
                                {{ __('Yes') }}
                            @else
                                {{ __('No') }}
                            @endif
                        </td>
                        <td>
                            @if ($clientItem->google_review == 1)
                                {{ __('Yes') }}
                            @else
                                {{ __('No') }}
                            @endif
                        </td>
                        
                        <td> <a href="single-profile.html" class="text-dark"> {{ __($clientItem->page_number) }}  </a> </td>
                        <td>
                            <div class="dropdown">
                                <button class="btn" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown"
                                    aria-expanded="false">
                                    <i class="bi bi-three-dots-vertical"></i>
                                </button>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                    <li>
                                        <a class="dropdown-item" href="{{ route('single-client-info', $clientItem->id ) }}">View</a>
                                    </li>
                                    <li><a class="dropdown-item" href="{{ route('edit-client', $clientItem->id) }}">Edit</a></li>
                                    <li><a onclick="return confirm('Are you sure you want to delete this item?')" class="dropdown-item" href="{{ route('delete-client', $clientItem->id) }}">Delete</a></li>
                                </ul>
                            </div>
                        </td>
                    </tr>
                    <!-- client item start -->
                @endforeach

            </tbody>

            <tfoot>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Phone</th>
                    <th>Email</th>
                    <th>Gender</th>
                    <th>Address</th>
                    <th>FB Review</th>
                    <th>G Review</th>
                    <th>Page No.</th>
                    <th>Action</th>
                </tr>
            </tfoot>
        </table>
    </div>
@endsection
