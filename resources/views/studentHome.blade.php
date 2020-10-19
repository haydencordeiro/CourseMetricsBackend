@extends('layouts.studentnav')
@section('content')
<div class="content-area">
    <div class="flexContainer" id="dashboardLineContainer">
        <div class="flex-40 dashboardLine">
            <i class="fa fa-home fa-2x" style="float: left;" id="homeIcon"></i>
            <div style="margin-bottom: 0;margin-top: 0;">
                <h3 style="margin-bottom: 0;margin-top: 2px;"><small>Student Dashboard</small> </h3>
                <p style="margin-bottom: 0;margin-top: 0;"><small>Information and Analytics</small> </p>
            </div>

        </div>
        <div class="flex-40-end">
            <ul class="breadcrumb" style="float: right;">
                <li><a href="#"><i class="fa fa-home"></i></a></li>
                <li><small>Student</small></li>
            </ul>
        </div>
    </div>
    <h2 style="margin: 1% 2.5% 0 2.5%;">Upcoming Events</h2>
    <div class="flexContainer" style="justify-content: flex-start;margin:1rem;">


        @foreach ($UpcomingActivites as $activity)

        <div class="flex-30 card4Table card-grid-container" style="flex: 0 0 30%;">
            <div class="cardRow1">
                <div style="display: flex;flex-wrap: wrap;">
                    <div style="align-self: center;">
                        <!-- <i class="fa fa-user-circle fa-3x" style="color: #4099ff;"></i> -->
                        @if(strtoupper($activity->ChapterName[0])=="A")
                        <h2 class="profileLetter" style="background-color: #4099ff;">A</h2>
                        @elseif(strtoupper($activity->ChapterName[0])=="C")
                        <h2 class="profileLetter" style="background-color: #2ED8B6;">C</h2>
                        @elseif(strtoupper($activity->ChapterName[0])=="I")
                        <h2 class="profileLetter" style="background-color: #FFB64D;">I</h2>
                        @else
                        <h2 class="profileLetter" style="background-color: #FFB64D;">{{$activity->ChapterName[0]}}</h2>

                        @endif
                    </div>

                    <div style="text-align: left;align-self: center;font-size: 15px;">
                    <b>{{$activity->ChapterName}}</b><br> {{$activity->Email}}
                    </div>
                </div>

                <div class="tableFees">
                    <h4>Rs:{{$activity->Price}}</h4>

                </div>
            </div>

            <div class="cardRow2">
                <h4>{{$activity->Description}}</h4>
            </div>

            <div class="cardRow3">
                <p style="flex: 0 0 40%;margin-left: 5%;">{{$activity->Date}}</p>
                <p style="flex: 0 0 50%;justify-self: flex-end;color: #449cfc;text-align: right;">
                    <b  onclick="window.open('{{$activity->Link}}');" >Register</b></p>
            </div>
        </div>
        @endforeach
        {{-- <div class="flex-30 card4Table card-grid-container" style="flex: 0 0 30%;">
            <div class="cardRow1">
                <div style="display: flex;flex-wrap: wrap;">
                    <div style="align-self: center;">
                        <!-- <i class="fa fa-user-circle fa-3x" style="color: #4099ff;"></i> -->
                        <h2 class="profileLetter" style="background-color: #2ED8B6;">C</h2>
                    </div>

                    <div style="text-align: left;align-self: center;font-size: 15px;">
                        <b>CSI-DBIT</b><br> csidbit@gmail.com
                    </div>
                </div>

                <div class="tableFees">
                    Rs. 100
                </div>
            </div>

            <div class="cardRow2">
                <h4>Game Of Codes</h4>
            </div>

            <div class="cardRow3">
                <p style="flex: 0 0 40%;margin-left: 5%;">03-02-2020</p>
                <p style="flex: 0 0 50%;justify-self: flex-end;color: #449cfc;text-align: right;">
                    <b>Register</b></p>
            </div>
        </div> --}}
        {{-- <div class="flex-30 card4Table card-grid-container" style="flex: 0 0 30%;">
            <div class="cardRow1">
                <div style="display: flex;flex-wrap: wrap;">
                    <div style="align-self: center;">
                        <!-- <i class="fa fa-user-circle fa-3x" style="color: #4099ff;"></i> -->
                        <h2 class="profileLetter" style="background-color: #FFB64D;">I</h2>
                    </div>

                    <div style="text-align: left;align-self: center;font-size: 15px;">
                        <b>IEEE-DBIT</b><br> ieeedbit@gmail.com
                    </div>
                </div>

                <div class="tableFees">
                    Rs. 100
                </div>
            </div>

            <div class="cardRow2">
                <h4>Arduino Workshop</h4>
            </div>

            <div class="cardRow3">
                <p style="flex: 0 0 40%;margin-left: 5%;">03-02-2020</p>
                <p style="flex: 0 0 50%;justify-self: flex-end;color: #449cfc;text-align: right;">
                    <b>Register</b></p>
            </div>
        </div> --}}
    </div>


    <h2 style="margin: 1% 2.5% 1% 2.5%;">Analytics</h2>
    <div class="cardRow1 chart">
        <div style="flex: 0 0 50%; height:40vh; width:100% ; flex-wrap: wrap;">
            <canvas id="attChart"></canvas>
        </div>
        <div style="flex: 0 0 50%; height:40vh; width:100%; flex-wrap: wrap;">
            <canvas id="line-chart"></canvas>
        </div>
    </div>

    <h2 style="margin: 1% 2.5% 1% 2.5%;">Marks</h2>
    <div class="cardRow1 chart">
        <table style="width: 100%">
            <tr>
              <th>Sr. No.</th>
              <th>Subjects</th>
              <th>Marks</th>
            </tr>
            @foreach ($AllSubjects as $indexKey =>$subject)
            <tr>
              <td>{{++$indexKey }}</td>
              <td>{{$subject->SubFk}} ({{$subject->Name}})</td>
              <td>{{$subject->Marks}}/{{$subject->OutOf}}</td>
            </tr>
            @endforeach
            {{-- <tr>
              <td>2</td>
              <td>TCS</td>
              <td>20</td>
            </tr>
            <tr>
              <td>3</td>
              <td>CN</td>
              <td>19</td>
            </tr>
            <tr>
              <td>4</td>
              <td>DBMS</td>
              <td>17</td>
            </tr> --}}
          </table>
    </div>

