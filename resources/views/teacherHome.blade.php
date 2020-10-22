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


    <form method="POST"  id="studentIdsform" action="/teacher">
        @csrf
<div class="table_search cardRow1 tablecard" style="justify-content: flex-start;">


<div>


    <div class="dropdown">
        <div class="custom-select">
            <select name="deptSelect">
            <option value="Comps">Dept</option>
            <option value="Comps">Comps</option>
            <option value="Mech">Mech</option>
            <option value="IT">IT</option>
            <option value="EXTC">EXTC</option>
            </select>
        </div>
    </div>

    <div class="dropdown">
        <div class="custom-select">
            <select name="classSelect">
            <option value="A">Class</option>
            <option value="A">A</option>
            <option value="B">B</option>
            <option value="C">C</option>
            <option value="D">D</option>


            </select>
        </div>
    </div>
    
    <div class="dropdown">
        <div class="custom-select">
            <select name="semSelect">
            <option value="1">Sem</option>
            <option value="2">1</option>
            <option value="3">2</option>
            <option value="4">3</option>
            <option value="5">4</option>


            </select>
        </div>
    </div>

    <div class="dropdown">
        <div class="custom-select">
            <select name="subjSelect">
            <option value="MP">Subject</option>
            @foreach($subjectList as $sub)
            <option value="{{$sub->SubjectName}}">{{$sub->SubjectName}}</option>

            @endforeach

            </select>
        </div>
    </div>
    
    <div class="dropdown">
        <div class="custom-select">
            <select name="examSelect">
            <option value="IA-1">Exam</option>
            @foreach($examList as $exam)
            <option value="{{$exam->Name}}">{{$exam->Name}}</option>

            @endforeach

            </select>
        </div>
    </div>
</div>

    <div>
        <button onclick="onlySearch();">Go</button>
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
<input type="input" style="display:none" id="studentIds" name="studentIds" value="">
<input type="input" style="display:none" id="checkWhich" name="checkWhich" value="">
</form>
@if(count($toppersList)>0)

<h2 style="margin: 1% 2.5% 0 2.5%;">Marks Analysis</h2>
    <div class="flexContainer">
        <div class="flex-50 chartCard card" style="margin-top:1.2rem;" >
            <h4> <strong>Class Performance</strong></h4>
            <div class="chartStyle">
                <canvas id="markschart" style="width:100%;"></canvas>
            </div>
        </div>
        
        <div class="flex-50 verticalFlex">
            <div class="card verticalFlexItem" style="margin-bottom: 1.5%;margin-top:0.3rem">
                <h6 style="text-align: center;">Highest Performers</h6>
                <table style="width: 96%;justify-content: center;padding: 4% 2%;margin: auto;height: auto;">
                    @foreach($toppersList as $i=>$topper)

                    <tr><td>{{++$i}}</td><td>{{$topper->fname}} {{$topper->lname}}</td></tr>
                    @endforeach

                </table>
            </div>
            <div class="card verticalFlexItem" style="margin-bottom: 1%; margin-top:1%;">
                <h6 style="text-align: center;">Lowest Performers</h6>
                <table style="width: 96%;justify-content: center;padding: 4% 2%;margin: auto;height: auto;">
                    @foreach($lowScoreList as $i=>$topper)

                    <tr><td>{{++$i}}</td><td>{{$topper->fname}} {{$topper->lname}}</td></tr>
                    @endforeach
                </table>
            </div>
        </div>
        
        <div class="flex-40 verticalFlex">
            @foreach($marksDistribution as $marks)
            <div class="card verticalFlexItem" style="margin-bottom: 1.5%;">
                <h6>Maximum Marks</h6>
                <h3 style="color: #4098FE;">{{$marks->max}}</h3>
                <h5>May 2020 - June 2021</h5>
            </div>
            <div class="card verticalFlexItem" style="margin-bottom: 1%; margin-top:1%;">
                <h6>Average Marks</h6>
                <h3 style="color: #FF5370;">{{$marks->avg}}</h3>
                <h5>May 2020 - June 2021</h5>
            </div>
            <div class="card verticalFlexItem" style="margin-top: 1.5%;">
                <h6>Lowest Marks</h6>
                <h3 style="color: #FFB64D;">{{$marks->min}}</h3>
                <h5>May 2020 - June 2021</h5>
            </div>
            @endforeach

        </div>
    </div>
