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
<style>
    table,
    th,
    td {
        border: 1px solid rgb(220, 220, 220);
        border-collapse: collapse;
    }

    .available {
        background-color: rgb(10, 200, 10);
        padding: 0 10px;
        border-radius: 3px;
        color: white;
    }

    .partial {
        background-color: rgb(200, 200, 10);
        padding: 0 10px;
        border-radius: 3px;
        color: white;
    }

    .unavailable {
        background-color: rgb(200, 10, 10);
        padding: 0 10px;
        border-radius: 3px;
        color: white;
    }
    /* Rounded sliders */
    .slider.round {
        border-radius: 34px;
    }

    .slider.round:before {
        border-radius: 50%;
    }

    .modal-footer {
        display: flex !important;
        justify-content: space-between !important;
    }

    /* .modal-ku {
        width: 750px;
        margin: auto;
    } */
</style>

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
<script src="{{ URL::asset('assets/js/pages/form-wizard.init.js') }}"></script>
<script src="{{ URL::asset('/assets/js/app.min.js') }}"></script>
@endsection