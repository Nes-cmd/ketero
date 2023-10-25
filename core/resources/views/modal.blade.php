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

    <x-modal name="modal-2" title="This is modal 2">
        <x-slot:body>
            <div>
                <h4>Second modal</h4>
            </div>
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