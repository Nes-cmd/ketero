@extends('layouts.master')
@section('title') @lang('translation.starter') @endsection
@section('content')
@component('components.breadcrumb')
@slot('li_1') Pages @endslot
@slot('title') Starter @endslot
@endcomponent

<div class="row">
    <div class="col-12">
        <div class="justify-content-between d-flex align-items-center mt-3 mb-4">
            <h5 class="mb-0 pb-1 text-decoration-underline">All events you have</h5>
        </div>
        <div class="row row-cols-xxl-5 row-cols-lg-3 row-cols-1">
            @foreach($events as $event)
            <div class="col">
                <div class="card card-body">
                    <div class="d-flex mb-4 align-items-center">
                        <div class="flex-shrink-0">
                            <img src="{{ URL::asset('assets/images/users/avatar-1.jpg') }}" alt="" class="avatar-sm rounded-circle" />
                        </div>
                        <div class="flex-grow-1 ms-2">
                            <h5 class="card-title mb-1">{{ $event->name }}</h5>
                            <p class="text-muted mb-0">{{$event->category. ' : '. $event->duration}}</p>
                        </div>
                    </div>

                    <h6 class="card-text text-muted">{{ $event->description }}</h6>
                    <div class="d-flex justify-content-between">
                        <a href="{{ route('booking-page', $event->id) }}" class="btn btn-primary btn-sm">Booking page</a>
                        <a href="#" class="btn btn-success btn-sm">Turn on</a>
                    </div>
                </div>
            </div>
            @endforeach

        </div><!-- end row -->
    </div><!-- end col -->
</div>
<!-- end row -->

@endsection
@section('script')
<script src="{{ URL::asset('/assets/js/app.min.js') }}"></script>
@endsection