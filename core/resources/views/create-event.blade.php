@extends('layouts.master')
@section('title') @lang('translation.starter') @endsection
@section('content')
@component('components.breadcrumb')
@slot('li_1') Pages @endslot
@slot('title') Create Event @endslot
@section('css')
<link href="{{ URL::asset('assets/libs/quill/quill.min.css')}}" rel="stylesheet" type="text/css" />
@endsection
@endcomponent

<div class="row">
    <div class="col-md-12 col-xl-8">
        <livewire-create-event />
        <!-- end card -->
    </div>
    <!-- end col -->
</div><!-- end row -->

</div>

<!-- new av modal end-->

<!-- availability modal -->

@endsection
@section('script')
<script src="{{ URL::asset('/assets/js/app.min.js') }}"></script>
@endsection