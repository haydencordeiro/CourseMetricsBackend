<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/register.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
    <title>Register</title>
</head>

<body>
    <div class="centered">
        <div class="maincontatiner">
            <div class="blue">
                <img src="images/login.png" alt="">

            </div>
            <div class="mainChildren">
                <div class="formContainer">
                    <h1>Register Student</h1>
                    <form method="POST" id="regForm" action="{{ route('register') }}">
                        
                        {{-- <input type="hidden" value="{{ csrf_token() }}"> --}}
                        {{-- <meta name="csrf-token" content="{{ csrf_token() }}"> --}}
                        @csrf
                        <div class="tab">
                            <div class="inputContainer">
                                <i class="fa fa-user"></i>
                                <input type="text" name="fname" id="fname" placeholder="First Name" oninput="this.className = ''">
                            </div>
                            <div class="inputContainer">
                                <i class="fa fa-user"></i>
                                <input type="text" id="lname" name="lname" placeholder="Last Name" oninput="this.className = ''">
                            </div>

                            <div class="inputContainer">
                                <i class="fa fa-id-card"></i>
                                <input type="text" id="StudentID" name="StudentID" placeholder="Student ID"
                                    oninput="this.className = ''">
                            </div>
                            <!-- <div class="inputContainer">
                                <i class="fa fa-address-book-o"></i>
                                <input type="text" name="branch" placeholder="Branch" oninput="this.className = ''">
                            </div> -->

                        </div>

                        <div class="tab">
                            <div class="inputContainer">
                                <i class="fa fa-clock-o"></i>
                                <select name="dept" id="dept" oninput="this.className = ''">
                                    <option value="COMPS">Computer</option>
                                    <option value="IT">IT</option>
                                    <option value="EXTC">EXTC</option>
                                    <option value="MECH">MECH</option>
                                </select>
                            </div>
                            <div class="inputContainer">
                                <i class="fa fa-user"></i>
                                <input type="text" name="phoneNo" id="phoneNo" placeholder="Contact Number"
                                    oninput="this.className = ''">
                            </div>
                            <div class="inputContainer">
                                <i class="fa fa-id-card"></i>
                                <input type="date" name="DOB" id="DOB"   value="<?php echo date('Y-m-d'); ?>" placeholder="DOB" oninput="this.className = ''">
                            </div>

                        </div>
                        <div class="tab">
                            <div class="inputContainer">
                                <i class="fa fa-clock-o"></i>
                                <select name="sem" id="sem" oninput="this.className = ''">
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                </select>
                            </div>
                            <div class="inputContainer">
                                <i class="fa fa-clock-o"></i>
                                <select name="classSelect" id="classSelect" oninput="this.className = ''">
                                    <option value="A">A</option>
                                    <option value="B">B</option>
                                    <option value="C">C</option>
                                    <option value="D">D</option>
                                </select>
                            </div>
                            <div class="inputContainer">
                                <i class="fa fa-id-card"></i>
                                <input type="number" name="rollNo" id="rollNo"  placeholder="rollNo" oninput="this.className = ''">
                            </div>

                        </div>
                        <div class="tab">
                            <div class="inputContainer">
                                <i class="fa fa-internet-explorer"></i>
                                <input type="email" id="email" name="email" placeholder="Email Address"
                                    oninput="this.className = ''">
                            </div>
                            <!-- <div class="inputContainer">
                                <i class="fa fa-user"></i>
                                <input type="text" name="uname" placeholder="Username" oninput="this.className = ''">
                            </div> -->
                            <div class="inputContainer">
                                <i class="fa fa-lock"></i>
                                <input type="password" id="pswd" name="pswd" placeholder="Password" oninput="this.className = ''" autocomplete="">
                            </div>
                            <div class="inputContainer">
                                <i class="fa fa-lock"></i>
                                <input type="password" name="pswd2" id="pswd2" placeholder="Confirm Password"
                                    oninput="this.className = ''"autocomplete>
                            </div>

                        </div>
                        {{-- <div class="tab">
                            <div class="inputContainer">
                                <i class="fa fa-clock-o"></i>
                                <select name="sem" id="sem" oninput="this.className = ''">
                                    <option value="1">1</option>
                                    <option value="2">2</option>

                                </select>
                            </div>
                            <div class="inputContainer">
                                <i class="fa fa-user"></i>
                                <input type="text" name="rollNo" id="rollNo" placeholder="Roll Number"
                                    oninput="this.className = ''">
                            </div>


                        </div> --}}


                        <div class="buttonContainer">
                            <button type="button" id="prevBtn" onclick="nextPrev(-1)">Previous</button>
                            <button type="button" id="nextBtn" onclick="nextPrev(1)">Su</button>
                        </div>

                        <div id="bottom-dots">
                            <span class="step"></span>
                            <span class="step"></span>
                            <span class="step"></span>
                            <span class="step"></span>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
    <div class="errors">
        <!-- <div class="ErrorCard">


            <i class="fa fa-exclamation-circle"></i>
            <p>Error Text</p>

        </div> -->
    </div>



    <script src="js/register.js"></script>
</body>

</html>