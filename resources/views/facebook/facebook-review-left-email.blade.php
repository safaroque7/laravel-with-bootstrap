@extends('layouts.app')

@section('facebook-review-left-email')
    <div class="col-md-10 mt-md-3">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('all-clients') }}">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">
                    Facebook Review Left Email Address
                </li>
            </ol>
        </nav>

        <div class="p-2 border border-secondary rounded">
            <code>

                @foreach ($facebookReviewLeftEmailCollection as $facebookReviewLeftEmailItem)
                    {{ __($facebookReviewLeftEmailItem->email) . ', ' }}  
                @endforeach

            </code>
        </div>

    </div>
@endsection
