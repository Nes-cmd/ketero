<div class="card custom-top-border" style="border-top-color:{{ $event['color'] }}">
    <div class="card-header">
        <h4 class="card-title mb-0">Create event</h4>
    </div>
    <!-- end card header -->
    <div class="card-body form-steps" >
        <form action="#">

            <div class="step-arrow-nav mb-4">

                <ul class="nav nav-pills custom-nav nav-justified" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link done {{$activeTab == 'tab-1'?'active':''}}" wire:click="next('tab-1')">General</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link {{$activeTab == 'tab-3'?'done':''}} {{$activeTab == 'tab-2'?'active':''}}" wire:click="next('tab-2')">Availability</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link {{$activeTab == 'tab-3'?'done active':''}}" id="pills-experience-tab" wire:click="next('tab-3')">Finish</button>
                    </li>
                </ul>
            </div>

            <div class="tab-content">
                <div class="tab-pane fade {{$activeTab == 'tab-1'?'show active':''}}" id="steparrow-gen-info" role="tabpanel" aria-labelledby="steparrow-gen-info-tab">
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
                            <div class="col-lg-12">
                                <label for="form-label">Description/Instruction about the Event</label><br>
                                <textarea wire:model.lazy="event.description" class="w-100 form-control" rows="6">

                                </textarea>
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
                                    <input wire:model.live="event.color" type="color" class="form-control form-control-color w-100" id="colorPicker" value="#364574">
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
                        <button wire:click="next('tab-2')" type="button" class="btn btn-success btn-label right ms-auto nexttab nexttab"><i class="ri-arrow-right-line label-icon align-middle fs-16 ms-2"></i>Go to more info</button>
                    </div>
                </div>
                <!-- end tab pane -->

                <div class="tab-pane fade {{$activeTab == 'tab-2'?'show active':''}}" id="steparrow-description-info" role="tabpanel" aria-labelledby="steparrow-description-info-tab">
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
                                    <button class="btn btn-primary" x-data x-on:click="$dispatch('open-modal', {'name': 'new-availability'})">Create new</button>
                                </div>

                            </div>
                            <div class="mb-3 col-6">
                                <label for="formFile" class="form-label">Duration</label>
                                <select wire:model="event.duration" class="form-control form-select" id="formFile">
                                    <option value="20 min" selected>20 min</option>
                                    <option value="30 min">30 min</option>
                                    <option value="45 min">45 min</option>
                                    <option value="1 hour">1 hour</option>
                                    <option value="2 hour">2 hour</option>
                                </select>
                                <span>Time that you spend with one person</span>
                                @error('event.duration')<span class="text-danger px-2">{{ $message }}</span>@enderror
                            </div>
                        </div>


                        <livewire-single-availability :key="$selectedAv['id']" :availability="$selectedAv" />
                        
                    </div>
                    <div class="d-flex align-items-start gap-3 mt-4">
                        <button wire:click="next('tab-1')" type="button" class="btn btn-light btn-label previestab" data-previous="steparrow-gen-info-tab"><i class="ri-arrow-left-line label-icon align-middle fs-16 me-2"></i> Back to General</button>
                        <button wire:click="next('tab-3')" type="button" class="btn btn-success btn-label right ms-auto nexttab" data-nexttab="pills-experience-tab"><i class="ri-arrow-right-line label-icon align-middle fs-16 ms-2"></i>Submit</button>
                    </div>
                </div>
                <!-- end tab pane -->

                <div class="tab-pane fade {{$activeTab == 'tab-3'?'show active':''}}" id="pills-experience" role="tabpanel">
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

    <x-modal title="Create new availability" width="600px" name="new-availability">
        <x-slot:body>
            <livewire-create-availability />
            </x-slot>
    </x-modal>

    <x-modal title="Availability for" name="av-editor" width="40%">
        <x-slot:body>
            <livewire-availability-editor />
            </x-slot>
    </x-modal>

</div>