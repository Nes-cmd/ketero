@extends('layouts.master')
@section('title') @lang('translation.starter') @endsection
@section('content')
@component('components.breadcrumb')
@slot('li_1') Pages @endslot
@slot('title') Availability @endslot
@endcomponent

<div class="row">
    <div class="col-12 col-lg-8">
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
