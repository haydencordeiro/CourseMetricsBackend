@extends('layouts.adminnav')
@section('content')

<div class="content-area">
    <div class="flexContainer" id="dashboardLineContainer">
        <div class="flex-40 dashboardLine">
            <i class="fa fa-home fa-2x" style="float: left;" id="homeIcon"></i>
            <div style="margin-bottom: 0;margin-top: 0;">
                <h3 style="margin-bottom: 0;margin-top: 2px;"><small>Admin Dashboard</small> </h3>
                <p style="margin-bottom: 0;margin-top: 0;"><small>Add Teacher Data</small> </p>
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

<h2 style="margin: 1% 2.5% 1% 2.5%;">Add Subject</h2>

<div class="cardRow2 tablecard">
    <form method="post" action="/adminSubject">
        @csrf

        <h4>Course Info</h4>

        <table id="addTeacherTable">
            <tr>
                <td style="width: 20%;"><label class="formLabel">Subject Name</label></td>
                <td style="width: 60%;"><input type="text" name="sName" id="teacherFirstName" class="formInput"></td>
            </tr>
            {{-- <tr>
                        <td style="width: 20%;"><label class="formLabel">Teacher Name</label></td>
                        <td style="width: 60%;"><input type="text" name="tName" id="teacherLastName" class="formInput"></td>
                    </tr> --}}
            <tr>
                <td><label class="formLabel">Course ID</label></td>
                <td><input type="text" name="courseID" id="teacherID" class="formInput"></td>
            </tr>
            <tr>
                <td> <label class="formLabel">Semister</label></td>
                <td><input type="text" name="sem" id="teacherEmail" class="formInput"></td>
            </tr>

            <div class="dropdown TeachersCustomDropDown">
                <div class="custom-select">
                    <select name="tfk">
                        @foreach($teachers as $teacher)
                        <option value="{{$teacher->uid}}">{{$teacher->fname}} {{$teacher->lname}}</option>
                        @endforeach


                    </select>
                </div>
            </div>
        </table>
        <div style="margin-top:0.5rem;display: flex;justify-content:center;align-items:center;flex-wrap:wrap;gap:0.5rem">
            <input type="reset" class="dropbtn2" value="Reset" style="background-color: #fff;border: 1px solid rgba(0, 0, 0, 0.225);color: #333;">
            <input type="submit" class="dropbtn2" value="Submit">
        </div>

    </form>
    <table class="attendance_form_table">
        <thead>
            <tr>
                <th>Course ID</th>
                <th>Subject Name</th>
                <th>Name</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody id="attendance_form_table_data">
            @foreach($SubjectNames as $index=>$student)
            <tr>

                <td>{{$student->CID}}</td>
                <td>{{$student->SubjectName}}</td>
                <td>{{$student->fname}} {{$student->lname}}</td>
                <td><a href="/adminDelSubject/{{$student->CID}}"><i class=" fa fa-trash" style="color:red;"></i></a></td>
            </tr>

            @endforeach

        </tbody>
    </table>


</div>


@section('ScriptSect')
<script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
<script src="js/script.js"></script>


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

    $(document).ready(function() {
        $("#search_box").on("keyup", function() {
            var value = $(this).val().toLowerCase();
            $("#attendance_form_table_data tr").filter(function() {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
        });
    });
</script>
@endsection
@endsection