</div>

@section('ScriptSect')
<script src="js/script.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
<script>
    var lable1= {!! json_encode($graph1Labels ) !!};
    var graph1Marks= {!! json_encode($graph1Marks ) !!};


    var canvas = document.getElementById("attChart");
    var ctx = canvas.getContext('2d');

    // Global Options:
    Chart.defaults.global.defaultFontColor = 'black';
    Chart.defaults.global.defaultFontSize = 16;

    var data = {
        // labels: ["MP", "TCS", "Computer Networks", "Algorithms", "DBMS"],
        labels:lable1,
        datasets: [
            {
                fill: true,
                backgroundColor: [
                    "#4098FE",
                    "#FF5370",
                    "#FFB64D",
                    "#2ED8B6",
                    "lightsalmon",
                ],

                data: graph1Marks,
                borderWidth: [2, 2, 2, 2, 2]
            }
        ]
    };

    // Notice the rotation from the documentation.

    var options = {
        title: {
            display: true,
            position: 'top'
        },
        responsive: true,
        maintainAspectRatio: false,
        label: { responsive: true, }
    };


    // Chart declaration:
    var myBarChart = new Chart(ctx, {
        type: 'pie',
        data: data,
        options: options
    });

    //Code for Line Chart
    new Chart(document.getElementById("line-chart"), {
        type: 'line',
        data: {
            labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May'],
            datasets: [{
                data: [86, 80, 75, 78, 60],
                label: "MP",
                borderColor: "#3e95cd",
                fill: false
            }, {
                data: [90, 95, 100, 88, 81],
                label: "CN",
                borderColor: "#8e5ea2",
                fill: false
            }, {
                data: [76, 87, 83, 80, 89],
                label: "TCS",
                borderColor: "#3cba9f",
                fill: false
            },
            ]
        },
        options: {
            title: {
                display: true,
                text: 'World population per region (in millions)',
                responsive: true,
            },

            label: { responsive: true, },
            responsive: true,
            maintainAspectRatio: false,
        }
    });

</script>

@endsection

@endsection
