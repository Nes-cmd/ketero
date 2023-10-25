@props(['title', 'name'])
<div class="inset-0" style="position:fixed;z-index:100;display:none"
    x-data=" {visible:false, name: '{{$name}}'} "
    x-show="visible"   
    x-on:open-modal.window="visible = ($event.detail.name == name)"            
    x-on:close-modal.window="visible = false"  
    x-on:keydown.escape.window="visible = false"  
    x-transition        
    >
    <!-- background -->
    <div x-on:click="visible = false" class="inset-0" style="background-color: rgb(222,222,222);opacity:0.4;position:fixed;"></div>

    <div class="bg-white rounded inset-0 p-3" style="position:fixed; margin: auto; max-height:500px;max-width:50%">
        <div class="d-flex justify-content-between">
            <h2>{{ $title??'Modal title' }}</h2>
            <button x-on:click="visible = false" class="btn btn-danger py-0 btn-sm">X</button>
        </div>
        <div class="mt-4">
            {{ $body??'' }}
        </div>
    </div>
</div>