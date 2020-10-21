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
@if( Auth::user()->Verified ==1)
<body>
    <div id="mySidenav" class="sidenav">
        <h3 class="logo">CourseMatrics</h3>
        <h5>Navigation</h5>

        {{-- <a href="#"><button class="sidenav-active-link"><i class="fa fa-tachometer"></i>Home</button></a>
        <h5>Student</h5> --}}

        <a href="{{route('studentHome')}}"><button class={{(\Request::route()->getName() == 'studentHome')  ? 'sidenav-active-link' : '' }} ><i class="fa fa-file"></i> Student Dashboard</button></a>
        <a href="{{route('studentAttendance')}}"><button class={{(\Request::route()->getName() == 'studentAttendance')  ? 'sidenav-active-link' : '' }}><i class="fa fa-book"></i> Attendance</button></a>
        {{-- <h5>Teacher</h5>
        <a href="teachers_marks.html"><button class=""><i class=" fa fa-line-chart"></i>
            Marks Analysis</button></a> --}}

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
                <li><i class="fa fa-bell fa-lg"></i></li>
                <li><i class="fa fa-comment-o fa-lg"></i></li>
                <li><i class="fa fa-user fa-lg"></i> {{ Auth::user()->fname }}</li>
                <a style="padding-left:1rem " href="{{ route('logout') }}"
                onclick="event.preventDefault();
                              document.getElementById('logout-form').submit();">
                 {{ __('Logout') }}
             </a>

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
        <!-- Footer -->
        <div class="navbar" style="display: flex;justify-content: center;align-items: center; color: #A9A9A9;margin-top:1rem;">
            <h4>Copyrights @ CourseMetrics 2020</h4>
        </div>
        @yield('content')

    </div>
    @yield('ScriptSect')

    <script src="js/script.js"></script>
</body>
@endif

@if( Auth::user()->Verified ==0 )
        
    <style>
        
        *{
    transition: all 0.6s;
    }

    html {
    height: 100%;
    }

    body{
    font-family: 'Lato', sans-serif;
    font-weight: 300;
    color: #888;
    margin: 0;
    }

    #main{
    display: table;
    width: 100%;
    height: 100vh;
    text-align: center;
    }

    .fof{
        display: table-cell;
        vertical-align: middle;
    }

    .fof h1{
        font-size: 50px;
        display: inline-block;
        padding-right: 12px;
        animation: type .5s alternate infinite;
    margin-bottom: 5px;
    }

    @keyframes type{
        from{box-shadow: inset -3px 0px 0px #888;}
        to{box-shadow: inset -3px 0px 0px transparent;}
    }

    h3 {
    font-size: 1.8rem;
    }
    h5 {
    font-size:1.0rem;
    }
    </style>
    </head>

    <body>
    <div id="main">
        <div class="fof">
                <h1>Error 401</h1>
        <h3>Access Denied</h3>
        <h5>To access your dashboard, you need to get your account approved by the Admin.</h5>
        
        <a style="padding-left:1rem;text-decoration:none;font-size:1.2rem;color:#222; " href="{{ route('logout') }}"
        onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
        {{ __('Logout') }}
    </a>

    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
        @csrf
    </form>
        </div>
        

    </div>
    </body>


    
@endif
@if( Auth::user()->Verified ==2 )
      
<style>
        
    *{
transition: all 0.6s;
}

html {
height: 100%;
}

body{
font-family: 'Lato', sans-serif;
font-weight: 300;
color: #888;
margin: 0;
}

#main{
display: table;
width: 100%;
height: 100vh;
text-align: center;
}

.fof{
    display: table-cell;
    vertical-align: middle;
}

.fof h1{
    font-size: 50px;
    display: inline-block;
    padding-right: 12px;
    animation: type .5s alternate infinite;
margin-bottom: 5px;
}

@keyframes type{
    from{box-shadow: inset -3px 0px 0px #888;}
    to{box-shadow: inset -3px 0px 0px transparent;}
}

h3 {
font-size: 1.8rem;
}
h5 {
font-size:1.0rem;
}
</style>
</head>

<body>
    <div id="main">
        <div class="fof">
                <h1>Error 401</h1>
        <h3>Access Denied</h3>
        <h5>Only Students can access this page</h5>
        
        <a style="padding-left:1rem;text-decoration:none;font-size:1.2rem;color:#222; " href="{{ route('logout') }}"
        onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
        {{ __('Logout') }}
    </a>

    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
        @csrf
    </form>
        </div>
        

    </div>
    </body>


@endif

</html>