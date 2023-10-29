@extends('layouts.master')
@section('title') @lang('Events') @endsection
@section('content')
@component('components.breadcrumb')
@slot('li_1') Pages @endslot
@slot('title') Events @endslot
@endcomponent
<style>
    .custom-border {
      border-top-width: 4px;
      border-top-style: solid;
    }
  </style>
<div class="row">
    <div class="col-12">
        <div class="justify-content-between d-flex align-items-center mt-3 mb-4">
            <h5 class="mb-0 pb-1 text-decoration-underline">All events you have</h5>
        </div>
        <div class="row row-cols-xxl-5 row-cols-lg-3 row-cols-1">
            @foreach($events as $event)
            <div class="col">
                <div class="card card-body custom-border" style="border-top-color: {{$event->color}};">
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
                        <a target="_blank" href="{{ route('booking-page', $event->id) }}" class="btn btn-primary btn-sm">
                        <svg style="width: 18px;" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1" stroke-linecap="round" stroke-linejoin="round" class="feather feather-external-link text-info"><path d="M18 13v6a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h6"></path><polyline points="15 3 21 3 21 9"></polyline><line x1="10" y1="14" x2="21" y2="3"></line></svg>
                            <span>Booking page</span>
                        </a>
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