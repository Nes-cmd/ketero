@extends('layouts.master')
@section('title') @lang('translation.starter') @endsection
@section('content')
@component('components.breadcrumb')
@slot('li_1') Pages @endslot
@slot('title') Availability @endslot
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
    <div class="col-12 col-md-8 col-lg-8">
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <h4 class="card-title mb-0">Manage your availability</h4>
                <button class="btn btn-primary" type="button" x-data x-on:click="$dispatch('open-modal', {'name': 'new-availability'})">Create new</button>
            </div>
            <!-- end card header -->
            <div class="card-body form-steps">
                <form action="#">

                    <div class="tab-content">
                        <div class="tab-pane fade show active" id="steparrow-description-info" role="tabpanel" aria-labelledby="steparrow-description-info-tab">
                            <div class="row">
                                <!-- <div class="col-6 mb-4">
                                    <label for="formFile" class="form-label">Working hour</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control">
                                        <button class="btn btn-primary" type="button">Create new</button>
                                    </div>
                                </div> -->
                                @foreach($availabilities as $availability)

                                <livewire-single-availability :key="$availability['id']" :availability="$availability" />
                                @endforeach

                            </div>
                        </div>
                </form>
            </div>
            <!-- end card body -->
        </div>
        <!-- end card -->
    </div>
    <!-- end col -->
</div><!-- end row -->

</div>
<!-- availability modal -->
<x-modal title="Availability for" name="av-editor" width="40%">
    <x-slot:body>
        <livewire-availability-editor />
        </x-slot>
</x-modal>
<!-- availability modal end-->

<!-- new av modal -->
<x-modal title="Create new availability" width="600px" name="new-availability">
    <x-slot:body>
        <livewire-create-availability />
        </x-slot>
</x-modal>
<!-- new av modal end-->

@endsection
