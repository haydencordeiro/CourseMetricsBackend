<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/login.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
    <title>Login</title>
</head>

<body>
    <div class="centered">
        <div class="maincontatiner">
            <div class="blue">
                <img src="images/login.png" alt="">

            </div>
            <div class="mainChildren">
                <!-- <div
                    style="min-width: 100%;min-height: 100%;display: flex;justify-content: center;align-items: center;"> -->
                <div class="formContainer">
                    <h1>Sign in</h1>
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="inputContainer">
                            <i class="fa fa-id-card"></i>
                            <input type="text" name="SID" id="SID" placeholder="Student ID" oninput="this.className = ''">
                        </div>
                        <div class="inputContainer">
                            <i class="fa fa-lock"></i>
                            <input type="password" name="password" id="password" placeholder="Password" oninput="this.className = ''">
                        </div>
                        <div class="buttonContainer" style="display: flex;flex-direction:column;">
                            <button type="submit">LOGIN</button>
                            <a  style="margin-top:1rem;" href="{{route('register')}}">Need An Account</a>
                        </div>
                    </form>
                </div>


                <!-- </div> -->
            </div>

        </div>
        <div class="errors">
            <!-- <div class="ErrorCard">


            <i class="fa fa-exclamation-circle"></i>
            <p>Error Text</p> -->

        </div>
    </div>
</body>

</html>