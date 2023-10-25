<div class="card">
    <div class="card-header">
        <h4 class="card-title mb-0">Create event</h4>
    </div>
    <!-- end card header -->
    <div class="card-body form-steps">
        <form action="#">

            <div class="step-arrow-nav mb-4">

                <ul class="nav nav-pills custom-nav nav-justified" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link done" id="steparrow-gen-info-tab" data-bs-toggle="pill" data-bs-target="#steparrow-gen-info" type="button" role="tab" aria-controls="steparrow-gen-info" aria-selected="true">General</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="steparrow-description-info-tab" data-bs-toggle="pill" data-bs-target="#steparrow-description-info" type="button" role="tab" aria-controls="steparrow-description-info" aria-selected="false">Availability</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="pills-experience-tab" data-bs-toggle="pill" data-bs-target="#pills-experience" type="button" role="tab" aria-controls="pills-experience" aria-selected="false">Finish</button>
                    </li>
                </ul>
            </div>

            <div class="tab-content">
                <div class="tab-pane fade" id="steparrow-gen-info" role="tabpanel" aria-labelledby="steparrow-gen-info-tab">
                    <div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label class="form-label" for="steparrow-gen-info-email-input">Name</label>
                                    <input wire:model="event.name" type="text" class="form-control" id="steparrow-gen-info-email-input" placeholder="Enter Email">
                                    @error('event.name')<span class="text-danger px-2">{{ $message }}</span>@enderror
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label class="form-label" for="steparrow-gen-info-username-input">Location</label>
                                    <input wire:model="event.location" type="text" class="form-control" id="steparrow-gen-info-username-input" placeholder="Enter User Name">
                                    @error('event.location')<span class="text-danger px-2">{{ $message }}</span>@enderror
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <div class="">
                                <label for="">Description/Instruction about the Event</label>
                                <div id="richeditor" class="ckeditor-classic"></div>
                                @error('event.description')<span class="text-danger px-2">{{ $message }}</span>@enderror
                            </div>
                            <!-- end card -->
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label class="form-label" for="steparrow-gen-info-email-input">Event link</label>
                                    <input wire:model="event.link" type="text" class="form-control" id="steparrow-gen-info-email-input" placeholder="Enter Email">
                                    @error('event.link')<span class="text-danger px-2">{{ $message }}</span>@enderror
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label for="colorPicker" class="form-label">Color</label>
                                    <input wire:model="event.color" type="color" class="form-control form-control-color w-100" id="colorPicker" value="#364574">
                                    @error('event.color')<span class="text-danger px-2">{{ $message }}</span>@enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-check form-switch form-switch-md mb-3" dir="ltr">
                                    <input wire:model.live="group" type="checkbox" class="form-check-input" id="customSwitchsizemd">
                                    <label class="form-check-label" for="customSwitchsizemd">Morethan 1 person at atime?</label>
                                </div>
                            </div>
                           
                            <div class="col-lg-6" style="display: {{$group?'block':'none'}};">
                                <div class="mb-3">
                                    <label class="form-label" for="steparrow-gen-info-email-input">Maximum participants</label>
                                    <input wire:model="event.maxinvities" value="1" type="text" class="form-control" id="steparrow-gen-info-email-input" placeholder="3">
                                    @error('event.maxinvities')<span class="text-danger px-2">{{ $message }}</span>@enderror
                                </div>
                            </div>
                           
                        </div>
                    </div>
                    <div class="d-flex align-items-start gap-3 mt-4">
                        <button type="button" class="btn btn-success btn-label right ms-auto nexttab nexttab" data-nexttab="steparrow-description-info-tab"><i class="ri-arrow-right-line label-icon align-middle fs-16 ms-2"></i>Go to more info</button>
                    </div>
                </div>
                <!-- end tab pane -->

                <div class="tab-pane fade show active" id="steparrow-description-info" role="tabpanel" aria-labelledby="steparrow-description-info-tab">
                    <div>
                        <div class="row">
                            <div class="mb-3 col-6">
                                <label for="formFile" class="form-label">Working hour</label>
                                <div class="input-group">
                                    <select wire:model.live="avchoosen" class="form-control form-select" id="formFile">
                                        @foreach($availabilities as $availability)
                                        <option value="{{ $availability['id'] }}">{{ ucfirst($availability['name']) }}</option>
                                        @endforeach
                                    </select>
                                    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#newAvailability">Create new</button>
                                </div>

                            </div>
                            <div class="mb-3 col-6">
                                <label for="formFile" class="form-label">Duration</label>
                                <select wire:model="event.duration" class="form-control form-select" id="formFile">
                                    <option value="20min" selected>20 min</option>
                                    <option value="30min">30 min</option>
                                    <option value="45min">45 min</option>
                                    <option value="1hour">1 hour</option>
                                    <option value="2hour">2 hour</option>
                                </select>
                                <span>Time that you spend with one person</span>
                                @error('event.duration')<span class="text-danger px-2">{{ $message }}</span>@enderror
                            </div>
                        </div>

                        <div>
                            <h4>{{ $selectedAv['name'] == 'default'?'Default working hour':$selectedAv['name'] }}</h4>
                            <table class="table" style="width: 100%;">
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
                                        $avToday = $selectedAv['timeranges'][$day];
                                        if(count($avToday)){
                                        if(count($avToday) > 1) $status = 'available';
                                        else $status = 'partial';
                                        }
                                        @endphp
                                        <td width="14%" style="position:relative;background-color: rgb(240,240, 240);" data-bs-toggle="modal" data-bs-target="#{{$selectedAv['name'] == 'default'?'':'showModal'}}">
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

                        </div>
                    </div>
                    <div class="d-flex align-items-start gap-3 mt-4">
                        <button type="button" class="btn btn-light btn-label previestab" data-previous="steparrow-gen-info-tab"><i class="ri-arrow-left-line label-icon align-middle fs-16 me-2"></i> Back to General</button>
                        <button wire:click="createEvent" type="button" class="btn btn-success btn-label right ms-auto nexttab" data-nexttab="pills-experience-tab"><i class="ri-arrow-right-line label-icon align-middle fs-16 ms-2"></i>Submit</button>
                    </div>
                </div>
                <!-- end tab pane -->

                <div class="tab-pane fade" id="pills-experience" role="tabpanel">
                    <div class="text-center">

                        <div class="avatar-md mt-5 mb-4 mx-auto">
                            <div class="avatar-title bg-light text-success display-4 rounded-circle">
                                <i class="ri-checkbox-circle-fill"></i>
                            </div>
                        </div>
                        <h5>Well Done !</h5>
                        <p class="text-muted">You have successfully created the event</p>
                        <a href="#" class="">You can see how it looks right here</a>
                        </dmodal-footeriv>
                    </div>
                    <!-- end tab pane -->
                </div>
                <!-- end tab content -->
        </form>
    </div>
    <!-- end card body -->
</div>