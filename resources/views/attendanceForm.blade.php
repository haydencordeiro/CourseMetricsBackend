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
    <form method="POST" action="/attendanceForm">
        @csrf
<div class="table_search cardRow1 tablecard" style="justify-content: flex-start;">


<div>
    <div class="dropdown">
        <div class="custom-select">
            <select>
            <option value="0">Branch</option>
            <option value="1">1</option>
            <option value="2">2</option>


            </select>
        </div>
    </div>
</div>

    {{-- <div>
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
    </div> --}}
    {{-- <div>
        <div class="dropdown">
            <button class="dropbtn">Subject<i class="fa fa-caret-down" aria-hidden="true"
                    style="margin-left: 10px;"></i></button>
            <div class="dropdown-content" name="test" id="test">
                <a href="#">MP</a>
                <a href="#">CN</a>
                <a href="#">TCS</a>
                <a href="#">AA</a>
            </div>
        </div>
    </div> --}}
    
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
            <input type="time" name="fromtime" id="fromtime" class="dropinput" style="outline: none;" placeholder="From">
        </div>
    </div>
    <div>
        <div class="dropdown">
            <input type="time" name="" id="" class="dropinput" style="outline: none;" placeholder="To">
        </div>
    </div>
    <div>
        <button>Go</button>
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
</form>
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
@endsection
@endsection