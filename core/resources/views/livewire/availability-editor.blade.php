<div>
    <div class="card-body">
        <div>
            <div class="row" style="font-size: 20px">
                <div class="col-4">
                    <h4>From</h4>
                </div>
                <div class="col-3">
                    <h4>To</h4>
                </div>
               
            </div>
            <!-- First section -->
           
            @foreach($availableAt as $available)
            <div class="row" style="font-size: 18px">
                <div class="col-4 d-flex my-2">
                    <label for="mon">{{ucfirst($day)}} : </label>
                    <input wire:model="availableAt.{{$loop->index}}.start_time" class="form-control" style="width: 150px;margin-left:3px" type="time" name="mon" id="mon">
                </div>
                
                <div class="col-3">
                    <input wire:model="availableAt.{{$loop->index}}.end_time" class="form-control" type="time" id="mon">
                </div>
            </div>
            @endforeach
           
        </div>
    </div>
    <div class="card-footer d-flex justify-content-between">
        <button style="width:40px;border-radius:6px;border:none;">
            <span>
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v6m3-3H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
        </button>
        <div>
            <button x-on:click="$dispatch('close-modal')" type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button wire:click="saveChanges" type="button" class="btn btn-primary">Save changes</button>
        </div>
    </div>
</div>