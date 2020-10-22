<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CourseMetrics</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"
        integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link
        href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,400;0,600;0,700;0,800;1,300;1,400;1,600;1,700;1,800&display=swap"
        rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">

</head>

<body>
    <div id="mySidenav" class="sidenav">
        <h3 class="logo">CourseMatrics</h3>
        <h5>Navigation</h5>

        {{-- <a href="#"><button class="sidenav-active-link"><i class="fa fa-tachometer"></i>Home</button></a>
        <h5>Student</h5> --}}

        {{-- <a href="{{route('studentHome')}}"><button class={{(\Request::route()->getName() == 'studentHome')  ? 'sidenav-active-link' : '' }} ><i class="fa fa-file"></i> Student Dashboard</button></a>
        <a href="{{route('studentAttendance')}}"><button class={{(\Request::route()->getName() == 'studentAttendance')  ? 'sidenav-active-link' : '' }}><i class="fa fa-book"></i> Attendance</button></a> --}}
        {{-- <h5>Teacher</h5> --}}
        <a href="{{route('adminHome')}}"><button class="{{(\Request::route()->getName() == 'adminHome')  ? 'sidenav-active-link' : '' }}"><i class=" fa fa-line-chart"></i>
            Student Confirm</button></a>
        <a href="{{route('AddTeacher')}}"><button class="{{(\Request::route()->getName() == 'AddTeacher')  ? 'sidenav-active-link' : '' }}"><i class=" fa fa-line-chart"></i>
            Add Teachers</button></a>

        <div>

            <a href="javascipt:void(0)" class="closebtn">
                <i class="fa fa-angle-left" onclick="toggleF()"></i>
            </a>
        </div>

    </div>
    <div class="flexArea" id="flexArea">
        <div class="navbar">
            <div class="openbtnhide"><a href="javascipt:void(0)"></a><i class="fa fa-bars fa-lg "
                    onclick="toggleF()"></i>
                </a></div>
            <div>

            </div>

            <ul id="usernav">

                
                @auth
                <li style="margin-right: 0.3rem;"><i class="fa fa-user fa-lg"></i >&nbsp;&nbsp;{{ Auth::user()->fname }}</li>

                <li><i class="fa fa fa-sign-out" style="font-size: 1.4rem;cursor: pointer;" href="{{ route('logout') }}"  onclick="event.preventDefault();document.getElementById('logout-form').submit();"></i></li>
    
                {{-- <li><i class="fa fa-bell fa-lg"></i></li>
                <li><i class="fa fa-comment-o fa-lg"></i></li>
                <li><i class="fa fa-user fa-lg"></i> {{ Auth::user()->fname }}</li>
                <a style="padding-left:1rem " href="{{ route('logout') }}"
                onclick="event.preventDefault();
                              document.getElementById('logout-form').submit();">
                 {{ __('Logout') }}
             </a> --}}

             <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                 @csrf
             </form>
                @endauth
                @guest
            <a href="{{ route('register') }}" style="text-decoration: none;padding-left:1rem;">Register</a>
                        <a href="{{ route('login') }}" style="text-decoration: none;padding-left:1rem;">Login</a>
                @endguest





            </ul>


        </div>

        @yield('content')
        <!-- Footer -->
        <div class="navbar" style="display: flex;justify-content: center;align-items: center; color: #A9A9A9;margin-top:1rem;">
            <h4>Copyrights @ CourseMetrics 2020</h4>
        </div>
    </div>
    @yield('ScriptSect')

    <script src="js/script.js"></script>
</body>

</html>