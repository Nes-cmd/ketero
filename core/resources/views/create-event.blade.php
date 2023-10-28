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
    }

    .partial {
        background-color: rgb(200, 200, 10);
        padding: 0 10px;
        border-radius: 3px;
    }

    .unavailable {
        background-color: rgb(200, 10, 10);
        padding: 0 10px;
        border-radius: 3px;
    }

    .switch {
        position: relative;
        display: inline-block;
        width: 50px;
        height: 28px;
    }

    .switch input {
        opacity: 0;
        width: 0;
        height: 0;
    }

    .slider {
        position: absolute;
        cursor: pointer;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background-color: #ccc;
        -webkit-transition: .4s;
        transition: .4s;
    }

    .slider:before {
        position: absolute;
        content: "";
        height: 20px;
        width: 20px;
        left: 4px;
        bottom: 4px;
        background-color: white;
        -webkit-transition: .4s;
        transition: .4s;
    }

    input:checked+.slider {
        background-color: #2196F3;
    }

    input:focus+.slider {
        box-shadow: 0 0 1px #2196F3;
    }

    input:checked+.slider:before {
        -webkit-transform: translateX(20px);
        -ms-transform: translateX(20px);
        transform: translateX(20px);
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