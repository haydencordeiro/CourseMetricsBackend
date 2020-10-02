@extends('layouts.teachernav')
@section('content')
<div class="content-area">
    <div class="flexContainer" id="dashboardLineContainer">
        <div class="flex-40 dashboardLine">
            <i class="fa fa-home fa-2x" style="float: left;" id="homeIcon"></i>
            <div style="margin-bottom: 0;margin-top: 0;">
                <h3 style="margin-bottom: 0;margin-top: 2px;"><small>Teacher Dashboard</small> </h3>
                <p style="margin-bottom: 0;margin-top: 0;"><small>Information and Analytics</small> </p>
            </div>

        </div>
        <div class="flex-40-end">
            <ul class="breadcrumb" style="float: right;">
                <li><a href="#"><i class="fa fa-home"></i></a></li>
                <li><small>Teacher</small></li>
            </ul>
        </div>
    </div>


    <div class="table_search cardRow1 tablecard" style="width:100%;justify-content: flex-start;">

        <div>
            <div class="dropdown">
                <button class="dropbtn">Year<i class="fa fa-caret-down" aria-hidden="true"
                        style="margin-left: 10px;"></i></button>
                <div class="dropdown-content">
                    <a href="#">First Year</a>
                    <a href="#">Second Year</a>
                    <a href="#">Third Year</a>
                    <a href="#">Fourth Year</a>
                </div>
            </div>
        </div>
        <div>
            <div class="dropdown">
                <button class="dropbtn">Branch<i class="fa fa-caret-down" aria-hidden="true"
                        style="margin-left: 10px;"></i></button>
                <div class="dropdown-content">
                    <a href="#">Computer</a>
                    <a href="#">IT</a>
                    <a href="#">EXTC</a>
                    <a href="#">Mechanical</a>
                </div>
            </div>
        </div>
        <div>
            <div class="dropdown">
                <button class="dropbtn">Subject<i class="fa fa-caret-down" aria-hidden="true"
                        style="margin-left: 10px;"></i></button>
                <div class="dropdown-content">
                    <a href="#">MP</a>
                    <a href="#">CN</a>
                    <a href="#">TCS</a>
                    <a href="#">AA</a>
                </div>
            </div>
        </div>
        <div>
            <div class="dropdown">
                <button class="dropbtn">Exam<i class="fa fa-caret-down" aria-hidden="true"
                        style="margin-left: 10px;"></i></button>
                <div class="dropdown-content">
                    <a href="#">IA1</a>
                    <a href="#">IA2</a>
                </div>
            </div>
        </div>
        <div>
            <div class="dropdown">
                <button class="dropbtn">Month<i class="fa fa-caret-down" aria-hidden="true"
                        style="margin-left: 10px;"></i></button>
                <div class="dropdown-content">
                    <a href="#">Jan</a>
                    <a href="#">Feb</a>
                </div>
            </div>
        </div>
    </div>

    <h2 style="margin: 1% 2.5% 0 2.5%;">Marks Analysis</h2>

    <div class="flexContainer">
        <div class="flex-50 chartCard card">
            <h4> <strong>Class Performance</strong></h4>
            <div class="chartStyle">
                <canvas id="markschart" style="width:100%;"></canvas>
            </div>
        </div>
        <div class="flex-50 chartCard card">
            <h4><strong>Sales Analytics</strong></h4>

        </div>
        <div class="flex-40 verticalFlex">
            <div class="card verticalFlexItem" style="margin-bottom: 1.5%;">
                <h6>Impressions</h6>
                <h3 style="color: #4098FE;">1250</h3>
                <h5>May 2020 - June 2021</h5>
            </div>
            <div class="card verticalFlexItem" style="margin-bottom: 1%; margin-top:1%;">
                <h6>Sales</h6>
                <h3 style="color: #FF5370;">1250</h3>
                <h5>May 2020 - June 2021</h5>
            </div>
            <div class="card verticalFlexItem" style="margin-top: 1.5%;">
                <h6>Visitors</h6>
                <h3 style="color: #FFB64D;">1250</h3>
                <h5>May 2020 - June 2021</h5>
            </div>

        </div>
    </div>

    <h2 style="margin: 1% 2.5% 0 2.5%;">Attendance Analysis</h2>

    <div class="flexContainer">
        <div class="flex-50 chartCard card" id="lastChart">
            <h4> <strong>Class Attendance</strong></h4>
            <div class="chartStyle">
                <canvas id="attchart" style="width:100%;"></canvas>
            </div>
        </div>
        <div class="flex-50 chartCard card">
            <h4><strong>Sales Analytics</strong></h4>
            <div style="width: 95%;height: 95%;">


            </div>
        </div>
        <div class="flex-40 verticalFlex">
            <div class="card verticalFlexItem" style="margin-bottom: 1.5%;">
                <h6>Impressions</h6>
                <h3 style="color: #4098FE;">1250</h3>
                <h5>May 2020 - June 2021</h5>
            </div>
            <div class="card verticalFlexItem" style="margin-bottom: 1%; margin-top:1%;">
                <h6>Sales</h6>
                <h3 style="color: #FF5370;">1250</h3>
                <h5>May 2020 - June 2021</h5>
            </div>
            <div class="card verticalFlexItem" style="margin-top: 1.5%;">
                <h6>Visitors</h6>
                <h3 style="color: #FFB64D;">1250</h3>
                <h5>May 2020 - June 2021</h5>
            </div>

        </div>
    </div>

