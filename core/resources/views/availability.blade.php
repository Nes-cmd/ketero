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
        color: white;
        padding: 0 10px;
        border-radius: 3px;
    }

    .partial {
        background-color: rgb(200, 200, 10);
        color: white;
        padding: 0 10px;
        border-radius: 3px;
    }

    .unavailable {
        background-color: rgb(210, 10, 10);
        color: white;
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
    <div class="col-12 col-md-8 col-lg-8">
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <h4 class="card-title mb-0">Manage your availability</h4>
                <button class="btn btn-primary" type="button" data-bs-toggle="modal" data-bs-target="#newAvailability">Create new</button>
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

                                <div class="mb-4">
                                    <div class="d-flex justify-content-between">
                                        <h4>{{ ucfirst($availability['name']) }}</h4>
                                        @if($availability['name'] != 'default')
                                        <span style="color: red; width:20px;cursor:pointer">
                                            <a href="{{ route('delete-availability', $availability['id']) }}">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                                </svg>
                                            </a>
                                        </span>
                                        @endif
                                    </div>
                                    <table class="table mb-1" style="width: 100%;">
                                        <tr style="background-color:rgb(220,220,220);">
                                            <th>Mon</th>
                                            <th>Tue</th>
                                            <th>Wed</th>
                                            <th>Thr</th>
                                            <th>Fri</th>
                                            <th>Sat</th>
                                            <th>Sun</th>
                                        </tr>
                                        <tbody>
                                            <tr>
                                                @foreach($dayOrders as $day)
                                                @php
                                                $status = 'unavailable';
                                                $avToday = $availability['timeranges'][$day];
                                                if(count($avToday)){
                                                if(count($avToday) > 1) $status = 'available';
                                                else $status = 'partial';
                                                }
                                                @endphp
                                                <td width="14%" style="position:relative;background-color: rgb(240,240, 240);" data-bs-toggle="modal" data-bs-target="#{{$availability['name'] == 'default'?'':'showModal'}}">
                                                    <div style="padding-left:4px;">
                                                        <span class="{{$status}}" style="padding-left:5px;">{{ ucfirst($status) }}</span>
                                                        <div style="display: flex; flex-direction:column;overflow-x:hidden;max-width:130px;padding-right:0">
                                                            @foreach($avToday as $timerange)
                                                            <div style="white-space:nowrap">{{ $timerange->start_time->format('H:m') .' - '. $timerange->end_time->format('H:m')}}</div>
                                                            @endforeach
                                                        </div>
                                                    </div>
                                                </td>
                                                @endforeach
                                            </tr>
                                        </tbody>
                                    </table>
                                    <span>You can edit by clicking each box</span>
                                </div>
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
<div class="modal fade" id="showModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-dialog-centered modal-lg px-5" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="myModalLabel">Available at for : Monday</h3>

                <button type="button" class="btn close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div>
                    <div class="row" style="font-size: 20px">
                        <div class="col-4">
                            <h4>From</h4>
                        </div>
                        <div class="col-3">
                            <h4>To</h4>
                        </div>
                        <div class="col-2">
                            <h4>Available?</h4>
                        </div>
                        <div class="col-3">
                            <h4>Section</h4>
                        </div>
                    </div>
                    <!-- First section -->
                    <div class="row" style="font-size: 18px">
                        <div class="col-4 d-flex my-2">
                            <label for="mon">Mon : </label>
                            <input class="form-control" style="width: 150px;margin-left:3px" type="time" name="mon" value="08:00" id="mon">
                        </div>
                        <div class="col-3">
                            <input class="form-control" type="time" name="mon" value="12:00" id="mon">
                        </div>
                        <div class="col-2">
                            <label class="switch">
                                <input type="checkbox" checked>
                                <span class="slider"></span>
                            </label>
                        </div>
                        <div class="col-3">morning</div>
                    </div>
                    <!-- lunch time section -->
                    <div class="row" style="font-size: 18px">
                        <div class="col-4 d-flex my-2">
                            <label for="mon">Mon : </label>
                            <input class="form-control" style="width: 150px;margin-left:3px" type="time" name="mon" value="12:00" id="mon">
                        </div>
                        <div class="col-3">
                            <input class="form-control" type="time" name="mon" value="02:00" id="mon">
                        </div>
                        <div class="col-2">
                            <label class="switch">
                                <input type="checkbox">
                                <span class="slider"></span>
                            </label>
                        </div>
                        <div class="col-3">lunch time</div>
                    </div>

                    <div class="row" style="font-size: 18px">
                        <div class="col-4 d-flex my-2">
                            <label for="mon">Mon : </label>
                            <input style="width: 150px;margin-left:3px" class="form-control" type="time" name="mon" value="02:00" id="mon">
                        </div>
                        <div class="col-3">
                            <input class="form-control" type="time" name="mon" value="06:00" id="mon">
                        </div>
                        <div class="col-2">
                            <label class="switch">
                                <input type="checkbox" checked>
                                <span class="slider"></span>
                            </label>
                        </div>
                        <div class="col-3">afternoon</div>
                    </div>

                    <div class="row" style="font-size: 18px">
                        <div class="col-4 d-flex my-2">
                            <label for="mon">Mon : </label>
                            <input style="width: 150px;margin-left:3px" class="form-control" type="time" name="mon" value="06:00" id="mon">
                        </div>
                        <div class="col-3">
                            <input class="form-control" type="time" name="mon" value="08:00" id="mon">
                        </div>
                        <div class="col-2">
                            <label class="switch">
                                <input type="checkbox">
                                <span class="slider"></span>
                            </label>
                        </div>
                        <div class="col-3">night time</div>
                    </div>


                </div>
            </div>
            <div class="modal-footer">
                <button style="width:40px;border-radius:6px;border:none;">
                    <span>
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v6m3-3H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                </button>
                <div>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- availability modal end-->

<!-- new av modal -->
<div class="modal fade" id="newAvailability" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-dialog-centered modal-lg px-5" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="myModalLabel">Create new availability</h3>

                <button type="button" class="btn close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('create-availability') }}" method="post">
                @csrf
                <div class="modal-body">
                    <div class="">
                        <label for="avname">Availability name</label>
                        <input required id="name" name="name" value="{{old('name')}}" type="text" class="form-control">
                        @error('avname')<span class="text-danger">{{ $message }}</span><br>@enderror
                        <span>
                            A new availability schedule with name name you entered here and default working hour will be created. Then you can edit by clicking each day.
                        </span>
                    </div>

                </div>
                <div class="modal-footer">
                    <div style="width:40px;border-radius:6px;border:none;">

                    </div> 
                    <div>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Create</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- new av modal end-->
@endsection
@section('script')
<script src="{{ URL::asset('assets/libs/prismjs/prismjs.min.js') }}"></script>
<script src="https://cdn.lordicon.com/libs/mssddfmo/lord-icon-2.1.0.js"></script>
<script src="{{ URL::asset('assets/js/pages/modal.init.js') }}"></script>
<script src="{{ URL::asset('assets/js/pages/form-wizard.init.js') }}"></script>
<script src="{{ URL::asset('/assets/js/app.min.js') }}"></script>
@endsection