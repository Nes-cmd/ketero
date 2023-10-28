<div class="mb-4">
    <div class="d-flex justify-content-between">
        <h4>{{ ucfirst($availability['name']) }}</h4>
        @if($availability['name'] != 'default')
        <span style="color: red; width:20px;cursor:pointer">
            <a href="{{ route('delete-availability', $availability['id']) }}">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                </svg>
            </a>
        </span>
        @endif
    </div>
    <table class="table mb-1" style="width: 100%;">
        <tr style="background-color:rgb(220,220,220);">
            <th>Mon</th>
            <th>Tue</th>
            <th>Wed</th>
            <th>Thr</th>
            <th>Fri</th>
            <th>Sat</th>
            <th>Sun</th>
        </tr>
        <tbody>
            <tr>
                @foreach($dayOrders as $day)
                @php
                $status = 'unavailable';
                $avToday = $availability['timeranges'][$day];
                if(count($avToday)){
                if(count($avToday) > 1) $status = 'available';
                else $status = 'partial';
                }
                @endphp
                @if($availability['name'] != 'default')
                <td width="14%" wire:click="loadEditor('{{$day}}')" style="position:relative;background-color: rgb(240,240, 240);" data-bs-toggle="modal">
                    <div style="padding-left:4px;">
                        <span class="{{$status}}" style="padding-left:5px;">{{ ucfirst($status) }}</span>
                        <div style="display: flex; flex-direction:column;overflow-x:hidden;max-width:130px;padding-right:0">
                            @foreach($avToday as $timerange)
                            <div style="white-space:nowrap">{{ $timerange['start_time'].' - '. $timerange['end_time'] }}</div>
                            @endforeach
                        </div>
                    </div>
                </td>
                @else 
                <td width="14%" style="position:relative;background-color: rgb(240,240, 240);" data-bs-toggle="modal">
                    <div style="padding-left:4px;">
                        <span class="{{$status}}" style="padding-left:5px;">{{ ucfirst($status) }}</span>
                        <div style="display: flex; flex-direction:column;overflow-x:hidden;max-width:130px;padding-right:0">
                            @foreach($avToday as $timerange)
                            <div style="white-space:nowrap">{{ $timerange['start_time'].' - '. $timerange['end_time'] }}</div>
                            @endforeach
                        </div>
                    </div>
                </td>
                @endif
                @endforeach
            </tr>
        </tbody>
    </table>
    <span>You can edit by clicking each box</span>
</div>