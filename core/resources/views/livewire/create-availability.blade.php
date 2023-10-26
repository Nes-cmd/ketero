<form wire:submit.prevent="createAvailability" method="post">
    <div class="card-body">
        @csrf
        <div>
            <div class="">
                <label for="name">Availability name</label>
                <input wire:model="name" required id="name" name="name" value="{{old('name')}}" type="text" class="form-control">
                @error('name')<span class="text-danger">{{ $message }}</span><br>@enderror
                <span>
                    A new availability schedule with name name you entered here and default working hour will be created. Then you can edit by clicking each day.
                </span>
            </div>

        </div>
    </div>
    <div class="card-footer">
        <div class="hstack gap-2 justify-content-end">
            <a x-on:click="$dispatch('close-modal')" class="btn btn-link btn-sm link-success"><i class="ri-close-line align-middle lh-1"></i> Close</a>
            <button type="submit" class="btn btn-primary btn-sm">Save changes</button>
        </div>
    </div>
</form>