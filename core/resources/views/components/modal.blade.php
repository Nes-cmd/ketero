@props(['title', 'name', 'width'])
<div class="inset-0" style="position:fixed;z-index:100;display:none" 
    x-data=" {visible:false, name: '{{$name}}'} " x-show="visible"  
    x-on:open-modal.window="visible = ($event.detail.name == name)" 
    x-on:close-modal.window="visible = false" 
    x-on:keydown.escape.window="visible = false" 
    x-transition>
    <!-- background -->
    <div x-on:click="visible = false" class="inset-0" style="background-color: rgb(180,180,180);opacity:0.4;position:fixed;"></div>

    <div class="bg-white rounded p-3 card" style="position:fixed; margin: auto;width:{{isset($width)?$width:'50%'}};right:0;left:0;top:30%;">
        <div class="card-header d-flex justify-content-between">
            <h5 class="card-title mb-0">{{ $title??'Modal title' }}</h5>

            <button x-on:click="visible = false" type="button" class="btn-close float-end fs-11" aria-label="Close"></button>
        </div>

        <div>
            {{ $body??'' }}
        </div>
    </div>
</div>
</div>