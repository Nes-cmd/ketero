<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Test</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <style>
        .inset-0 {
            top: 0;
            bottom: 0;
            right: 0;
            left: 0
        }
    </style>
</head>

<body>
    <x-modal name="modal-1" title="Title goes here!">
        <x-slot:body>
            <livewire-test-with-modal />
            </x-slot>
    </x-modal>



    <x-modal title="Create new availability" name="modal-2">
        <x-slot:body>
            <form action="{{ route('create-availability') }}" method="post">
                @csrf
                <div>
                    <div class="">
                        <label for="avname">Availability name</label>
                        <input required id="name" name="name" value="{{old('name')}}" type="text" class="form-control">
                        @error('avname')<span class="text-danger">{{ $message }}</span><br>@enderror
                        <span>
                            A new availability schedule with name name you entered here and default working hour will be created. Then you can edit by clicking each day.
                        </span>
                    </div>
                </div>
            </form>
            </x-slot>
    </x-modal>

    <div class="p-5">
        <button x-data x-on:click="$dispatch('open-modal', { name: 'modal-1' })" class="btn btn-primary">
            Open modal 1
        </button>

        <button x-data x-on:click="$dispatch('open-modal', { name:'modal-2' })" class="btn btn-primary mx-2">
            Open modal 2
        </button>
    </div>

</body>

</html>