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
    <h2 style="margin: 1% 2.5% 0 2.5%;">Subjects</h2>

    <div class=" card4TableflexContainer">

        @foreach($attendance as $index=>$sub)

        <div class="cardforAttprog">
            <div class="singleAttendanceCard">
                <div class="singleAttendanceCardrow1">
                    <h4>{{$sub->SubjectName}}</h4>
                    <h4 style="color:{{{$colors[$index]}}};font-weight: bold;">{{ $sub->NoOfLec/$sub->LectureNo*100 }}%</h4>
                </div>
                <div class="progressDiv">
                    <div class="progress">
                        <div class="progress" role="progressbar"
                            style="position: relative;top:0;left:0;width: {{{ $sub->NoOfLec/$sub->LectureNo*100 }}}%; background-color: {{{$colors[$index]}}};">
                        </div>
                    </div>
                </div>
            </div>
            

        </div>
        @endforeach
        {{-- <div class="cardforAttprog">
            <div class="singleAttendanceCard">
                <div class="singleAttendanceCardrow1">
                    <h4>Computer Networks</h4>
                    <h4 style="color:#2ED8B6;font-weight: bold;">23%</h4>
                </div>
                <div class="progressDiv">
                    <div class="progress">
                        <div class="progress" role="progressbar"
                            style="position: relative;;top:0;left:0;width: 90%; background-color: #2ED8B6;">
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <div class="cardforAttprog">
            <div class="singleAttendanceCard">
                <div class="singleAttendanceCardrow1">
                    <h4>Computer Networks</h4>
                    <h4 style="color:lightpink;font-weight: bold;">23%</h4>
                </div>
                <div class="progressDiv">
                    <div class="progress">
                        <div class="progress" role="progressbar" style="width: 90%; background-color: lightpink;">
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <div class="cardforAttprog">
            <div class="singleAttendanceCard">
                <div class="singleAttendanceCardrow1">
                    <h4>Theory of Computer Science</h4>
                    <h4 style="color:lightsalmon;font-weight: bold;">23%</h4>
                </div>
                <div class="progressDiv">
                    <div class="progress">
                        <div class="progress" role="progressbar"
                            style="position: relative;;top:0;left:0;width: 90%; background-color: lightsalmon;">
                        </div>
                    </div>
                </div>
            </div>

        </div> --}}
    </div>


</div>
<h2 style="margin: 1% 2.5% 1% 2.5%;">Attendance Table</h2>
<div class="AttendanceTableContainer">
    <table class="attendanceTable">
        <tr class="firstRowAttTable">
            <th class="firstColAttTable">Date</th>
            <th>8:00 - 9:00</th>
            <th>9:00 - 10:00</th>
            <th>10:00 - 11:00</th>
            <th>11:00 - 12:00</th>
            <th>12:00 - 13:00</th>
            <th>14:00 - 15:00</th>
            <th>15:00 - 16:00</th>
            <th>16:00 - 17:00</th>
            <th>17:00 - 18:00</th>
        </tr>

        @foreach($attendanceTable as $i=>$day)
        <tr>
        @foreach($day as $j=>$subject)
            @if($j==0)
                <td class="firstColAttTable">{{$subject->date}}</td>
            @else
                @for ($k = $j; $k<$subject->Slot; $k++)
                <td style="border:none"></td>
                @endfor
                @if($subject->Present==1)
                <td style="background-color:inherit;">{{$subject->SubFK}}</td>
                @else   
                <td style="background-color: #FF5370;">{{$subject->SubFK}}</td>

                @endif
            @endif
        
        @endforeach
        </tr>
        @endforeach
        {{-- <tr>
            <td class="firstColAttTable">04-09-2020</td>
            <td style="background-color: #2ED8B6;">MP</td>
            <td style="background-color: #FF5370;">DBMS</td>
            <td style="background-color: #2ED8B6;">TCS</td>
            <td style="background-color: #2ED8B6;">CN</td>
            <td style="background-color: #2ED8B6;">AA</td>
            <td style="background-color: #2ED8B6;">CN Lab</td>
            <td style="background-color: #FF5370;">MS</td>
            <td style="background-color: #2ED8B6;">MP Lab</td>
            <td style="background-color: #FF5370;">AA Lab</td>
        </tr>
        <tr>
            <td class="firstColAttTable">05-09-2020</td>
            <td style="background-color: #2ED8B6;">MP</td>
            <td style="background-color: #2ED8B6;">TCS</td>
            <td style="background-color: #FF5370;">AA Lab</td>
            <td style="background-color: #2ED8B6;">CN</td>
            <td style="background-color: #FF5370;">MS</td>
            <td style="background-color: #FF5370;">DBMS</td>
            <td style="background-color: #2ED8B6;">CN Lab</td>
            <td style="background-color: #2ED8B6;">AA</td>
            <td style="background-color: #2ED8B6;">MP Lab</td>
        </tr>
        <tr>
            <td class="firstColAttTable">06-09-2020</td>
            <td style="background-color: #2ED8B6;">CN</td>
            <td style="background-color: #FF5370;">AA Lab</td>
            <td style="background-color: #2ED8B6;">MP</td>
            <td style="background-color: #FF5370;">DBMS</td>
            <td style="background-color: #2ED8B6;">AA</td>
            <td style="background-color: #2ED8B6;">TCS</td>
            <td style="background-color: #2ED8B6;">MP Lab</td>
            <td style="background-color: #FF5370;">MS</td>
            <td style="background-color: #2ED8B6;">CN Lab</td>
        </tr>
        <tr>
            <td class="firstColAttTable">07-09-2020</td>
            <td style="background-color: #2ED8B6;">MP</td>
            <td style="background-color: #2ED8B6;">TCS</td>
            <td style="background-color: #FF5370;">MS</td>
            <td style="background-color: #2ED8B6;">CN Lab</td>
            <td style="background-color: #2ED8B6;">MP Lab</td>
            <td style="background-color: #FF5370;">DBMS</td>
            <td style="background-color: #2ED8B6;">CN</td>
            <td style="background-color: #2ED8B6;">AA</td>
            <td style="background-color: #FF5370;">AA Lab</td>
        </tr> --}}
    </table>
