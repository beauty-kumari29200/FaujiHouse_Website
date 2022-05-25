<?php
session_start();

include("classes/user.php");
include("classes/connect.php");
include("classes/login.php");
include("classes/service_register.php");
include("classes/project_query.php");


//check if user is logged in 
if(isset($_SESSION['faujihouse_userid']) )
{
    $id = $_SESSION['faujihouse_userid'];
    $login = new Login();

    $result = $login->check_login($id);

    if($result)
    {
        //retrieve user data
        $user = new User();

       $user_data = $user->get_data($id);
    }
}

if($_SERVER['REQUEST_METHOD'] == "POST")

{
    error_reporting(E_ERROR | E_PARSE );
    $register = new Register();
    $id = $_SESSION['faujihouse_userid'];
    $result =  $register->create_register($id, $_POST);

    // print_r($_POST);
}

?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Service Register</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="firstpage.css">
    <link rel="stylesheet" href="service_register.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css" />


</head>

<body>

    <header>
        <div class="container11">
            <input type="checkbox" name="" id="check">

            <div class="logo-container">
                <a href="index.html" class="logo"><img class="flag" src="img/flag.jpg"></a>
                <h3 class="logo"><strong>Fauji</strong><span>House</span></h3>
            </div>

            <div class="nav-btn">
                <div class="nav-links">
                    <ul>
                        <li class="nav-link" style="--i: 1.35s">
                            <a href="firstpage.html">Home</a>
                        </li>
                        <li class="nav-link" style="--i: 1.1s">
                            <a href="buy.html">Buy & Rent<i class="fas fa-caret-down"></i></a>
                            <div class="dropdown">
                                <ul>
                                    <li class="dropdown-link">
                                        <a href="#">Home for sale </a>
                                    </li>
                                    <li class="dropdown-link">
                                        <a href="#">Open Houses</a>
                                    </li>
                                    <li class="dropdown-link">
                                        <a href="#">New Homes</a>
                                    </li>
                                    <li class="dropdown-link">
                                        <a href="#">Manage Rentals</a>
                                    </li>
                                    <div class="arrow"></div>
                                </ul>
                            </div>
                        </li>
                        <li class="nav-link" style="--i: 1.1s">
                            <a href="postproperty.html">Sell<i class="fas fa-caret-down"></i></a>
                            <div class="dropdown">
                                <ul>
                                    <li class="dropdown-link">
                                        <a href="#">Home </a>
                                    </li>
                                    <li class="dropdown-link">
                                        <a href="#">Projects</a>
                                    </li>

                                    <li class="dropdown-link">
                                        <a href="#">Manage Rentals</a>
                                    </li>
                                    <div class="arrow"></div>
                                </ul>
                            </div>
                        </li>
                        <li class="nav-link" style="--i: 1.1s">
                            <a href="#">Loan<i class="fas fa-caret-down"></i></a>
                            <div class="dropdown">
                                <ul>
                                    <li class="dropdown-link">
                                        <a href="#">Home loan </a>
                                    </li>
                                    <li class="dropdown-link">
                                        <a href="#">Projects loans</a>
                                    </li>

                                </ul>
                            </div>
                        </li>

                        <li class="nav-link" style="--i: 1.1s">
                            <a href="#">Services<i class="fas fa-caret-down"></i></a>
                            <div class="dropdown">
                                <ul>
                                    <li class="dropdown-link">
                                        <a href="#">Furniture</a>
                                    </li>
                                    <li class="dropdown-link">
                                        <a href="#">White goods</a>
                                    </li>
                                    <li class="dropdown-link">
                                        <a href="#">Interior Decoration</a>
                                    </li>
                                    <li class="dropdown-link">
                                        <a href="#">Electric Work</a>
                                    </li>
                                    <li class="dropdown-link">
                                        <a href="#">More<i class="fas fa-caret-down"></i></a>
                                        <div class="dropdown second">
                                            <ul>
                                                <li class="dropdown-link">
                                                    <a href="#">register</a>
                                                </li>

                                                <li class="dropdown-link">

                                                    <div class="dropdown second">

                                                    </div>
                                                </li>
                                                <div class="arrow"></div>
                                            </ul>
                                        </div>
                                    </li>
                                    <li class="dropdown-link">
                                        <a href="#"></a>
                                    </li>
                                    <div class="arrow"></div>
                                </ul>
                            </div>
                        </li>
                        <li class="nav-link" style="--i: 1.35s">
                            <a href="#">Projects</a>
                        </li>
                    </ul>
                </div>


            </div>

            <div class="hamburger-menu-container">
                <div class="hamburger-menu">
                    <div></div>
                </div>
            </div>
        </div>
    </header>
    <form action="" class="form1" method="POST">
        <h1 class="text-center">Registration Form</h1>
        <!-- Progress bar -->
        <div class="progressbar">
            <div class="progress" id="progress"></div>

            <div class="progress-step progress-step-active" data-title="Intro"></div>
            <div class="progress-step" data-title="Contact"></div>
            <div class="progress-step" data-title="ID"></div>
            <div class="progress-step" data-title="Place"></div>
        </div>

        <!-- Steps -->
        <div class="form-step form-step-active">
            <div class="input-group">
                <label for="username">Username</label>
                <input type="text" name="user_name" id="username"  required  />
            </div>
            <div class="input-group">
                <label for="position">Position</label> 
                <select class="form-control"  name="position" required > 
                                             
                                             <option value="">Select Feilds</option>
                                             <option value="electric work">Electric work</option>
                                             <option value="Interior designer">Interior designer</option>
                                             <option value="plumber">Plumber</option>
                                            
                 </select> 

            </div>
            <div class="">
                <a href="#" class="btn btn-next width-50 ml-auto">Next</a>
            </div>
        </div>
        <div class="form-step">
            <div class="input-group">
                <label for="phone">Phone</label>
                <input type="int" name="phone"   required  />
            </div>
            <div class="input-group">
                <label for="email">Email</label>
                <input type="email" name="email"  required />
            </div>
            <div class="btns-group">
                <a href="#" class="btn btn-prev">Previous</a>
                <a href="#" class="btn btn-next">Next</a>
            </div>
        </div>
        <div class="form-step">
            <div class="input-group">
                <label for="dob">Date of Birth</label>
                <input type="date" name="DOB"   required  />
            </div>
            <div class="input-group">
                <label for="ID">Address</label>
                <input type="text" name="address"    required />
            </div>
            <div class="btns-group">
                <a href="#" class="btn btn-prev">Previous</a>
                <a href="#" class="btn btn-next">Next</a>
            </div>
        </div>
        <div class="form-step">
            <div class="input-group">
                <label for="password">State</label>
                
                <select class="form-control" name="state"  required>
                                             
                                             <option value="">Select State</option>
                                             <option value="Maharastra">Maharastra</option>
                                             <option value="Gujrat">Gujrat</option>
                                             <option value="Haryana">Haryana</option>
                                             <option value="Andhra Pradesh">Andhra Pradesh</option>
                                             <option value="Goa">Goa</option>
                                             <option value="Madihya Pradesh">Madihya Pradesh</option>
                                             <option value="Uttar Pradesh">Uttar Pradesh</option>
                                             <option value="Bihar">Bihar</option>
                                             <option value="West Bangal">West Bangal</option>
                                             <option value="Odisa">Odisa</option>
                                             <option value="Tamil Nadu">Tamil Nadu</option>
                                             <option value="Karnataka">Karnataka</option>
                                             <option value="Kerala">Kerala</option>
                                             <option value="Assam">Assam</option>
                                             <option value="Tripura">Tripura</option>
                                             <option value="Meghalaya">Meghalaya</option>
                                             <option value="Manipur">Manipur</option>
                                             <option value="Chattishgarh">Chattishgarh</option>
                                             <option value="Himachal Pradesh">Himachal Pradesh</option>
                                             <option value="Jammu & Kashmir">Jammu & Kashmir</option>
                                             <option value="Jharkhand">Jharkhand</option>
                                             <option value="Mizoram">Mizoram</option>
                                             <option value="Nagaland">Nagaland</option>
                                             <option value="Rajasthan">Rajasthan</option>
                                             <option value="Sikkim">Sikkim</option>
                                             <option value="Telangana">Telangana</option>
                                             <option value="Uttrakhand">Uttrakhand</option>
                                           </select>
            </div>
            <div class="input-group">
                <label for="confirmPassword">City</label>
                <input type="text" name="city"   required />
            </div>
            <div class="btns-group">
                <a href="#" class="btn btn-prev">Previous</a>
                <input type="submit" value="Submit" class="btn" />
            </div>
        </div>
    </form>

    <script>
        const prevBtns = document.querySelectorAll(".btn-prev");
        const nextBtns = document.querySelectorAll(".btn-next");
        const progress = document.getElementById("progress");
        const formSteps = document.querySelectorAll(".form-step");
        const progressSteps = document.querySelectorAll(".progress-step");

        let formStepsNum = 0;

        nextBtns.forEach((btn) => {
            btn.addEventListener("click", () => {
                formStepsNum++;
                updateFormSteps();
                updateProgressbar();
            });
        });

        prevBtns.forEach((btn) => {
            btn.addEventListener("click", () => {
                formStepsNum--;
                updateFormSteps();
                updateProgressbar();
            });
        });

        function updateFormSteps() {
            formSteps.forEach((formStep) => {
                formStep.classList.contains("form-step-active") &&
                    formStep.classList.remove("form-step-active");
            });

            formSteps[formStepsNum].classList.add("form-step-active");
        }

        function updateProgressbar() {
            progressSteps.forEach((progressStep, idx) => {
                if (idx < formStepsNum + 1) {
                    progressStep.classList.add("progress-step-active");
                } else {
                    progressStep.classList.remove("progress-step-active");
                }
            });

            const progressActive = document.querySelectorAll(".progress-step-active");

            progress.style.width =
                ((progressActive.length - 1) / (progressSteps.length - 1)) * 100 + "%";
        }

    </script>

    <div class="img" > 
        <img src="img/form.jpg" alt="" />
    </div>

    <section class="newslatter container"  style="background: url(img/bg-curve-desktop.svg); background-repeat: no-repeat; background-position: center; background-size: cover;">
        <h2>Have Questions in Mind ?<br>Let us help you</h2>
        <form actiom="" method="post">

            <?php
               if($_SERVER['REQUEST_METHOD'] == "POST")
               {
                 error_reporting(E_ERROR | E_PARSE );
                   $query = new ProjectBuyer();
                   $id = $_SESSION['faujihouse_userid'];
                   $result =  $query->create_buyer($id, $_POST);
                   // print_r($_POST);
               }
            ?>

            <input type="email" name="email" id="email-box" placeholder="Yourmail@gmail.com" required>
            <input type="submit" value="send" class="btn">
        </form>
    </section>
 
    <section class="features-section" style="background:rgb(227, 227, 250)">
        <div class="features-text-container" >
            <h1>Stay productive, wherever you are</h1>
            <p>Never let location be an issue when accessing your files. Fylo has
                you<br />covered for all of your file storage needs</p>
            <p>Securely, Share files and folders with friends,family and colleagues
                for<br />live collaboration. No email attachments required.</p>
            <button href="firstpage.html">See how Fauji house works</button>
            <div class="testimonial-container">
                <p>Fauji house has increased our team productivity by<br />
                    an order of magnitude.Since making the<br />
                    switch our team has become a well-oiled <br />collaboration
                    machine.</p>
                <div class="personal-info-container">
                    <img src="img/c3.jpg" alt="" />
                    <div class="personal-info">
                        <p class="name">Kyle Burton</p>
                        <p class="work">Founder&CEO, Huddle</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="features-img-container">
            <img src="img/illustration-2.svg" alt="" />
        </div>
    </section>

  




</body>

</html>