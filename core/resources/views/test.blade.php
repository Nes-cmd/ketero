<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>doc</title>
    <style>
        .switch {
            position: relative;
            display: inline-block;
            width: 50px;
            height: 28px;
        }

        .switch input {
            opacity: 0;
            width: 0;
            height: 0;
        }

        .slider {
            position: absolute;
            cursor: pointer;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: #ccc;
            -webkit-transition: .4s;
            transition: .4s;
        }

        .slider:before {
            position: absolute;
            content: "";
            height: 20px;
            width: 20px;
            left: 4px;
            bottom: 4px;
            background-color: white;
            -webkit-transition: .4s;
            transition: .4s;
        }

        input:checked+.slider {
            background-color: #2196F3;
        }

        input:focus+.slider {
            box-shadow: 0 0 1px #2196F3;
        }

        input:checked+.slider:before {
            -webkit-transform: translateX(20px);
            -ms-transform: translateX(20px);
            transform: translateX(20px);
        }

        /* Rounded sliders */
        .slider.round {
            border-radius: 34px;
        }

        .slider.round:before {
            border-radius: 50%;
        }
    </style>
</head>

<body style="background-color: red;height:100vh;">
    <div style="display: flex;justify-content:center;align-items:center;">
        <div style="width: 600px;min-height:500px;background-color:white;margin-top:200px;border-radius:10px">
            <h2 style="text-align:center">Available at</h2>
            <div style="padding: 0 100px;">
                <h3>From <span style="padding-left: 135px;">To</span> <span style="padding-left: 100px;">Available?</span> </h3>
                <div style="font-size: 22px; margin-bottom:20px">
                    <label for="mon">Mon : </label>
                    <input type="time" name="mon" value="08:00" id="mon">
                    <input style="margin-left: 20px;" type="time" name="mon" value="12:00" id="mon">

                    <label style="margin-left: 15px;" class="switch">
                        <input type="checkbox" checked>
                        <span class="slider"></span>
                    </label>
                    <!-- <span style="width: 30px;display:inline-flex;background-color:red;font-size:22px">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v6m3-3H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg> -->
                    </span>
                </div>
                <div style="font-size: 22px;margin-bottom:20px;">
                    <label for="mon">Mon : </label>
                    <input type="time" name="mon" value="12:00" id="mon">
                    <input style="margin-left: 20px;" type="time" name="mon" value="02:00" id="mon">

                    <label style="margin-left: 15px;" class="switch">
                        <input type="checkbox">
                        <span class="slider"></span>
                    </label>
                    </span>
                </div>
                <div style="font-size: 22px;margin-bottom:20px">
                    <label for="mon">Mon : </label>
                    <input type="time" name="mon" value="02:00" id="mon">
                    <input style="margin-left: 20px;" type="time" name="mon" value="06:00" id="mon">

                    <label style="margin-left: 15px;" class="switch">
                        <input type="checkbox" checked>
                        <span class="slider"></span>
                    </label>
                    </span>
                </div>
                <div style="font-size: 22px;margin-bottom:20px">
                    <label for="mon">Mon : </label>
                    <input type="time" name="mon" value="06:00" id="mon">
                    <input style="margin-left: 20px;" type="time" name="mon" value="08:00" id="mon">

                    <label style="margin-left: 15px;" class="switch">
                        <input type="checkbox">
                        <span class="slider"></span>
                    </label>
                    </span>
                </div>
            </div>
            <div style="padding: 0 100px;">
                <div style="width: 90%;display:flex;justify-content:space-between;margin-top:40px">
                    <button style="border-radius:6px;border:none">Cancel</button>
                    <button style="width:40px;border-radius:6px;border:none">
                    <span>
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v6m3-3H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        </button>
                </div>
                <div style="margin-top: 20px;">
                    <button style="width: 90%;border:none;border-radius:6px;height:30px;font-size:22px;;background-color:#2196F3">Next</button>
                </div>
            </div>
        </div>
    </div>
</body>

</html>