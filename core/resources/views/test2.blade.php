<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Doc2</title>
    <style>
        table,
        th,
        td {
            border: 1px solid rgb(220,220,220);
            border-collapse: collapse;
        }
        .available {
            background-color: rgb(10, 200, 10);
            padding: 0 10px;
            border-radius: 3px;
        }
        .partial {
            background-color: rgb(200, 200, 10);
            padding: 0 10px;
            border-radius: 3px;
        }
        .unavailable {
            background-color: rgb(200, 10, 10);
            padding: 0 10px;
            border-radius: 3px;
        }
    </style>
</head>

<body style="background-color: red;height:100vh;">
    <div style="display: flex;justify-content:center;">
        <div style="margin-top:200px;background-color:white;height:400px;width:1000px">
            <div style="padding: 20px;">
                <table style="width: 100%;">
                    <tr style="background-color:rgb(220,220,220);">
                        <th>Mon</th>
                        <th>Tue</th>
                        <th>Wed</th>
                        <th>Mon</th>
                        <th>Mon</th>
                        <th>Mon</th>
                        <th>Mon</th>
                        <th>Mon</th>
                    </tr>
                    <tbody>
                        <tr>
                            <td width="14%" style="background-color: rgb(240,240, 240);">
                                <div style="height:70px;position:relative; margin-top:10px">
                                    <span class="available" style="padding-left:5px;">Available</span>
                                    <span style="position: absolute;bottom:0;right:0">
                                        <input type="checkbox" name="" id="">
                                    </span>
                                </div>
                            </td>
                            <td width="14%" style="background-color: rgb(240,240, 240);">
                                <div style="height:70px;position:relative; margin-top:10px">
                                    <span class="available" style="padding-left:5px;">Available</span>
                                    <span style="position: absolute;bottom:0;right:0">
                                        <input type="checkbox" name="" id="">
                                    </span>
                                </div>
                            </td>
                            <td width="14%" style="background-color: rgb(240,240, 240);">
                                <div style="height:70px;position:relative; margin-top:10px">
                                    <span class="available" style="padding-left:5px;">Available</span>
                                    <span style="position: absolute;bottom:0;right:0">
                                        <input type="checkbox" name="" id="">
                                    </span>
                                </div>
                            </td>
                            <td width="14%" style="background-color: rgb(240,240, 240);">
                                <div style="height:70px;position:relative; margin-top:10px">
                                    <span class="available" style="padding-left:5px;">Available</span>
                                    <span style="position: absolute;bottom:0;right:0">
                                        <input type="checkbox" name="" id="">
                                    </span>
                                </div>
                            </td>
                            <td width="14%" style="background-color: rgb(240,240, 240);">
                                <div style="height:70px;position:relative; margin-top:10px">
                                    <span class="partial" style="padding-left:5px;">Partialy</span>
                                    <span style="position: absolute;bottom:0;right:0">
                                        <input type="checkbox" name="" id="">
                                    </span>
                                </div>
                            </td>
                            <td width="14%" style="background-color: rgb(240,240, 240);">
                                <div style="height:70px;position:relative; margin-top:10px">
                                    <span class="available" style="padding-left:5px;">Available</span>
                                    <span style="position: absolute;bottom:0;right:0">
                                        <input type="checkbox" name="" id="">
                                    </span>
                                </div>
                            </td>
                            <td width="14%" style="background-color: rgb(240,240, 240);">
                                <div style="height:70px;position:relative; margin-top:10px">
                                    <span class="unavailable" style="padding-left:5px;">Unavailable</span>
                                    <span style="position: absolute;bottom:0;right:0">
                                        <input type="checkbox" name="" id="">
                                    </span>
                                </div>
                            </td>
                            <td width="14%" style="background-color: rgb(240,240, 240);">
                                <div style="height:70px;position:relative; margin-top:10px">
                                    <span class="unavailable" style="padding-left:5px;">Unavailable</span>
                                    <span style="position: absolute;bottom:0;right:0">
                                        <input type="checkbox" name="" id="">
                                    </span>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>

</html>