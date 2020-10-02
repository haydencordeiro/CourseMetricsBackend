@extends('layouts.teachernav')
@section('content')

<div class="content-area">
    <div class="flexContainer" id="dashboardLineContainer">
        <div class="flex-40 dashboardLine">
            <i class="fa fa-home fa-2x" style="float: left;" id="homeIcon"></i>
            <div style="margin-bottom: 0;margin-top: 0;">
                <h3 style="margin-bottom: 0;margin-top: 2px;"><small>Teacher Dashboard</small> </h3>
                <p style="margin-bottom: 0;margin-top: 0;"><small>Class Attendance</small> </p>
            </div>

        </div>
        <div class="flex-40-end">
            <ul class="breadcrumb" style="float: right;">
                <li><a href="#"><i class="fa fa-home"></i></a></li>
                <li><small>Teacher</small></li>
            </ul>
        </div>
    </div>
</div>

<h2 style="margin: 1% 2.5% 1% 2.5%;">Update Attendance</h2>

<!-- <div style=""> -->
<div class="table_search cardRow1 tablecard" style="justify-content: flex-start;">

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
            <input type="date" name="" id="" class="dropinput" style="outline: none;">
            <!-- <button class="dropbtn">Date</button> -->
            <!-- <div class="dropdown-content"> -->
            <!-- <a href="#">First Year</a> -->
            <!-- <a href="#">Second Year</a> -->
            <!-- <a href="#">Third Year</a> -->
            <!-- <a href="#">Fourth Year</a> -->
        </div>
    </div>
    <div>
        <div class="dropdown">
            <input type="time" name="" id="" class="dropinput" style="outline: none;" placeholder="From">
        </div>
    </div>
    <div>
        <div class="dropdown">
            <input type="time" name="" id="" class="dropinput" style="outline: none;" placeholder="To">
        </div>
    </div>
    <!-- <div style="flex: 0 0 40%;margin-right: 3%;margin-top:2%;">
                <input type="text" id="search_box" placeholder="Search ..">
            </div> -->
    <!-- <div>
                <div class="dropdown">
                    <button class="dropbtn btn-success">Present</button>
                </div>
            </div>
            <div>
                <div class="dropdown">
                    <button class="dropbtn btn-danger">Absent</button>
                </div>
            </div> -->
</div>
<div class="cardRow2 tablecard">
    <div style="display: flex;flex-wrap: wrap;" class="table_inside_row">
        <div style="flex:0 0 60%;flex-grow: 3;">
            <input type="text" id="search_box" placeholder="Search .." style="margin: 1%;width: 95%;">
        </div>
        <div style="margin-top: 1.5%;">
            <div class="dropdown">
                <button class="dropbtn btn-success">Present</button>
            </div>
        </div>
        <div style="margin-top: 1.5%;">
            <div class="dropdown">
                <button class="dropbtn btn-danger">Absent</button>
            </div>
        </div>
    </div>
    <table class="attendance_form_table">
        <thead>
            <tr>
                <th>Mark</th>
                <th>Roll No.</th>
                <th>Name</th>
            </tr>
        </thead>
        <tbody id="attendance_form_table_data">
            <tr>
                <td><input type="checkbox" name="" id=""></td>
                <td>1</td>
                <td>Grejo Joby</td>
            </tr>
            <tr>
                <td><input type="checkbox" name="" id=""></td>
                <td>2</td>
                <td>Hayden Cordeiro</td>
            </tr>
            <tr>
                <td><input type="checkbox" name="" id=""></td>
                <td>3</td>
                <td>Manasi Anantpurkar</td>
            </tr>
            <tr>
                <td><input type="checkbox" name="" id=""></td>
                <td>4</td>
                <td>Jivin Varghese</td>
            </tr>
            <tr>
                <td><input type="checkbox" name="" id=""></td>
                <td>5</td>
                <td>Pakshal Ranawat</td>
            </tr>
            <tr>
                <td><input type="checkbox" name="" id=""></td>
                <td>6</td>
                <td>John Doe</td>
            </tr>
            <tr>
                <td><input type="checkbox" name="" id=""></td>
                <td>7</td>
                <td>John Foe</td>
            </tr>
        </tbody>
    </table>
</div>
<!-- </div> -->
<br><br>


@section('ScriptSect')

<script>

    $(document).ready(function () {
        $("#search_box").on("keyup", function () {
            var value = $(this).val().toLowerCase();
            $("#attendance_form_table_data tr").filter(function () {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
        });
    });
</script>
@endsection
@endsection