@endif
@if(count($attendanceMax)>0)

    <h2 style="margin: 1% 2.5% 0 2.5%;" style="margin-top:1.3rem;">Attendance Analysis</h2>

    <div class="flexContainer">
        <div class="flex-50 chartCard card" id="lastChart">
            <h4> <strong>Class Attendance</strong></h4>
            <div class="chartStyle">
                <canvas id="attchart" style="width:100%;"></canvas>
            </div>
        </div>
        <div class="flex-50 verticalFlex">
            <div class="card verticalFlexItem" style="margin-bottom: 1.5%;margin-top:0.3rem">
                <h6 style="text-align: center;">Highest Performers</h6>
                <table style="width: 96%;justify-content: center;padding: 4% 2%;margin: auto;height: auto;">
                    @foreach($attendanceMax as $i=>$student)
                    <tr><td>{{++$i}}</td><td>{{$student->fname}} {{$student->lname}}</td></tr>
                    @endforeach
                    {{-- <tr><td>2</td><td>Athira Lonappan</td></tr>
                    <tr><td>3</td><td>Grejo Joby</td></tr>
                    <tr><td>4</td><td>Hayden Cordeiro</td></tr>
                    <tr><td>5</td><td>Manasi Anantpurkar</td></tr> --}}
                </table>
            </div>
            <div class="card verticalFlexItem" style="margin-bottom: 1%; margin-top:1%;">
                <h6 style="text-align: center;">Lowest Performers</h6>
                <table style="width: 96%;justify-content: center;padding: 4% 2%;margin: auto;height: auto;">
                    @foreach($attendanceMin as $i=>$student)
                    <tr><td>{{++$i}}</td><td>{{$student->fname}} {{$student->lname}}</td></tr>
                    @endforeach
                    {{-- <tr><td>1</td><td>Pakshal Ranawat</td></tr>
                    <tr><td>2</td><td>Athira Lonappan</td></tr>
                    <tr><td>3</td><td>Grejo Joby</td></tr>
                    <tr><td>4</td><td>Hayden Cordeiro</td></tr>
                    <tr><td>5</td><td>Manasi Anantpurkar</td></tr> --}}
                </table>
            </div>
        </div>
        <div class="flex-40 verticalFlex">
            @foreach($attendanceDistribution as $marks)
            <div class="card verticalFlexItem" style="margin-bottom: 1.5%;">
                <h6>Maximum Attendance</h6>
                <h3 style="color: #4098FE;">{{$marks->max}}</h3>
                <h5>May 2020 - June 2021</h5>
            </div>
            <div class="card verticalFlexItem" style="margin-bottom: 1%; margin-top:1%;">
                <h6>Average Attendance</h6>
                <h3 style="color: #FF5370;">{{$marks->avg}}</h3>
                <h5>May 2020 - June 2021</h5>
            </div>
            <div class="card verticalFlexItem" style="margin-top: 1.5%;">
                <h6>Lowest Attendance</h6>
                <h3 style="color: #FFB64D;">{{$marks->min}}</h3>
                <h5>May 2020 - June 2021</h5>
            </div>
            @endforeach

        </div>
    </div>
@endif
</div>

@section('ScriptSect')
<script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
<script>
    var canvas = document.getElementById("markschart");
    var ctx = canvas.getContext('2d');
    var MarksGraphs1= {!! json_encode($MarksGraph) !!};
    var AttendanceGraphs1= {!! json_encode($AttendanceGraph) !!};
    
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
                data: MarksGraphs1,
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
        document.getElementById('checkWhich').value='Atten';


        document.getElementById('studentIdsform').submit();
    }

    function onlySearch(){
        document.getElementById('checkWhich').value='Go';
        document.getElementById('studentIdsform').submit();


    }
    // getSelected();




    var x, i, j, l, ll, selElmnt, a, b, c;
/* Look for any elements with the class "custom-select": */
x = document.getElementsByClassName("custom-select");
l = x.length;
for (i = 0; i < l; i++) {
  selElmnt = x[i].getElementsByTagName("select")[0];
  ll = selElmnt.length;
  /* For each element, create a new DIV that will act as the selected item: */
  a = document.createElement("DIV");
  a.setAttribute("class", "select-selected");
  a.innerHTML = selElmnt.options[selElmnt.selectedIndex].innerHTML;
  x[i].appendChild(a);
  /* For each element, create a new DIV that will contain the option list: */
  b = document.createElement("DIV");
  b.setAttribute("class", "select-items select-hide");
  for (j = 1; j < ll; j++) {
    /* For each option in the original select element,
    create a new DIV that will act as an option item: */
    c = document.createElement("DIV");
    c.innerHTML = selElmnt.options[j].innerHTML;
    c.addEventListener("click", function(e) {
        /* When an item is clicked, update the original select box,
        and the selected item: */
        var y, i, k, s, h, sl, yl;
        s = this.parentNode.parentNode.getElementsByTagName("select")[0];
        sl = s.length;
        h = this.parentNode.previousSibling;
        for (i = 0; i < sl; i++) {
          if (s.options[i].innerHTML == this.innerHTML) {
            s.selectedIndex = i;
            h.innerHTML = this.innerHTML;
            y = this.parentNode.getElementsByClassName("same-as-selected");
            yl = y.length;
            for (k = 0; k < yl; k++) {
              y[k].removeAttribute("class");
            }
            this.setAttribute("class", "same-as-selected");
            break;
          }
        }
        h.click();
    });
    b.appendChild(c);
  }
  x[i].appendChild(b);
  a.addEventListener("click", function(e) {
    /* When the select box is clicked, close any other select boxes,
    and open/close the current select box: */
    e.stopPropagation();
    closeAllSelect(this);
    this.nextSibling.classList.toggle("select-hide");
    this.classList.toggle("select-arrow-active");
  });
}

function closeAllSelect(elmnt) {
  /* A function that will close all select boxes in the document,
  except the current select box: */
  var x, y, i, xl, yl, arrNo = [];
  x = document.getElementsByClassName("select-items");
  y = document.getElementsByClassName("select-selected");
  xl = x.length;
  yl = y.length;
  for (i = 0; i < yl; i++) {
    if (elmnt == y[i]) {
      arrNo.push(i)
    } else {
      y[i].classList.remove("select-arrow-active");
    }
  }
  for (i = 0; i < xl; i++) {
    if (arrNo.indexOf(i)) {
      x[i].classList.add("select-hide");
    }
  }
}

/* If the user clicks anywhere outside the select box,
then close all select boxes: */
document.addEventListener("click", closeAllSelect);

    $(document).ready(function () {
        $("#search_box").on("keyup", function () {
            var value = $(this).val().toLowerCase();
            $("#attendance_form_table_data tr").filter(function () {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
        });
    });
</script>



</html>
@endsection

@endsection