</div>
<br><br>
<div class="AttendanceTableContainer">
    <div style="width: 100%;height:80%;overflow:auto">
    <table id="attendanceTable2">
        <tr class="firstRowAttTable">
            <th class="firstColAttTable">Date</th>
            <th>8:00 - 9:00</th>
            <th>9:00 - 10:00</th>
            <th>10:00 - 11:00</th>
            <th>11:00 - 12:00</th>
            <th>12:00 - 13:00</th>
            <th>14:00 - 15:00</th>
            <th>15:00 - 16:00</th>
            <th>16:00 - 17:00</th>
            <th>17:00 - 18:00</th>
        </tr>
        <tr>
            <td class="firstColAttTable">04-09-2020</td>
            <td style="color: #2ED8B6;">MP</td>
            <td style="color: #FF5370;">DBMS</td>
            <td style="color: #2ED8B6;">TCS</td>
            <td style="color: #2ED8B6;">CN</td>
            <td style="color: #2ED8B6;">AA</td>
            <td style="color: #2ED8B6;">CN Lab</td>
            <td style="color: #FF5370;">MS</td>
            <td style="color: #2ED8B6;">MP Lab</td>
            <td style="color: #FF5370;">AA Lab</td>
        </tr>
        <tr>
            <td class="firstColAttTable">05-09-2020</td>
            <td style="color: #2ED8B6;">MP</td>
            <td style="color: #2ED8B6;">TCS</td>
            <td style="color: #FF5370;">AA Lab</td>
            <td style="color: #2ED8B6;">CN</td>
            <td style="color: #FF5370;">MS</td>
            <td style="color: #FF5370;">DBMS</td>
            <td style="color: #2ED8B6;">CN Lab</td>
            <td style="color: #2ED8B6;">AA</td>
            <td style="color: #2ED8B6;">MP Lab</td>
        </tr>
        <tr>
            <td class="firstColAttTable">06-09-2020</td>
            <td style="color: #2ED8B6;">CN</td>
            <td style="color: #FF5370;">AA Lab</td>
            <td style="color: #2ED8B6;">MP</td>
            <td style="color: #FF5370;">DBMS</td>
            <td style="color: #2ED8B6;">AA</td>
            <td style="color: #2ED8B6;">TCS</td>
            <td style="color: #2ED8B6;">MP Lab</td>
            <td style="color: #FF5370;">MS</td>
            <td style="color: #2ED8B6;">CN Lab</td>
        </tr>
        <tr>
            <td class="firstColAttTable">07-09-2020</td>
            <td style="color: #2ED8B6;">MP</td>
            <td style="color: #2ED8B6;">TCS</td>
            <td style="color: #FF5370;">MS</td>
            <td style="color: #2ED8B6;">CN Lab</td>
            <td style="color: #2ED8B6;">MP Lab</td>
            <td style="color: #FF5370;">DBMS</td>
            <td style="color: #2ED8B6;">CN</td>
            <td style="color: #2ED8B6;">AA</td>
            <td style="color: #FF5370;">AA Lab</td>
        </tr>
    </table>
</div>
</div>




@endsection