</div>

@section('ScriptSect')
<script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
<script>
    var canvas = document.getElementById("markschart");
    var ctx = canvas.getContext('2d');

    // Global Options:
    Chart.defaults.global.defaultFontColor = 'black';
    Chart.defaults.global.defaultFontSize = 16;

    var data = {
        labels: ["0-8", "9-12", "13-17", "18-20"],
        datasets: [
            {
                fill: true,
                backgroundColor: [
                    "#4098FE",
                    "#FF5370",
                    "#FFB64D",
                    "#2ED8B6",
                ],
                /*backgroundColor: [
                    "#2ecc71",
                    "#3498db",
                    "#95a5a6",
                    "#9b59b6",
                    "#f1c40f",
                ],*/
                /*backgroundColor: [ //Alternative colours
                    '#FFF1C9',
                    '#F7B7A3',
                    '#EA5F89',
                    '#9B3192',
                    '#57167E'
                ],*/
                data: [10, 10, 20, 30],
                borderWidth: [2, 2, 2, 2]
            }
        ]
    };

    // Notice the rotation from the documentation.

    var options = {
        title: {
            display: true,
            position: 'top',

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

    var canvasatt = document.getElementById("attchart");
    var ctxatt = canvasatt.getContext('2d');

    // Global Options:
    Chart.defaults.global.defaultFontColor = 'black';
    Chart.defaults.global.defaultFontSize = 16;

    var dataatt = {
        labels: ["Below 50%", "51%-75%", "76% and above"],
        datasets: [
            {
                fill: true,
                backgroundColor: [
                    "#4098FE",
                    "#FF5370",
                    "#FFB64D",
                ],
                /*backgroundColor: [
                    "#2ecc71",
                    "#3498db",
                    "#95a5a6",
                    "#9b59b6",
                    "#f1c40f",
                ],*/
                /*backgroundColor: [ //Alternative colours
                    '#FFF1C9',
                    '#F7B7A3',
                    '#EA5F89',
                    '#9B3192',
                    '#57167E'
                ],*/
                data: [20, 40, 30],
                borderWidth: [2, 2, 2, 2]
            }
        ]
    };

    // Notice the rotation from the documentation.

    var optionsatt = {
        title: {
            display: true,
            position: 'top',

        },
        responsive: true,
        maintainAspectRatio: false,
        label: { responsive: true, }
    };


    // Chart declaration:
    var myBarChartatt = new Chart(ctxatt, {
        type: 'pie',
        data: dataatt,
        options: optionsatt
    });

</script>



</html>
@endsection

@endsection