@props(['title', 'name', 'height'])
<div class="inset-0" style="position:fixed;z-index:100;display:none" 
    x-data=" {visible:false, name: '{{$name}}'} " x-show="visible"  
    x-on:open-modal.window="visible = (Array.isArray($event.detail)?$event.detail[0].name == name:$event.detail.name == name)" 
    x-on:close-modal.window="visible = false" 
    x-on:keydown.escape.window="visible = false" 
    x-transition>
    <!-- background -->
    <div x-on:click="visible = false" class="inset-0" style="background-color: rgb(180,180,180);opacity:0.4;position:fixed;"></div>

    <div class="bg-white rounded inset-0 p-3 card" style="position:fixed; margin: auto;max-width:50%;height:{{$height??'400px'}}">
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