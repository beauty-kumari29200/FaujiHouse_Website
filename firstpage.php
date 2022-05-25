<?php
session_start();

include("classes/user.php");
include("classes/connect.php");
include("classes/login.php");
include("classes/project_query.php");
include("classes/firstpage.query.php");

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
 
    $query = new ProjectBuyer();
    $id = $_SESSION['faujihouse_userid'];
    $result =  $query->create_buyer($id, $_POST);
    // print_r($_POST);
}

if($_SERVER['REQUEST_METHOD'] == "POST")
{
 
    $query1 = new Query();
    $id = $_SESSION['faujihouse_userid'];
    $result1 =  $query1->create_buyer($id, $_POST);
    
}

// print_r($user_data);

?>




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fauji House</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css" />
    <!-- link to css -->
    <link rel="stylesheet" href="firstpage.css">
    <!-- Box icon -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
    <!-- <link rel="script" href="script.js"> -->
    <link rel="script" href="slide.js">

    <!-- chatbot -->
    <link rel="stylesheet" href="static/css/chat.css">
    <link rel="stylesheet" href="static/css/home.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


</head>

<body style="background: #fff;">

    <!-- CHAT BAR BLOCK -->
    <div class="chat-bar-collapsible">
        <button id="chat-button" type="button" class="collapsible">Chat with us!
            <i id="chat-icon" style="color: #fff;" class="fa fa-fw fa-comments-o"></i>
        </button>

        <div class="contentchat">
            <div class="full-chat-block">
                <!-- Message Container -->
                <div class="outer-container">
                    <div class="chat-container">
                        <!-- Messages -->
                        <div id="chatbox">
                            <h5 id="chat-timestamp"></h5>
                            <p id="botStarterMessage" class="botText"><span>Loading...</span></p>
                        </div>

                        <!-- User input box -->
                        <div class="chat-bar-input-block">
                            <div id="userInput">
                                <input id="textInput" class="input-box" type="text" name="msg"
                                    placeholder="Tap 'Enter' to send a message">
                                <p></p>
                            </div>

                            <div class="chat-bar-icons">
                                <i id="chat-icon" style="color: crimson;" class="fa fa-fw fa-heart"
                                    onclick="heartButton()"></i>
                                <i id="chat-icon" style="color: #333;" class="fa fa-fw fa-send"
                                    onclick="sendButton()"></i>
                            </div>
                        </div>

                        <div id="chat-bar-bottom">
                            <p></p>
                        </div>

                    </div>
                </div>

            </div>
        </div>

    </div>

    <header>
        <div class="container11">
            <input type="checkbox" name="" id="check">

            <div class="logo-container">
                <a href="#" class="logo"><img class="flag" src="img/flag.jpg"></a>
                <h3 class="logo"><strong>Fauji</strong><span>House</span></h3>
            </div>

            <div class="nav-btn">
                <div class="nav-links">
                    <ul>
                        <li class="nav-link" style="--i: 1.1s">
                            <a href="testbuy.html">Buy & Rent<i class="fas fa-caret-down"></i></a>
                            <div class="dropdown">
                                <ul>
                                    <li class="dropdown-link">
                                        <a href="demobuy.php">Home for sale </a>
                                    </li>
                                    <li class="dropdown-link">
                                        <a href="demo.html">Open Houses</a>
                                    </li>
                                    <li class="dropdown-link">
                                        <a href="demo.html">New Homes</a>
                                    </li>
                                    <li class="dropdown-link">
                                        <a href="demo.html">Manage Rentals</a>
                                    </li>
                                    <div class="arrow"></div>
                                </ul>
                            </div>
                        </li>
                        <li class="nav-link" style="--i: 1.1s">
                            <a href="#">Sell<i class="fas fa-caret-down"></i></a>
                            <div class="dropdown">
                                <ul>
                                    <li class="dropdown-link">
                                        <a href="postproperty.php">Home </a>
                                    </li>
                                    <li class="dropdown-link">
                                        <a href="postproperty.php">Projects</a>
                                    </li>

                                    <li class="dropdown-link">
                                        <a href="404.html">Manage Rentals</a>
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
                                        <a href="loan.html">Home loan </a>
                                    </li>
                                    <li class="dropdown-link">
                                        <a href="loan.html">Projects loans</a>
                                    </li>

                                </ul>
                            </div>
                        </li>
                        <!-- <li class="nav-link" style="--i: .85s">
                            <a href="#">Menu<i class="fas fa-caret-down"></i></a>
                            <div class="dropdown">
                                <ul>
                                    <li class="dropdown-link">
                                        <a href="#">Link 1</a>
                                    </li>
                                    <li class="dropdown-link">
                                        <a href="#">Link 2</a>
                                    </li>
                                    <li class="dropdown-link">
                                        <a href="#">Link 3<i class="fas fa-caret-down"></i></a>
                                        <div class="dropdown second">
                                            <ul>
                                                <li class="dropdown-link">
                                                    <a href="#">Link 1</a>
                                                </li>
                                                <li class="dropdown-link">
                                                    <a href="#">Link 2</a>
                                                </li>
                                                <li class="dropdown-link">
                                                    <a href="#">Link 3</a>
                                                </li>
                                                <li class="dropdown-link">
                                                    <a href="#">More<i class="fas fa-caret-down"></i></a>
                                                    <div class="dropdown second">
                                                        <ul>
                                                            <li class="dropdown-link">
                                                                <a href="#">Link 1</a>
                                                            </li>
                                                            <li class="dropdown-link">
                                                                <a href="#">Link 2</a>
                                                            </li>
                                                            <li class="dropdown-link">
                                                                <a href="#">Link 3</a>
                                                            </li>
                                                            <div class="arrow"></div>
                                                        </ul>
                                                    </div>
                                                </li>
                                                <div class="arrow"></div>
                                            </ul>
                                        </div>
                                    </li>
                                    <li class="dropdown-link">
                                        <a href="#">Link 4</a>
                                    </li>
                                    <div class="arrow"></div>
                                </ul>
                            </div>
                        </li> -->
                        <li class="nav-link" style="--i: 1.1s">
                            <a href="services.html">Services<i class="fas fa-caret-down"></i></a>
                            <div class="dropdown">
                                <ul>
                                    <li class="dropdown-link">
                                        <a href="services.php">Furniture</a>
                                    </li>
                                    <li class="dropdown-link">
                                        <a href="services.php">White goods</a>
                                    </li>
                                    <li class="dropdown-link">
                                        <a href="services.php">Interior Decoration</a>
                                    </li>
                                    <li class="dropdown-link">
                                        <a href="services.php">Electric Work</a>
                                    </li>
                                    <li class="dropdown-link">
                                        <a href="#">More<i class="fas fa-caret-down"></i></a>
                                        <div class="dropdown second">
                                            <ul>
                                                <li class="dropdown-link">
                                                    <a href="service_register.php">register</a>
                                                </li>

                                                <li class="dropdown-link">

                                                    <div class="dropdown second">
                                                        <!-- <ul>
                                                            <li class="dropdown-link">
                                                                <a href="#">Link 1</a>
                                                            </li>
                                                            <li class="dropdown-link">
                                                                <a href="#">Link 2</a>
                                                            </li>
                                                            <li class="dropdown-link">
                                                                <a href="#">Link 3</a>
                                                            </li>
                                                            <div class="arrow"></div>
                                                        </ul> -->
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
                            <a href="project.php">Projects</a>
                        </li>
                    </ul>
                </div>

                <div class="log-sign" style="--i: 1.8s">
                      
                           <!-- <a href="logout.php" class="btn transparent">  echo"Log out"  echo "Log in / Sign up"?></a> -->
                            <a href="signup.php" class="btn solid">  <?php 
                                    error_reporting(E_ERROR | E_PARSE );
                                   if( $user_data != "")
                                    {
                                      echo $user_data['name'] ;
          
                                  }else{
                                  echo "Login / Sign up";
                                    }
                              ?></a>
                          
                </div>
            </div>

            <div class="hamburger-menu-container">
                <div class="hamburger-menu">
                    <div></div>
                </div>
            </div>
        </div>
    </header>

    <!-- Home -->
    <section class="home container" id="home">
        <h1>Discover a place<br>
            you'll love to live !</h1>
        <div class="box11">
            <div class="wrapper">
                <input type="radio" name="slider" id="menu-btn">
                <input type="radio" name="slider" id="close-btn">
                <ul class="nav-links-box11">
                    <label for="close-btn" class="btn close-btn"><i class="fas fa-times"></i></label>

                    <li>
                        <a href="#" class="desktop-item">Buy</a>
                        <input type="checkbox" id="showMega">
                        <label for="showMega" class="mobile-item">Mega Menu</label>
                        <div class="mega-box">
                            <div class="content">
                                <div class="row">
                                    <img src="img/h1.jpg" alt="">
                                </div>
                                <div class="row">
                                    <header>Location</header>
                                    <ul class="mega-links">
                                        <li><a href="testbuy.php">Delhi</a></li>
                                        <li><a href="testbuy.php">Mumbai</a></li>
                                        <li><a href="testbuy.php">Kolkata</a></li>
                                        <li><a href="testbuy.php">Chennai</a></li>
                                        <li><a href="testbuy.php">More</a></li>
                                    </ul>
                                </div>
                                <div class="row">
                                    <header>BHK</header>
                                    <ul class="mega-links">
                                        <li><a href="testbuy.php">1bhk</a></li>
                                        <li><a href="testbuy.php">2bhk</a></li>
                                        <li><a href="testbuy.php">3bhk</a></li>
                                        <li><a href="testbuy.php">4bhk+</a></li>
                                    </ul>
                                </div>
                                <div class="row">
                                    <header>Price Range</header>
                                    <ul class="mega-links">
                                        <li><a href="testbuy.php">4l ac +</a></li>
                                        <li><a href="testbuy.php">15 lac +</a></li>
                                        <li><a href="testbuy.php">80 lac +</a></li>
                                        <li><a href="testbuy.php">10 cr +</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li>
                        <a href="#" class="desktop-item">Sell</a>
                        <input type="checkbox" id="showMega">
                        <label for="showMega" class="mobile-item">Mega Menu</label>
                        <div class="mega-box">
                            <div class="content">
                                <div class="row">
                                    <img src="img/p7.jpg" alt="">
                                </div>
                                <div class="row">
                                    <header>Project</header>
                                    <ul class="mega-links">
                                        <li><a href="project.php">Residential</a></li>
                                        <li><a href="project.php">Commercial</a></li>
                                        <li><a href="project.php">Business</a></li>
                                        <li><a href="project.php">More</a></li>
                                    </ul>
                                </div>
                                <div class="row">
                                    <header>Property</header>
                                    <ul class="mega-links">
                                        <li><a href="project.php">Commercial</a></li>
                                        <li><a href="project.php">Residential</a></li>
                                        <li><a href="project.php">Country Side</a></li>
                                        <li><a href="project.php">More</a></li>
                                    </ul>
                                </div>
                                <div class="row">
                                    <header>Process</header>
                                    <ul class="mega-links">
                                        <li><a href="project.php">Details</a></li>
                                        <li><a href="project.php">Upload Pics</a></li>
                                        <li><a href="project.php">Set Range</a></li>
                                        <li><a href="project.php">More</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li>
                        <a href="#" class="desktop-item">Rent</a>
                        <input type="checkbox" id="showMega">
                        <label for="showMega" class="mobile-item">Mega Menu</label>
                        <div class="mega-box">
                            <div class="content">
                                <div class="row">
                                    <img src="img/p8.jpg" alt="">
                                </div>
                                <div class="row">
                                    <header>Price</header>
                                    <ul class="mega-links">
                                        <li><a href="buy.php">10 lac+</a></li>
                                        <li><a href="buy.php">50 lac+</a></li>
                                        <li><a href="buy.php">1 cr +</a></li>
                                        <li><a href="buy.php">10 cr+</a></li>
                                    </ul>
                                </div>
                                <div class="row">
                                    <header>Property</header>
                                    <ul class="mega-links">
                                        <li><a href="buy.php">Villa</a></li>
                                        <li><a href="buy.php">Residentcy</a></li>
                                        <li><a href="buy.php">Banglo</a></li>
                                        <li><a href="buy.php">More</a></li>
                                    </ul>
                                </div>
                                <div class="row">
                                    <header>Lcations</header>
                                    <ul class="mega-links">
                                        <li><a href="buy.php">Delhi</a></li>
                                        <li><a href="buy.php">Mumbai</a></li>
                                        <li><a href="buy.php">Pune</a></li>
                                        <li><a href="buy.php">More</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </li>
                </ul>
                <label for="menu-btn" class="btn menu-btn"><i class="fas fa-bars"></i></label>
            </div>
        </div>
    </section>
    <br><br>
    <h2 style="text-align: center;"> GET STARTED WITH EXPLORING REAL ESTATE OPTIONS</h2>
    <!-- fauji house options -->
    <section class="sales container" id="sales">
        <!-- box1 -->
        <div class="box">
            <h3>Buying a Home</h3>
            <a href="testbuy.php">  <img src="img/p8.jpg" alt=""></a>
        </div>
        <!-- box2 -->
        <div class="box">
            <h3>Renting a Home</h3>
            <a href="testbuy.php">  <img src="img/Buying a Home.jpg" alt=""></a>
        </div>
        <!-- box3 -->
        <div class="box"></a>
            <h3>Sell/Rent your property</h3>
            <a href="postproperty.php"><img src="img/rent.jpg" alt=""></a> 
        </div>
        <div class="box">
            <h3>Residential Projects</h3>
            <a href="project.php"> <img src="img/project.jpg" alt=""></a>
        </div>
        <div class="box">
            <h3>Services</h3>
            <a href="services.php">  <img src="img/aa1.jpg" alt=""></a>
        </div>
    </section>

    <!-- about -->
    <section class="about container" id="about" style="height:700px">
        <div class="about-img">
            <img src="img/p4.jpg" alt="" style="height:80%">
        </div>
        <div class="about-text">
            <span>Sell or Rent Your Property Faster <br>With Fauji House</span>
            <h2>Property owners get free <br>posting when they register</h2>
            <br>
            <h3><strong>Sell or rent your residential/ commercial property</strong></h3>
            <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Magni repellat, repellendus eligendi eum
                laboriosam perferendis?</p>
            <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Magnam aliquam ab fugiat et mollitia placeat.
            </p>
            <br>
            <a href="postproperty.php" class="btn">Post Your Property Free </a>
        </div>
    </section>

    <!-- sales -->
    <section class="sales container" id="sales">
        <!-- box1 -->
        <div class="box">
            <i class='bx bx-user'></i>
            <h3>Make your Dream True</h3>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sunt nostrum unde molestiae vitae? Laudantium,
                sed.</p>
        </div>
        <!-- box2 -->
        <div class="box">
            <i class='bx bx-desktop'></i>
            <h3>Start Your Membership</h3>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sunt nostrum unde molestiae vitae? Laudantium,
                sed.</p>
        </div>
        <!-- box3 -->
        <div class="box">
            <i class='bx bx-home-alt'></i>
            <h3>Enjoy Your New Home</h3>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sunt nostrum unde molestiae vitae? Laudantium,
                sed.</p>
        </div>
    </section>

    <!-- properties -->
    <section class="properties container" id="properties">
        <div class="heading">
            <span>Recent</span>
            <h2>Our Featured Properties</h2>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit<br> Accusantium,Lorem ipsum dolor sit amet
                consectetur adipisicing elit. Doloremque ex quo reiciendis minus explicabo </p>
        </div>
        <div class="properties-container container">
            <!-- box 1 -->
            <div class="box">
                <img src="img/P1.jpg" alt="">
                <h3>$12,999</h3>
                <div class="content">
                    <div class="text">
                        <h3>The Place</h3>
                        <p>Delhi,India</p>
                    </div>
                    <div class="icon">
                        <i class='bx bx-bed'><span>5</span></i>
                        <i class='bx bx-bath'><span>2</span></i>
                    </div>
                </div>
            </div>
            <!-- box 2 -->
            <div class="box">
                <img src="img/p6.jpg" alt="">
                <h3>$12,999</h3>
                <div class="content">
                    <div class="text">
                        <h3>The Place</h3>
                        <p>Delhi,India</p>
                    </div>
                    <div class="icon">
                        <i class='bx bx-bed'><span>5</span></i>
                        <i class='bx bx-bath'><span>2</span></i>
                    </div>
                </div>
            </div>
            <!-- box 3 -->
            <div class="box">
                <img src="img/p2.jpg" alt="">
                <h3>$12,999</h3>
                <div class="content">
                    <div class="text">
                        <h3>The Place</h3>
                        <p>Delhi,India</p>
                    </div>
                    <div class="icon">
                        <i class='bx bx-bed'><span>5</span></i>
                        <i class='bx bx-bath'><span>2</span></i>
                    </div>
                </div>
            </div>
            <!-- box 4 -->
            <div class="box">
                <img src="img/p3.jpg" alt="">
                <h3>$12,999</h3>
                <div class="content">
                    <div class="text">
                        <h3>The Place</h3>
                        <p>Delhi,India</p>
                    </div>
                    <div class="icon">
                        <i class='bx bx-bed'><span>5</span></i>
                        <i class='bx bx-bath'><span>2</span></i>
                    </div>
                </div>
            </div>
            <!-- box 5 -->
            <div class="box">
                <img src="img/p4.jpg" alt="">
                <h3>$12,999</h3>
                <div class="content">
                    <div class="text">
                        <h3>The Place</h3>
                        <p>Delhi,India</p>
                    </div>
                    <div class="icon">
                        <i class='bx bx-bed'><span>5</span></i>
                        <i class='bx bx-bath'><span>2</span></i>
                    </div>
                </div>
            </div>
            <!-- box 6 -->
            <div class="box">
                <img src="img/p5.jpg" alt="">
                <h3>$12,999</h3>
                <div class="content">
                    <div class="text">
                        <h3>The Place</h3>
                        <p>Delhi,India</p>
                    </div>
                    <div class="icon">
                        <i class='bx bx-bed'><span>5</span></i>
                        <i class='bx bx-bath'><span>2</span></i>
                    </div>
                </div>
            </div>
            <!-- box 7 -->
            <div class="box">
                <img src="img/p7.jpg" alt="">
                <h3>$12,999</h3>
                <div class="content">
                    <div class="text">
                        <h3>The Place</h3>
                        <p>Delhi,India</p>
                    </div>
                    <div class="icon">
                        <i class='bx bx-bed'><span>5</span></i>
                        <i class='bx bx-bath'><span>2</span></i>
                    </div>
                </div>
            </div>
            <!-- box 8 -->
            <div class="box">
                <img src="img/p8.jpg" alt="">
                <h3>$12,999</h3>
                <div class="content">
                    <div class="text">
                        <h3>The Place</h3>
                        <p>Delhi,India</p>
                    </div>
                    <div class="icon">
                        <i class='bx bx-bed'><span>5</span></i>
                        <i class='bx bx-bath'><span>2</span></i>
                    </div>
                </div>
            </div>
            <!-- box 9 -->
            <div class="box">
                <img src="img/p9.jpg" alt="">
                <h3>$12,999</h3>
                <div class="content">
                    <div class="text">
                        <h3>The Place</h3>
                        <p>Delhi,India</p>
                    </div>
                    <div class="icon">
                        <i class='bx bx-bed'><span>5</span></i>
                        <i class='bx bx-bath'><span>2</span></i>
                    </div>
                </div>
            </div>
            <!-- box 10 -->
            <div class="box">
                <img src="img/p10.jpg" alt="">
                <h3>$12,999</h3>
                <div class="content">
                    <div class="text">
                        <h3>The Place</h3>
                        <p>Delhi,India</p>
                    </div>
                    <div class="icon">
                        <i class='bx bx-bed'><span>5</span></i>
                        <i class='bx bx-bath'><span>2</span></i>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- hot properties -->
    <section class="new">
        <div id="services">

            <h2>EXPOLRE POPULAR CITIES</h2>
            <p><strong>Buy or Rent properties in top cities</strong></p>
            <div class="content">
                <div class="card circle">
                    <a href="#"> <img src="img/delhi1.jpg" alt=""></a>
                    <div class="text">
                        <h3>Delhi/NCR</h3>
                    </div>
                </div>
                <div class="card circle">
                    <a href="#"> <img src="img/mumbai.jpg" alt=""></a>
                    <div class="text">
                        <h3>Mumbai</h3>
                    </div>
                </div>
                <div class="card circle">
                    <a href="#"> <img src="img/bangalore.jpg" alt=""></a>
                    <div class="text">
                        <h3>Banglore</h3>
                    </div>
                </div>

                <div class="card circle">
                    <a href="#"> <img src="img/hyderabad.jpg" alt=""></a>
                    <div class="text">
                        <h3>Hyderabad</h3>
                    </div>
                </div>
                <div class="card circle">
                    <a href="#"> <img src="img/pune.jpg" alt=""></a>
                    <div class="text">
                        <h3>Pune</h3>
                    </div>
                </div>
                <div class="card circle">
                    <a href="#"> <img src="img/kolkata.jpg" alt=""></a>
                    <div class="text">
                        <h3>Kolkata</h3>
                    </div>
                </div>
                <div class="card circle">
                    <a href="#"> <img src="img/chennai.jpg" alt=""></a>
                    <div class="text">
                        <h3>Chennai</h3>
                    </div>
                </div>
                <div class="card circle">
                    <a href="#"> <img src="img/ahem.jpg" alt=""></a>
                    <div class="text">
                        <h3>Ahemdabad</h3>
                    </div>
                </div>
            </div>
        </div>


        </div>

    </section>

    <!-- our partners -->
    <section class="properties container" id="properties">
        <div class="heading">
            <h2>Our Partners</h2>
            <hr>
        </div>
        <div class="properties-container container">
            <!-- box 1 -->
            <div class="box">
                <img id="x" src="img/co1.jpg" alt="">
                <h4>
                    <div class="icons">
                        <a href="#" <i class='bx bxl-facebook-circle'></i></a>
                        <a href="#" <i class='bx bxl-instagram'></i></a>
                        <a href="#" <i class='bx bxl-linkedin'></i></a>
                        <a href="#" <i class='bx bxl-twitter'></i></a>
                    </div>
                </h4>
                <div class="content">
                    <div class="text">
                        <h3>Project Manager</h3>
                        <p>Person 1</p>

                    </div><br>

                    <span><a href="#" class="btn">Read More</a></span>
                </div>
            </div>
            <!-- box 2 -->
            <div class="box">
                <img src="img/co2.jpg" alt="">
                <h4>
                    <div class="icons">
                        <a href="#" <i class='bx bxl-facebook-circle'></i></a>
                        <a href="#" <i class='bx bxl-instagram'></i></a>
                        <a href="#" <i class='bx bxl-linkedin'></i></a>
                        <a href="#" <i class='bx bxl-twitter'></i></a>
                    </div>
                </h4>
                <div class="content">
                    <div class="text">
                        <h3>CEO $ Founder</h3>
                        <p>Person 2</p>

                    </div><br>

                    <span><a href="#" class="btn">Read More</a></span>
                </div>
            </div>

            <!-- box 3 -->
            <div class="box">
                <img src="img/co3.jpg" alt="">
                <h4>
                    <div class="icons">
                        <a href="#" <i class='bx bxl-facebook-circle'></i></a>
                        <a href="#" <i class='bx bxl-instagram'></i></a>
                        <a href="#" <i class='bx bxl-linkedin'></i></a>
                        <a href="#" <i class='bx bxl-twitter'></i></a>
                    </div>
                </h4>
                <div class="content">
                    <div class="text">
                        <h3>Senior Agent</h3>
                        <p>Person 3</p>

                    </div><br>

                    <span><a href="#" class="btn">Read More</a></span>
                </div>
            </div>

        </div>

    </section>

    <!-- services -->
    <section class="new">
        <div id="services"> 
        <h2>OUR SERCVICES</h2>
        <p>loremmjxb xnkljs9aiuxc nzm vzbhnjmk sghjk ertyui zcvbnxmc, lorem12
            x bksjhxios bubhsx08soia kjxhoiaus-0q jsxoisud0qw9du bxsuaohx bioxsh
            xcvbnm,xrfghjklertyuio sdfghjkl;ertyuio zdfghjxkc
        </p>
        <div class="content">
            <a href="testbuy.php" >
            <div class="card>">
                <i class="fa fa-search-plus" style='font-size:48px;'></i>
                <h3>Find Places Anywhere In India</h3>
            </div></a>
            
            <a href="project.php" >
            <div class="card>">
                <i class="fa fa-users" style='font-size:48px;'></i>
                <h3>Featured Projects</h3>
            </div></a>
            <a href="testbuy.php.php" >
            <div class="card>">
                <i class="fa fa-building" style='font-size:48px;'></i>
                <h3>Best Properties</h3>
            </div></a>
            <a href="testbuy.php" >
            <div class="card>">
                <i class="fa fa-skyatlas" style="font-size:48px"></i>
                <h3>Manage Properties</h3>
            </div></a>
        </div>
        <div class="content">
            <div class="card">
                <a href="services.php">  <img src="img/ID.jpg" alt=""></a>
                <h3>Interior Decoration</h3>
                <p>lorem ncldkpc a kj ndchoi vsbnm vbnm, dfghjuike9idujhn sfvbxncm
                    cvbnm eratsyudxikc xcsvbndxcm dasfgdhcjkv acsvdbcnvm asfdvgbhnvjm .
                </p>
            </div>
            <div class="card">
                <a href="services.php">   <img src="img/GP.jpg" alt=""></a>
                <h3>Deal at Great Prices</h3>
                <p>lorem ncldkpc a kj ndchoi vsbnm vbnm, dfghjuike9idujhn sfvbxncm
                    cvbnm eratsyudxikc xcsvbndxcm dasfgdhcjkv acsvdbcnvm asfdvgbhnvjm .
                </p>
            </div>
            <div class="card">
                <a href="services.php">  <img src="img/F.jpg" alt=""></a>
                <h3>Furniture</h3>
                <p>lorem ncldkpc a kj ndchoi vsbnm vbnm, dfghjuike9idujhn sfvbxncm
                    cvbnm eratsyudxikc xcsvbndxcm dasfgdhcjkv acsvdbcnvm asfdvgbhnvjm .
                </p>
            </div>
        </div><br><br>


        <!-- client review -->
        <h2>CLIENT REVIEWS</h2>
        <div class="content">
            <div class="card circle">
                <img src="img/c1.jpg" alt="">
                <div class="text">
                    <h3>person1</h3>
                    <h4>ABC company</h4>
                    <i class="fa fa-quote-right"></i>
                    <p>lorem ncldkpc a kj ndchoi vsbnm vbnm, dfghjuike9idujhn sfvbxncm
                        cvbnm eratsyudxikc xcsvbndxcm dasfgdhcjkv acsvdbcnvm asfdvgbhnvjm
                    </p>
                </div>
            </div>
            <div class="card circle">
                <img src="img/c2.jpg" alt="">
                <div class="text">
                    <h3>person2</h3>
                    <h4>ABC company</h4>
                    <i class="fa fa-quote-right"></i>
                    <p>lorem ncldkpc a kj ndchoi vsbnm vbnm, dfghjuike9idujhn sfvbxncm
                        cvbnm eratsyudxikc xcsvbndxcm dasfgdhcjkv acsvdbcnvm asfdvgbhnvjm
                    </p>
                </div>
            </div>
            <div class="card circle">
                <img src="img/c3.jpg" alt="">
                <div class="text">
                    <h3>person3</h3>
                    <h4>ABC company</h4>
                    <i class="fa fa-quote-right"></i>
                    <p>lorem ncldkpc a kj ndchoi vsbnm vbnm, dfghjuike9idujhn sfvbxncm
                        cvbnm eratsyudxikc xcsvbndxcm dasfgdhcjkv acsvdbcnvm asfdvgbhnvjm
                    </p>
                </div>
            </div>
        </div>
        </div><br><br>
        <!-- newslatter -->
        <section class="newslatter container">
            <h2>Have Questions in Mind ?<br>Let us help you</h2>
            <form actiom="" method="post">
                <input type="email" name="" id="email-box" placeholder="Yourmail@gmail.com" required>
                <input type="submit" value="send" class="btn">
            </form>
        </section>


        <!-- contact -->
        <div id="contact">
            <h2>Contact Us</h2>
            <div class="content">
                <form action="" method="POST">
                    <input type="text" name="name" id="name" required placeholder="Your Name">
                    <input type="email" name="email" id="mail" required placeholder="Your Email">
                    <input type="tel" name="phone" id="tel" required placeholder="Phone Number">
                    <textarea name="mesgs" id="mesg" rows="7" placeholder="Your Message Here...."></textarea>
                    <button type="submit">Send <i class="fa fa-paper-plane"></i></button>
                </form>
                <div class="map">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d15258072.40570261!2d82.75252935!3d20.98801345!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2sin!4v1640433179194!5m2!1sen!2sin"
                        height="400" style="border:0;" allowfullscreen="" loading="lazy">
                    </iframe>

                </div>
            </div>
            <div class="properties-container">
                <div class="box">
                    <div class="text">
                        <h3> <i class="fa fa-comments"></i>COMMUNICATION</h3>
                        <p>For General Qureries, Including Property sales And Construcion,<br> Please Email Us At
                            <span>Info@Example.com</span>
                        </p>
                    </div>
                </div>
                <div class="box">
                    <div class="text">
                        <h3> <i class="fa fa-life-ring"></i>TECHNICAL SUPPORT</h3>
                        <p>We Are Ready To Help ! If you Have Any Queries Or Issues.<br> Contact Us For Support.
                            <span>+11 111 111 1111</span>
                        </p>
                    </div>
                </div>
                <div class="box">
                    <div class="text">
                        <h3> <i class="fa fa-comments"></i>OTHERS</h3>
                        <p>For General Quries ,Including Propert Sales and Construction.<br> Please Email Us At
                            <span>Info@Example.com</span>
                        </p>
                    </div>
                </div>
            </div>
        </div>


    </section>

    <!-- footer -->
    <section class="footer">
        <div class="footer-container container">
            <h2>Fauji House</h2>
            <div class="footer-box">
                <h2>Who we are?</h2>
                <p>lorem gut maili nbahut moc amk dbkhodu <br>sndij0qila nwsjwdwd bhsuiwo snjis.</p>
                <br>
                <h2>About Us</h2>
                <a href="portfolio.html">Mission & Vision</a>
                <a href="portfolio.html">Why Fauji House</a>
                <a href="portfolio.html">Management</a>
                <a href="portfolio.html">Profile</a>

            </div>

            <div class="footer-box">
                <a href="portfolio.html">
                    <h2>Investements</h2>
                </a>
                <a href="portfolio.html">
                    <h2>Social Media</h2>
                </a>
                <a href="portfolio.html">
                    <h2>Career</h2>
                </a>
                <a href="portfolio.html">
                    <h2>Blogs</h2>
                </a>
            </div>
            <div class="footer-box">
                <h2>Locations OF Hot Places.</h2>
                <a href="testbut.php">Houses in Mumbai</a>
                <a href="testbuy.php">Houses in Delhi</a>
                <a href="testbuy.php">Houses in Banglore</a>
                <a href="testbuy.php">Houses in Chennai</a>
            </div>
            <div class="footer-box">
                <h2>Contact</h2>
                <a href="#">+11 111 1111</a>
                <a href="#">yourmail@gmail.com</a>
                <div class="social">
                    <a href="#"><i class='bx bxl-facebook-circle'></i></a>
                    <a href="#"><i class='bx bxl-instagram'></i></a>
                    <a href="#"><i class='bx bxl-twitter'></i></a>
                    <a href="#"><i class='bx bxl-linkedin-square'></i></a>
                </div>
            </div>
        </div>
    </section>

    <!-- copyright -->
    <div class="copyright">
        <p>&#169; FaujiHouse ALL RIGHTS RESERVED!</p>
    </div>

</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="static/scripts/responses.js"></script>
<script src="static/scripts/chat.js"></script>

</html>