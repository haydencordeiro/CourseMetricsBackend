@extends('layouts.adminnav')
@section('content')
        <div class="content-area">
            <div class="flexContainer" id="dashboardLineContainer">
                <div class="flex-40 dashboardLine">
                    <i class="fa fa-home fa-2x" style="float: left;" id="homeIcon"></i>
                    <div style="margin-bottom: 0;margin-top: 0;">
                        <h3 style="margin-bottom: 0;margin-top: 2px;"><small>Admin Dashboard</small> </h3>
                        <p style="margin-bottom: 0;margin-top: 0;"><small>Confirm Applications</small> </p>
                    </div>

                </div>
                <div class="flex-40-end">
                    <ul class="breadcrumb" style="float: right;">
                        <li><a href="#"><i class="fa fa-home"></i></a></li>
                        <li><small>Admin</small></li>
                    </ul>
                </div>
            </div>
        </div>

        <h2 style="margin: 1% 2.5% 1% 2.5%;">Confirm Admission</h2>

        <!-- <div style=""> -->
        {{-- <div class="table_search cardRow1 tablecard" style="justify-content: flex-start;">

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
        </div> --}}
        <form method="POST"  id="studentIdsform" action="/admin">
            @csrf
        <div class="cardRow2 tablecard">
            <div style="display: flex;flex-wrap: wrap;" class="table_inside_row">
                <div style="flex:0 0 60%;flex-grow: 3;">
                    <input type="text" id="search_box" placeholder="Search .." style="margin: 1%;width: 95%;">
                </div>
                {{-- <div style="margin-top: 1.5%;">
                    <div class="dropdown">
                        <button class="dropbtn btn-success">Admit</button>
                    </div>
                </div> --}}
                <div style="margin-top: 1.5%;">
                    <div class="dropdown">
                        <button class="dropbtn btn-danger"  onclick="getSelected();">Remove</button>
                    </div>
                </div>
            </div>
            <table class="attendance_form_table">
                <thead>
                    <tr>
                        <th>Admit</th>
                        <th>Roll No.</th>
                        <th>Student ID</th>                        
                        <th>Name</th>
                    </tr>
                </thead>
                <tbody id="attendance_form_table_data">
                    @foreach($toApprove as $i=>$stud)
                    <tr>
                    <td><input type="checkbox" class="attcheck" name="" id="{{$stud->id}}"></td>
                        <td>{{++$i}}</td>
                        <td>{{$stud->SID}}</td>
                        <td>{{$stud->fname}} {{$stud->lname}}</td>
                    </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
        <input type="input" style="display:none" id="studentIds" name="studentIds" value="">
<input type="input" style="display:none" id="checkWhich" name="checkWhich" value="">
        </form>
        <!-- </div> -->
        <br><br>

        <!-- Footer -->
        <div class="navbar" style="display: flex;justify-content: center;align-items: center; color: #A9A9A9;">
            <h4>Copyrights @ CourseMetrics 2020</h4>
        </div>

    </div>



    </div>

@section('ScriptSect')

<script>
    function getSelected(){
        var checkbox=document.getElementsByClassName('attcheck');
        var checkedList=[]
        for(var i=0;i<checkbox.length;i++){
            if(checkbox[i].checked){
                
            checkedList.push(parseInt(checkbox[i].id))
            }
        }
        console.log(checkedList);

        document.getElementById('studentIds').value='['+checkedList+']';
        document.getElementById('checkWhich').value='removeSelected';

        // console.log(document.getElementById('studentIds').value);
        // console.log(document.getElementById('checkWhich').value);

        document.getElementById('studentIdsform').submit();
    }

</script>

    <script src="js/script.js"></script>

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
    