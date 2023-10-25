<div>
    <h2>Success is as dangerous as failure.</h2>
    <input wire:model="name" type="text" class="form-control" name="" id="">
    @error('name')<span class="text-danger">{{ $message }}</span>@enderror <br>
    <button wire:click="test" class="btn btn-primary mt-1" value="submit" name="" id=""> Test </button>

</div>