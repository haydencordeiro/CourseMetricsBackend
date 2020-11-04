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

        <h2 style="margin: 1% 2.5% 1% 2.5%;">Add Teacher</h2>

        <div class="cardRow2 tablecard">
            <form  method="post" action="/adminAddTeacher">
                @csrf
                       
                <h4>Personal Info</h4>

                <table id="addTeacherTable" >
                    <tr>
                        <td style="width: 20%;"><label class="formLabel">First Name</label></td>
                        <td style="width: 60%;"><input type="text" name="fname" id="teacherFirstName" class="formInput"></td>
                    </tr>
                    <tr>
                        <td style="width: 20%;"><label class="formLabel">Last Name</label></td>
                        <td style="width: 60%;"><input type="text" name="lname" id="teacherLastName" class="formInput"></td>
                    </tr>
                    <tr>
                        <td><label class="formLabel">ID</label></td>
                        <td><input type="text" name="StudentID" id="teacherID" class="formInput"></td>
                    </tr>
                    <tr>
                        <td> <label class="formLabel">Email</label></td>
                        <td><input type="text" name="email" id="teacherEmail" class="formInput"></td>
                    </tr>
                    <tr>
                        <td><label class="formLabel">Phone Number</label></td>
                        <td><input type="text" name="phoneNo" id="teacherPhone" class="formInput"></td>
                    </tr>
                    <tr>
                        <td><label class="formLabel">Date of Birth</label></td>
                        <td><input type="date" name="DOB" id="teacherDOB" class="formInput"></td>
                    </tr>
                    <tr>
                        <td><label class="formLabel">Department</label></td>
                        <td><input type="text" name="dept" id="teacherDept" class="formInput"></td>
                    </tr>
                    <tr>
                        <td><label class="formLabel">Password</label></td>
                        <td><input type="password" name="pswd" id="teacherDept" class="formInput"></td>
                    </tr>
                    <tr>
                        <td colspan="2"></td>
                    </tr>
                </table>
                <input type="reset" class="dropbtn2" value="Reset" style="background-color: #fff;border: 1px solid rgba(0, 0, 0, 0.225);color: #333;">
                <input type="submit" class="dropbtn2" value="Submit">

            </form>
        </div>





    
    
@section('ScriptSect')
<script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
    <script src="js/script.js"></script>
    @endsection
    @endsection
    