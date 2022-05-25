<?php
session_start();

include("classes/user.php");
include("classes/connect.php");
include("classes/login.php");

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

// print_r($user_data);

?>






<!DOCTYPE html>
<html>
<head>
    <title>Fauji House / Buy </title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <script src="https://kit.fontawesome.com/67c66657c7.js"></script>
    <link rel="stylesheet" href="buy.css">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css" type="text/css">

    <!-- owl slider -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="css/owl.carousel.min.css">



    <gwmw style="display:none;">
        <gwmw style="display:none;">
            <gwmw style="display:none;">
                <gwmw style="display:none;">
                    <gwmw style="display:none;"></gwmw>
                    <gwmw style="display:none;"></gwmw>
                </gwmw>
                <gwmw style="display:none;"> </gwmw>
            </gwmw>
        </gwmw>
    </gwmw>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>

    
    <style>
        .box {
            display: none;
        }

        .show {
            display: block;
        }

</style>


</head>

<body>

    <input type="checkbox" id="check">
    <nav>
        <div class="icon">
            <div class="logo-container">
                <a href="index.html" class="logo"><img class="flag" src="img/flag.jpg"></a>
                <h3 class="logo"><strong>Fauji</strong><span>House</span></h3>
            </div>

        </div>
        <div class="search_box">
            <input type="search" placeholder="Search houses by by place name">
            <span class="fa fa-search"></span>
        </div>
        <ol>
            <li><a href="firstpage.php">home</a></li>
            <li><a href="services.php">services</a></li>
            <li><a href="signup.php">
                           <?php 
                                    error_reporting(E_ERROR | E_PARSE );
                                   if( $user_data != "")
                                    {
                                      echo $user_data['name'] ;
          
                                  }else{
                                  echo "Login / Sign up";
                                    }
                              ?>
                              </a></li>
        </ol>
        <label for="check" class="bar">
            <span class="fa fa-bars" id="bars"></span>
            <span class="fa fa-times" id="times"></span>
        </label>
    </nav>



    <div class="block">
        <div class="boxleft">
            <div class="budget"
                style="width:93% ;  background: wheat; margin-top: 2rem; margin-left: 1rem; margin-right: 1rem; border-radius: 1rem;">
                <h3 style="text-align: center; margin-top: 1rem; ">Budget</h3><br>

                <h2 style=" font-size: 24px; font-weight: 600; color: #000; margin-left: 1rem;">Price Range</h2>
                <p style=" margin-top: 5px;font-size: 16px;color: #000; margin-left: 1rem;">Use slider or enter min and
                    max price</p>
                    <h8 style="color: gray;"><b>Price in Lacs.</b></h8>
                <div class="wrapper">

                    <br>
                    <div class="price-input">
                        <div class="field">
                            <span>Min</span>
                            <input type="number" class="input-min" value="2500">
                        </div>
                        <div class="separator">-</div>
                        <div class="field">
                            <span>Max</span>
                            <input type="number" class="input-max" value="7500">
                        </div>
                    </div>
                    <div class="slider">
                        <div class="progress"></div>
                    </div>
                    <div class="range-input">
                        <input type="range" class="range-min" min="0" max="50000" value="2500" step="100">
                        <input type="range" class="range-max" min="0" max="50000" value="7500" step="100">
                    </div>
                </div>
                <script>
                    const rangeInput = document.querySelectorAll(".range-input input"),
                        priceInput = document.querySelectorAll(".price-input input"),
                        range = document.querySelector(".slider .progress");
                    let priceGap = 1000;
                    priceInput.forEach(input => {
                        input.addEventListener("input", e => {
                            let minPrice = parseInt(priceInput[0].value),
                                maxPrice = parseInt(priceInput[1].value);

                            if ((maxPrice - minPrice >= priceGap) && maxPrice <= rangeInput[1].max) {
                                if (e.target.className === "input-min") {
                                    rangeInput[0].value = minPrice;
                                    range.style.left = ((minPrice / rangeInput[0].max) * 100) + "%";
                                } else {
                                    rangeInput[1].value = maxPrice;
                                    range.style.right = 100 - (maxPrice / rangeInput[1].max) * 100 + "%";
                                }
                            }
                        });
                    });
                    rangeInput.forEach(input => {
                        input.addEventListener("input", e => {
                            let minVal = parseInt(rangeInput[0].value),
                                maxVal = parseInt(rangeInput[1].value);
                            if ((maxVal - minVal) < priceGap) {
                                if (e.target.className === "range-min") {
                                    rangeInput[0].value = maxVal - priceGap
                                } else {
                                    rangeInput[1].value = minVal + priceGap;
                                }
                            } else {
                                priceInput[0].value = minVal;
                                priceInput[1].value = maxVal;
                                range.style.left = ((minVal / rangeInput[0].max) * 100) + "%";
                                range.style.right = 100 - (maxVal / rangeInput[1].max) * 100 + "%";
                            }
                        });
                    });

                </script>

            </div><br>
            <hr><br>
            <h4 style="text-align: center;"><b>Numbers Of Bedrooms</b></h4><br>

            <div class="bhk"
                style="display: grid; grid-template-columns: repeat(auto-fit,minmax(120px,auto));gap:0.8rem ; ">

                <button id="bhk-btn" class="btn" onclick="filterObjects('1bhk')">+ 1bhk</button>
                <button id="bhk-btn" class="btn" onclick="filterObjects('2bhk')">+ 2bhk</button>
                <button id="bhk-btn" class="btn" onclick="filterObjects('3bhk')">+ 3bhk</button>
                <button id="bhk-btn" class="btn" onclick="filterObjects('4bhk')">+ 4bhk</button>
                <button id="bhk-btn" class="btn" onclick="filterObjects('5bhk')">+ 5bhk</button>
                <button id="bhk-btn" class="btn" onclick="filterObjects('6bhk')">+ 6bhk</button>
                <button id="bhk-btn" class="btn" onclick="filterObjects('7bhk')">+ 7bhk</button>
                <button id="bhk-btn" class="btn" onclick="filterObjects('8bhk')">+ 8bhk</button>
                <button id="bhk-btn" class="btn" onclick="filterObjects('9bhk')">+ 9bhk</button>

            </div><br>
            <hr><br>

            <h4 style="text-align: center;"><b>Types Of Property</b></h4><br>

            <div class="bhk"
                style="display: grid; grid-template-columns: repeat(auto-fit,minmax(300px,auto));gap:0.8rem ; ">

            
                
                <button id="bhk-btn1" class="btn" onclick="filterObjects('residential Apartment')" >+ Residential Apartment</button>
                <button  id="bhk-btn1" class="btn" onclick="filterObjects('studio Apartment')">+ 1Rk / Studio Apartment</button>
                <button id="bhk-btn1" class="btn" onclick="filterObjects('villa')" >+ Independent House / Villa</button>
                <button id="bhk-btn1"  class="btn" onclick="filterObjects('builderfloor')">+ Independent / Builder Floor</button>
                <button id="bhk-btn1" class="btn" onclick="filterObjects('Residentialfloor')">+ Residential / Builder Floor</button>
                <button id="bhk-btn1" class="btn" onclick="filterObjects('land')">+ Residential Land</button>
                <button id="bhk-btn1" class="btn" onclick="filterObjects('housefarm')">+ Farm House</button>
            </div><br>
            <hr><br>

            <h4 style="text-align: center;"><b>Localities</b></h4>
            <div class="container121">
                <div class="group">
                    <input type="radio" id="delhi" name="Localities" onclick="filterObjects('delhi')" />
                    <label for="delhicheck">Delhi / NCR</label>
                </div><br>

                <div class="group">
                    <input type="radio" id="mumbai" name="Localities" onclick="filterObjects('mumbai')"/>
                    <label for="mumbai">Mumbai</label>
                </div><br>

                <div class="group">
                    <input type="radio" id="chennai" name="Localities" onclick="filterObjects('chennai')"/>
                    <label for="chennai">Chennai</label>
                </div><br>
                <div class="group">
                    <input type="radio" id="Hyderabad" name="Localities" onclick="filterObjects('Hyderabad')"/>
                    <label for="Hyderabad">Hyderabad</label>
                </div><br>

                <div class="group">
                    <input type="radio" id="Pune" name="Localities" onclick="filterObjects('Pune')"/>
                    <label for="Pune">pune</label>
                </div><br>

                <div class="group">
                    <input type="radio" id="bangalore" name="Localities" onclick="filterObjects('bangalore')"/>
                    <label for="bangalore">Banglore</label>
                </div><br>

                <div class="group">
                    <input type="radio" id="kolkata" name="Localities" onclick="filterObjects('kolkata')"/>
                    <label for="kolkata">kolkata</label>
                </div><br>

                <div class="group">
                    <input type="radio" id="Ahemdabad" name="Localities" onclick="filterObjects('Ahemdabad')"/>
                    <label for="Ahemdabad">Ahemdabad</label>
                </div>

            </div>

            <div class="budget"
                style="width:93% ;  background: wheat; margin-top: 2rem; margin-left: 1rem; margin-right: 1rem; border-radius: 1rem;">
                <h3 style="text-align: center; margin-top: 1rem; ">Area</h3><br>

                <h2 style=" font-size: 24px; font-weight: 600; color: #000; margin-left: 1rem;">Area Range</h2>
                <p style=" margin-top: 5px;font-size: 16px;color: #000; margin-left: 1rem;">Use slider or enter min and
                    max Area</p>

                <h8 style="color: gray;"><b>Area in sq.feet</b></h8>

                <div class="wrapper-area">
                    <div class="values-area">
                        <span id="range1">
                            0
                        </span>
                        <span> &dash; </span>
                        <span id="range2">
                            100
                        </span>
                    </div>
                    <div class="container-area">
                        <div class="slider-track"></div>
                        <input class="input" type="range" min="0" max="5000" value="300" id="slider-1"
                            oninput="slideOne()">
                        <input class="input" type="range" min="0" max="5000" value="700" id="slider-2"
                            oninput="slideTwo()">
                    </div>
                </div>
                <script>

                    window.onload = function () {
                        slideOne();
                        slideTwo();
                    }

                    let sliderOne = document.getElementById("slider-1");
                    let sliderTwo = document.getElementById("slider-2");
                    let displayValOne = document.getElementById("range1");
                    let displayValTwo = document.getElementById("range2");
                    let minGap = 0;
                    let sliderTrack = document.querySelector(".slider-track");
                    let sliderMaxValue = document.getElementById("slider-1").max;

                    function slideOne() {
                        if (parseInt(sliderTwo.value) - parseInt(sliderOne.value) <= minGap) {
                            sliderOne.value = parseInt(sliderTwo.value) - minGap;
                        }
                        displayValOne.textContent = sliderOne.value;
                        fillColor();
                    }
                    function slideTwo() {
                        if (parseInt(sliderTwo.value) - parseInt(sliderOne.value) <= minGap) {
                            sliderTwo.value = parseInt(sliderOne.value) + minGap;
                        }
                        displayValTwo.textContent = sliderTwo.value;
                        fillColor();
                    }
                    function fillColor() {
                        percent1 = (sliderOne.value / sliderMaxValue) * 100;
                        percent2 = (sliderTwo.value / sliderMaxValue) * 100;
                        sliderTrack.style.background = `linear-gradient(to right, #dadae5 ${percent1}% , #3264fe ${percent1}% , #3264fe ${percent2}%, #dadae5 ${percent2}%)`;
                    }
                </script>

            </div><br>



        </div>

        <div class="boxright" style="height: 980rem;">
            <div class="upperbox">
                <div class="user-profile"> <a href="index.html" class="logo"><img class="flag" src="img/placeholder.png"></a> </div>
                <div class="project"><a href="#projects" style="text-decoration: none;"><h1 style="color: white; "><b>Top Projects</b> </h1></a> </div>
                <div class="citi"> <a href="#hotcities" style="text-decoration: none;"><h1 style="color: white;"> <b>Hot Cities</b> </h1></a></div>

                <div class="citi" onclick="filterObjects('newhouse')"> <h1 style="color: white;"><b>New Houses</b></h1></div>

                <div class="citi"  onclick="filterObjects('openhouse')"> <h1 style="color: white;"> <b>Open Houses</b> </h1></div>

                <div class="citi"  onclick="filterObjects('rent')"> <h1 style="color: white;"> <b>Rent</b> </h1></div>

                <div class="access">
                    <a href="cartlist_section.html" id="cart"><i class='fas fa-home' style='font-size:48px;position: relative; top:1rem'></i></a>
                </div>
            </div>

            
           
        <div class="objects">
            <!-- all all-products -->
            <div class="all-products">
                <section class="properties1 container " id="properties">
                    <div class="heading">
                        <button class="read-more-btn">View all</button>
                        <script src="viewall.js"></script>
                        <span style="color:#12d359;  font-weight: 500;"><strong>Recent</strong></span>
                        <h2><b>All Properties </b></h2>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit<br> Accusantium,Lorem ipsum dolor sit
                            ametconsectetur adipisicing elit. Doloremque ex quo reiciendis minus explicabo </p>

                    </div>

                    <div class="properties-container1 container">
                        <!-- box 1 -->
                        <div class="box residential Apartment 1bhk newhouse rent">
                            <div class="container" >
                                <div class="row card-item">
                                    <div class="col-md-5">
                                        <div id="carouselExampleControls" class="carousel slide"
                                            data-bs-ride="carousel">
                                            <div class="carousel-inner">
                                                <div class="carousel-item active">
                                                    <img src="img/p2.jpg" class="d-block w-100" alt="..." >
                                                </div>
                                                <div class="carousel-item">
                                                    <img src="img/p3.jpg" class="d-block w-100" alt="...">
                                                </div>
                                                <div class="carousel-item">
                                                    <img src="img/p5.jpg" class="d-block w-100" alt="...">
                                                </div>
                                            </div>
                                            <button class="carousel-control-prev" type="button"
                                                data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                                <span class="visually-hidden">Previous</span>
                                            </button>
                                            <button class="carousel-control-next" type="button"
                                                data-bs-target="#carouselExampleControls" data-bs-slide="next">
                                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                                <span class="visually-hidden">Next</span>
                                            </button>
                                        </div>

                                    </div>


                                    <div class="col-md-7">
                                        <br>
                                        <div> <p> <h7>1 BHK Apartment in <span class="location-right" ><b>Pune</b></span></h7></p></div>
                                        <i class="material-icons"  id="add-to-cart" >star</i>
                                        <h6 id="detail-title"><b>Maxima By Oberoi Reaity</b></h6><br>

                                        <div style="display: flex; ">
                                            <span id="price" ><h4><b>&#8377; 3.51-3.54cr</h4></b> </span> 
                                            <span id="area" style="position: relative; left:5rem;"> <h4><b>1,381-1,397<sub>sq.ft</sub></b></h4> </span> 
                                            <span id="bhk_right" style="position: relative; left:10rem;"> <h4><b>1 BHK</b></h4> </span> <br>
                                        </div><br>
                                        <div id="per_sq_ft">
                                            <h5 style="color: gray;"><b>&#8377;25.378/sq.ft</b></h5>
                                        </div><br>

                                       <p>Book Your 3 Bhk apartment in JVLR, Mumbai-Dahisar ...</p> 

                                     <a href="buyer.php"><button id="dealer"style="background:#0a5071;color:white;width:10rem;border-radius:2rem;">Contact Dealer</button></a>
                                    </div>
                                </div>
                            </div><br>
                        </div>
                        
                        <!-- box 2 -->
                        <div class="box residential Apartment 2bhk rent">
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-5">
                                        <div id="carouselExampleControls" class="carousel slide"
                                            data-bs-ride="carousel">
                                            <div class="carousel-inner">
                                                <div class="carousel-item active">
                                                    <img src="img/p2.jpg" class="d-block w-100" alt="...">
                                                </div>
                                                <div class="carousel-item">
                                                    <img src="img/p3.jpg" class="d-block w-100" alt="...">
                                                </div>
                                                <div class="carousel-item">
                                                    <img src="img/p5.jpg" class="d-block w-100" alt="...">
                                                </div>
                                            </div>
                                            <button class="carousel-control-prev" type="button"
                                                data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                                <span class="visually-hidden">Previous</span>
                                            </button>
                                            <button class="carousel-control-next" type="button"
                                                data-bs-target="#carouselExampleControls" data-bs-slide="next">
                                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                                <span class="visually-hidden">Next</span>
                                            </button>
                                        </div>

                                    </div>


                                    <div class="col-md-7">
                                        <br>
                                        <div> <p> <h7>2 BHK Apartment in <span class="location-right" id="cart_name"><b>Delhi</b></span></h7></p></div>
                                        <i class="material-icons" id="add-to-cart" >star</i>
                                        <h6 id="detail-title"><b>Maxima By Oberoi Reaity</b></h6><br>

                                        <div style="display: flex; ">
                                            <span id="price" ><h4><b>&#8377; 3.51-3.54cr</h4></b> </span> 
                                            <span id="area" style="position: relative; left:5rem;"> <h4><b>1,381-1,397<sub>sq.ft</sub></b></h4> </span> 
                                            <span id="bhk_right" style="position: relative; left:10rem;"> <h4><b>2 BHK</b></h4> </span> <br>
                                        </div><br>
                                        <div id="per_sq_ft">
                                            <h5 style="color: gray;"><b>&#8377;25.378/sq.ft</b></h5>
                                        </div><br>

                                       <p>Book Your 3 Bhk apartment in JVLR, Mumbai-Dahisar ...</p> 

                                       <a href="buyer.php"><button id="dealer"style="background:#0a5071;color:white;width:10rem;border-radius:2rem;">Contact Dealer</button></a>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- box 3 -->
                        <div class="box studio Apartment land housefarm 3bhk">
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-5">
                                        <div id="carouselExampleControls" class="carousel slide"
                                            data-bs-ride="carousel">
                                            <div class="carousel-inner">
                                                <div class="carousel-item active">
                                                    <img src="img/project1.jpg" class="d-block w-100" alt="...">
                                                </div>
                                                <div class="carousel-item">
                                                    <img src="img/project2.jpg" class="d-block w-100" alt="...">
                                                </div>
                                                <div class="carousel-item">
                                                    <img src="img/project3.jpg" class="d-block w-100" alt="...">
                                                </div>
                                            </div>
                                            <button class="carousel-control-prev" type="button"
                                                data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                                <span class="visually-hidden">Previous</span>
                                            </button>
                                            <button class="carousel-control-next" type="button"
                                                data-bs-target="#carouselExampleControls" data-bs-slide="next">
                                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                                <span class="visually-hidden">Next</span>
                                            </button>
                                        </div>

                                    </div>


                                    <div class="col-md-7">
                                        <br>
                                        <div> <p> <h7>3 BHK Apartment in <span class="location-right" id="cart_name"><b>Chennai</b></span></h7></p></div>
                                        <i class="material-icons" id="add-to-cart" >star</i>
                                        <h6 id="detail-title"><b>Maxima By Oberoi Reaity</b></h6><br>

                                        <div style="display: flex; ">
                                            <span id="price" ><h4><b>&#8377; 3.51-3.54cr</h4></b> </span> 
                                            <span id="area" style="position: relative; left:5rem;"> <h4><b>1,381-1,397<sub>sq.ft</sub></b></h4> </span> 
                                            <span id="bhk_right" style="position: relative; left:10rem;"> <h4><b>3 BHK</b></h4> </span> <br>
                                        </div><br>
                                        <div id="per_sq_ft">
                                            <h5 style="color: gray;"><b>&#8377;25.378/sq.ft</b></h5>
                                        </div><br>

                                       <p>Book Your 3 Bhk apartment in JVLR, Mumbai-Dahisar ...</p>
                                       
                                       <a href="buyer.php"><button id="dealer"style="background:#0a5071;color:white;width:10rem;border-radius:2rem;">Contact Dealer</button></a>

                                    </div>
                                </div>
                            </div>

                        </div>

                        <!-- box 3 .1-->
                        <div class="box land Residentialfloor housefarm 3bhk newhouse">
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-5">
                                        <div id="carouselExampleControls" class="carousel slide"
                                            data-bs-ride="carousel">
                                            <div class="carousel-inner">
                                                <div class="carousel-item active">
                                                    <img src="img/mumbai.jpg" class="d-block w-100" alt="...">
                                                </div>
                                                <div class="carousel-item">
                                                    <img src="img/project4.jpg" class="d-block w-100" alt="...">
                                                </div>
                                                <div class="carousel-item">
                                                    <img src="img/project5.jpg" class="d-block w-100" alt="...">
                                                </div>
                                            </div>
                                            <button class="carousel-control-prev" type="button"
                                                data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                                <span class="visually-hidden">Previous</span>
                                            </button>
                                            <button class="carousel-control-next" type="button"
                                                data-bs-target="#carouselExampleControls" data-bs-slide="next">
                                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                                <span class="visually-hidden">Next</span>
                                            </button>
                                        </div>

                                    </div>


                                    <div class="col-md-7">
                                        <br>
                                        <div> <p> <h7>3 BHK Apartment in <span class="location-right" id="cart_name"><b>Hyderabad</b></span></h7></p></div>
                                        <i class="material-icons" id="add-to-cart" >star</i>
                                        <h6 id="detail-title"><b>Maxima By Oberoi Reaity</b></h6><br>

                                        <div style="display: flex; ">
                                            <span id="price" ><h4><b>&#8377; 3.51-3.54cr</h4></b> </span> 
                                            <span id="area" style="position: relative; left:5rem;"> <h4><b>1,381-1,397<sub>sq.ft</sub></b></h4> </span> 
                                            <span id="bhk_right" style="position: relative; left:10rem;"> <h4><b>3 BHK</b></h4> </span> <br>
                                        </div><br>
                                        <div id="per_sq_ft">
                                            <h5 style="color: gray;"><b>&#8377;25.378/sq.ft</b></h5>
                                        </div><br>

                                       <p>Book Your 3 Bhk apartment in JVLR, Mumbai-Dahisar ...</p> 
                                       <a href="buyer.php"><button id="dealer"style="background:#0a5071;color:white;width:10rem;border-radius:2rem;">Contact Dealer</button></a>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <!-- box 4 -->
                        <span class="moreText">
                            <div class="box villa land housefarm 4bhk rent">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-md-5">
                                            <div id="carouselExampleControls" class="carousel slide"
                                                data-bs-ride="carousel">
                                                <div class="carousel-inner">
                                                    <div class="carousel-item active">
                                                        <img src="img/chennai.jpg" class="d-block w-100" alt="...">
                                                    </div>
                                                    <div class="carousel-item">
                                                        <img src="img/mumbai.jpg" class="d-block w-100" alt="...">
                                                    </div>
                                                    <div class="carousel-item">
                                                        <img src="img/kolkata.jpg" class="d-block w-100" alt="...">
                                                    </div>
                                                </div>
                                                <button class="carousel-control-prev" type="button"
                                                    data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                                    <span class="visually-hidden">Previous</span>
                                                </button>
                                                <button class="carousel-control-next" type="button"
                                                    data-bs-target="#carouselExampleControls" data-bs-slide="next">
                                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                                    <span class="visually-hidden">Next</span>
                                                </button>
                                            </div>

                                        </div>

                                        <div class="col-md-7">
                                            <br>
                                            <div> <p> <h7>4 BHK Apartment in <span class="location-right" id="cart_name"><b>Delhi</b></span></h7></p></div>
                                            <i class="material-icons" id="add-to-cart" >star</i>
                                            <h6 id="detail-title"><b>Maxima By Oberoi Reaity</b></h6><br>
    
                                            <div style="display: flex; ">
                                                <span id="price" ><h4><b>&#8377; 3.51-3.54cr</h4></b> </span> 
                                                <span id="area" style="position: relative; left:5rem;"> <h4><b>1,381-1,397<sub>sq.ft</sub></b></h4> </span> 
                                                <span id="bhk_right" style="position: relative; left:10rem;"> <h4><b>4 BHK</b></h4> </span> <br>
                                            </div><br>
                                            <div id="per_sq_ft">
                                                <h5 style="color: gray;"><b>&#8377;25.378/sq.ft</b></h5>
                                            </div><br>
    
                                           <p>Book Your 3 Bhk apartment in JVLR, Mumbai-Dahisar ...</p> 

                                           <a href="buyer.php"><button id="dealer"style="background:#0a5071;color:white;width:10rem;border-radius:2rem;">Contact Dealer</button></a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- box 5 -->
                            <div class="box villa builderfloor Residentialfloor 5bhk">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-md-5">
                                            <div id="carouselExampleControls" class="carousel slide"
                                                data-bs-ride="carousel">
                                                <div class="carousel-inner">
                                                    <div class="carousel-item active">
                                                        <img src="img/chennai.jpg" class="d-block w-100" alt="...">
                                                    </div>
                                                    <div class="carousel-item">
                                                        <img src="img/project5.jpg" class="d-block w-100" alt="...">
                                                    </div>
                                                    <div class="carousel-item">
                                                        <img src="img/project7.jpg" class="d-block w-100" alt="...">
                                                    </div>
                                                </div>
                                                <button class="carousel-control-prev" type="button"
                                                    data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                                    <span class="visually-hidden">Previous</span>
                                                </button>
                                                <button class="carousel-control-next" type="button"
                                                    data-bs-target="#carouselExampleControls" data-bs-slide="next">
                                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                                    <span class="visually-hidden">Next</span>
                                                </button>
                                            </div>

                                        </div>

                                        <div class="col-md-7">
                                            <br>
                                        <div> <p> <h7>5 BHK Apartment in <span class="location-right" id="cart_name"><b>Kolkata</b></span></h7></p></div>
                                        <i class="material-icons" id="add-to-cart" >star</i>
                                        <h6 id="detail-title"><b>Maxima By Oberoi Reaity</b></h6><br>

                                        <div style="display: flex; ">
                                            <span id="price" ><h4><b>&#8377; 3.51-3.54cr</h4></b> </span> 
                                            <span id="area" style="position: relative; left:5rem;"> <h4><b>1,381-1,397<sub>sq.ft</sub></b></h4> </span> 
                                            <span id="bhk_right" style="position: relative; left:10rem;"> <h4><b>5 BHK</b></h4> </span> <br>
                                        </div><br>
                                        <div id="per_sq_ft">
                                            <h5 style="color: gray;"><b>&#8377;25.378/sq.ft</b></h5>
                                        </div><br>

                                       <p>Book Your 3 Bhk apartment in JVLR, Mumbai-Dahisar ...</p> 

                                       <a href="buyer.php"><button id="dealer"style="background:#0a5071;color:white;width:10rem;border-radius:2rem;">Contact Dealer</button></a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- box 6 -->

                            <div class="box land builderfloor Residentialfloor 6bhk">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-md-5">
                                            <div id="carouselExampleControls" class="carousel slide"
                                                data-bs-ride="carousel">
                                                <div class="carousel-inner">
                                                    <div class="carousel-item active">
                                                        <img src="img/delhi1.jpg" class="d-block w-100" alt="...">
                                                    </div>
                                                    <div class="carousel-item">
                                                        <img src="img/kolkata.jpg" class="d-block w-100" alt="...">
                                                    </div>
                                                    <div class="carousel-item">
                                                        <img src="img/hyderabad.jpg" class="d-block w-100" alt="...">
                                                    </div>
                                                </div>
                                                <button class="carousel-control-prev" type="button"
                                                    data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                                    <span class="visually-hidden">Previous</span>
                                                </button>
                                                <button class="carousel-control-next" type="button"
                                                    data-bs-target="#carouselExampleControls" data-bs-slide="next">
                                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                                    <span class="visually-hidden">Next</span>
                                                </button>
                                            </div>

                                        </div>

                                        <div class="col-md-7">
                                            <br>
                                            <div> <p> <h7>6 BHK Apartment in <span class="location-right" id="cart_name"><b>Banglore</b></span></h7></p></div>
                                            <i class="material-icons" id="add-to-cart" >star</i>
                                            <h6 id="detail-title"><b>Maxima By Oberoi Reaity</b></h6><br>
    
                                            <div style="display: flex; ">
                                                <span id="price" ><h4><b>&#8377; 3.51-3.54cr</h4></b> </span> 
                                                <span id="area" style="position: relative; left:5rem;"> <h4><b>1,381-1,397<sub>sq.ft</sub></b></h4> </span> 
                                                <span id="bhk_right" style="position: relative; left:10rem;"> <h4><b>6 BHK</b></h4> </span> <br>
                                            </div><br>
                                            <div id="per_sq_ft">
                                                <h5 style="color: gray;"><b>&#8377;25.378/sq.ft</b></h5>
                                            </div><br>
    
                                           <p>Book Your 3 Bhk apartment in JVLR, Mumbai-Dahisar ...</p> 

                                           <a href="buyer.php"><button id="dealer"style="background:#0a5071;color:white;width:10rem;border-radius:2rem;">Contact Dealer</button></a>

                                        </div>
                                    </div>
                                </div>
                            </div>

                                <!-- box 7 -->

                                <div class="box land builderfloor Residentialfloor 7bhk">
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-md-5">
                                                <div id="carouselExampleControls" class="carousel slide"
                                                    data-bs-ride="carousel">
                                                    <div class="carousel-inner">
                                                        <div class="carousel-item active">
                                                            <img src="img/delhi1.jpg" class="d-block w-100" alt="...">
                                                        </div>
                                                        <div class="carousel-item">
                                                            <img src="img/kolkata.jpg" class="d-block w-100" alt="...">
                                                        </div>
                                                        <div class="carousel-item">
                                                            <img src="img/hyderabad.jpg" class="d-block w-100" alt="...">
                                                        </div>
                                                    </div>
                                                    <button class="carousel-control-prev" type="button"
                                                        data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                                                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                                        <span class="visually-hidden">Previous</span>
                                                    </button>
                                                    <button class="carousel-control-next" type="button"
                                                        data-bs-target="#carouselExampleControls" data-bs-slide="next">
                                                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                                        <span class="visually-hidden">Next</span>
                                                    </button>
                                                </div>
    
                                            </div>
    
                                            <div class="col-md-7">
                                                <br>
                                                <div> <p> <h7>7 BHK Apartment in <span class="location-right" id="cart_name"><b>Manipur</b></span></h7></p></div>
                                                <i class="material-icons" id="add-to-cart" >star</i>
                                                <h6 id="detail-title"><b>Maxima By Oberoi Reaity</b></h6><br>
        
                                                <div style="display: flex; ">
                                                    <span id="price" ><h4><b>&#8377; 3.51-3.54cr</h4></b> </span> 
                                                    <span id="area" style="position: relative; left:5rem;"> <h4><b>1,381-1,397<sub>sq.ft</sub></b></h4> </span> 
                                                    <span id="bhk_right" style="position: relative; left:10rem;"> <h4><b>7 BHK</b></h4> </span> <br>
                                                </div><br>
                                                <div id="per_sq_ft">
                                                    <h5 style="color: gray;"><b>&#8377;25.378/sq.ft</b></h5>
                                                </div><br>
        
                                               <p>Book Your 3 Bhk apartment in JVLR, Mumbai-Dahisar ...</p>
                                               
                                               <a href="buyer.php"><button id="dealer"style="background:#0a5071;color:white;width:10rem;border-radius:2rem;">Contact Dealer</button></a>

                                            </div>
                                        </div>
                                    </div>
                                </div>

                                    <!-- box 8-->

                            <div class="box land builderfloor Residentialfloor 8bhk ">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-md-5">
                                            <div id="carouselExampleControls" class="carousel slide"
                                                data-bs-ride="carousel">
                                                <div class="carousel-inner">
                                                    <div class="carousel-item active">
                                                        <img src="img/project5.jpg" class="d-block w-100" alt="...">
                                                    </div>
                                                    <div class="carousel-item">
                                                        <img src="img/project7.jpg" class="d-block w-100" alt="...">
                                                    </div>
                                                    <div class="carousel-item">
                                                        <img src="img/project4.jpg" class="d-block w-100" alt="...">
                                                    </div>
                                                </div>
                                                <button class="carousel-control-prev" type="button"
                                                    data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                                    <span class="visually-hidden">Previous</span>
                                                </button>
                                                <button class="carousel-control-next" type="button"
                                                    data-bs-target="#carouselExampleControls" data-bs-slide="next">
                                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                                    <span class="visually-hidden">Next</span>
                                                </button>
                                            </div>

                                        </div>

                                        <div class="col-md-7">
                                            <br>
                                            <div> <p> <h7>8 BHK Apartment in <span class="location-right" id="cart_name"><b>Tamil Nadu</b></span></h7></p></div>
                                            <i class="material-icons" id="add-to-cart" >star</i>
                                            <h6 id="detail-title"><b>Maxima By Oberoi Reaity</b></h6><br>
    
                                            <div style="display: flex; ">
                                                <span id="price" ><h4><b>&#8377; 3.51-3.54cr</h4></b> </span> 
                                                <span id="area" style="position: relative; left:5rem;"> <h4><b>1,381-1,397<sub>sq.ft</sub></b></h4> </span> 
                                                <span id="bhk_right" style="position: relative; left:10rem;"> <h4><b>8 BHK</b></h4> </span> <br>
                                            </div><br>
                                            <div id="per_sq_ft">
                                                <h5 style="color: gray;"><b>&#8377;25.378/sq.ft</b></h5>
                                            </div><br>
    
                                           <p>Book Your 3 Bhk apartment in JVLR, Mumbai-Dahisar ...</p> 

                                           <a href="buyer.php"><button id="dealer"style="background:#0a5071;color:white;width:10rem;border-radius:2rem;">Contact Dealer</button></a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                                <!-- box 9 -->

                                <div class="box land builderfloor Residentialfloor 9bhk rent">
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-md-5">
                                                <div id="carouselExampleControls" class="carousel slide"
                                                    data-bs-ride="carousel">
                                                    <div class="carousel-inner">
                                                        <div class="carousel-item active">
                                                            <img src="img/p1.jpg" class="d-block w-100" alt="...">
                                                        </div>
                                                        <div class="carousel-item">
                                                            <img src="img/p2.jpg" class="d-block w-100" alt="...">
                                                        </div>
                                                        <div class="carousel-item">
                                                            <img src="img/p3.jpg" class="d-block w-100" alt="...">
                                                        </div>
                                                    </div>
                                                    <button class="carousel-control-prev" type="button"
                                                        data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                                                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                                        <span class="visually-hidden">Previous</span>
                                                    </button>
                                                    <button class="carousel-control-next" type="button"
                                                        data-bs-target="#carouselExampleControls" data-bs-slide="next">
                                                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                                        <span class="visually-hidden">Next</span>
                                                    </button>
                                                </div>
    
                                            </div>
    
                                            <div class="col-md-7">
                                                <br>
                                                <div> <p> <h7>9 BHK Apartment in <span class="location-right" id="cart_name"><b>Madhya Pradesh</b></span></h7></p></div>
                                                <i class="material-icons" id="add-to-cart" >star</i>
                                                <h6 id="detail-title"><b>Maxima By Oberoi Reaity</b></h6><br>
        
                                                <div style="display: flex; ">
                                                    <span id="price" ><h4><b>&#8377; 3.51-3.54cr</h4></b> </span> 
                                                    <span id="area" style="position: relative; left:5rem;"> <h4><b>1,381-1,397<sub>sq.ft</sub></b></h4> </span> 
                                                    <span id="bhk_right" style="position: relative; left:10rem;"> <h4><b>9 BHK</b></h4> </span> <br>
                                                </div><br>
                                                <div id="per_sq_ft">
                                                    <h5 style="color: gray;"><b>&#8377;25.378/sq.ft</b></h5>
                                                </div><br>
        
                                               <p>Book Your 3 Bhk apartment in JVLR, Mumbai-Dahisar ...</p> 
                                               <a href="buyer.php"><button id="dealer"style="background:#0a5071;color:white;width:10rem;border-radius:2rem;">Contact Dealer</button></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                        </span>
                    </div>
                </section>
                <br>

        


                <!-- all cities -->
                <div class="citiroll" id="hotcities" style="  width: 100%;  background: #FFFCFC; border-radius: 1rem;">

                    <section class="new box">
                        <div id="services">

                            <h2>EXPOLRE POPULAR CITIES</h2>
                            <p><strong>Buy or Rent properties in top cities</strong></p>
                            <div class="content">
                                <div class="card circle">
                                    <a href="#delhi"> <img src="img/delhi1.jpg" alt=""></a>
                                    <div class="text">
                                        <h3>Delhi/NCR</h3>
                                    </div>
                                </div>
                                <div class="card circle">
                                    <a href="#mumbai"> <img src="img/mumbai.jpg" alt=""></a>
                                    <div class="text">
                                        <h3>Mumbai</h3>
                                    </div>
                                </div>
                                <div class="card circle">
                                    <a href="#bangalore"> <img src="img/bangalore.jpg" alt=""></a>
                                    <div class="text">
                                        <h3>Banglore</h3>
                                    </div>
                                </div>

                                <div class="card circle">
                                    <a href="#hyderabad"> <img src="img/hyderabad.jpg" alt=""></a>
                                    <div class="text">
                                        <h3>Hyderabad</h3>
                                    </div>
                                </div>
                                <div class="card circle">
                                    <a href="#pune"> <img src="img/pune.jpg" alt=""></a>
                                    <div class="text">
                                        <h3>Pune</h3>
                                    </div>
                                </div>
                                <div class="card circle">
                                    <a href="#kolkata"> <img src="img/kolkata.jpg" alt=""></a>
                                    <div class="text">
                                        <h3>Kolkata</h3>
                                    </div>
                                </div>
                                <div class="card circle">
                                    <a href="#chennai"> <img src="img/chennai.jpg" alt=""></a>
                                    <div class="text">
                                        <h3>Chennai</h3>
                                    </div>
                                </div>
                                <div class="card circle">
                                    <a href="#ahem"> <img src="img/ahem.jpg" alt=""></a>
                                    <div class="text">
                                        <h3>Ahemdabad</h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>

                </div>

                <!-- Projects -->

                <div class="project-section box" id="projects"
                    style="width:100%; background: white; margin-top: 2rem; border-radius: 1rem; height: 800px;">
                    <section id="slider" class="pt-5">
                        <div class="container">
                            <h1 class="text-center"><b>Top Projects</b></h1>
                            <div class="slider">
                                <div class="owl-carousel">
                                    <div class="slider-card">
                                        <div class="d-flex justify-content-center align-items-center mb-4">
                                            <img src="img/project5.jpg" alt="">
                                        </div>
                                        <h5 class="mb-0 text-center"><b>Project 1</b></h5>
                                        <p class="text-center p-4">Lorem ipsum dolor sit amet, consectetur adipisicing
                                            elit. Ipsam temporibus quidem magni qui doloribus quasi natus inventore nisi
                                            velit minima.</p>
                                    </div>
                                    <div class="slider-card">
                                        <div class="d-flex justify-content-center align-items-center mb-4">
                                            <img src="img/project1.jpg" alt="">
                                        </div>
                                        <h5 class="mb-0 text-center"><b>Project 2</b></h5>
                                        <p class="text-center p-4">Lorem ipsum dolor sit amet, consectetur adipisicing
                                            elit. Ipsam temporibus quidem magni qui doloribus quasi natus inventore nisi
                                            velit minima.</p>
                                    </div>
                                    <div class="slider-card">
                                        <div class="d-flex justify-content-center align-items-center mb-4">
                                            <img src="img/project2.jpg" alt="">
                                        </div>
                                        <h5 class="mb-0 text-center"><b>Project 3</b></h5>
                                        <p class="text-center p-4">Lorem ipsum dolor sit amet, consectetur adipisicing
                                            elit. Ipsam temporibus quidem magni qui doloribus quasi natus inventore nisi
                                            velit minima.</p>
                                    </div>
                                    <div class="slider-card">
                                        <div class="d-flex justify-content-center align-items-center mb-4">
                                            <img src="img/project3.jpg" alt="">
                                        </div>
                                        <h5 class="mb-0 text-center"><b>Project 5</b></h5>
                                        <p class="text-center p-4">Lorem ipsum dolor sit amet, consectetur adipisicing
                                            elit. Ipsam temporibus quidem magni qui doloribus quasi natus inventore nisi
                                            velit minima.</p>
                                    </div>
                                    <div class="slider-card">
                                        <div class="d-flex justify-content-center align-items-center mb-4">
                                            <img src="img/project4.jpg" alt="">
                                        </div>
                                        <h5 class="mb-0 text-center"><b>Project 6</b></h5>
                                        <p class="text-center p-4">Lorem ipsum dolor sit amet, consectetur adipisicing
                                            elit. Ipsam temporibus quidem magni qui doloribus quasi natus inventore nisi
                                            velit minima.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
                    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
                    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"></script>
                    <script src="js/owl.carousel.min.js"></script>
                    <script src="js/script.js"></script>

                </div>
                <br><br>


                <!-- delhi -->
                <section class="properties1 container" id="properties">
                    <div class="heading" id="delhi">
                        <button class="read-more-btn">View all</button>

                        <h2><b>Delhi/NCR </b></h2>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit<br> Accusantium,Lorem ipsum dolor
                            sit
                            amet consectetur adipisicing elit. Doloremque ex quo reiciendis minus explicabo </p>

                    </div>

                    <div class="properties-container1 container">
                        <!-- box 1 -->
                        <div class="box residential Apartment 1bhk newhouse rent">
                            <div class="container" >
                                <div class="row card-item">
                                    <div class="col-md-5">
                                        <div id="carouselExampleControls" class="carousel slide"
                                            data-bs-ride="carousel">
                                            <div class="carousel-inner">
                                                <div class="carousel-item active">
                                                    <img src="img/p2.jpg" class="d-block w-100" alt="..." >
                                                </div>
                                                <div class="carousel-item">
                                                    <img src="img/p3.jpg" class="d-block w-100" alt="...">
                                                </div>
                                                <div class="carousel-item">
                                                    <img src="img/p5.jpg" class="d-block w-100" alt="...">
                                                </div>
                                            </div>
                                            <button class="carousel-control-prev" type="button"
                                                data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                                <span class="visually-hidden">Previous</span>
                                            </button>
                                            <button class="carousel-control-next" type="button"
                                                data-bs-target="#carouselExampleControls" data-bs-slide="next">
                                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                                <span class="visually-hidden">Next</span>
                                            </button>
                                        </div>

                                    </div>


                                    <div class="col-md-7">
                                        <br>
                                        <div> <p> <h7>1 BHK Apartment in <span class="location-right" ><b>Delhi</b></span></h7></p></div>
                                        <i class="material-icons"  id="add-to-cart" >star</i>
                                        <h6 id="detail-title"><b>Maxima By Oberoi Reaity</b></h6><br>

                                        <div style="display: flex; ">
                                            <span id="price" ><h4><b>&#8377; 3.51-3.54cr</h4></b> </span> 
                                            <span id="area" style="position: relative; left:5rem;"> <h4><b>1,381-1,397<sub>sq.ft</sub></b></h4> </span> 
                                            <span id="bhk_right" style="position: relative; left:10rem;"> <h4><b>1 BHK</b></h4> </span> <br>
                                        </div><br>
                                        <div id="per_sq_ft">
                                            <h5 style="color: gray;"><b>&#8377;25.378/sq.ft</b></h5>
                                        </div><br>

                                       <p>Book Your 3 Bhk apartment in JVLR, Mumbai-Dahisar ...</p> 
                                       <a href="buyer.php"><button id="dealer"style="background:#0a5071;color:white;width:10rem;border-radius:2rem;">Contact Dealer</button></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- box 2 -->
                        <div class="box residential Apartment 2bhk newhouse">
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-5">
                                        <div id="carouselExampleControls" class="carousel slide"
                                            data-bs-ride="carousel">
                                            <div class="carousel-inner">
                                                <div class="carousel-item active">
                                                    <img src="img/p2.jpg" class="d-block w-100" alt="...">
                                                </div>
                                                <div class="carousel-item">
                                                    <img src="img/p3.jpg" class="d-block w-100" alt="...">
                                                </div>
                                                <div class="carousel-item">
                                                    <img src="img/p5.jpg" class="d-block w-100" alt="...">
                                                </div>
                                            </div>
                                            <button class="carousel-control-prev" type="button"
                                                data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                                <span class="visually-hidden">Previous</span>
                                            </button>
                                            <button class="carousel-control-next" type="button"
                                                data-bs-target="#carouselExampleControls" data-bs-slide="next">
                                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                                <span class="visually-hidden">Next</span>
                                            </button>
                                        </div>

                                    </div>


                                    <div class="col-md-7">
                                        <br>
                                        <div> <p> <h7>2 BHK Apartment in <span class="location-right" id="cart_name"><b>NCR</b></span></h7></p></div>
                                        <i class="material-icons" id="add-to-cart" >star</i>
                                        <h6 id="detail-title"><b>Maxima By Oberoi Reaity</b></h6><br>

                                        <div style="display: flex; ">
                                            <span id="price" ><h4><b>&#8377; 3.51-3.54cr</h4></b> </span> 
                                            <span id="area" style="position: relative; left:5rem;"> <h4><b>1,381-1,397<sub>sq.ft</sub></b></h4> </span> 
                                            <span id="bhk_right" style="position: relative; left:10rem;"> <h4><b>2 BHK</b></h4> </span> <br>
                                        </div><br>
                                        <div id="per_sq_ft">
                                            <h5 style="color: gray;"><b>&#8377;25.378/sq.ft</b></h5>
                                        </div><br>

                                       <p>Book Your 3 Bhk apartment in JVLR, Mumbai-Dahisar ...</p> 
                                       <a href="buyer.php"><button id="dealer"style="background:#0a5071;color:white;width:10rem;border-radius:2rem;">Contact Dealer</button></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- box 3 -->
                        <div class="box studio Apartment land housefarm 3bhk rent">
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-5">
                                        <div id="carouselExampleControls" class="carousel slide"
                                            data-bs-ride="carousel">
                                            <div class="carousel-inner">
                                                <div class="carousel-item active">
                                                    <img src="img/project1.jpg" class="d-block w-100" alt="...">
                                                </div>
                                                <div class="carousel-item">
                                                    <img src="img/project2.jpg" class="d-block w-100" alt="...">
                                                </div>
                                                <div class="carousel-item">
                                                    <img src="img/project3.jpg" class="d-block w-100" alt="...">
                                                </div>
                                            </div>
                                            <button class="carousel-control-prev" type="button"
                                                data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                                <span class="visually-hidden">Previous</span>
                                            </button>
                                            <button class="carousel-control-next" type="button"
                                                data-bs-target="#carouselExampleControls" data-bs-slide="next">
                                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                                <span class="visually-hidden">Next</span>
                                            </button>
                                        </div>

                                    </div>


                                    <div class="col-md-7">
                                        <br>
                                        <div> <p> <h7>3 BHK Apartment in <span class="location-right" id="cart_name"><b>Delhi</b></span></h7></p></div>
                                        <i class="material-icons" id="add-to-cart" >star</i>
                                        <h6 id="detail-title"><b>Maxima By Oberoi Reaity</b></h6><br>

                                        <div style="display: flex; ">
                                            <span id="price" ><h4><b>&#8377; 3.51-3.54cr</h4></b> </span> 
                                            <span id="area" style="position: relative; left:5rem;"> <h4><b>1,381-1,397<sub>sq.ft</sub></b></h4> </span> 
                                            <span id="bhk_right" style="position: relative; left:10rem;"> <h4><b>3 BHK</b></h4> </span> <br>
                                        </div><br>
                                        <div id="per_sq_ft">
                                            <h5 style="color: gray;"><b>&#8377;25.378/sq.ft</b></h5>
                                        </div><br>

                                       <p>Book Your 3 Bhk apartment in JVLR, Mumbai-Dahisar ...</p> 
                                       <a href="buyer.php"><button id="dealer"style="background:#0a5071;color:white;width:10rem;border-radius:2rem;">Contact Dealer</button></a>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <!-- box 3 .1-->
                        <div class="box land Residentialfloor housefarm 3bhk rent">
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-5">
                                        <div id="carouselExampleControls" class="carousel slide"
                                            data-bs-ride="carousel">
                                            <div class="carousel-inner">
                                                <div class="carousel-item active">
                                                    <img src="img/mumbai.jpg" class="d-block w-100" alt="...">
                                                </div>
                                                <div class="carousel-item">
                                                    <img src="img/project4.jpg" class="d-block w-100" alt="...">
                                                </div>
                                                <div class="carousel-item">
                                                    <img src="img/project5.jpg" class="d-block w-100" alt="...">
                                                </div>
                                            </div>
                                            <button class="carousel-control-prev" type="button"
                                                data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                                <span class="visually-hidden">Previous</span>
                                            </button>
                                            <button class="carousel-control-next" type="button"
                                                data-bs-target="#carouselExampleControls" data-bs-slide="next">
                                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                                <span class="visually-hidden">Next</span>
                                            </button>
                                        </div>

                                    </div>


                                    <div class="col-md-7">
                                        <br>
                                        <div> <p> <h7>3 BHK Apartment in <span class="location-right" id="cart_name"><b>Delhi</b></span></h7></p></div>
                                        <i class="material-icons" id="add-to-cart" >star</i>
                                        <h6 id="detail-title"><b>Maxima By Oberoi Reaity</b></h6><br>

                                        <div style="display: flex; ">
                                            <span id="price" ><h4><b>&#8377; 3.51-3.54cr</h4></b> </span> 
                                            <span id="area" style="position: relative; left:5rem;"> <h4><b>1,381-1,397<sub>sq.ft</sub></b></h4> </span> 
                                            <span id="bhk_right" style="position: relative; left:10rem;"> <h4><b>3 BHK</b></h4> </span> <br>
                                        </div><br>
                                        <div id="per_sq_ft">
                                            <h5 style="color: gray;"><b>&#8377;25.378/sq.ft</b></h5>
                                        </div><br>

                                       <p>Book Your 3 Bhk apartment in JVLR, Mumbai-Dahisar ...</p> 
                                       <a href="buyer.php"><button id="dealer"style="background:#0a5071;color:white;width:10rem;border-radius:2rem;">Contact Dealer</button></a>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <!-- box 4 -->
                        <span class="more">
                            <div class="box villa land housefarm 4bhk">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-md-5">
                                            <div id="carouselExampleControls" class="carousel slide"
                                                data-bs-ride="carousel">
                                                <div class="carousel-inner">
                                                    <div class="carousel-item active">
                                                        <img src="img/chennai.jpg" class="d-block w-100" alt="...">
                                                    </div>
                                                    <div class="carousel-item">
                                                        <img src="img/mumbai.jpg" class="d-block w-100" alt="...">
                                                    </div>
                                                    <div class="carousel-item">
                                                        <img src="img/kolkata.jpg" class="d-block w-100" alt="...">
                                                    </div>
                                                </div>
                                                <button class="carousel-control-prev" type="button"
                                                    data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                                    <span class="visually-hidden">Previous</span>
                                                </button>
                                                <button class="carousel-control-next" type="button"
                                                    data-bs-target="#carouselExampleControls" data-bs-slide="next">
                                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                                    <span class="visually-hidden">Next</span>
                                                </button>
                                            </div>

                                        </div>

                                        <div class="col-md-7">
                                            <br>
                                            <div> <p> <h7>4 BHK Apartment in <span class="location-right" id="cart_name"><b>Delhi</b></span></h7></p></div>
                                            <i class="material-icons" id="add-to-cart" >star</i>
                                            <h6 id="detail-title"><b>Maxima By Oberoi Reaity</b></h6><br>
    
                                            <div style="display: flex; ">
                                                <span id="price" ><h4><b>&#8377; 3.51-3.54cr</h4></b> </span> 
                                                <span id="area" style="position: relative; left:5rem;"> <h4><b>1,381-1,397<sub>sq.ft</sub></b></h4> </span> 
                                                <span id="bhk_right" style="position: relative; left:10rem;"> <h4><b>4 BHK</b></h4> </span> <br>
                                            </div><br>
                                            <div id="per_sq_ft">
                                                <h5 style="color: gray;"><b>&#8377;25.378/sq.ft</b></h5>
                                            </div><br>
    
                                           <p>Book Your 3 Bhk apartment in JVLR, Mumbai-Dahisar ...</p>
                                           
                                           <a href="buyer.php"><button id="dealer"style="background:#0a5071;color:white;width:10rem;border-radius:2rem;">Contact Dealer</button></a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- box 5 -->
                            <div class="box villa builderfloor Residentialfloor 5bhk">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-md-5">
                                            <div id="carouselExampleControls" class="carousel slide"
                                                data-bs-ride="carousel">
                                                <div class="carousel-inner">
                                                    <div class="carousel-item active">
                                                        <img src="img/chennai.jpg" class="d-block w-100" alt="...">
                                                    </div>
                                                    <div class="carousel-item">
                                                        <img src="img/project5.jpg" class="d-block w-100" alt="...">
                                                    </div>
                                                    <div class="carousel-item">
                                                        <img src="img/project7.jpg" class="d-block w-100" alt="...">
                                                    </div>
                                                </div>
                                                <button class="carousel-control-prev" type="button"
                                                    data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                                    <span class="visually-hidden">Previous</span>
                                                </button>
                                                <button class="carousel-control-next" type="button"
                                                    data-bs-target="#carouselExampleControls" data-bs-slide="next">
                                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                                    <span class="visually-hidden">Next</span>
                                                </button>
                                            </div>

                                        </div>

                                        <div class="col-md-7">
                                            <br>
                                        <div> <p> <h7>5 BHK Apartment in <span class="location-right" id="cart_name"><b>Delhi</b></span></h7></p></div>
                                        <i class="material-icons" id="add-to-cart" >star</i>
                                        <h6 id="detail-title"><b>Maxima By Oberoi Reaity</b></h6><br>

                                        <div style="display: flex; ">
                                            <span id="price" ><h4><b>&#8377; 3.51-3.54cr</h4></b> </span> 
                                            <span id="area" style="position: relative; left:5rem;"> <h4><b>1,381-1,397<sub>sq.ft</sub></b></h4> </span> 
                                            <span id="bhk_right" style="position: relative; left:10rem;"> <h4><b>5 BHK</b></h4> </span> <br>
                                        </div><br>
                                        <div id="per_sq_ft">
                                            <h5 style="color: gray;"><b>&#8377;25.378/sq.ft</b></h5>
                                        </div><br>

                                       <p>Book Your 3 Bhk apartment in JVLR, Mumbai-Dahisar ...</p> 
                                       <a href="buyer.php"><button id="dealer"style="background:#0a5071;color:white;width:10rem;border-radius:2rem;">Contact Dealer</button></a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- box 6 -->

                            <div class="box land builderfloor Residentialfloor 6bhk">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-md-5">
                                            <div id="carouselExampleControls" class="carousel slide"
                                                data-bs-ride="carousel">
                                                <div class="carousel-inner">
                                                    <div class="carousel-item active">
                                                        <img src="img/delhi1.jpg" class="d-block w-100" alt="...">
                                                    </div>
                                                    <div class="carousel-item">
                                                        <img src="img/kolkata.jpg" class="d-block w-100" alt="...">
                                                    </div>
                                                    <div class="carousel-item">
                                                        <img src="img/hyderabad.jpg" class="d-block w-100" alt="...">
                                                    </div>
                                                </div>
                                                <button class="carousel-control-prev" type="button"
                                                    data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                                    <span class="visually-hidden">Previous</span>
                                                </button>
                                                <button class="carousel-control-next" type="button"
                                                    data-bs-target="#carouselExampleControls" data-bs-slide="next">
                                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                                    <span class="visually-hidden">Next</span>
                                                </button>
                                            </div>

                                        </div>

                                        <div class="col-md-7">
                                            <br>
                                            <div> <p> <h7>6 BHK Apartment in <span class="location-right" id="cart_name"><b>Delhi</b></span></h7></p></div>
                                            <i class="material-icons" id="add-to-cart" >star</i>
                                            <h6 id="detail-title"><b>Maxima By Oberoi Reaity</b></h6><br>
    
                                            <div style="display: flex; ">
                                                <span id="price" ><h4><b>&#8377; 3.51-3.54cr</h4></b> </span> 
                                                <span id="area" style="position: relative; left:5rem;"> <h4><b>1,381-1,397<sub>sq.ft</sub></b></h4> </span> 
                                                <span id="bhk_right" style="position: relative; left:10rem;"> <h4><b>6 BHK</b></h4> </span> <br>
                                            </div><br>
                                            <div id="per_sq_ft">
                                                <h5 style="color: gray;"><b>&#8377;25.378/sq.ft</b></h5>
                                            </div><br>
    
                                           <p>Book Your 3 Bhk apartment in JVLR, Mumbai-Dahisar ...</p>
                                           <a href="buyer.php"><button id="dealer"style="background:#0a5071;color:white;width:10rem;border-radius:2rem;">Contact Dealer</button></a> 
                                        </div>
                                    </div>
                                </div>
                            </div>

                                <!-- box 7 -->

                                <div class="box land builderfloor Residentialfloor 7bhk rent">
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-md-5">
                                                <div id="carouselExampleControls" class="carousel slide"
                                                    data-bs-ride="carousel">
                                                    <div class="carousel-inner">
                                                        <div class="carousel-item active">
                                                            <img src="img/delhi1.jpg" class="d-block w-100" alt="...">
                                                        </div>
                                                        <div class="carousel-item">
                                                            <img src="img/kolkata.jpg" class="d-block w-100" alt="...">
                                                        </div>
                                                        <div class="carousel-item">
                                                            <img src="img/hyderabad.jpg" class="d-block w-100" alt="...">
                                                        </div>
                                                    </div>
                                                    <button class="carousel-control-prev" type="button"
                                                        data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                                                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                                        <span class="visually-hidden">Previous</span>
                                                    </button>
                                                    <button class="carousel-control-next" type="button"
                                                        data-bs-target="#carouselExampleControls" data-bs-slide="next">
                                                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                                        <span class="visually-hidden">Next</span>
                                                    </button>
                                                </div>
    
                                            </div>
    
                                            <div class="col-md-7">
                                                <br>
                                                <div> <p> <h7>7 BHK Apartment in <span class="location-right" id="cart_name"><b>Delhi</b></span></h7></p></div>
                                                <i class="material-icons" id="add-to-cart" >star</i>
                                                <h6 id="detail-title"><b>Maxima By Oberoi Reaity</b></h6><br>
        
                                                <div style="display: flex; ">
                                                    <span id="price" ><h4><b>&#8377; 3.51-3.54cr</h4></b> </span> 
                                                    <span id="area" style="position: relative; left:5rem;"> <h4><b>1,381-1,397<sub>sq.ft</sub></b></h4> </span> 
                                                    <span id="bhk_right" style="position: relative; left:10rem;"> <h4><b>7 BHK</b></h4> </span> <br>
                                                </div><br>
                                                <div id="per_sq_ft">
                                                    <h5 style="color: gray;"><b>&#8377;25.378/sq.ft</b></h5>
                                                </div><br>
        
                                               <p>Book Your 3 Bhk apartment in JVLR, Mumbai-Dahisar ...</p> 
                                               <a href="buyer.php"><button id="dealer"style="background:#0a5071;color:white;width:10rem;border-radius:2rem;">Contact Dealer</button></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                    <!-- box 8-->

                            <div class="box land builderfloor Residentialfloor 8bhk">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-md-5">
                                            <div id="carouselExampleControls" class="carousel slide"
                                                data-bs-ride="carousel">
                                                <div class="carousel-inner">
                                                    <div class="carousel-item active">
                                                        <img src="img/project5.jpg" class="d-block w-100" alt="...">
                                                    </div>
                                                    <div class="carousel-item">
                                                        <img src="img/project7.jpg" class="d-block w-100" alt="...">
                                                    </div>
                                                    <div class="carousel-item">
                                                        <img src="img/project4.jpg" class="d-block w-100" alt="...">
                                                    </div>
                                                </div>
                                                <button class="carousel-control-prev" type="button"
                                                    data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                                    <span class="visually-hidden">Previous</span>
                                                </button>
                                                <button class="carousel-control-next" type="button"
                                                    data-bs-target="#carouselExampleControls" data-bs-slide="next">
                                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                                    <span class="visually-hidden">Next</span>
                                                </button>
                                            </div>

                                        </div>

                                        <div class="col-md-7">
                                            <br>
                                            <div> <p> <h7>8 BHK Apartment in <span class="location-right" id="cart_name"><b>NCR</b></span></h7></p></div>
                                            <i class="material-icons" id="add-to-cart" >star</i>
                                            <h6 id="detail-title"><b>Maxima By Oberoi Reaity</b></h6><br>
    
                                            <div style="display: flex; ">
                                                <span id="price" ><h4><b>&#8377; 3.51-3.54cr</h4></b> </span> 
                                                <span id="area" style="position: relative; left:5rem;"> <h4><b>1,381-1,397<sub>sq.ft</sub></b></h4> </span> 
                                                <span id="bhk_right" style="position: relative; left:10rem;"> <h4><b>8 BHK</b></h4> </span> <br>
                                            </div><br>
                                            <div id="per_sq_ft">
                                                <h5 style="color: gray;"><b>&#8377;25.378/sq.ft</b></h5>
                                            </div><br>
    
                                           <p>Book Your 3 Bhk apartment in JVLR, Mumbai-Dahisar ...</p> 
                                           <a href="buyer.php"><button id="dealer"style="background:#0a5071;color:white;width:10rem;border-radius:2rem;">Contact Dealer</button></a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                                <!-- box 9 -->

                                <div class="box land builderfloor Residentialfloor 9bhk">
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-md-5">
                                                <div id="carouselExampleControls" class="carousel slide"
                                                    data-bs-ride="carousel">
                                                    <div class="carousel-inner">
                                                        <div class="carousel-item active">
                                                            <img src="img/p1.jpg" class="d-block w-100" alt="...">
                                                        </div>
                                                        <div class="carousel-item">
                                                            <img src="img/p2.jpg" class="d-block w-100" alt="...">
                                                        </div>
                                                        <div class="carousel-item">
                                                            <img src="img/p3.jpg" class="d-block w-100" alt="...">
                                                        </div>
                                                    </div>
                                                    <button class="carousel-control-prev" type="button"
                                                        data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                                                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                                        <span class="visually-hidden">Previous</span>
                                                    </button>
                                                    <button class="carousel-control-next" type="button"
                                                        data-bs-target="#carouselExampleControls" data-bs-slide="next">
                                                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                                        <span class="visually-hidden">Next</span>
                                                    </button>
                                                </div>
    
                                            </div>
    
                                            <div class="col-md-7">
                                                <br>
                                                <div> <p> <h7>9 BHK Apartment in <span class="location-right" id="cart_name"><b>Delhi</b></span></h7></p></div>
                                                <i class="material-icons" id="add-to-cart" >star</i>
                                                <h6 id="detail-title"><b>Maxima By Oberoi Reaity</b></h6><br>
        
                                                <div style="display: flex; ">
                                                    <span id="price" ><h4><b>&#8377; 3.51-3.54cr</h4></b> </span> 
                                                    <span id="area" style="position: relative; left:5rem;"> <h4><b>1,381-1,397<sub>sq.ft</sub></b></h4> </span> 
                                                    <span id="bhk_right" style="position: relative; left:10rem;"> <h4><b>9 BHK</b></h4> </span> <br>
                                                </div><br>
                                                <div id="per_sq_ft">
                                                    <h5 style="color: gray;"><b>&#8377;25.378/sq.ft</b></h5>
                                                </div><br>
        
                                               <p>Book Your 3 Bhk apartment in JVLR, Mumbai-Dahisar ...</p> 
                                               <a href="buyer.php"><button id="dealer"style="background:#0a5071;color:white;width:10rem;border-radius:2rem;">Contact Dealer</button></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                        </span>
                    </div>
                </section>


                <br>

                    <!-- pune -->
                <section class="properties1 container " id="properties">
                    <div class="heading" id="pune">
                        <button class="read-more-btn">View all</button>

                        <h2><b>Pune </b></h2>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit<br> Accusantium,Lorem ipsum dolor
                            sit
                            amet consectetur adipisicing elit. Doloremque ex quo reiciendis minus explicabo </p>

                    </div>

                    <div class="properties-container1 container">
                        <!-- box 1 -->
                        <div class="box residential Apartment 1bhk rent">
                            <div class="container" >
                                <div class="row card-item">
                                    <div class="col-md-5">
                                        <div id="carouselExampleControls" class="carousel slide"
                                            data-bs-ride="carousel">
                                            <div class="carousel-inner">
                                                <div class="carousel-item active">
                                                    <img src="img/p2.jpg" class="d-block w-100" alt="..." >
                                                </div>
                                                <div class="carousel-item">
                                                    <img src="img/p3.jpg" class="d-block w-100" alt="...">
                                                </div>
                                                <div class="carousel-item">
                                                    <img src="img/p5.jpg" class="d-block w-100" alt="...">
                                                </div>
                                            </div>
                                            <button class="carousel-control-prev" type="button"
                                                data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                                <span class="visually-hidden">Previous</span>
                                            </button>
                                            <button class="carousel-control-next" type="button"
                                                data-bs-target="#carouselExampleControls" data-bs-slide="next">
                                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                                <span class="visually-hidden">Next</span>
                                            </button>
                                        </div>

                                    </div>


                                    <div class="col-md-7">
                                        <br>
                                        <div> <p> <h7>1 BHK Apartment in <span class="location-right" ><b>Pune</b></span></h7></p></div>
                                        <i class="material-icons"  id="add-to-cart" >star</i>
                                        <h6 id="detail-title"><b>Maxima By Oberoi Reaity</b></h6><br>

                                        <div style="display: flex; ">
                                            <span id="price" ><h4><b>&#8377; 3.51-3.54cr</h4></b> </span> 
                                            <span id="area" style="position: relative; left:5rem;"> <h4><b>1,381-1,397<sub>sq.ft</sub></b></h4> </span> 
                                            <span id="bhk_right" style="position: relative; left:10rem;"> <h4><b>1 BHK</b></h4> </span> <br>
                                        </div><br>
                                        <div id="per_sq_ft">
                                            <h5 style="color: gray;"><b>&#8377;25.378/sq.ft</b></h5>
                                        </div><br>

                                       <p>Book Your 3 Bhk apartment in JVLR, Mumbai-Dahisar ...</p> 
                                       <a href="buyer.php"><button id="dealer"style="background:#0a5071;color:white;width:10rem;border-radius:2rem;">Contact Dealer</button></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- box 2 -->
                        <div class="box residential Apartment 2bhk">
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-5">
                                        <div id="carouselExampleControls" class="carousel slide"
                                            data-bs-ride="carousel">
                                            <div class="carousel-inner">
                                                <div class="carousel-item active">
                                                    <img src="img/p2.jpg" class="d-block w-100" alt="...">
                                                </div>
                                                <div class="carousel-item">
                                                    <img src="img/p3.jpg" class="d-block w-100" alt="...">
                                                </div>
                                                <div class="carousel-item">
                                                    <img src="img/p5.jpg" class="d-block w-100" alt="...">
                                                </div>
                                            </div>
                                            <button class="carousel-control-prev" type="button"
                                                data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                                <span class="visually-hidden">Previous</span>
                                            </button>
                                            <button class="carousel-control-next" type="button"
                                                data-bs-target="#carouselExampleControls" data-bs-slide="next">
                                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                                <span class="visually-hidden">Next</span>
                                            </button>
                                        </div>

                                    </div>


                                    <div class="col-md-7">
                                        <br>
                                        <div> <p> <h7>2 BHK Apartment in <span class="location-right" id="cart_name"><b>Pune</b></span></h7></p></div>
                                        <i class="material-icons" id="add-to-cart" >star</i>
                                        <h6 id="detail-title"><b>Maxima By Oberoi Reaity</b></h6><br>

                                        <div style="display: flex; ">
                                            <span id="price" ><h4><b>&#8377; 3.51-3.54cr</h4></b> </span> 
                                            <span id="area" style="position: relative; left:5rem;"> <h4><b>1,381-1,397<sub>sq.ft</sub></b></h4> </span> 
                                            <span id="bhk_right" style="position: relative; left:10rem;"> <h4><b>2 BHK</b></h4> </span> <br>
                                        </div><br>
                                        <div id="per_sq_ft">
                                            <h5 style="color: gray;"><b>&#8377;25.378/sq.ft</b></h5>
                                        </div><br>

                                       <p>Book Your 3 Bhk apartment in JVLR, Mumbai-Dahisar ...</p> 
                                       <a href="buyer.php"><button id="dealer"style="background:#0a5071;color:white;width:10rem;border-radius:2rem;">Contact Dealer</button></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- box 3 -->
                        <div class="box studio Apartment land housefarm 3bhk rent">
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-5">
                                        <div id="carouselExampleControls" class="carousel slide"
                                            data-bs-ride="carousel">
                                            <div class="carousel-inner">
                                                <div class="carousel-item active">
                                                    <img src="img/project1.jpg" class="d-block w-100" alt="...">
                                                </div>
                                                <div class="carousel-item">
                                                    <img src="img/project2.jpg" class="d-block w-100" alt="...">
                                                </div>
                                                <div class="carousel-item">
                                                    <img src="img/project3.jpg" class="d-block w-100" alt="...">
                                                </div>
                                            </div>
                                            <button class="carousel-control-prev" type="button"
                                                data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                                <span class="visually-hidden">Previous</span>
                                            </button>
                                            <button class="carousel-control-next" type="button"
                                                data-bs-target="#carouselExampleControls" data-bs-slide="next">
                                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                                <span class="visually-hidden">Next</span>
                                            </button>
                                        </div>

                                    </div>


                                    <div class="col-md-7">
                                        <br>
                                        <div> <p> <h7>3 BHK Apartment in <span class="location-right" id="cart_name"><b>Shaniwar Wada</b></span></h7></p></div>
                                        <i class="material-icons" id="add-to-cart" >star</i>
                                        <h6 id="detail-title"><b>Maxima By Oberoi Reaity</b></h6><br>

                                        <div style="display: flex; ">
                                            <span id="price" ><h4><b>&#8377; 3.51-3.54cr</h4></b> </span> 
                                            <span id="area" style="position: relative; left:5rem;"> <h4><b>1,381-1,397<sub>sq.ft</sub></b></h4> </span> 
                                            <span id="bhk_right" style="position: relative; left:10rem;"> <h4><b>3 BHK</b></h4> </span> <br>
                                        </div><br>
                                        <div id="per_sq_ft">
                                            <h5 style="color: gray;"><b>&#8377;25.378/sq.ft</b></h5>
                                        </div><br>

                                       <p>Book Your 3 Bhk apartment in JVLR, Mumbai-Dahisar ...</p> 
                                       <a href="buyer.php"><button id="dealer"style="background:#0a5071;color:white;width:10rem;border-radius:2rem;">Contact Dealer</button></a>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <!-- box 3 .1-->
                        <div class="box land Residentialfloor housefarm 3bhk">
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-5">
                                        <div id="carouselExampleControls" class="carousel slide"
                                            data-bs-ride="carousel">
                                            <div class="carousel-inner">
                                                <div class="carousel-item active">
                                                    <img src="img/mumbai.jpg" class="d-block w-100" alt="...">
                                                </div>
                                                <div class="carousel-item">
                                                    <img src="img/project4.jpg" class="d-block w-100" alt="...">
                                                </div>
                                                <div class="carousel-item">
                                                    <img src="img/project5.jpg" class="d-block w-100" alt="...">
                                                </div>
                                            </div>
                                            <button class="carousel-control-prev" type="button"
                                                data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                                <span class="visually-hidden">Previous</span>
                                            </button>
                                            <button class="carousel-control-next" type="button"
                                                data-bs-target="#carouselExampleControls" data-bs-slide="next">
                                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                                <span class="visually-hidden">Next</span>
                                            </button>
                                        </div>

                                    </div>


                                    <div class="col-md-7">
                                        <br>
                                        <div> <p> <h7>3 BHK Apartment in <span class="location-right" id="cart_name"><b>Aga Khan</b></span></h7></p></div>
                                        <i class="material-icons" id="add-to-cart" >star</i>
                                        <h6 id="detail-title"><b>Maxima By Oberoi Reaity</b></h6><br>

                                        <div style="display: flex; ">
                                            <span id="price" ><h4><b>&#8377; 3.51-3.54cr</h4></b> </span> 
                                            <span id="area" style="position: relative; left:5rem;"> <h4><b>1,381-1,397<sub>sq.ft</sub></b></h4> </span> 
                                            <span id="bhk_right" style="position: relative; left:10rem;"> <h4><b>3 BHK</b></h4> </span> <br>
                                        </div><br>
                                        <div id="per_sq_ft">
                                            <h5 style="color: gray;"><b>&#8377;25.378/sq.ft</b></h5>
                                        </div><br>

                                       <p>Book Your 3 Bhk apartment in JVLR, Mumbai-Dahisar ...</p> 
                                       <a href="buyer.php"><button id="dealer"style="background:#0a5071;color:white;width:10rem;border-radius:2rem;">Contact Dealer</button></a>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <!-- box 4 -->
                        <span class="more">
                            <div class="box villa land housefarm 4bhk">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-md-5">
                                            <div id="carouselExampleControls" class="carousel slide"
                                                data-bs-ride="carousel">
                                                <div class="carousel-inner">
                                                    <div class="carousel-item active">
                                                        <img src="img/chennai.jpg" class="d-block w-100" alt="...">
                                                    </div>
                                                    <div class="carousel-item">
                                                        <img src="img/mumbai.jpg" class="d-block w-100" alt="...">
                                                    </div>
                                                    <div class="carousel-item">
                                                        <img src="img/kolkata.jpg" class="d-block w-100" alt="...">
                                                    </div>
                                                </div>
                                                <button class="carousel-control-prev" type="button"
                                                    data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                                    <span class="visually-hidden">Previous</span>
                                                </button>
                                                <button class="carousel-control-next" type="button"
                                                    data-bs-target="#carouselExampleControls" data-bs-slide="next">
                                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                                    <span class="visually-hidden">Next</span>
                                                </button>
                                            </div>

                                        </div>

                                        <div class="col-md-7">
                                            <br>
                                            <div> <p> <h7>4 BHK Apartment in <span class="location-right" id="cart_name"><b>Osho</b></span></h7></p></div>
                                            <i class="material-icons" id="add-to-cart" >star</i>
                                            <h6 id="detail-title"><b>Maxima By Oberoi Reaity</b></h6><br>
    
                                            <div style="display: flex; ">
                                                <span id="price" ><h4><b>&#8377; 3.51-3.54cr</h4></b> </span> 
                                                <span id="area" style="position: relative; left:5rem;"> <h4><b>1,381-1,397<sub>sq.ft</sub></b></h4> </span> 
                                                <span id="bhk_right" style="position: relative; left:10rem;"> <h4><b>4 BHK</b></h4> </span> <br>
                                            </div><br>
                                            <div id="per_sq_ft">
                                                <h5 style="color: gray;"><b>&#8377;25.378/sq.ft</b></h5>
                                            </div><br>
    
                                           <p>Book Your 3 Bhk apartment in JVLR, Mumbai-Dahisar ...</p> 
                                           <a href="buyer.php"><button id="dealer"style="background:#0a5071;color:white;width:10rem;border-radius:2rem;">Contact Dealer</button></a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- box 5 -->
                            <div class="box villa builderfloor Residentialfloor 5bhk rent">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-md-5">
                                            <div id="carouselExampleControls" class="carousel slide"
                                                data-bs-ride="carousel">
                                                <div class="carousel-inner">
                                                    <div class="carousel-item active">
                                                        <img src="img/chennai.jpg" class="d-block w-100" alt="...">
                                                    </div>
                                                    <div class="carousel-item">
                                                        <img src="img/project5.jpg" class="d-block w-100" alt="...">
                                                    </div>
                                                    <div class="carousel-item">
                                                        <img src="img/project7.jpg" class="d-block w-100" alt="...">
                                                    </div>
                                                </div>
                                                <button class="carousel-control-prev" type="button"
                                                    data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                                    <span class="visually-hidden">Previous</span>
                                                </button>
                                                <button class="carousel-control-next" type="button"
                                                    data-bs-target="#carouselExampleControls" data-bs-slide="next">
                                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                                    <span class="visually-hidden">Next</span>
                                                </button>
                                            </div>

                                        </div>

                                        <div class="col-md-7">
                                            <br>
                                        <div> <p> <h7>5 BHK Apartment in <span class="location-right" id="cart_name"><b>Katraj</b></span></h7></p></div>
                                        <i class="material-icons" id="add-to-cart" >star</i>
                                        <h6 id="detail-title"><b>Maxima By Oberoi Reaity</b></h6><br>

                                        <div style="display: flex; ">
                                            <span id="price" ><h4><b>&#8377; 3.51-3.54cr</h4></b> </span> 
                                            <span id="area" style="position: relative; left:5rem;"> <h4><b>1,381-1,397<sub>sq.ft</sub></b></h4> </span> 
                                            <span id="bhk_right" style="position: relative; left:10rem;"> <h4><b>5 BHK</b></h4> </span> <br>
                                        </div><br>
                                        <div id="per_sq_ft">
                                            <h5 style="color: gray;"><b>&#8377;25.378/sq.ft</b></h5>
                                        </div><br>

                                       <p>Book Your 3 Bhk apartment in JVLR, Mumbai-Dahisar ...</p> 
                                       <a href="buyer.php"><button id="dealer"style="background:#0a5071;color:white;width:10rem;border-radius:2rem;">Contact Dealer</button></a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- box 6 -->

                            <div class="box land builderfloor Residentialfloor 6bhk">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-md-5">
                                            <div id="carouselExampleControls" class="carousel slide"
                                                data-bs-ride="carousel">
                                                <div class="carousel-inner">
                                                    <div class="carousel-item active">
                                                        <img src="img/delhi1.jpg" class="d-block w-100" alt="...">
                                                    </div>
                                                    <div class="carousel-item">
                                                        <img src="img/kolkata.jpg" class="d-block w-100" alt="...">
                                                    </div>
                                                    <div class="carousel-item">
                                                        <img src="img/hyderabad.jpg" class="d-block w-100" alt="...">
                                                    </div>
                                                </div>
                                                <button class="carousel-control-prev" type="button"
                                                    data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                                    <span class="visually-hidden">Previous</span>
                                                </button>
                                                <button class="carousel-control-next" type="button"
                                                    data-bs-target="#carouselExampleControls" data-bs-slide="next">
                                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                                    <span class="visually-hidden">Next</span>
                                                </button>
                                            </div>

                                        </div>

                                        <div class="col-md-7">
                                            <br>
                                            <div> <p> <h7>6 BHK Apartment in <span class="location-right" id="cart_name"><b>Sinhagad</b></span></h7></p></div>
                                            <i class="material-icons" id="add-to-cart" >star</i>
                                            <h6 id="detail-title"><b>Maxima By Oberoi Reaity</b></h6><br>
    
                                            <div style="display: flex; ">
                                                <span id="price" ><h4><b>&#8377; 3.51-3.54cr</h4></b> </span> 
                                                <span id="area" style="position: relative; left:5rem;"> <h4><b>1,381-1,397<sub>sq.ft</sub></b></h4> </span> 
                                                <span id="bhk_right" style="position: relative; left:10rem;"> <h4><b>6 BHK</b></h4> </span> <br>
                                            </div><br>
                                            <div id="per_sq_ft">
                                                <h5 style="color: gray;"><b>&#8377;25.378/sq.ft</b></h5>
                                            </div><br>
    
                                           <p>Book Your 3 Bhk apartment in JVLR, Mumbai-Dahisar ...</p> 
                                           <a href="buyer.php"><button id="dealer"style="background:#0a5071;color:white;width:10rem;border-radius:2rem;">Contact Dealer</button></a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                                <!-- box 7 -->

                                <div class="box land builderfloor Residentialfloor 7bhk newhouse">
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-md-5">
                                                <div id="carouselExampleControls" class="carousel slide"
                                                    data-bs-ride="carousel">
                                                    <div class="carousel-inner">
                                                        <div class="carousel-item active">
                                                            <img src="img/delhi1.jpg" class="d-block w-100" alt="...">
                                                        </div>
                                                        <div class="carousel-item">
                                                            <img src="img/kolkata.jpg" class="d-block w-100" alt="...">
                                                        </div>
                                                        <div class="carousel-item">
                                                            <img src="img/hyderabad.jpg" class="d-block w-100" alt="...">
                                                        </div>
                                                    </div>
                                                    <button class="carousel-control-prev" type="button"
                                                        data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                                                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                                        <span class="visually-hidden">Previous</span>
                                                    </button>
                                                    <button class="carousel-control-next" type="button"
                                                        data-bs-target="#carouselExampleControls" data-bs-slide="next">
                                                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                                        <span class="visually-hidden">Next</span>
                                                    </button>
                                                </div>
    
                                            </div>
    
                                            <div class="col-md-7">
                                                <br>
                                                <div> <p> <h7>7 BHK Apartment in <span class="location-right" id="cart_name"><b>Dagdusheth</b></span></h7></p></div>
                                                <i class="material-icons" id="add-to-cart" >star</i>
                                                <h6 id="detail-title"><b>Maxima By Oberoi Reaity</b></h6><br>
        
                                                <div style="display: flex; ">
                                                    <span id="price" ><h4><b>&#8377; 3.51-3.54cr</h4></b> </span> 
                                                    <span id="area" style="position: relative; left:5rem;"> <h4><b>1,381-1,397<sub>sq.ft</sub></b></h4> </span> 
                                                    <span id="bhk_right" style="position: relative; left:10rem;"> <h4><b>7 BHK</b></h4> </span> <br>
                                                </div><br>
                                                <div id="per_sq_ft">
                                                    <h5 style="color: gray;"><b>&#8377;25.378/sq.ft</b></h5>
                                                </div><br>
        
                                               <p>Book Your 3 Bhk apartment in JVLR, Mumbai-Dahisar ...</p> 
                                               <a href="buyer.php"><button id="dealer"style="background:#0a5071;color:white;width:10rem;border-radius:2rem;">Contact Dealer</button></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                    <!-- box 8-->

                            <div class="box land builderfloor Residentialfloor 8bhk rent">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-md-5">
                                            <div id="carouselExampleControls" class="carousel slide"
                                                data-bs-ride="carousel">
                                                <div class="carousel-inner">
                                                    <div class="carousel-item active">
                                                        <img src="img/project5.jpg" class="d-block w-100" alt="...">
                                                    </div>
                                                    <div class="carousel-item">
                                                        <img src="img/project7.jpg" class="d-block w-100" alt="...">
                                                    </div>
                                                    <div class="carousel-item">
                                                        <img src="img/project4.jpg" class="d-block w-100" alt="...">
                                                    </div>
                                                </div>
                                                <button class="carousel-control-prev" type="button"
                                                    data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                                    <span class="visually-hidden">Previous</span>
                                                </button>
                                                <button class="carousel-control-next" type="button"
                                                    data-bs-target="#carouselExampleControls" data-bs-slide="next">
                                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                                    <span class="visually-hidden">Next</span>
                                                </button>
                                            </div>

                                        </div>

                                        <div class="col-md-7">
                                            <br>
                                            <div> <p> <h7>8 BHK Apartment in <span class="location-right" id="cart_name"><b>Halwai</b></span></h7></p></div>
                                            <i class="material-icons" id="add-to-cart" >star</i>
                                            <h6 id="detail-title"><b>Maxima By Oberoi Reaity</b></h6><br>
    
                                            <div style="display: flex; ">
                                                <span id="price" ><h4><b>&#8377; 3.51-3.54cr</h4></b> </span> 
                                                <span id="area" style="position: relative; left:5rem;"> <h4><b>1,381-1,397<sub>sq.ft</sub></b></h4> </span> 
                                                <span id="bhk_right" style="position: relative; left:10rem;"> <h4><b>8 BHK</b></h4> </span> <br>
                                            </div><br>
                                            <div id="per_sq_ft">
                                                <h5 style="color: gray;"><b>&#8377;25.378/sq.ft</b></h5>
                                            </div><br>
    
                                           <p>Book Your 3 Bhk apartment in JVLR, Mumbai-Dahisar ...</p> 
                                           <a href="buyer.php"><button id="dealer"style="background:#0a5071;color:white;width:10rem;border-radius:2rem;">Contact Dealer</button></a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                                <!-- box 9 -->

                                <div class="box land builderfloor Residentialfloor 9bhk newhouse">
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-md-5">
                                                <div id="carouselExampleControls" class="carousel slide"
                                                    data-bs-ride="carousel">
                                                    <div class="carousel-inner">
                                                        <div class="carousel-item active">
                                                            <img src="img/p1.jpg" class="d-block w-100" alt="...">
                                                        </div>
                                                        <div class="carousel-item">
                                                            <img src="img/p2.jpg" class="d-block w-100" alt="...">
                                                        </div>
                                                        <div class="carousel-item">
                                                            <img src="img/p3.jpg" class="d-block w-100" alt="...">
                                                        </div>
                                                    </div>
                                                    <button class="carousel-control-prev" type="button"
                                                        data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                                                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                                        <span class="visually-hidden">Previous</span>
                                                    </button>
                                                    <button class="carousel-control-next" type="button"
                                                        data-bs-target="#carouselExampleControls" data-bs-slide="next">
                                                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                                        <span class="visually-hidden">Next</span>
                                                    </button>
                                                </div>
    
                                            </div>
    
                                            <div class="col-md-7">
                                                <br>
                                                <div> <p> <h7>9 BHK Apartment in <span class="location-right" id="cart_name"><b>Rajmachi</b></span></h7></p></div>
                                                <i class="material-icons" id="add-to-cart" >star</i>
                                                <h6 id="detail-title"><b>Maxima By Oberoi Reaity</b></h6><br>
        
                                                <div style="display: flex; ">
                                                    <span id="price" ><h4><b>&#8377; 3.51-3.54cr</h4></b> </span> 
                                                    <span id="area" style="position: relative; left:5rem;"> <h4><b>1,381-1,397<sub>sq.ft</sub></b></h4> </span> 
                                                    <span id="bhk_right" style="position: relative; left:10rem;"> <h4><b>9 BHK</b></h4> </span> <br>
                                                </div><br>
                                                <div id="per_sq_ft">
                                                    <h5 style="color: gray;"><b>&#8377;25.378/sq.ft</b></h5>
                                                </div><br>
        
                                               <p>Book Your 3 Bhk apartment in JVLR, Mumbai-Dahisar ...</p> 
                                               <a href="buyer.php"><button id="dealer"style="background:#0a5071;color:white;width:10rem;border-radius:2rem;">Contact Dealer</button></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                        </span>
                    </div>
                </section><br>

                <!-- Mumbai -->

                <section class="properties1 container " id="properties">
                    <div class="heading" id="mumbai">
                        <button class="read-more-btn">View all</button>

                        <h2><b>Mumbai</b></h2>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit<br> Accusantium,Lorem ipsum dolor
                            sit
                            amet consectetur adipisicing elit. Doloremque ex quo reiciendis minus explicabo </p>

                    </div>

                    <div class="properties-container1 container">
                        <!-- box 1 -->
                        <div class="box residential Apartment 1bhk rent">
                            <div class="container" >
                                <div class="row card-item">
                                    <div class="col-md-5">
                                        <div id="carouselExampleControls" class="carousel slide"
                                            data-bs-ride="carousel">
                                            <div class="carousel-inner">
                                                <div class="carousel-item active">
                                                    <img src="img/p2.jpg" class="d-block w-100" alt="..." >
                                                </div>
                                                <div class="carousel-item">
                                                    <img src="img/p3.jpg" class="d-block w-100" alt="...">
                                                </div>
                                                <div class="carousel-item">
                                                    <img src="img/p5.jpg" class="d-block w-100" alt="...">
                                                </div>
                                            </div>
                                            <button class="carousel-control-prev" type="button"
                                                data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                                <span class="visually-hidden">Previous</span>
                                            </button>
                                            <button class="carousel-control-next" type="button"
                                                data-bs-target="#carouselExampleControls" data-bs-slide="next">
                                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                                <span class="visually-hidden">Next</span>
                                            </button>
                                        </div>

                                    </div>


                                    <div class="col-md-7">
                                        <br>
                                        <div> <p> <h7>1 BHK Apartment in <span class="location-right" ><b>Aurangabad</b></span></h7></p></div>
                                        <i class="material-icons"  id="add-to-cart" >star</i>
                                        <h6 id="detail-title"><b>Maxima By Oberoi Reaity</b></h6><br>

                                        <div style="display: flex; ">
                                            <span id="price" ><h4><b>&#8377; 3.51-3.54cr</h4></b> </span> 
                                            <span id="area" style="position: relative; left:5rem;"> <h4><b>1,381-1,397<sub>sq.ft</sub></b></h4> </span> 
                                            <span id="bhk_right" style="position: relative; left:10rem;"> <h4><b>1 BHK</b></h4> </span> <br>
                                        </div><br>
                                        <div id="per_sq_ft">
                                            <h5 style="color: gray;"><b>&#8377;25.378/sq.ft</b></h5>
                                        </div><br>

                                       <p>Book Your 3 Bhk apartment in JVLR, Mumbai-Dahisar ...</p> 
                                       <a href="buyer.php"><button id="dealer"style="background:#0a5071;color:white;width:10rem;border-radius:2rem;">Contact Dealer</button></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- box 2 -->
                        <div class="box residential Apartment 2bhk">
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-5">
                                        <div id="carouselExampleControls" class="carousel slide"
                                            data-bs-ride="carousel">
                                            <div class="carousel-inner">
                                                <div class="carousel-item active">
                                                    <img src="img/p2.jpg" class="d-block w-100" alt="...">
                                                </div>
                                                <div class="carousel-item">
                                                    <img src="img/p3.jpg" class="d-block w-100" alt="...">
                                                </div>
                                                <div class="carousel-item">
                                                    <img src="img/p5.jpg" class="d-block w-100" alt="...">
                                                </div>
                                            </div>
                                            <button class="carousel-control-prev" type="button"
                                                data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                                <span class="visually-hidden">Previous</span>
                                            </button>
                                            <button class="carousel-control-next" type="button"
                                                data-bs-target="#carouselExampleControls" data-bs-slide="next">
                                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                                <span class="visually-hidden">Next</span>
                                            </button>
                                        </div>

                                    </div>


                                    <div class="col-md-7">
                                        <br>
                                        <div> <p> <h7>2 BHK Apartment in <span class="location-right" id="cart_name"><b>ChandraPur</b></span></h7></p></div>
                                        <i class="material-icons" id="add-to-cart" >star</i>
                                        <h6 id="detail-title"><b>Maxima By Oberoi Reaity</b></h6><br>

                                        <div style="display: flex; ">
                                            <span id="price" ><h4><b>&#8377; 3.51-3.54cr</h4></b> </span> 
                                            <span id="area" style="position: relative; left:5rem;"> <h4><b>1,381-1,397<sub>sq.ft</sub></b></h4> </span> 
                                            <span id="bhk_right" style="position: relative; left:10rem;"> <h4><b>2 BHK</b></h4> </span> <br>
                                        </div><br>
                                        <div id="per_sq_ft">
                                            <h5 style="color: gray;"><b>&#8377;25.378/sq.ft</b></h5>
                                        </div><br>

                                       <p>Book Your 3 Bhk apartment in JVLR, Mumbai-Dahisar ...</p> 
                                       <a href="buyer.php"><button id="dealer"style="background:#0a5071;color:white;width:10rem;border-radius:2rem;">Contact Dealer</button></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- box 3 -->
                        <div class="box studio Apartment land housefarm 3bhk">
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-5">
                                        <div id="carouselExampleControls" class="carousel slide"
                                            data-bs-ride="carousel">
                                            <div class="carousel-inner">
                                                <div class="carousel-item active">
                                                    <img src="img/project1.jpg" class="d-block w-100" alt="...">
                                                </div>
                                                <div class="carousel-item">
                                                    <img src="img/project2.jpg" class="d-block w-100" alt="...">
                                                </div>
                                                <div class="carousel-item">
                                                    <img src="img/project3.jpg" class="d-block w-100" alt="...">
                                                </div>
                                            </div>
                                            <button class="carousel-control-prev" type="button"
                                                data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                                <span class="visually-hidden">Previous</span>
                                            </button>
                                            <button class="carousel-control-next" type="button"
                                                data-bs-target="#carouselExampleControls" data-bs-slide="next">
                                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                                <span class="visually-hidden">Next</span>
                                            </button>
                                        </div>

                                    </div>


                                    <div class="col-md-7">
                                        <br>
                                        <div> <p> <h7>3 BHK Apartment in <span class="location-right" id="cart_name"><b>Dhule</b></span></h7></p></div>
                                        <i class="material-icons" id="add-to-cart" >star</i>
                                        <h6 id="detail-title"><b>Maxima By Oberoi Reaity</b></h6><br>

                                        <div style="display: flex; ">
                                            <span id="price" ><h4><b>&#8377; 3.51-3.54cr</h4></b> </span> 
                                            <span id="area" style="position: relative; left:5rem;"> <h4><b>1,381-1,397<sub>sq.ft</sub></b></h4> </span> 
                                            <span id="bhk_right" style="position: relative; left:10rem;"> <h4><b>3 BHK</b></h4> </span> <br>
                                        </div><br>
                                        <div id="per_sq_ft">
                                            <h5 style="color: gray;"><b>&#8377;25.378/sq.ft</b></h5>
                                        </div><br>

                                       <p>Book Your 3 Bhk apartment in JVLR, Mumbai-Dahisar ...</p> 
                                       <a href="buyer.php"><button id="dealer"style="background:#0a5071;color:white;width:10rem;border-radius:2rem;">Contact Dealer</button></a>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <!-- box 3 .1-->
                        <div class="box land Residentialfloor housefarm 3bhk rent">
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-5">
                                        <div id="carouselExampleControls" class="carousel slide"
                                            data-bs-ride="carousel">
                                            <div class="carousel-inner">
                                                <div class="carousel-item active">
                                                    <img src="img/mumbai.jpg" class="d-block w-100" alt="...">
                                                </div>
                                                <div class="carousel-item">
                                                    <img src="img/project4.jpg" class="d-block w-100" alt="...">
                                                </div>
                                                <div class="carousel-item">
                                                    <img src="img/project5.jpg" class="d-block w-100" alt="...">
                                                </div>
                                            </div>
                                            <button class="carousel-control-prev" type="button"
                                                data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                                <span class="visually-hidden">Previous</span>
                                            </button>
                                            <button class="carousel-control-next" type="button"
                                                data-bs-target="#carouselExampleControls" data-bs-slide="next">
                                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                                <span class="visually-hidden">Next</span>
                                            </button>
                                        </div>

                                    </div>


                                    <div class="col-md-7">
                                        <br>
                                        <div> <p> <h7>3 BHK Apartment in <span class="location-right" id="cart_name"><b>Hingoli</b></span></h7></p></div>
                                        <i class="material-icons" id="add-to-cart" >star</i>
                                        <h6 id="detail-title"><b>Maxima By Oberoi Reaity</b></h6><br>

                                        <div style="display: flex; ">
                                            <span id="price" ><h4><b>&#8377; 3.51-3.54cr</h4></b> </span> 
                                            <span id="area" style="position: relative; left:5rem;"> <h4><b>1,381-1,397<sub>sq.ft</sub></b></h4> </span> 
                                            <span id="bhk_right" style="position: relative; left:10rem;"> <h4><b>3 BHK</b></h4> </span> <br>
                                        </div><br>
                                        <div id="per_sq_ft">
                                            <h5 style="color: gray;"><b>&#8377;25.378/sq.ft</b></h5>
                                        </div><br>

                                       <p>Book Your 3 Bhk apartment in JVLR, Mumbai-Dahisar ...</p> 
                                       <a href="buyer.php"><button id="dealer"style="background:#0a5071;color:white;width:10rem;border-radius:2rem;">Contact Dealer</button></a>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <!-- box 4 -->
                        <span class="more">
                            <div class="box villa land housefarm 4bhk newhouse rent">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-md-5">
                                            <div id="carouselExampleControls" class="carousel slide"
                                                data-bs-ride="carousel">
                                                <div class="carousel-inner">
                                                    <div class="carousel-item active">
                                                        <img src="img/chennai.jpg" class="d-block w-100" alt="...">
                                                    </div>
                                                    <div class="carousel-item">
                                                        <img src="img/mumbai.jpg" class="d-block w-100" alt="...">
                                                    </div>
                                                    <div class="carousel-item">
                                                        <img src="img/kolkata.jpg" class="d-block w-100" alt="...">
                                                    </div>
                                                </div>
                                                <button class="carousel-control-prev" type="button"
                                                    data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                                    <span class="visually-hidden">Previous</span>
                                                </button>
                                                <button class="carousel-control-next" type="button"
                                                    data-bs-target="#carouselExampleControls" data-bs-slide="next">
                                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                                    <span class="visually-hidden">Next</span>
                                                </button>
                                            </div>

                                        </div>

                                        <div class="col-md-7">
                                            <br>
                                            <div> <p> <h7>4 BHK Apartment in <span class="location-right" id="cart_name"><b>Nagpur</b></span></h7></p></div>
                                            <i class="material-icons" id="add-to-cart" >star</i>
                                            <h6 id="detail-title"><b>Maxima By Oberoi Reaity</b></h6><br>
    
                                            <div style="display: flex; ">
                                                <span id="price" ><h4><b>&#8377; 3.51-3.54cr</h4></b> </span> 
                                                <span id="area" style="position: relative; left:5rem;"> <h4><b>1,381-1,397<sub>sq.ft</sub></b></h4> </span> 
                                                <span id="bhk_right" style="position: relative; left:10rem;"> <h4><b>4 BHK</b></h4> </span> <br>
                                            </div><br>
                                            <div id="per_sq_ft">
                                                <h5 style="color: gray;"><b>&#8377;25.378/sq.ft</b></h5>
                                            </div><br>
    
                                           <p>Book Your 3 Bhk apartment in JVLR, Mumbai-Dahisar ...</p> 
                                           <a href="buyer.php"><button id="dealer"style="background:#0a5071;color:white;width:10rem;border-radius:2rem;">Contact Dealer</button></a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- box 5 -->
                            <div class="box villa builderfloor Residentialfloor 5bhk">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-md-5">
                                            <div id="carouselExampleControls" class="carousel slide"
                                                data-bs-ride="carousel">
                                                <div class="carousel-inner">
                                                    <div class="carousel-item active">
                                                        <img src="img/chennai.jpg" class="d-block w-100" alt="...">
                                                    </div>
                                                    <div class="carousel-item">
                                                        <img src="img/project5.jpg" class="d-block w-100" alt="...">
                                                    </div>
                                                    <div class="carousel-item">
                                                        <img src="img/project7.jpg" class="d-block w-100" alt="...">
                                                    </div>
                                                </div>
                                                <button class="carousel-control-prev" type="button"
                                                    data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                                    <span class="visually-hidden">Previous</span>
                                                </button>
                                                <button class="carousel-control-next" type="button"
                                                    data-bs-target="#carouselExampleControls" data-bs-slide="next">
                                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                                    <span class="visually-hidden">Next</span>
                                                </button>
                                            </div>

                                        </div>

                                        <div class="col-md-7">
                                            <br>
                                        <div> <p> <h7>5 BHK Apartment in <span class="location-right" id="cart_name"><b>Nasik</b></span></h7></p></div>
                                        <i class="material-icons" id="add-to-cart" >star</i>
                                        <h6 id="detail-title"><b>Maxima By Oberoi Reaity</b></h6><br>

                                        <div style="display: flex; ">
                                            <span id="price" ><h4><b>&#8377; 3.51-3.54cr</h4></b> </span> 
                                            <span id="area" style="position: relative; left:5rem;"> <h4><b>1,381-1,397<sub>sq.ft</sub></b></h4> </span> 
                                            <span id="bhk_right" style="position: relative; left:10rem;"> <h4><b>5 BHK</b></h4> </span> <br>
                                        </div><br>
                                        <div id="per_sq_ft">
                                            <h5 style="color: gray;"><b>&#8377;25.378/sq.ft</b></h5>
                                        </div><br>

                                       <p>Book Your 3 Bhk apartment in JVLR, Mumbai-Dahisar ...</p> 
                                       <a href="buyer.php"><button id="dealer"style="background:#0a5071;color:white;width:10rem;border-radius:2rem;">Contact Dealer</button></a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- box 6 -->

                            <div class="box land builderfloor newhouse 6bhk">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-md-5">
                                            <div id="carouselExampleControls" class="carousel slide"
                                                data-bs-ride="carousel">
                                                <div class="carousel-inner">
                                                    <div class="carousel-item active">
                                                        <img src="img/delhi1.jpg" class="d-block w-100" alt="...">
                                                    </div>
                                                    <div class="carousel-item">
                                                        <img src="img/kolkata.jpg" class="d-block w-100" alt="...">
                                                    </div>
                                                    <div class="carousel-item">
                                                        <img src="img/hyderabad.jpg" class="d-block w-100" alt="...">
                                                    </div>
                                                </div>
                                                <button class="carousel-control-prev" type="button"
                                                    data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                                    <span class="visually-hidden">Previous</span>
                                                </button>
                                                <button class="carousel-control-next" type="button"
                                                    data-bs-target="#carouselExampleControls" data-bs-slide="next">
                                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                                    <span class="visually-hidden">Next</span>
                                                </button>
                                            </div>

                                        </div>

                                        <div class="col-md-7">
                                            <br>
                                            <div> <p> <h7>6 BHK Apartment in <span class="location-right" id="cart_name"><b>Ratanagiri</b></span></h7></p></div>
                                            <i class="material-icons" id="add-to-cart" >star</i>
                                            <h6 id="detail-title"><b>Maxima By Oberoi Reaity</b></h6><br>
    
                                            <div style="display: flex; ">
                                                <span id="price" ><h4><b>&#8377; 3.51-3.54cr</h4></b> </span> 
                                                <span id="area" style="position: relative; left:5rem;"> <h4><b>1,381-1,397<sub>sq.ft</sub></b></h4> </span> 
                                                <span id="bhk_right" style="position: relative; left:10rem;"> <h4><b>6 BHK</b></h4> </span> <br>
                                            </div><br>
                                            <div id="per_sq_ft">
                                                <h5 style="color: gray;"><b>&#8377;25.378/sq.ft</b></h5>
                                            </div><br>
    
                                           <p>Book Your 3 Bhk apartment in JVLR, Mumbai-Dahisar ...</p> 
                                           <a href="buyer.php"><button id="dealer"style="background:#0a5071;color:white;width:10rem;border-radius:2rem;">Contact Dealer</button></a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                                <!-- box 7 -->

                                <div class="box land builderfloor newhouse 7bhk rent">
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-md-5">
                                                <div id="carouselExampleControls" class="carousel slide"
                                                    data-bs-ride="carousel">
                                                    <div class="carousel-inner">
                                                        <div class="carousel-item active">
                                                            <img src="img/delhi1.jpg" class="d-block w-100" alt="...">
                                                        </div>
                                                        <div class="carousel-item">
                                                            <img src="img/kolkata.jpg" class="d-block w-100" alt="...">
                                                        </div>
                                                        <div class="carousel-item">
                                                            <img src="img/hyderabad.jpg" class="d-block w-100" alt="...">
                                                        </div>
                                                    </div>
                                                    <button class="carousel-control-prev" type="button"
                                                        data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                                                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                                        <span class="visually-hidden">Previous</span>
                                                    </button>
                                                    <button class="carousel-control-next" type="button"
                                                        data-bs-target="#carouselExampleControls" data-bs-slide="next">
                                                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                                        <span class="visually-hidden">Next</span>
                                                    </button>
                                                </div>
    
                                            </div>
    
                                            <div class="col-md-7">
                                                <br>
                                                <div> <p> <h7>7 BHK Apartment in <span class="location-right" id="cart_name"><b>Sangli</b></span></h7></p></div>
                                                <i class="material-icons" id="add-to-cart" >star</i>
                                                <h6 id="detail-title"><b>Maxima By Oberoi Reaity</b></h6><br>
        
                                                <div style="display: flex; ">
                                                    <span id="price" ><h4><b>&#8377; 3.51-3.54cr</h4></b> </span> 
                                                    <span id="area" style="position: relative; left:5rem;"> <h4><b>1,381-1,397<sub>sq.ft</sub></b></h4> </span> 
                                                    <span id="bhk_right" style="position: relative; left:10rem;"> <h4><b>7 BHK</b></h4> </span> <br>
                                                </div><br>
                                                <div id="per_sq_ft">
                                                    <h5 style="color: gray;"><b>&#8377;25.378/sq.ft</b></h5>
                                                </div><br>
        
                                               <p>Book Your 3 Bhk apartment in JVLR, Mumbai-Dahisar ...</p> 
                                               <a href="buyer.php"><button id="dealer"style="background:#0a5071;color:white;width:10rem;border-radius:2rem;">Contact Dealer</button></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                    <!-- box 8-->

                            <div class="box land builderfloor Residentialfloor 8bhk">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-md-5">
                                            <div id="carouselExampleControls" class="carousel slide"
                                                data-bs-ride="carousel">
                                                <div class="carousel-inner">
                                                    <div class="carousel-item active">
                                                        <img src="img/project5.jpg" class="d-block w-100" alt="...">
                                                    </div>
                                                    <div class="carousel-item">
                                                        <img src="img/project7.jpg" class="d-block w-100" alt="...">
                                                    </div>
                                                    <div class="carousel-item">
                                                        <img src="img/project4.jpg" class="d-block w-100" alt="...">
                                                    </div>
                                                </div>
                                                <button class="carousel-control-prev" type="button"
                                                    data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                                    <span class="visually-hidden">Previous</span>
                                                </button>
                                                <button class="carousel-control-next" type="button"
                                                    data-bs-target="#carouselExampleControls" data-bs-slide="next">
                                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                                    <span class="visually-hidden">Next</span>
                                                </button>
                                            </div>

                                        </div>

                                        <div class="col-md-7">
                                            <br>
                                            <div> <p> <h7>8 BHK Apartment in <span class="location-right" id="cart_name"><b>Satara</b></span></h7></p></div>
                                            <i class="material-icons" id="add-to-cart" >star</i>
                                            <h6 id="detail-title"><b>Maxima By Oberoi Reaity</b></h6><br>
    
                                            <div style="display: flex; ">
                                                <span id="price" ><h4><b>&#8377; 3.51-3.54cr</h4></b> </span> 
                                                <span id="area" style="position: relative; left:5rem;"> <h4><b>1,381-1,397<sub>sq.ft</sub></b></h4> </span> 
                                                <span id="bhk_right" style="position: relative; left:10rem;"> <h4><b>8 BHK</b></h4> </span> <br>
                                            </div><br>
                                            <div id="per_sq_ft">
                                                <h5 style="color: gray;"><b>&#8377;25.378/sq.ft</b></h5>
                                            </div><br>
    
                                           <p>Book Your 3 Bhk apartment in JVLR, Mumbai-Dahisar ...</p> 
                                           <a href="buyer.php"><button id="dealer"style="background:#0a5071;color:white;width:10rem;border-radius:2rem;">Contact Dealer</button></a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                                <!-- box 6 -->

                                <div class="box land builderfloor newhouse 9bhk">
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-md-5">
                                                <div id="carouselExampleControls" class="carousel slide"
                                                    data-bs-ride="carousel">
                                                    <div class="carousel-inner">
                                                        <div class="carousel-item active">
                                                            <img src="img/p1.jpg" class="d-block w-100" alt="...">
                                                        </div>
                                                        <div class="carousel-item">
                                                            <img src="img/p2.jpg" class="d-block w-100" alt="...">
                                                        </div>
                                                        <div class="carousel-item">
                                                            <img src="img/p3.jpg" class="d-block w-100" alt="...">
                                                        </div>
                                                    </div>
                                                    <button class="carousel-control-prev" type="button"
                                                        data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                                                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                                        <span class="visually-hidden">Previous</span>
                                                    </button>
                                                    <button class="carousel-control-next" type="button"
                                                        data-bs-target="#carouselExampleControls" data-bs-slide="next">
                                                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                                        <span class="visually-hidden">Next</span>
                                                    </button>
                                                </div>
    
                                            </div>
    
                                            <div class="col-md-7">
                                                <br>
                                                <div> <p> <h7>9 BHK Apartment in <span class="location-right" id="cart_name"><b>Shola Pur</b></span></h7></p></div>
                                                <i class="material-icons" id="add-to-cart" >star</i>
                                                <h6 id="detail-title"><b>Maxima By Oberoi Reaity</b></h6><br>
        
                                                <div style="display: flex; ">
                                                    <span id="price" ><h4><b>&#8377; 3.51-3.54cr</h4></b> </span> 
                                                    <span id="area" style="position: relative; left:5rem;"> <h4><b>1,381-1,397<sub>sq.ft</sub></b></h4> </span> 
                                                    <span id="bhk_right" style="position: relative; left:10rem;"> <h4><b>9 BHK</b></h4> </span> <br>
                                                </div><br>
                                                <div id="per_sq_ft">
                                                    <h5 style="color: gray;"><b>&#8377;25.378/sq.ft</b></h5>
                                                </div><br>
        
                                               <p>Book Your 3 Bhk apartment in JVLR, Mumbai-Dahisar ...</p> 
                                               <a href="buyer.php"><button id="dealer"style="background:#0a5071;color:white;width:10rem;border-radius:2rem;">Contact Dealer</button></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                        </span>
                    </div>
                </section><br>

                <!-- kolkata -->

                <section class="properties1 container " id="properties">
                    <div class="heading" id="kolkata">
                        <button class="read-more-btn">View all</button>

                        <h2><b>Kolkata</b></h2>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit<br> Accusantium,Lorem ipsum dolor
                            sit
                            amet consectetur adipisicing elit. Doloremque ex quo reiciendis minus explicabo </p>

                    </div>

                    <div class="properties-container1 container">
                        <!-- box 1 -->
                        <div class="box residential Apartment 1bhk newhouse rent">
                            <div class="container" >
                                <div class="row card-item">
                                    <div class="col-md-5">
                                        <div id="carouselExampleControls" class="carousel slide"
                                            data-bs-ride="carousel">
                                            <div class="carousel-inner">
                                                <div class="carousel-item active">
                                                    <img src="img/p2.jpg" class="d-block w-100" alt="..." >
                                                </div>
                                                <div class="carousel-item">
                                                    <img src="img/p3.jpg" class="d-block w-100" alt="...">
                                                </div>
                                                <div class="carousel-item">
                                                    <img src="img/p5.jpg" class="d-block w-100" alt="...">
                                                </div>
                                            </div>
                                            <button class="carousel-control-prev" type="button"
                                                data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                                <span class="visually-hidden">Previous</span>
                                            </button>
                                            <button class="carousel-control-next" type="button"
                                                data-bs-target="#carouselExampleControls" data-bs-slide="next">
                                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                                <span class="visually-hidden">Next</span>
                                            </button>
                                        </div>

                                    </div>


                                    <div class="col-md-7">
                                        <br>
                                        <div> <p> <h7>1 BHK Apartment in <span class="location-right" ><b>Signur</b></span></h7></p></div>
                                        <i class="material-icons"  id="add-to-cart" >star</i>
                                        <h6 id="detail-title"><b>Maxima By Oberoi Reaity</b></h6><br>

                                        <div style="display: flex; ">
                                            <span id="price" ><h4><b>&#8377; 3.51-3.54cr</h4></b> </span> 
                                            <span id="area" style="position: relative; left:5rem;"> <h4><b>1,381-1,397<sub>sq.ft</sub></b></h4> </span> 
                                            <span id="bhk_right" style="position: relative; left:10rem;"> <h4><b>1 BHK</b></h4> </span> <br>
                                        </div><br>
                                        <div id="per_sq_ft">
                                            <h5 style="color: gray;"><b>&#8377;25.378/sq.ft</b></h5>
                                        </div><br>

                                       <p>Book Your 3 Bhk apartment in JVLR, Mumbai-Dahisar ...</p> 
                                       <a href="buyer.php"><button id="dealer"style="background:#0a5071;color:white;width:10rem;border-radius:2rem;">Contact Dealer</button></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- box 2 -->
                        <div class="box residential Apartment 2bhk newhouse rent">
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-5">
                                        <div id="carouselExampleControls" class="carousel slide"
                                            data-bs-ride="carousel">
                                            <div class="carousel-inner">
                                                <div class="carousel-item active">
                                                    <img src="img/p2.jpg" class="d-block w-100" alt="...">
                                                </div>
                                                <div class="carousel-item">
                                                    <img src="img/p3.jpg" class="d-block w-100" alt="...">
                                                </div>
                                                <div class="carousel-item">
                                                    <img src="img/p5.jpg" class="d-block w-100" alt="...">
                                                </div>
                                            </div>
                                            <button class="carousel-control-prev" type="button"
                                                data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                                <span class="visually-hidden">Previous</span>
                                            </button>
                                            <button class="carousel-control-next" type="button"
                                                data-bs-target="#carouselExampleControls" data-bs-slide="next">
                                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                                <span class="visually-hidden">Next</span>
                                            </button>
                                        </div>

                                    </div>


                                    <div class="col-md-7">
                                        <br>
                                        <div> <p> <h7>2 BHK Apartment in <span class="location-right" id="cart_name"><b>Panchla</b></span></h7></p></div>
                                        <i class="material-icons" id="add-to-cart" >star</i>
                                        <h6 id="detail-title"><b>Maxima By Oberoi Reaity</b></h6><br>

                                        <div style="display: flex; ">
                                            <span id="price" ><h4><b>&#8377; 3.51-3.54cr</h4></b> </span> 
                                            <span id="area" style="position: relative; left:5rem;"> <h4><b>1,381-1,397<sub>sq.ft</sub></b></h4> </span> 
                                            <span id="bhk_right" style="position: relative; left:10rem;"> <h4><b>2 BHK</b></h4> </span> <br>
                                        </div><br>
                                        <div id="per_sq_ft">
                                            <h5 style="color: gray;"><b>&#8377;25.378/sq.ft</b></h5>
                                        </div><br>

                                       <p>Book Your 3 Bhk apartment in JVLR, Mumbai-Dahisar ...</p> 
                                       <a href="buyer.php"><button id="dealer"style="background:#0a5071;color:white;width:10rem;border-radius:2rem;">Contact Dealer</button></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- box 3 -->
                        <div class="box studio Apartment land housefarm 3bhk newhouse">
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-5">
                                        <div id="carouselExampleControls" class="carousel slide"
                                            data-bs-ride="carousel">
                                            <div class="carousel-inner">
                                                <div class="carousel-item active">
                                                    <img src="img/project1.jpg" class="d-block w-100" alt="...">
                                                </div>
                                                <div class="carousel-item">
                                                    <img src="img/project2.jpg" class="d-block w-100" alt="...">
                                                </div>
                                                <div class="carousel-item">
                                                    <img src="img/project3.jpg" class="d-block w-100" alt="...">
                                                </div>
                                            </div>
                                            <button class="carousel-control-prev" type="button"
                                                data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                                <span class="visually-hidden">Previous</span>
                                            </button>
                                            <button class="carousel-control-next" type="button"
                                                data-bs-target="#carouselExampleControls" data-bs-slide="next">
                                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                                <span class="visually-hidden">Next</span>
                                            </button>
                                        </div>

                                    </div>


                                    <div class="col-md-7">
                                        <br>
                                        <div> <p> <h7>3 BHK Apartment in <span class="location-right" id="cart_name"><b>Haripal</b></span></h7></p></div>
                                        <i class="material-icons" id="add-to-cart" >star</i>
                                        <h6 id="detail-title"><b>Maxima By Oberoi Reaity</b></h6><br>

                                        <div style="display: flex; ">
                                            <span id="price" ><h4><b>&#8377; 3.51-3.54cr</h4></b> </span> 
                                            <span id="area" style="position: relative; left:5rem;"> <h4><b>1,381-1,397<sub>sq.ft</sub></b></h4> </span> 
                                            <span id="bhk_right" style="position: relative; left:10rem;"> <h4><b>3 BHK</b></h4> </span> <br>
                                        </div><br>
                                        <div id="per_sq_ft">
                                            <h5 style="color: gray;"><b>&#8377;25.378/sq.ft</b></h5>
                                        </div><br>

                                       <p>Book Your 3 Bhk apartment in JVLR, Mumbai-Dahisar ...</p> 
                                       <a href="buyer.php"><button id="dealer"style="background:#0a5071;color:white;width:10rem;border-radius:2rem;">Contact Dealer</button></a>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <!-- box 3 .1-->
                        <div class="box land Residentialfloor housefarm 3bhk newhouse">
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-5">
                                        <div id="carouselExampleControls" class="carousel slide"
                                            data-bs-ride="carousel">
                                            <div class="carousel-inner">
                                                <div class="carousel-item active">
                                                    <img src="img/mumbai.jpg" class="d-block w-100" alt="...">
                                                </div>
                                                <div class="carousel-item">
                                                    <img src="img/project4.jpg" class="d-block w-100" alt="...">
                                                </div>
                                                <div class="carousel-item">
                                                    <img src="img/project5.jpg" class="d-block w-100" alt="...">
                                                </div>
                                            </div>
                                            <button class="carousel-control-prev" type="button"
                                                data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                                <span class="visually-hidden">Previous</span>
                                            </button>
                                            <button class="carousel-control-next" type="button"
                                                data-bs-target="#carouselExampleControls" data-bs-slide="next">
                                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                                <span class="visually-hidden">Next</span>
                                            </button>
                                        </div>

                                    </div>


                                    <div class="col-md-7">
                                        <br>
                                        <div> <p> <h7>3 BHK Apartment in <span class="location-right" id="cart_name"><b>Dhaniakhali</b></span></h7></p></div>
                                        <i class="material-icons" id="add-to-cart" >star</i>
                                        <h6 id="detail-title"><b>Maxima By Oberoi Reaity</b></h6><br>

                                        <div style="display: flex; ">
                                            <span id="price" ><h4><b>&#8377; 3.51-3.54cr</h4></b> </span> 
                                            <span id="area" style="position: relative; left:5rem;"> <h4><b>1,381-1,397<sub>sq.ft</sub></b></h4> </span> 
                                            <span id="bhk_right" style="position: relative; left:10rem;"> <h4><b>3 BHK</b></h4> </span> <br>
                                        </div><br>
                                        <div id="per_sq_ft">
                                            <h5 style="color: gray;"><b>&#8377;25.378/sq.ft</b></h5>
                                        </div><br>

                                       <p>Book Your 3 Bhk apartment in JVLR, Mumbai-Dahisar ...</p> 
                                       <a href="buyer.php"><button id="dealer"style="background:#0a5071;color:white;width:10rem;border-radius:2rem;">Contact Dealer</button></a>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <!-- box 4 -->
                        <span class="more">
                            <div class="box villa land housefarm 4bhk rent">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-md-5">
                                            <div id="carouselExampleControls" class="carousel slide"
                                                data-bs-ride="carousel">
                                                <div class="carousel-inner">
                                                    <div class="carousel-item active">
                                                        <img src="img/chennai.jpg" class="d-block w-100" alt="...">
                                                    </div>
                                                    <div class="carousel-item">
                                                        <img src="img/mumbai.jpg" class="d-block w-100" alt="...">
                                                    </div>
                                                    <div class="carousel-item">
                                                        <img src="img/kolkata.jpg" class="d-block w-100" alt="...">
                                                    </div>
                                                </div>
                                                <button class="carousel-control-prev" type="button"
                                                    data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                                    <span class="visually-hidden">Previous</span>
                                                </button>
                                                <button class="carousel-control-next" type="button"
                                                    data-bs-target="#carouselExampleControls" data-bs-slide="next">
                                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                                    <span class="visually-hidden">Next</span>
                                                </button>
                                            </div>

                                        </div>

                                        <div class="col-md-7">
                                            <br>
                                            <div> <p> <h7>4 BHK Apartment in <span class="location-right" id="cart_name"><b>Jamalpur</b></span></h7></p></div>
                                            <i class="material-icons" id="add-to-cart" >star</i>
                                            <h6 id="detail-title"><b>Maxima By Oberoi Reaity</b></h6><br>
    
                                            <div style="display: flex; ">
                                                <span id="price" ><h4><b>&#8377; 3.51-3.54cr</h4></b> </span> 
                                                <span id="area" style="position: relative; left:5rem;"> <h4><b>1,381-1,397<sub>sq.ft</sub></b></h4> </span> 
                                                <span id="bhk_right" style="position: relative; left:10rem;"> <h4><b>4 BHK</b></h4> </span> <br>
                                            </div><br>
                                            <div id="per_sq_ft">
                                                <h5 style="color: gray;"><b>&#8377;25.378/sq.ft</b></h5>
                                            </div><br>
    
                                           <p>Book Your 3 Bhk apartment in JVLR, Mumbai-Dahisar ...</p> 
                                           <a href="buyer.php"><button id="dealer"style="background:#0a5071;color:white;width:10rem;border-radius:2rem;">Contact Dealer</button></a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- box 5 -->
                            <div class="box villa builderfloor Residentialfloor 5bhk">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-md-5">
                                            <div id="carouselExampleControls" class="carousel slide"
                                                data-bs-ride="carousel">
                                                <div class="carousel-inner">
                                                    <div class="carousel-item active">
                                                        <img src="img/chennai.jpg" class="d-block w-100" alt="...">
                                                    </div>
                                                    <div class="carousel-item">
                                                        <img src="img/project5.jpg" class="d-block w-100" alt="...">
                                                    </div>
                                                    <div class="carousel-item">
                                                        <img src="img/project7.jpg" class="d-block w-100" alt="...">
                                                    </div>
                                                </div>
                                                <button class="carousel-control-prev" type="button"
                                                    data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                                    <span class="visually-hidden">Previous</span>
                                                </button>
                                                <button class="carousel-control-next" type="button"
                                                    data-bs-target="#carouselExampleControls" data-bs-slide="next">
                                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                                    <span class="visually-hidden">Next</span>
                                                </button>
                                            </div>

                                        </div>

                                        <div class="col-md-7">
                                            <br>
                                        <div> <p> <h7>5 BHK Apartment in <span class="location-right" id="cart_name"><b>Krishana Nagar</b></span></h7></p></div>
                                        <i class="material-icons" id="add-to-cart" >star</i>
                                        <h6 id="detail-title"><b>Maxima By Oberoi Reaity</b></h6><br>

                                        <div style="display: flex; ">
                                            <span id="price" ><h4><b>&#8377; 3.51-3.54cr</h4></b> </span> 
                                            <span id="area" style="position: relative; left:5rem;"> <h4><b>1,381-1,397<sub>sq.ft</sub></b></h4> </span> 
                                            <span id="bhk_right" style="position: relative; left:10rem;"> <h4><b>5 BHK</b></h4> </span> <br>
                                        </div><br>
                                        <div id="per_sq_ft">
                                            <h5 style="color: gray;"><b>&#8377;25.378/sq.ft</b></h5>
                                        </div><br>

                                       <p>Book Your 3 Bhk apartment in JVLR, Mumbai-Dahisar ...</p> 
                                       <a href="buyer.php"><button id="dealer"style="background:#0a5071;color:white;width:10rem;border-radius:2rem;">Contact Dealer</button></a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- box 6 -->

                            <div class="box land  6bhk rent">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-md-5">
                                            <div id="carouselExampleControls" class="carousel slide"
                                                data-bs-ride="carousel">
                                                <div class="carousel-inner">
                                                    <div class="carousel-item active">
                                                        <img src="img/delhi1.jpg" class="d-block w-100" alt="...">
                                                    </div>
                                                    <div class="carousel-item">
                                                        <img src="img/kolkata.jpg" class="d-block w-100" alt="...">
                                                    </div>
                                                    <div class="carousel-item">
                                                        <img src="img/hyderabad.jpg" class="d-block w-100" alt="...">
                                                    </div>
                                                </div>
                                                <button class="carousel-control-prev" type="button"
                                                    data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                                    <span class="visually-hidden">Previous</span>
                                                </button>
                                                <button class="carousel-control-next" type="button"
                                                    data-bs-target="#carouselExampleControls" data-bs-slide="next">
                                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                                    <span class="visually-hidden">Next</span>
                                                </button>
                                            </div>

                                        </div>

                                        <div class="col-md-7">
                                            <br>
                                            <div> <p> <h7>6 BHK Apartment in <span class="location-right" id="cart_name"><b>kalyani</b></span></h7></p></div>
                                            <i class="material-icons" id="add-to-cart" >star</i>
                                            <h6 id="detail-title"><b>Maxima By Oberoi Reaity</b></h6><br>
    
                                            <div style="display: flex; ">
                                                <span id="price" ><h4><b>&#8377; 3.51-3.54cr</h4></b> </span> 
                                                <span id="area" style="position: relative; left:5rem;"> <h4><b>1,381-1,397<sub>sq.ft</sub></b></h4> </span> 
                                                <span id="bhk_right" style="position: relative; left:10rem;"> <h4><b>6 BHK</b></h4> </span> <br>
                                            </div><br>
                                            <div id="per_sq_ft">
                                                <h5 style="color: gray;"><b>&#8377;25.378/sq.ft</b></h5>
                                            </div><br>
    
                                           <p>Book Your 3 Bhk apartment in JVLR, Mumbai-Dahisar ...</p> 
                                           <a href="buyer.php"><button id="dealer"style="background:#0a5071;color:white;width:10rem;border-radius:2rem;">Contact Dealer</button></a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                                <!-- box 7 -->

                                <div class="box land newhouse  7bhk">
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-md-5">
                                                <div id="carouselExampleControls" class="carousel slide"
                                                    data-bs-ride="carousel">
                                                    <div class="carousel-inner">
                                                        <div class="carousel-item active">
                                                            <img src="img/delhi1.jpg" class="d-block w-100" alt="...">
                                                        </div>
                                                        <div class="carousel-item">
                                                            <img src="img/kolkata.jpg" class="d-block w-100" alt="...">
                                                        </div>
                                                        <div class="carousel-item">
                                                            <img src="img/hyderabad.jpg" class="d-block w-100" alt="...">
                                                        </div>
                                                    </div>
                                                    <button class="carousel-control-prev" type="button"
                                                        data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                                                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                                        <span class="visually-hidden">Previous</span>
                                                    </button>
                                                    <button class="carousel-control-next" type="button"
                                                        data-bs-target="#carouselExampleControls" data-bs-slide="next">
                                                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                                        <span class="visually-hidden">Next</span>
                                                    </button>
                                                </div>
    
                                            </div>
    
                                            <div class="col-md-7">
                                                <br>
                                                <div> <p> <h7>7 BHK Apartment in <span class="location-right" id="cart_name"><b>Shanti Pur</b></span></h7></p></div>
                                                <i class="material-icons" id="add-to-cart" >star</i>
                                                <h6 id="detail-title"><b>Maxima By Oberoi Reaity</b></h6><br>
        
                                                <div style="display: flex; ">
                                                    <span id="price" ><h4><b>&#8377; 3.51-3.54cr</h4></b> </span> 
                                                    <span id="area" style="position: relative; left:5rem;"> <h4><b>1,381-1,397<sub>sq.ft</sub></b></h4> </span> 
                                                    <span id="bhk_right" style="position: relative; left:10rem;"> <h4><b>7 BHK</b></h4> </span> <br>
                                                </div><br>
                                                <div id="per_sq_ft">
                                                    <h5 style="color: gray;"><b>&#8377;25.378/sq.ft</b></h5>
                                                </div><br>
        
                                               <p>Book Your 3 Bhk apartment in JVLR, Mumbai-Dahisar ...</p> 
                                               <a href="buyer.php"><button id="dealer"style="background:#0a5071;color:white;width:10rem;border-radius:2rem;">Contact Dealer</button></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                    <!-- box 8-->

                            <div class="box land builderfloor newhouse 8bhk">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-md-5">
                                            <div id="carouselExampleControls" class="carousel slide"
                                                data-bs-ride="carousel">
                                                <div class="carousel-inner">
                                                    <div class="carousel-item active">
                                                        <img src="img/project5.jpg" class="d-block w-100" alt="...">
                                                    </div>
                                                    <div class="carousel-item">
                                                        <img src="img/project7.jpg" class="d-block w-100" alt="...">
                                                    </div>
                                                    <div class="carousel-item">
                                                        <img src="img/project4.jpg" class="d-block w-100" alt="...">
                                                    </div>
                                                </div>
                                                <button class="carousel-control-prev" type="button"
                                                    data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                                    <span class="visually-hidden">Previous</span>
                                                </button>
                                                <button class="carousel-control-next" type="button"
                                                    data-bs-target="#carouselExampleControls" data-bs-slide="next">
                                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                                    <span class="visually-hidden">Next</span>
                                                </button>
                                            </div>

                                        </div>

                                        <div class="col-md-7">
                                            <br>
                                            <div> <p> <h7>8 BHK Apartment in <span class="location-right" id="cart_name"><b>Rana Gath</b></span></h7></p></div>
                                            <i class="material-icons" id="add-to-cart" >star</i>
                                            <h6 id="detail-title"><b>Maxima By Oberoi Reaity</b></h6><br>
    
                                            <div style="display: flex; ">
                                                <span id="price" ><h4><b>&#8377; 3.51-3.54cr</h4></b> </span> 
                                                <span id="area" style="position: relative; left:5rem;"> <h4><b>1,381-1,397<sub>sq.ft</sub></b></h4> </span> 
                                                <span id="bhk_right" style="position: relative; left:10rem;"> <h4><b>8 BHK</b></h4> </span> <br>
                                            </div><br>
                                            <div id="per_sq_ft">
                                                <h5 style="color: gray;"><b>&#8377;25.378/sq.ft</b></h5>
                                            </div><br>
    
                                           <p>Book Your 3 Bhk apartment in JVLR, Mumbai-Dahisar ...</p> 
                                           <a href="buyer.php"><button id="dealer"style="background:#0a5071;color:white;width:10rem;border-radius:2rem;">Contact Dealer</button></a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                                <!-- box 9 -->

                                <div class="box land builderfloor Residentialfloor newhouse 9bhk">
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-md-5">
                                                <div id="carouselExampleControls" class="carousel slide"
                                                    data-bs-ride="carousel">
                                                    <div class="carousel-inner">
                                                        <div class="carousel-item active">
                                                            <img src="img/p1.jpg" class="d-block w-100" alt="...">
                                                        </div>
                                                        <div class="carousel-item">
                                                            <img src="img/p2.jpg" class="d-block w-100" alt="...">
                                                        </div>
                                                        <div class="carousel-item">
                                                            <img src="img/p3.jpg" class="d-block w-100" alt="...">
                                                        </div>
                                                    </div>
                                                    <button class="carousel-control-prev" type="button"
                                                        data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                                                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                                        <span class="visually-hidden">Previous</span>
                                                    </button>
                                                    <button class="carousel-control-next" type="button"
                                                        data-bs-target="#carouselExampleControls" data-bs-slide="next">
                                                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                                        <span class="visually-hidden">Next</span>
                                                    </button>
                                                </div>
    
                                            </div>
    
                                            <div class="col-md-7">
                                                <br>
                                                <div> <p> <h7>9 BHK Apartment in <span class="location-right" id="cart_name"><b>Habra</b></span></h7></p></div>
                                                <i class="material-icons" id="add-to-cart" >star</i>
                                                <h6 id="detail-title"><b>Maxima By Oberoi Reaity</b></h6><br>
        
                                                <div style="display: flex; ">
                                                    <span id="price" ><h4><b>&#8377; 3.51-3.54cr</h4></b> </span> 
                                                    <span id="area" style="position: relative; left:5rem;"> <h4><b>1,381-1,397<sub>sq.ft</sub></b></h4> </span> 
                                                    <span id="bhk_right" style="position: relative; left:10rem;"> <h4><b>9 BHK</b></h4> </span> <br>
                                                </div><br>
                                                <div id="per_sq_ft">
                                                    <h5 style="color: gray;"><b>&#8377;25.378/sq.ft</b></h5>
                                                </div><br>
        
                                               <p>Book Your 3 Bhk apartment in JVLR, Mumbai-Dahisar ...</p> 
                                               <a href="buyer.php"><button id="dealer"style="background:#0a5071;color:white;width:10rem;border-radius:2rem;">Contact Dealer</button></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                        </span>
                    </div>
                </section><br>

                <!-- Ahemdabad -->

                <section class="properties1 container " id="properties">
                    <div class="heading" id="ahem">
                        <button class="read-more-btn">View all</button>

                        <h2><b>Ahemdabad</b></h2>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit<br> Accusantium,Lorem ipsum dolor
                            sit
                            amet consectetur adipisicing elit. Doloremque ex quo reiciendis minus explicabo </p>

                    </div>

                    <div class="properties-container1 container">
                        <!-- box 1 -->
                        <div class="box residential Apartment 1bhk newhouse">
                            <div class="container" >
                                <div class="row card-item">
                                    <div class="col-md-5">
                                        <div id="carouselExampleControls" class="carousel slide"
                                            data-bs-ride="carousel">
                                            <div class="carousel-inner">
                                                <div class="carousel-item active">
                                                    <img src="img/p2.jpg" class="d-block w-100" alt="..." >
                                                </div>
                                                <div class="carousel-item">
                                                    <img src="img/p3.jpg" class="d-block w-100" alt="...">
                                                </div>
                                                <div class="carousel-item">
                                                    <img src="img/p5.jpg" class="d-block w-100" alt="...">
                                                </div>
                                            </div>
                                            <button class="carousel-control-prev" type="button"
                                                data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                                <span class="visually-hidden">Previous</span>
                                            </button>
                                            <button class="carousel-control-next" type="button"
                                                data-bs-target="#carouselExampleControls" data-bs-slide="next">
                                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                                <span class="visually-hidden">Next</span>
                                            </button>
                                        </div>

                                    </div>


                                    <div class="col-md-7">
                                        <br>
                                        <div> <p> <h7>1 BHK Apartment in <span class="location-right" ><b>Gota</b></span></h7></p></div>
                                        <i class="material-icons"  id="add-to-cart" >star</i>
                                        <h6 id="detail-title"><b>Maxima By Oberoi Reaity</b></h6><br>

                                        <div style="display: flex; ">
                                            <span id="price" ><h4><b>&#8377; 3.51-3.54cr</h4></b> </span> 
                                            <span id="area" style="position: relative; left:5rem;"> <h4><b>1,381-1,397<sub>sq.ft</sub></b></h4> </span> 
                                            <span id="bhk_right" style="position: relative; left:10rem;"> <h4><b>1 BHK</b></h4> </span> <br>
                                        </div><br>
                                        <div id="per_sq_ft">
                                            <h5 style="color: gray;"><b>&#8377;25.378/sq.ft</b></h5>
                                        </div><br>

                                       <p>Book Your 3 Bhk apartment in JVLR, Mumbai-Dahisar ...</p> 
                                       <a href="buyer.php"><button id="dealer"style="background:#0a5071;color:white;width:10rem;border-radius:2rem;">Contact Dealer</button></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- box 2 -->
                        <div class="box residential Apartment 2bhk newhouse rent">
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-5">
                                        <div id="carouselExampleControls" class="carousel slide"
                                            data-bs-ride="carousel">
                                            <div class="carousel-inner">
                                                <div class="carousel-item active">
                                                    <img src="img/p2.jpg" class="d-block w-100" alt="...">
                                                </div>
                                                <div class="carousel-item">
                                                    <img src="img/p3.jpg" class="d-block w-100" alt="...">
                                                </div>
                                                <div class="carousel-item">
                                                    <img src="img/p5.jpg" class="d-block w-100" alt="...">
                                                </div>
                                            </div>
                                            <button class="carousel-control-prev" type="button"
                                                data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                                <span class="visually-hidden">Previous</span>
                                            </button>
                                            <button class="carousel-control-next" type="button"
                                                data-bs-target="#carouselExampleControls" data-bs-slide="next">
                                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                                <span class="visually-hidden">Next</span>
                                            </button>
                                        </div>

                                    </div>


                                    <div class="col-md-7">
                                        <br>
                                        <div> <p> <h7>2 BHK Apartment in <span class="location-right" id="cart_name"><b>NavrangPura</b></span></h7></p></div>
                                        <i class="material-icons" id="add-to-cart" >star</i>
                                        <h6 id="detail-title"><b>Maxima By Oberoi Reaity</b></h6><br>

                                        <div style="display: flex; ">
                                            <span id="price" ><h4><b>&#8377; 3.51-3.54cr</h4></b> </span> 
                                            <span id="area" style="position: relative; left:5rem;"> <h4><b>1,381-1,397<sub>sq.ft</sub></b></h4> </span> 
                                            <span id="bhk_right" style="position: relative; left:10rem;"> <h4><b>2 BHK</b></h4> </span> <br>
                                        </div><br>
                                        <div id="per_sq_ft">
                                            <h5 style="color: gray;"><b>&#8377;25.378/sq.ft</b></h5>
                                        </div><br>

                                       <p>Book Your 3 Bhk apartment in JVLR, Mumbai-Dahisar ...</p> 
                                       <a href="buyer.php"><button id="dealer"style="background:#0a5071;color:white;width:10rem;border-radius:2rem;">Contact Dealer</button></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- box 3 -->
                        <div class="box studio Apartment land housefarm 3bhk newhouse rent">
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-5">
                                        <div id="carouselExampleControls" class="carousel slide"
                                            data-bs-ride="carousel">
                                            <div class="carousel-inner">
                                                <div class="carousel-item active">
                                                    <img src="img/project1.jpg" class="d-block w-100" alt="...">
                                                </div>
                                                <div class="carousel-item">
                                                    <img src="img/project2.jpg" class="d-block w-100" alt="...">
                                                </div>
                                                <div class="carousel-item">
                                                    <img src="img/project3.jpg" class="d-block w-100" alt="...">
                                                </div>
                                            </div>
                                            <button class="carousel-control-prev" type="button"
                                                data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                                <span class="visually-hidden">Previous</span>
                                            </button>
                                            <button class="carousel-control-next" type="button"
                                                data-bs-target="#carouselExampleControls" data-bs-slide="next">
                                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                                <span class="visually-hidden">Next</span>
                                            </button>
                                        </div>

                                    </div>


                                    <div class="col-md-7">
                                        <br>
                                        <div> <p> <h7>3 BHK Apartment in <span class="location-right" id="cart_name"><b>ChandKhera</b></span></h7></p></div>
                                        <i class="material-icons" id="add-to-cart" >star</i>
                                        <h6 id="detail-title"><b>Maxima By Oberoi Reaity</b></h6><br>

                                        <div style="display: flex; ">
                                            <span id="price" ><h4><b>&#8377; 3.51-3.54cr</h4></b> </span> 
                                            <span id="area" style="position: relative; left:5rem;"> <h4><b>1,381-1,397<sub>sq.ft</sub></b></h4> </span> 
                                            <span id="bhk_right" style="position: relative; left:10rem;"> <h4><b>3 BHK</b></h4> </span> <br>
                                        </div><br>
                                        <div id="per_sq_ft">
                                            <h5 style="color: gray;"><b>&#8377;25.378/sq.ft</b></h5>
                                        </div><br>

                                       <p>Book Your 3 Bhk apartment in JVLR, Mumbai-Dahisar ...</p> 
                                       <a href="buyer.php"><button id="dealer"style="background:#0a5071;color:white;width:10rem;border-radius:2rem;">Contact Dealer</button></a>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <!-- box 3 .1-->
                        <div class="box land Residentialfloor housefarm 3bhk newhouse">
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-5">
                                        <div id="carouselExampleControls" class="carousel slide"
                                            data-bs-ride="carousel">
                                            <div class="carousel-inner">
                                                <div class="carousel-item active">
                                                    <img src="img/mumbai.jpg" class="d-block w-100" alt="...">
                                                </div>
                                                <div class="carousel-item">
                                                    <img src="img/project4.jpg" class="d-block w-100" alt="...">
                                                </div>
                                                <div class="carousel-item">
                                                    <img src="img/project5.jpg" class="d-block w-100" alt="...">
                                                </div>
                                            </div>
                                            <button class="carousel-control-prev" type="button"
                                                data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                                <span class="visually-hidden">Previous</span>
                                            </button>
                                            <button class="carousel-control-next" type="button"
                                                data-bs-target="#carouselExampleControls" data-bs-slide="next">
                                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                                <span class="visually-hidden">Next</span>
                                            </button>
                                        </div>

                                    </div>


                                    <div class="col-md-7">
                                        <br>
                                        <div> <p> <h7>3 BHK Apartment in <span class="location-right" id="cart_name"><b>Motera</b></span></h7></p></div>
                                        <i class="material-icons" id="add-to-cart" >star</i>
                                        <h6 id="detail-title"><b>Maxima By Oberoi Reaity</b></h6><br>

                                        <div style="display: flex; ">
                                            <span id="price" ><h4><b>&#8377; 3.51-3.54cr</h4></b> </span> 
                                            <span id="area" style="position: relative; left:5rem;"> <h4><b>1,381-1,397<sub>sq.ft</sub></b></h4> </span> 
                                            <span id="bhk_right" style="position: relative; left:10rem;"> <h4><b>3 BHK</b></h4> </span> <br>
                                        </div><br>
                                        <div id="per_sq_ft">
                                            <h5 style="color: gray;"><b>&#8377;25.378/sq.ft</b></h5>
                                        </div><br>

                                       <p>Book Your 3 Bhk apartment in JVLR, Mumbai-Dahisar ...</p> 
                                       <a href="buyer.php"><button id="dealer"style="background:#0a5071;color:white;width:10rem;border-radius:2rem;">Contact Dealer</button></a>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <!-- box 4 -->
                        <span class="more">
                            <div class="box villa land housefarm 4bhk newhouse">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-md-5">
                                            <div id="carouselExampleControls" class="carousel slide"
                                                data-bs-ride="carousel">
                                                <div class="carousel-inner">
                                                    <div class="carousel-item active">
                                                        <img src="img/chennai.jpg" class="d-block w-100" alt="...">
                                                    </div>
                                                    <div class="carousel-item">
                                                        <img src="img/mumbai.jpg" class="d-block w-100" alt="...">
                                                    </div>
                                                    <div class="carousel-item">
                                                        <img src="img/kolkata.jpg" class="d-block w-100" alt="...">
                                                    </div>
                                                </div>
                                                <button class="carousel-control-prev" type="button"
                                                    data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                                    <span class="visually-hidden">Previous</span>
                                                </button>
                                                <button class="carousel-control-next" type="button"
                                                    data-bs-target="#carouselExampleControls" data-bs-slide="next">
                                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                                    <span class="visually-hidden">Next</span>
                                                </button>
                                            </div>

                                        </div>

                                        <div class="col-md-7">
                                            <br>
                                            <div> <p> <h7>4 BHK Apartment in <span class="location-right" id="cart_name"><b>Sabarmati</b></span></h7></p></div>
                                            <i class="material-icons" id="add-to-cart" >star</i>
                                            <h6 id="detail-title"><b>Maxima By Oberoi Reaity</b></h6><br>
    
                                            <div style="display: flex; ">
                                                <span id="price" ><h4><b>&#8377; 3.51-3.54cr</h4></b> </span> 
                                                <span id="area" style="position: relative; left:5rem;"> <h4><b>1,381-1,397<sub>sq.ft</sub></b></h4> </span> 
                                                <span id="bhk_right" style="position: relative; left:10rem;"> <h4><b>4 BHK</b></h4> </span> <br>
                                            </div><br>
                                            <div id="per_sq_ft">
                                                <h5 style="color: gray;"><b>&#8377;25.378/sq.ft</b></h5>
                                            </div><br>
    
                                           <p>Book Your 3 Bhk apartment in JVLR, Mumbai-Dahisar ...</p> 
                                           <a href="buyer.php"><button id="dealer"style="background:#0a5071;color:white;width:10rem;border-radius:2rem;">Contact Dealer</button></a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- box 5 -->
                            <div class="box villa builderfloor  5bhk">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-md-5">
                                            <div id="carouselExampleControls" class="carousel slide"
                                                data-bs-ride="carousel">
                                                <div class="carousel-inner">
                                                    <div class="carousel-item active">
                                                        <img src="img/chennai.jpg" class="d-block w-100" alt="...">
                                                    </div>
                                                    <div class="carousel-item">
                                                        <img src="img/project5.jpg" class="d-block w-100" alt="...">
                                                    </div>
                                                    <div class="carousel-item">
                                                        <img src="img/project7.jpg" class="d-block w-100" alt="...">
                                                    </div>
                                                </div>
                                                <button class="carousel-control-prev" type="button"
                                                    data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                                    <span class="visually-hidden">Previous</span>
                                                </button>
                                                <button class="carousel-control-next" type="button"
                                                    data-bs-target="#carouselExampleControls" data-bs-slide="next">
                                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                                    <span class="visually-hidden">Next</span>
                                                </button>
                                            </div>

                                        </div>

                                        <div class="col-md-7">
                                            <br>
                                        <div> <p> <h7>5 BHK Apartment in <span class="location-right" id="cart_name"><b>Vastrapur</b></span></h7></p></div>
                                        <i class="material-icons" id="add-to-cart" >star</i>
                                        <h6 id="detail-title"><b>Maxima By Oberoi Reaity</b></h6><br>

                                        <div style="display: flex; ">
                                            <span id="price" ><h4><b>&#8377; 3.51-3.54cr</h4></b> </span> 
                                            <span id="area" style="position: relative; left:5rem;"> <h4><b>1,381-1,397<sub>sq.ft</sub></b></h4> </span> 
                                            <span id="bhk_right" style="position: relative; left:10rem;"> <h4><b>5 BHK</b></h4> </span> <br>
                                        </div><br>
                                        <div id="per_sq_ft">
                                            <h5 style="color: gray;"><b>&#8377;25.378/sq.ft</b></h5>
                                        </div><br>

                                       <p>Book Your 3 Bhk apartment in JVLR, Mumbai-Dahisar ...</p> 
                                       <a href="buyer.php"><button id="dealer"style="background:#0a5071;color:white;width:10rem;border-radius:2rem;">Contact Dealer</button></a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- box 6 -->

                            <div class="box land Residentialfloor 6bhk rent">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-md-5">
                                            <div id="carouselExampleControls" class="carousel slide"
                                                data-bs-ride="carousel">
                                                <div class="carousel-inner">
                                                    <div class="carousel-item active">
                                                        <img src="img/delhi1.jpg" class="d-block w-100" alt="...">
                                                    </div>
                                                    <div class="carousel-item">
                                                        <img src="img/kolkata.jpg" class="d-block w-100" alt="...">
                                                    </div>
                                                    <div class="carousel-item">
                                                        <img src="img/hyderabad.jpg" class="d-block w-100" alt="...">
                                                    </div>
                                                </div>
                                                <button class="carousel-control-prev" type="button"
                                                    data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                                    <span class="visually-hidden">Previous</span>
                                                </button>
                                                <button class="carousel-control-next" type="button"
                                                    data-bs-target="#carouselExampleControls" data-bs-slide="next">
                                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                                    <span class="visually-hidden">Next</span>
                                                </button>
                                            </div>

                                        </div>

                                        <div class="col-md-7">
                                            <br>
                                            <div> <p> <h7>6 BHK Apartment in <span class="location-right" id="cart_name"><b>Thaltej</b></span></h7></p></div>
                                            <i class="material-icons" id="add-to-cart" >star</i>
                                            <h6 id="detail-title"><b>Maxima By Oberoi Reaity</b></h6><br>
    
                                            <div style="display: flex; ">
                                                <span id="price" ><h4><b>&#8377; 3.51-3.54cr</h4></b> </span> 
                                                <span id="area" style="position: relative; left:5rem;"> <h4><b>1,381-1,397<sub>sq.ft</sub></b></h4> </span> 
                                                <span id="bhk_right" style="position: relative; left:10rem;"> <h4><b>6 BHK</b></h4> </span> <br>
                                            </div><br>
                                            <div id="per_sq_ft">
                                                <h5 style="color: gray;"><b>&#8377;25.378/sq.ft</b></h5>
                                            </div><br>
    
                                           <p>Book Your 3 Bhk apartment in JVLR, Mumbai-Dahisar ...</p> 
                                           <a href="buyer.php"><button id="dealer"style="background:#0a5071;color:white;width:10rem;border-radius:2rem;">Contact Dealer</button></a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                                <!-- box 7 -->

                                <div class="box land  7bhk">
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-md-5">
                                                <div id="carouselExampleControls" class="carousel slide"
                                                    data-bs-ride="carousel">
                                                    <div class="carousel-inner">
                                                        <div class="carousel-item active">
                                                            <img src="img/delhi1.jpg" class="d-block w-100" alt="...">
                                                        </div>
                                                        <div class="carousel-item">
                                                            <img src="img/kolkata.jpg" class="d-block w-100" alt="...">
                                                        </div>
                                                        <div class="carousel-item">
                                                            <img src="img/hyderabad.jpg" class="d-block w-100" alt="...">
                                                        </div>
                                                    </div>
                                                    <button class="carousel-control-prev" type="button"
                                                        data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                                                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                                        <span class="visually-hidden">Previous</span>
                                                    </button>
                                                    <button class="carousel-control-next" type="button"
                                                        data-bs-target="#carouselExampleControls" data-bs-slide="next">
                                                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                                        <span class="visually-hidden">Next</span>
                                                    </button>
                                                </div>
    
                                            </div>
    
                                            <div class="col-md-7">
                                                <br>
                                                <div> <p> <h7>7 BHK Apartment in <span class="location-right" id="cart_name"><b>Paldi</b></span></h7></p></div>
                                                <i class="material-icons" id="add-to-cart" >star</i>
                                                <h6 id="detail-title"><b>Maxima By Oberoi Reaity</b></h6><br>
        
                                                <div style="display: flex; ">
                                                    <span id="price" ><h4><b>&#8377; 3.51-3.54cr</h4></b> </span> 
                                                    <span id="area" style="position: relative; left:5rem;"> <h4><b>1,381-1,397<sub>sq.ft</sub></b></h4> </span> 
                                                    <span id="bhk_right" style="position: relative; left:10rem;"> <h4><b>7 BHK</b></h4> </span> <br>
                                                </div><br>
                                                <div id="per_sq_ft">
                                                    <h5 style="color: gray;"><b>&#8377;25.378/sq.ft</b></h5>
                                                </div><br>
        
                                               <p>Book Your 3 Bhk apartment in JVLR, Mumbai-Dahisar ...</p> 
                                               <a href="buyer.php"><button id="dealer"style="background:#0a5071;color:white;width:10rem;border-radius:2rem;">Contact Dealer</button></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                    <!-- box 8-->

                            <div class="box land builderfloor Residentialfloor 8bhk">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-md-5">
                                            <div id="carouselExampleControls" class="carousel slide"
                                                data-bs-ride="carousel">
                                                <div class="carousel-inner">
                                                    <div class="carousel-item active">
                                                        <img src="img/project5.jpg" class="d-block w-100" alt="...">
                                                    </div>
                                                    <div class="carousel-item">
                                                        <img src="img/project7.jpg" class="d-block w-100" alt="...">
                                                    </div>
                                                    <div class="carousel-item">
                                                        <img src="img/project4.jpg" class="d-block w-100" alt="...">
                                                    </div>
                                                </div>
                                                <button class="carousel-control-prev" type="button"
                                                    data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                                    <span class="visually-hidden">Previous</span>
                                                </button>
                                                <button class="carousel-control-next" type="button"
                                                    data-bs-target="#carouselExampleControls" data-bs-slide="next">
                                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                                    <span class="visually-hidden">Next</span>
                                                </button>
                                            </div>

                                        </div>

                                        <div class="col-md-7">
                                            <br>
                                            <div> <p> <h7>8 BHK Apartment in <span class="location-right" id="cart_name"><b>Bapu Nagar</b></span></h7></p></div>
                                            <i class="material-icons" id="add-to-cart" >star</i>
                                            <h6 id="detail-title"><b>Maxima By Oberoi Reaity</b></h6><br>
    
                                            <div style="display: flex; ">
                                                <span id="price" ><h4><b>&#8377; 3.51-3.54cr</h4></b> </span> 
                                                <span id="area" style="position: relative; left:5rem;"> <h4><b>1,381-1,397<sub>sq.ft</sub></b></h4> </span> 
                                                <span id="bhk_right" style="position: relative; left:10rem;"> <h4><b>8 BHK</b></h4> </span> <br>
                                            </div><br>
                                            <div id="per_sq_ft">
                                                <h5 style="color: gray;"><b>&#8377;25.378/sq.ft</b></h5>
                                            </div><br>
    
                                           <p>Book Your 3 Bhk apartment in JVLR, Mumbai-Dahisar ...</p> 
                                           <a href="buyer.php"><button id="dealer"style="background:#0a5071;color:white;width:10rem;border-radius:2rem;">Contact Dealer</button></a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                                <!-- box 9 -->

                                <div class="box newhouse Residentialfloor 9bhk">
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-md-5">
                                                <div id="carouselExampleControls" class="carousel slide"
                                                    data-bs-ride="carousel">
                                                    <div class="carousel-inner">
                                                        <div class="carousel-item active">
                                                            <img src="img/p1.jpg" class="d-block w-100" alt="...">
                                                        </div>
                                                        <div class="carousel-item">
                                                            <img src="img/p2.jpg" class="d-block w-100" alt="...">
                                                        </div>
                                                        <div class="carousel-item">
                                                            <img src="img/p3.jpg" class="d-block w-100" alt="...">
                                                        </div>
                                                    </div>
                                                    <button class="carousel-control-prev" type="button"
                                                        data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                                                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                                        <span class="visually-hidden">Previous</span>
                                                    </button>
                                                    <button class="carousel-control-next" type="button"
                                                        data-bs-target="#carouselExampleControls" data-bs-slide="next">
                                                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                                        <span class="visually-hidden">Next</span>
                                                    </button>
                                                </div>
    
                                            </div>
    
                                            <div class="col-md-7">
                                                <br>
                                                <div> <p> <h7>9 BHK Apartment in <span class="location-right" id="cart_name"><b>Nikol</b></span></h7></p></div>
                                                <i class="material-icons" id="add-to-cart" >star</i>
                                                <h6 id="detail-title"><b>Maxima By Oberoi Reaity</b></h6><br>
        
                                                <div style="display: flex; ">
                                                    <span id="price" ><h4><b>&#8377; 3.51-3.54cr</h4></b> </span> 
                                                    <span id="area" style="position: relative; left:5rem;"> <h4><b>1,381-1,397<sub>sq.ft</sub></b></h4> </span> 
                                                    <span id="bhk_right" style="position: relative; left:10rem;"> <h4><b>9 BHK</b></h4> </span> <br>
                                                </div><br>
                                                <div id="per_sq_ft">
                                                    <h5 style="color: gray;"><b>&#8377;25.378/sq.ft</b></h5>
                                                </div><br>
        
                                               <p>Book Your 3 Bhk apartment in JVLR, Mumbai-Dahisar ...</p> 
                                               <a href="buyer.php"><button id="dealer"style="background:#0a5071;color:white;width:10rem;border-radius:2rem;">Contact Dealer</button></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                        </span>
                    </div>
                </section><br>

               <!-- hyderabad -->

                <section class="properties1 container " id="properties">
                    <div class="heading" id="hyderabad">
                        <button class="read-more-btn">View all</button>

                        <h2><b>Hyderabad</b></h2>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit<br> Accusantium,Lorem ipsum dolor
                            sit
                            amet consectetur adipisicing elit. Doloremque ex quo reiciendis minus explicabo </p>

                    </div>

                    <div class="properties-container1 container">
                        <!-- box 1 -->
                        <div class="box residential Apartment 1bhk newhouse rent">
                            <div class="container" >
                                <div class="row card-item">
                                    <div class="col-md-5">
                                        <div id="carouselExampleControls" class="carousel slide"
                                            data-bs-ride="carousel">
                                            <div class="carousel-inner">
                                                <div class="carousel-item active">
                                                    <img src="img/p2.jpg" class="d-block w-100" alt="..." >
                                                </div>
                                                <div class="carousel-item">
                                                    <img src="img/p3.jpg" class="d-block w-100" alt="...">
                                                </div>
                                                <div class="carousel-item">
                                                    <img src="img/p5.jpg" class="d-block w-100" alt="...">
                                                </div>
                                            </div>
                                            <button class="carousel-control-prev" type="button"
                                                data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                                <span class="visually-hidden">Previous</span>
                                            </button>
                                            <button class="carousel-control-next" type="button"
                                                data-bs-target="#carouselExampleControls" data-bs-slide="next">
                                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                                <span class="visually-hidden">Next</span>
                                            </button>
                                        </div>

                                    </div>


                                    <div class="col-md-7">
                                        <br>
                                        <div> <p> <h7>1 BHK Apartment in <span class="location-right" ><b>Madha pur</b></span></h7></p></div>
                                        <i class="material-icons"  id="add-to-cart" >star</i>
                                        <h6 id="detail-title"><b>Maxima By Oberoi Reaity</b></h6><br>

                                        <div style="display: flex; ">
                                            <span id="price" ><h4><b>&#8377; 3.51-3.54cr</h4></b> </span> 
                                            <span id="area" style="position: relative; left:5rem;"> <h4><b>1,381-1,397<sub>sq.ft</sub></b></h4> </span> 
                                            <span id="bhk_right" style="position: relative; left:10rem;"> <h4><b>1 BHK</b></h4> </span> <br>
                                        </div><br>
                                        <div id="per_sq_ft">
                                            <h5 style="color: gray;"><b>&#8377;25.378/sq.ft</b></h5>
                                        </div><br>

                                       <p>Book Your 3 Bhk apartment in JVLR, Mumbai-Dahisar ...</p> 
                                       <a href="buyer.php"><button id="dealer"style="background:#0a5071;color:white;width:10rem;border-radius:2rem;">Contact Dealer</button></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- box 2 -->
                        <div class="box residential Apartment 2bhk">
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-5">
                                        <div id="carouselExampleControls" class="carousel slide"
                                            data-bs-ride="carousel">
                                            <div class="carousel-inner">
                                                <div class="carousel-item active">
                                                    <img src="img/p2.jpg" class="d-block w-100" alt="...">
                                                </div>
                                                <div class="carousel-item">
                                                    <img src="img/p3.jpg" class="d-block w-100" alt="...">
                                                </div>
                                                <div class="carousel-item">
                                                    <img src="img/p5.jpg" class="d-block w-100" alt="...">
                                                </div>
                                            </div>
                                            <button class="carousel-control-prev" type="button"
                                                data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                                <span class="visually-hidden">Previous</span>
                                            </button>
                                            <button class="carousel-control-next" type="button"
                                                data-bs-target="#carouselExampleControls" data-bs-slide="next">
                                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                                <span class="visually-hidden">Next</span>
                                            </button>
                                        </div>

                                    </div>


                                    <div class="col-md-7">
                                        <br>
                                        <div> <p> <h7>2 BHK Apartment in <span class="location-right" id="cart_name"><b>Mia Pur</b></span></h7></p></div>
                                        <i class="material-icons" id="add-to-cart" >star</i>
                                        <h6 id="detail-title"><b>Maxima By Oberoi Reaity</b></h6><br>

                                        <div style="display: flex; ">
                                            <span id="price" ><h4><b>&#8377; 3.51-3.54cr</h4></b> </span> 
                                            <span id="area" style="position: relative; left:5rem;"> <h4><b>1,381-1,397<sub>sq.ft</sub></b></h4> </span> 
                                            <span id="bhk_right" style="position: relative; left:10rem;"> <h4><b>2 BHK</b></h4> </span> <br>
                                        </div><br>
                                        <div id="per_sq_ft">
                                            <h5 style="color: gray;"><b>&#8377;25.378/sq.ft</b></h5>
                                        </div><br>

                                       <p>Book Your 3 Bhk apartment in JVLR, Mumbai-Dahisar ...</p> 
                                       <a href="buyer.php"><button id="dealer"style="background:#0a5071;color:white;width:10rem;border-radius:2rem;">Contact Dealer</button></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- box 3 -->
                        <div class="box studio Apartment land housefarm 3bhk rent">
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-5">
                                        <div id="carouselExampleControls" class="carousel slide"
                                            data-bs-ride="carousel">
                                            <div class="carousel-inner">
                                                <div class="carousel-item active">
                                                    <img src="img/project1.jpg" class="d-block w-100" alt="...">
                                                </div>
                                                <div class="carousel-item">
                                                    <img src="img/project2.jpg" class="d-block w-100" alt="...">
                                                </div>
                                                <div class="carousel-item">
                                                    <img src="img/project3.jpg" class="d-block w-100" alt="...">
                                                </div>
                                            </div>
                                            <button class="carousel-control-prev" type="button"
                                                data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                                <span class="visually-hidden">Previous</span>
                                            </button>
                                            <button class="carousel-control-next" type="button"
                                                data-bs-target="#carouselExampleControls" data-bs-slide="next">
                                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                                <span class="visually-hidden">Next</span>
                                            </button>
                                        </div>

                                    </div>


                                    <div class="col-md-7">
                                        <br>
                                        <div> <p> <h7>3 BHK Apartment in <span class="location-right" id="cart_name"><b>Bala Pur</b></span></h7></p></div>
                                        <i class="material-icons" id="add-to-cart" >star</i>
                                        <h6 id="detail-title"><b>Maxima By Oberoi Reaity</b></h6><br>

                                        <div style="display: flex; ">
                                            <span id="price" ><h4><b>&#8377; 3.51-3.54cr</h4></b> </span> 
                                            <span id="area" style="position: relative; left:5rem;"> <h4><b>1,381-1,397<sub>sq.ft</sub></b></h4> </span> 
                                            <span id="bhk_right" style="position: relative; left:10rem;"> <h4><b>3 BHK</b></h4> </span> <br>
                                        </div><br>
                                        <div id="per_sq_ft">
                                            <h5 style="color: gray;"><b>&#8377;25.378/sq.ft</b></h5>
                                        </div><br>

                                       <p>Book Your 3 Bhk apartment in JVLR, Mumbai-Dahisar ...</p> 
                                       <a href="buyer.php"><button id="dealer"style="background:#0a5071;color:white;width:10rem;border-radius:2rem;">Contact Dealer</button></a>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <!-- box 3 .1-->
                        <div class="box  housefarm 3bhk">
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-5">
                                        <div id="carouselExampleControls" class="carousel slide"
                                            data-bs-ride="carousel">
                                            <div class="carousel-inner">
                                                <div class="carousel-item active">
                                                    <img src="img/mumbai.jpg" class="d-block w-100" alt="...">
                                                </div>
                                                <div class="carousel-item">
                                                    <img src="img/project4.jpg" class="d-block w-100" alt="...">
                                                </div>
                                                <div class="carousel-item">
                                                    <img src="img/project5.jpg" class="d-block w-100" alt="...">
                                                </div>
                                            </div>
                                            <button class="carousel-control-prev" type="button"
                                                data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                                <span class="visually-hidden">Previous</span>
                                            </button>
                                            <button class="carousel-control-next" type="button"
                                                data-bs-target="#carouselExampleControls" data-bs-slide="next">
                                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                                <span class="visually-hidden">Next</span>
                                            </button>
                                        </div>

                                    </div>


                                    <div class="col-md-7">
                                        <br>
                                        <div> <p> <h7>3 BHK Apartment in <span class="location-right" id="cart_name"><b>VanasthaliPuram</b></span></h7></p></div>
                                        <i class="material-icons" id="add-to-cart" >star</i>
                                        <h6 id="detail-title"><b>Maxima By Oberoi Reaity</b></h6><br>

                                        <div style="display: flex; ">
                                            <span id="price" ><h4><b>&#8377; 3.51-3.54cr</h4></b> </span> 
                                            <span id="area" style="position: relative; left:5rem;"> <h4><b>1,381-1,397<sub>sq.ft</sub></b></h4> </span> 
                                            <span id="bhk_right" style="position: relative; left:10rem;"> <h4><b>3 BHK</b></h4> </span> <br>
                                        </div><br>
                                        <div id="per_sq_ft">
                                            <h5 style="color: gray;"><b>&#8377;25.378/sq.ft</b></h5>
                                        </div><br>

                                       <p>Book Your 3 Bhk apartment in JVLR, Mumbai-Dahisar ...</p> 
                                       <a href="buyer.php"><button id="dealer"style="background:#0a5071;color:white;width:10rem;border-radius:2rem;">Contact Dealer</button></a>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <!-- box 4 -->
                        <span class="more">
                            <div class="box villa newhouse housefarm 4bhk rent">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-md-5">
                                            <div id="carouselExampleControls" class="carousel slide"
                                                data-bs-ride="carousel">
                                                <div class="carousel-inner">
                                                    <div class="carousel-item active">
                                                        <img src="img/chennai.jpg" class="d-block w-100" alt="...">
                                                    </div>
                                                    <div class="carousel-item">
                                                        <img src="img/mumbai.jpg" class="d-block w-100" alt="...">
                                                    </div>
                                                    <div class="carousel-item">
                                                        <img src="img/kolkata.jpg" class="d-block w-100" alt="...">
                                                    </div>
                                                </div>
                                                <button class="carousel-control-prev" type="button"
                                                    data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                                    <span class="visually-hidden">Previous</span>
                                                </button>
                                                <button class="carousel-control-next" type="button"
                                                    data-bs-target="#carouselExampleControls" data-bs-slide="next">
                                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                                    <span class="visually-hidden">Next</span>
                                                </button>
                                            </div>

                                        </div>

                                        <div class="col-md-7">
                                            <br>
                                            <div> <p> <h7>4 BHK Apartment in <span class="location-right" id="cart_name"><b>Secunderabad</b></span></h7></p></div>
                                            <i class="material-icons" id="add-to-cart" >star</i>
                                            <h6 id="detail-title"><b>Maxima By Oberoi Reaity</b></h6><br>
    
                                            <div style="display: flex; ">
                                                <span id="price" ><h4><b>&#8377; 3.51-3.54cr</h4></b> </span> 
                                                <span id="area" style="position: relative; left:5rem;"> <h4><b>1,381-1,397<sub>sq.ft</sub></b></h4> </span> 
                                                <span id="bhk_right" style="position: relative; left:10rem;"> <h4><b>4 BHK</b></h4> </span> <br>
                                            </div><br>
                                            <div id="per_sq_ft">
                                                <h5 style="color: gray;"><b>&#8377;25.378/sq.ft</b></h5>
                                            </div><br>
    
                                           <p>Book Your 3 Bhk apartment in JVLR, Mumbai-Dahisar ...</p> 
                                           <a href="buyer.php"><button id="dealer"style="background:#0a5071;color:white;width:10rem;border-radius:2rem;">Contact Dealer</button></a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- box 5 -->
                            <div class="box villa newhouse 5bhk">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-md-5">
                                            <div id="carouselExampleControls" class="carousel slide"
                                                data-bs-ride="carousel">
                                                <div class="carousel-inner">
                                                    <div class="carousel-item active">
                                                        <img src="img/chennai.jpg" class="d-block w-100" alt="...">
                                                    </div>
                                                    <div class="carousel-item">
                                                        <img src="img/project5.jpg" class="d-block w-100" alt="...">
                                                    </div>
                                                    <div class="carousel-item">
                                                        <img src="img/project7.jpg" class="d-block w-100" alt="...">
                                                    </div>
                                                </div>
                                                <button class="carousel-control-prev" type="button"
                                                    data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                                    <span class="visually-hidden">Previous</span>
                                                </button>
                                                <button class="carousel-control-next" type="button"
                                                    data-bs-target="#carouselExampleControls" data-bs-slide="next">
                                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                                    <span class="visually-hidden">Next</span>
                                                </button>
                                            </div>

                                        </div>

                                        <div class="col-md-7">
                                            <br>
                                        <div> <p> <h7>5 BHK Apartment in <span class="location-right" id="cart_name"><b>Adibatla</b></span></h7></p></div>
                                        <i class="material-icons" id="add-to-cart" >star</i>
                                        <h6 id="detail-title"><b>Maxima By Oberoi Reaity</b></h6><br>

                                        <div style="display: flex; ">
                                            <span id="price" ><h4><b>&#8377; 3.51-3.54cr</h4></b> </span> 
                                            <span id="area" style="position: relative; left:5rem;"> <h4><b>1,381-1,397<sub>sq.ft</sub></b></h4> </span> 
                                            <span id="bhk_right" style="position: relative; left:10rem;"> <h4><b>5 BHK</b></h4> </span> <br>
                                        </div><br>
                                        <div id="per_sq_ft">
                                            <h5 style="color: gray;"><b>&#8377;25.378/sq.ft</b></h5>
                                        </div><br>

                                       <p>Book Your 3 Bhk apartment in JVLR, Mumbai-Dahisar ...</p> 
                                       <a href="buyer.php"><button id="dealer"style="background:#0a5071;color:white;width:10rem;border-radius:2rem;">Contact Dealer</button></a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- box 6 -->

                            <div class="box land builderfloor Residentialfloor 6bhk rent">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-md-5">
                                            <div id="carouselExampleControls" class="carousel slide"
                                                data-bs-ride="carousel">
                                                <div class="carousel-inner">
                                                    <div class="carousel-item active">
                                                        <img src="img/delhi1.jpg" class="d-block w-100" alt="...">
                                                    </div>
                                                    <div class="carousel-item">
                                                        <img src="img/kolkata.jpg" class="d-block w-100" alt="...">
                                                    </div>
                                                    <div class="carousel-item">
                                                        <img src="img/hyderabad.jpg" class="d-block w-100" alt="...">
                                                    </div>
                                                </div>
                                                <button class="carousel-control-prev" type="button"
                                                    data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                                    <span class="visually-hidden">Previous</span>
                                                </button>
                                                <button class="carousel-control-next" type="button"
                                                    data-bs-target="#carouselExampleControls" data-bs-slide="next">
                                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                                    <span class="visually-hidden">Next</span>
                                                </button>
                                            </div>

                                        </div>

                                        <div class="col-md-7">
                                            <br>
                                            <div> <p> <h7>6 BHK Apartment in <span class="location-right" id="cart_name"><b>Nadargul</b></span></h7></p></div>
                                            <i class="material-icons" id="add-to-cart" >star</i>
                                            <h6 id="detail-title"><b>Maxima By Oberoi Reaity</b></h6><br>
    
                                            <div style="display: flex; ">
                                                <span id="price" ><h4><b>&#8377; 3.51-3.54cr</h4></b> </span> 
                                                <span id="area" style="position: relative; left:5rem;"> <h4><b>1,381-1,397<sub>sq.ft</sub></b></h4> </span> 
                                                <span id="bhk_right" style="position: relative; left:10rem;"> <h4><b>6 BHK</b></h4> </span> <br>
                                            </div><br>
                                            <div id="per_sq_ft">
                                                <h5 style="color: gray;"><b>&#8377;25.378/sq.ft</b></h5>
                                            </div><br>
    
                                           <p>Book Your 3 Bhk apartment in JVLR, Mumbai-Dahisar ...</p> 
                                           <a href="buyer.php"><button id="dealer"style="background:#0a5071;color:white;width:10rem;border-radius:2rem;">Contact Dealer</button></a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                                <!-- box 7 -->

                                <div class="box farm 7bhk">
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-md-5">
                                                <div id="carouselExampleControls" class="carousel slide"
                                                    data-bs-ride="carousel">
                                                    <div class="carousel-inner">
                                                        <div class="carousel-item active">
                                                            <img src="img/delhi1.jpg" class="d-block w-100" alt="...">
                                                        </div>
                                                        <div class="carousel-item">
                                                            <img src="img/kolkata.jpg" class="d-block w-100" alt="...">
                                                        </div>
                                                        <div class="carousel-item">
                                                            <img src="img/hyderabad.jpg" class="d-block w-100" alt="...">
                                                        </div>
                                                    </div>
                                                    <button class="carousel-control-prev" type="button"
                                                        data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                                                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                                        <span class="visually-hidden">Previous</span>
                                                    </button>
                                                    <button class="carousel-control-next" type="button"
                                                        data-bs-target="#carouselExampleControls" data-bs-slide="next">
                                                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                                        <span class="visually-hidden">Next</span>
                                                    </button>
                                                </div>
    
                                            </div>
    
                                            <div class="col-md-7">
                                                <br>
                                                <div> <p> <h7>7 BHK Apartment in <span class="location-right" id="cart_name"><b>GandiGuda</b></span></h7></p></div>
                                                <i class="material-icons" id="add-to-cart" >star</i>
                                                <h6 id="detail-title"><b>Maxima By Oberoi Reaity</b></h6><br>
        
                                                <div style="display: flex; ">
                                                    <span id="price" ><h4><b>&#8377; 3.51-3.54cr</h4></b> </span> 
                                                    <span id="area" style="position: relative; left:5rem;"> <h4><b>1,381-1,397<sub>sq.ft</sub></b></h4> </span> 
                                                    <span id="bhk_right" style="position: relative; left:10rem;"> <h4><b>7 BHK</b></h4> </span> <br>
                                                </div><br>
                                                <div id="per_sq_ft">
                                                    <h5 style="color: gray;"><b>&#8377;25.378/sq.ft</b></h5>
                                                </div><br>
        
                                               <p>Book Your 3 Bhk apartment in JVLR, Mumbai-Dahisar ...</p> 
                                               <a href="buyer.php"><button id="dealer"style="background:#0a5071;color:white;width:10rem;border-radius:2rem;">Contact Dealer</button></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                    <!-- box 8-->

                            <div class="box land builderfloor Residentialfloor 8bhk">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-md-5">
                                            <div id="carouselExampleControls" class="carousel slide"
                                                data-bs-ride="carousel">
                                                <div class="carousel-inner">
                                                    <div class="carousel-item active">
                                                        <img src="img/project5.jpg" class="d-block w-100" alt="...">
                                                    </div>
                                                    <div class="carousel-item">
                                                        <img src="img/project7.jpg" class="d-block w-100" alt="...">
                                                    </div>
                                                    <div class="carousel-item">
                                                        <img src="img/project4.jpg" class="d-block w-100" alt="...">
                                                    </div>
                                                </div>
                                                <button class="carousel-control-prev" type="button"
                                                    data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                                    <span class="visually-hidden">Previous</span>
                                                </button>
                                                <button class="carousel-control-next" type="button"
                                                    data-bs-target="#carouselExampleControls" data-bs-slide="next">
                                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                                    <span class="visually-hidden">Next</span>
                                                </button>
                                            </div>

                                        </div>

                                        <div class="col-md-7">
                                            <br>
                                            <div> <p> <h7>8 BHK Apartment in <span class="location-right" id="cart_name"><b>Amdapur</b></span></h7></p></div>
                                            <i class="material-icons" id="add-to-cart" >star</i>
                                            <h6 id="detail-title"><b>Maxima By Oberoi Reaity</b></h6><br>
    
                                            <div style="display: flex; ">
                                                <span id="price" ><h4><b>&#8377; 3.51-3.54cr</h4></b> </span> 
                                                <span id="area" style="position: relative; left:5rem;"> <h4><b>1,381-1,397<sub>sq.ft</sub></b></h4> </span> 
                                                <span id="bhk_right" style="position: relative; left:10rem;"> <h4><b>8 BHK</b></h4> </span> <br>
                                            </div><br>
                                            <div id="per_sq_ft">
                                                <h5 style="color: gray;"><b>&#8377;25.378/sq.ft</b></h5>
                                            </div><br>
    
                                           <p>Book Your 3 Bhk apartment in JVLR, Mumbai-Dahisar ...</p> 
                                           <a href="buyer.php"><button id="dealer"style="background:#0a5071;color:white;width:10rem;border-radius:2rem;">Contact Dealer</button></a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                                <!-- box 9 -->

                                <div class="box residential Apartment 9bhk rent">
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-md-5">
                                                <div id="carouselExampleControls" class="carousel slide"
                                                    data-bs-ride="carousel">
                                                    <div class="carousel-inner">
                                                        <div class="carousel-item active">
                                                            <img src="img/p1.jpg" class="d-block w-100" alt="...">
                                                        </div>
                                                        <div class="carousel-item">
                                                            <img src="img/p2.jpg" class="d-block w-100" alt="...">
                                                        </div>
                                                        <div class="carousel-item">
                                                            <img src="img/p3.jpg" class="d-block w-100" alt="...">
                                                        </div>
                                                    </div>
                                                    <button class="carousel-control-prev" type="button"
                                                        data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                                                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                                        <span class="visually-hidden">Previous</span>
                                                    </button>
                                                    <button class="carousel-control-next" type="button"
                                                        data-bs-target="#carouselExampleControls" data-bs-slide="next">
                                                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                                        <span class="visually-hidden">Next</span>
                                                    </button>
                                                </div>
    
                                            </div>
    
                                            <div class="col-md-7">
                                                <br>
                                                <div> <p> <h7>9 BHK Apartment in <span class="location-right" id="cart_name"><b>Solipet</b></span></h7></p></div>
                                                <i class="material-icons" id="add-to-cart" >star</i>
                                                <h6 id="detail-title"><b>Maxima By Oberoi Reaity</b></h6><br>
        
                                                <div style="display: flex; ">
                                                    <span id="price" ><h4><b>&#8377; 3.51-3.54cr</h4></b> </span> 
                                                    <span id="area" style="position: relative; left:5rem;"> <h4><b>1,381-1,397<sub>sq.ft</sub></b></h4> </span> 
                                                    <span id="bhk_right" style="position: relative; left:10rem;"> <h4><b>9 BHK</b></h4> </span> <br>
                                                </div><br>
                                                <div id="per_sq_ft">
                                                    <h5 style="color: gray;"><b>&#8377;25.378/sq.ft</b></h5>
                                                </div><br>
        
                                               <p>Book Your 3 Bhk apartment in JVLR, Mumbai-Dahisar ...</p> 
                                               <a href="buyer.php"><button id="dealer"style="background:#0a5071;color:white;width:10rem;border-radius:2rem;">Contact Dealer</button></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                        </span>
                    </div>
                </section><br>

                    <!-- chennai -->

                <section class="properties1 container " id="properties">
                    <div class="heading" id="chennai">
                        <button class="read-more-btn">View all</button>

                        <h2><b>Chennai</b></h2>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit<br> Accusantium,Lorem ipsum dolor
                            sit
                            amet consectetur adipisicing elit. Doloremque ex quo reiciendis minus explicabo </p>

                    </div>

                    <div class="properties-container1 container">
                        <!-- box 1 -->
                        <div class="box residential Apartment 1bhk rent">
                            <div class="container" >
                                <div class="row card-item">
                                    <div class="col-md-5">
                                        <div id="carouselExampleControls" class="carousel slide"
                                            data-bs-ride="carousel">
                                            <div class="carousel-inner">
                                                <div class="carousel-item active">
                                                    <img src="img/p2.jpg" class="d-block w-100" alt="..." >
                                                </div>
                                                <div class="carousel-item">
                                                    <img src="img/p3.jpg" class="d-block w-100" alt="...">
                                                </div>
                                                <div class="carousel-item">
                                                    <img src="img/p5.jpg" class="d-block w-100" alt="...">
                                                </div>
                                            </div>
                                            <button class="carousel-control-prev" type="button"
                                                data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                                <span class="visually-hidden">Previous</span>
                                            </button>
                                            <button class="carousel-control-next" type="button"
                                                data-bs-target="#carouselExampleControls" data-bs-slide="next">
                                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                                <span class="visually-hidden">Next</span>
                                            </button>
                                        </div>

                                    </div>


                                    <div class="col-md-7">
                                        <br>
                                        <div> <p> <h7>1 BHK Apartment in <span class="location-right" ><b>Mathur</b></span></h7></p></div>
                                        <i class="material-icons"  id="add-to-cart" >star</i>
                                        <h6 id="detail-title"><b>Maxima By Oberoi Reaity</b></h6><br>

                                        <div style="display: flex; ">
                                            <span id="price" ><h4><b>&#8377; 3.51-3.54cr</h4></b> </span> 
                                            <span id="area" style="position: relative; left:5rem;"> <h4><b>1,381-1,397<sub>sq.ft</sub></b></h4> </span> 
                                            <span id="bhk_right" style="position: relative; left:10rem;"> <h4><b>1 BHK</b></h4> </span> <br>
                                        </div><br>
                                        <div id="per_sq_ft">
                                            <h5 style="color: gray;"><b>&#8377;25.378/sq.ft</b></h5>
                                        </div><br>

                                       <p>Book Your 3 Bhk apartment in JVLR, Mumbai-Dahisar ...</p> 
                                       <a href="buyer.php"><button id="dealer"style="background:#0a5071;color:white;width:10rem;border-radius:2rem;">Contact Dealer</button></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- box 2 -->
                        <div class="box residential Apartment 2bhk newhouse">
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-5">
                                        <div id="carouselExampleControls" class="carousel slide"
                                            data-bs-ride="carousel">
                                            <div class="carousel-inner">
                                                <div class="carousel-item active">
                                                    <img src="img/p2.jpg" class="d-block w-100" alt="...">
                                                </div>
                                                <div class="carousel-item">
                                                    <img src="img/p3.jpg" class="d-block w-100" alt="...">
                                                </div>
                                                <div class="carousel-item">
                                                    <img src="img/p5.jpg" class="d-block w-100" alt="...">
                                                </div>
                                            </div>
                                            <button class="carousel-control-prev" type="button"
                                                data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                                <span class="visually-hidden">Previous</span>
                                            </button>
                                            <button class="carousel-control-next" type="button"
                                                data-bs-target="#carouselExampleControls" data-bs-slide="next">
                                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                                <span class="visually-hidden">Next</span>
                                            </button>
                                        </div>

                                    </div>


                                    <div class="col-md-7">
                                        <br>
                                        <div> <p> <h7>2 BHK Apartment in <span class="location-right" id="cart_name"><b>Vichor</b></span></h7></p></div>
                                        <i class="material-icons" id="add-to-cart" >star</i>
                                        <h6 id="detail-title"><b>Maxima By Oberoi Reaity</b></h6><br>

                                        <div style="display: flex; ">
                                            <span id="price" ><h4><b>&#8377; 3.51-3.54cr</h4></b> </span> 
                                            <span id="area" style="position: relative; left:5rem;"> <h4><b>1,381-1,397<sub>sq.ft</sub></b></h4> </span> 
                                            <span id="bhk_right" style="position: relative; left:10rem;"> <h4><b>2 BHK</b></h4> </span> <br>
                                        </div><br>
                                        <div id="per_sq_ft">
                                            <h5 style="color: gray;"><b>&#8377;25.378/sq.ft</b></h5>
                                        </div><br>

                                       <p>Book Your 3 Bhk apartment in JVLR, Mumbai-Dahisar ...</p> 
                                       <a href="buyer.php"><button id="dealer"style="background:#0a5071;color:white;width:10rem;border-radius:2rem;">Contact Dealer</button></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- box 3 -->
                        <div class="box studio Apartment land housefarm 3bhk">
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-5">
                                        <div id="carouselExampleControls" class="carousel slide"
                                            data-bs-ride="carousel">
                                            <div class="carousel-inner">
                                                <div class="carousel-item active">
                                                    <img src="img/project1.jpg" class="d-block w-100" alt="...">
                                                </div>
                                                <div class="carousel-item">
                                                    <img src="img/project2.jpg" class="d-block w-100" alt="...">
                                                </div>
                                                <div class="carousel-item">
                                                    <img src="img/project3.jpg" class="d-block w-100" alt="...">
                                                </div>
                                            </div>
                                            <button class="carousel-control-prev" type="button"
                                                data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                                <span class="visually-hidden">Previous</span>
                                            </button>
                                            <button class="carousel-control-next" type="button"
                                                data-bs-target="#carouselExampleControls" data-bs-slide="next">
                                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                                <span class="visually-hidden">Next</span>
                                            </button>
                                        </div>

                                    </div>


                                    <div class="col-md-7">
                                        <br>
                                        <div> <p> <h7>3 BHK Apartment in <span class="location-right" id="cart_name"><b>RoyaPuram</b></span></h7></p></div>
                                        <i class="material-icons" id="add-to-cart" >star</i>
                                        <h6 id="detail-title"><b>Maxima By Oberoi Reaity</b></h6><br>

                                        <div style="display: flex; ">
                                            <span id="price" ><h4><b>&#8377; 3.51-3.54cr</h4></b> </span> 
                                            <span id="area" style="position: relative; left:5rem;"> <h4><b>1,381-1,397<sub>sq.ft</sub></b></h4> </span> 
                                            <span id="bhk_right" style="position: relative; left:10rem;"> <h4><b>3 BHK</b></h4> </span> <br>
                                        </div><br>
                                        <div id="per_sq_ft">
                                            <h5 style="color: gray;"><b>&#8377;25.378/sq.ft</b></h5>
                                        </div><br>

                                       <p>Book Your 3 Bhk apartment in JVLR, Mumbai-Dahisar ...</p> 
                                       <a href="buyer.php"><button id="dealer"style="background:#0a5071;color:white;width:10rem;border-radius:2rem;">Contact Dealer</button></a>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <!-- box 3 .1-->
                        <div class="box land housefarm 3bhk rent">
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-5">
                                        <div id="carouselExampleControls" class="carousel slide"
                                            data-bs-ride="carousel">
                                            <div class="carousel-inner">
                                                <div class="carousel-item active">
                                                    <img src="img/mumbai.jpg" class="d-block w-100" alt="...">
                                                </div>
                                                <div class="carousel-item">
                                                    <img src="img/project4.jpg" class="d-block w-100" alt="...">
                                                </div>
                                                <div class="carousel-item">
                                                    <img src="img/project5.jpg" class="d-block w-100" alt="...">
                                                </div>
                                            </div>
                                            <button class="carousel-control-prev" type="button"
                                                data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                                <span class="visually-hidden">Previous</span>
                                            </button>
                                            <button class="carousel-control-next" type="button"
                                                data-bs-target="#carouselExampleControls" data-bs-slide="next">
                                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                                <span class="visually-hidden">Next</span>
                                            </button>
                                        </div>

                                    </div>


                                    <div class="col-md-7">
                                        <br>
                                        <div> <p> <h7>3 BHK Apartment in <span class="location-right" id="cart_name"><b>Aana Nagar</b></span></h7></p></div>
                                        <i class="material-icons" id="add-to-cart" >star</i>
                                        <h6 id="detail-title"><b>Maxima By Oberoi Reaity</b></h6><br>

                                        <div style="display: flex; ">
                                            <span id="price" ><h4><b>&#8377; 3.51-3.54cr</h4></b> </span> 
                                            <span id="area" style="position: relative; left:5rem;"> <h4><b>1,381-1,397<sub>sq.ft</sub></b></h4> </span> 
                                            <span id="bhk_right" style="position: relative; left:10rem;"> <h4><b>3 BHK</b></h4> </span> <br>
                                        </div><br>
                                        <div id="per_sq_ft">
                                            <h5 style="color: gray;"><b>&#8377;25.378/sq.ft</b></h5>
                                        </div><br>

                                       <p>Book Your 3 Bhk apartment in JVLR, Mumbai-Dahisar ...</p> 
                                       <a href="buyer.php"><button id="dealer"style="background:#0a5071;color:white;width:10rem;border-radius:2rem;">Contact Dealer</button></a>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <!-- box 4 -->
                        <span class="more">
                            <div class="box villa land housefarm  newhouse 4bhk">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-md-5">
                                            <div id="carouselExampleControls" class="carousel slide"
                                                data-bs-ride="carousel">
                                                <div class="carousel-inner">
                                                    <div class="carousel-item active">
                                                        <img src="img/chennai.jpg" class="d-block w-100" alt="...">
                                                    </div>
                                                    <div class="carousel-item">
                                                        <img src="img/mumbai.jpg" class="d-block w-100" alt="...">
                                                    </div>
                                                    <div class="carousel-item">
                                                        <img src="img/kolkata.jpg" class="d-block w-100" alt="...">
                                                    </div>
                                                </div>
                                                <button class="carousel-control-prev" type="button"
                                                    data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                                    <span class="visually-hidden">Previous</span>
                                                </button>
                                                <button class="carousel-control-next" type="button"
                                                    data-bs-target="#carouselExampleControls" data-bs-slide="next">
                                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                                    <span class="visually-hidden">Next</span>
                                                </button>
                                            </div>

                                        </div>

                                        <div class="col-md-7">
                                            <br>
                                            <div> <p> <h7>4 BHK Apartment in <span class="location-right" id="cart_name"><b>Koyambedu</b></span></h7></p></div>
                                            <i class="material-icons" id="add-to-cart" >star</i>
                                            <h6 id="detail-title"><b>Maxima By Oberoi Reaity</b></h6><br>
    
                                            <div style="display: flex; ">
                                                <span id="price" ><h4><b>&#8377; 3.51-3.54cr</h4></b> </span> 
                                                <span id="area" style="position: relative; left:5rem;"> <h4><b>1,381-1,397<sub>sq.ft</sub></b></h4> </span> 
                                                <span id="bhk_right" style="position: relative; left:10rem;"> <h4><b>4 BHK</b></h4> </span> <br>
                                            </div><br>
                                            <div id="per_sq_ft">
                                                <h5 style="color: gray;"><b>&#8377;25.378/sq.ft</b></h5>
                                            </div><br>
    
                                           <p>Book Your 3 Bhk apartment in JVLR, Mumbai-Dahisar ...</p> 
                                           <a href="buyer.php"><button id="dealer"style="background:#0a5071;color:white;width:10rem;border-radius:2rem;">Contact Dealer</button></a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- box 5 -->
                            <div class="box villa builderfloor Residentialfloor  newhouse 5bhk">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-md-5">
                                            <div id="carouselExampleControls" class="carousel slide"
                                                data-bs-ride="carousel">
                                                <div class="carousel-inner">
                                                    <div class="carousel-item active">
                                                        <img src="img/chennai.jpg" class="d-block w-100" alt="...">
                                                    </div>
                                                    <div class="carousel-item">
                                                        <img src="img/project5.jpg" class="d-block w-100" alt="...">
                                                    </div>
                                                    <div class="carousel-item">
                                                        <img src="img/project7.jpg" class="d-block w-100" alt="...">
                                                    </div>
                                                </div>
                                                <button class="carousel-control-prev" type="button"
                                                    data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                                    <span class="visually-hidden">Previous</span>
                                                </button>
                                                <button class="carousel-control-next" type="button"
                                                    data-bs-target="#carouselExampleControls" data-bs-slide="next">
                                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                                    <span class="visually-hidden">Next</span>
                                                </button>
                                            </div>

                                        </div>

                                        <div class="col-md-7">
                                            <br>
                                        <div> <p> <h7>5 BHK Apartment in <span class="location-right" id="cart_name"><b>Ramapuram</b></span></h7></p></div>
                                        <i class="material-icons" id="add-to-cart" >star</i>
                                        <h6 id="detail-title"><b>Maxima By Oberoi Reaity</b></h6><br>

                                        <div style="display: flex; ">
                                            <span id="price" ><h4><b>&#8377; 3.51-3.54cr</h4></b> </span> 
                                            <span id="area" style="position: relative; left:5rem;"> <h4><b>1,381-1,397<sub>sq.ft</sub></b></h4> </span> 
                                            <span id="bhk_right" style="position: relative; left:10rem;"> <h4><b>5 BHK</b></h4> </span> <br>
                                        </div><br>
                                        <div id="per_sq_ft">
                                            <h5 style="color: gray;"><b>&#8377;25.378/sq.ft</b></h5>
                                        </div><br>

                                       <p>Book Your 3 Bhk apartment in JVLR, Mumbai-Dahisar ...</p> 
                                       <a href="buyer.php"><button id="dealer"style="background:#0a5071;color:white;width:10rem;border-radius:2rem;">Contact Dealer</button></a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- box 6 -->

                            <div class="box land newhouse 6bhk rent">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-md-5">
                                            <div id="carouselExampleControls" class="carousel slide"
                                                data-bs-ride="carousel">
                                                <div class="carousel-inner">
                                                    <div class="carousel-item active">
                                                        <img src="img/delhi1.jpg" class="d-block w-100" alt="...">
                                                    </div>
                                                    <div class="carousel-item">
                                                        <img src="img/kolkata.jpg" class="d-block w-100" alt="...">
                                                    </div>
                                                    <div class="carousel-item">
                                                        <img src="img/hyderabad.jpg" class="d-block w-100" alt="...">
                                                    </div>
                                                </div>
                                                <button class="carousel-control-prev" type="button"
                                                    data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                                    <span class="visually-hidden">Previous</span>
                                                </button>
                                                <button class="carousel-control-next" type="button"
                                                    data-bs-target="#carouselExampleControls" data-bs-slide="next">
                                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                                    <span class="visually-hidden">Next</span>
                                                </button>
                                            </div>

                                        </div>

                                        <div class="col-md-7">
                                            <br>
                                            <div> <p> <h7>6 BHK Apartment in <span class="location-right" id="cart_name"><b>Adyar</b></span></h7></p></div>
                                            <i class="material-icons" id="add-to-cart" >star</i>
                                            <h6 id="detail-title"><b>Maxima By Oberoi Reaity</b></h6><br>
    
                                            <div style="display: flex; ">
                                                <span id="price" ><h4><b>&#8377; 3.51-3.54cr</h4></b> </span> 
                                                <span id="area" style="position: relative; left:5rem;"> <h4><b>1,381-1,397<sub>sq.ft</sub></b></h4> </span> 
                                                <span id="bhk_right" style="position: relative; left:10rem;"> <h4><b>6 BHK</b></h4> </span> <br>
                                            </div><br>
                                            <div id="per_sq_ft">
                                                <h5 style="color: gray;"><b>&#8377;25.378/sq.ft</b></h5>
                                            </div><br>
    
                                           <p>Book Your 3 Bhk apartment in JVLR, Mumbai-Dahisar ...</p> 
                                           <a href="buyer.php"><button id="dealer"style="background:#0a5071;color:white;width:10rem;border-radius:2rem;">Contact Dealer</button></a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                                <!-- box 7 -->

                                <div class="box land newhouse 7bhk">
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-md-5">
                                                <div id="carouselExampleControls" class="carousel slide"
                                                    data-bs-ride="carousel">
                                                    <div class="carousel-inner">
                                                        <div class="carousel-item active">
                                                            <img src="img/delhi1.jpg" class="d-block w-100" alt="...">
                                                        </div>
                                                        <div class="carousel-item">
                                                            <img src="img/kolkata.jpg" class="d-block w-100" alt="...">
                                                        </div>
                                                        <div class="carousel-item">
                                                            <img src="img/hyderabad.jpg" class="d-block w-100" alt="...">
                                                        </div>
                                                    </div>
                                                    <button class="carousel-control-prev" type="button"
                                                        data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                                                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                                        <span class="visually-hidden">Previous</span>
                                                    </button>
                                                    <button class="carousel-control-next" type="button"
                                                        data-bs-target="#carouselExampleControls" data-bs-slide="next">
                                                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                                        <span class="visually-hidden">Next</span>
                                                    </button>
                                                </div>
    
                                            </div>
    
                                            <div class="col-md-7">
                                                <br>
                                                <div> <p> <h7>7 BHK Apartment in <span class="location-right" id="cart_name"><b>Bisant Nagar</b></span></h7></p></div>
                                                <i class="material-icons" id="add-to-cart" >star</i>
                                                <h6 id="detail-title"><b>Maxima By Oberoi Reaity</b></h6><br>
        
                                                <div style="display: flex; ">
                                                    <span id="price" ><h4><b>&#8377; 3.51-3.54cr</h4></b> </span> 
                                                    <span id="area" style="position: relative; left:5rem;"> <h4><b>1,381-1,397<sub>sq.ft</sub></b></h4> </span> 
                                                    <span id="bhk_right" style="position: relative; left:10rem;"> <h4><b>7 BHK</b></h4> </span> <br>
                                                </div><br>
                                                <div id="per_sq_ft">
                                                    <h5 style="color: gray;"><b>&#8377;25.378/sq.ft</b></h5>
                                                </div><br>
        
                                               <p>Book Your 3 Bhk apartment in JVLR, Mumbai-Dahisar ...</p> 
                                               <a href="buyer.php"><button id="dealer"style="background:#0a5071;color:white;width:10rem;border-radius:2rem;">Contact Dealer</button></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                    <!-- box 8-->

                            <div class="box villa newhouse 8bhk rent">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-md-5">
                                            <div id="carouselExampleControls" class="carousel slide"
                                                data-bs-ride="carousel">
                                                <div class="carousel-inner">
                                                    <div class="carousel-item active">
                                                        <img src="img/project5.jpg" class="d-block w-100" alt="...">
                                                    </div>
                                                    <div class="carousel-item">
                                                        <img src="img/project7.jpg" class="d-block w-100" alt="...">
                                                    </div>
                                                    <div class="carousel-item">
                                                        <img src="img/project4.jpg" class="d-block w-100" alt="...">
                                                    </div>
                                                </div>
                                                <button class="carousel-control-prev" type="button"
                                                    data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                                    <span class="visually-hidden">Previous</span>
                                                </button>
                                                <button class="carousel-control-next" type="button"
                                                    data-bs-target="#carouselExampleControls" data-bs-slide="next">
                                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                                    <span class="visually-hidden">Next</span>
                                                </button>
                                            </div>

                                        </div>

                                        <div class="col-md-7">
                                            <br>
                                            <div> <p> <h7>8 BHK Apartment in <span class="location-right" id="cart_name"><b>Velachery</b></span></h7></p></div>
                                            <i class="material-icons" id="add-to-cart" >star</i>
                                            <h6 id="detail-title"><b>Maxima By Oberoi Reaity</b></h6><br>
    
                                            <div style="display: flex; ">
                                                <span id="price" ><h4><b>&#8377; 3.51-3.54cr</h4></b> </span> 
                                                <span id="area" style="position: relative; left:5rem;"> <h4><b>1,381-1,397<sub>sq.ft</sub></b></h4> </span> 
                                                <span id="bhk_right" style="position: relative; left:10rem;"> <h4><b>8 BHK</b></h4> </span> <br>
                                            </div><br>
                                            <div id="per_sq_ft">
                                                <h5 style="color: gray;"><b>&#8377;25.378/sq.ft</b></h5>
                                            </div><br>
    
                                           <p>Book Your 3 Bhk apartment in JVLR, Mumbai-Dahisar ...</p> 
                                           <a href="buyer.php"><button id="dealer"style="background:#0a5071;color:white;width:10rem;border-radius:2rem;">Contact Dealer</button></a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                                <!-- box 9 -->

                                <div class="box  9bhk">
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-md-5">
                                                <div id="carouselExampleControls" class="carousel slide"
                                                    data-bs-ride="carousel">
                                                    <div class="carousel-inner">
                                                        <div class="carousel-item active">
                                                            <img src="img/p1.jpg" class="d-block w-100" alt="...">
                                                        </div>
                                                        <div class="carousel-item">
                                                            <img src="img/p2.jpg" class="d-block w-100" alt="...">
                                                        </div>
                                                        <div class="carousel-item">
                                                            <img src="img/p3.jpg" class="d-block w-100" alt="...">
                                                        </div>
                                                    </div>
                                                    <button class="carousel-control-prev" type="button"
                                                        data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                                                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                                        <span class="visually-hidden">Previous</span>
                                                    </button>
                                                    <button class="carousel-control-next" type="button"
                                                        data-bs-target="#carouselExampleControls" data-bs-slide="next">
                                                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                                        <span class="visually-hidden">Next</span>
                                                    </button>
                                                </div>
    
                                            </div>
    
                                            <div class="col-md-7">
                                                <br>
                                                <div> <p> <h7>9 BHK Apartment in <span class="location-right" id="cart_name"><b>Thoripakkam</b></span></h7></p></div>
                                                <i class="material-icons" id="add-to-cart" >star</i>
                                                <h6 id="detail-title"><b>Maxima By Oberoi Reaity</b></h6><br>
        
                                                <div style="display: flex; ">
                                                    <span id="price" ><h4><b>&#8377; 3.51-3.54cr</h4></b> </span> 
                                                    <span id="area" style="position: relative; left:5rem;"> <h4><b>1,381-1,397<sub>sq.ft</sub></b></h4> </span> 
                                                    <span id="bhk_right" style="position: relative; left:10rem;"> <h4><b>9 BHK</b></h4> </span> <br>
                                                </div><br>
                                                <div id="per_sq_ft">
                                                    <h5 style="color: gray;"><b>&#8377;25.378/sq.ft</b></h5>
                                                </div><br>
        
                                               <p>Book Your 3 Bhk apartment in JVLR, Mumbai-Dahisar ...</p> 
                                               <a href="buyer.php"><button id="dealer"style="background:#0a5071;color:white;width:10rem;border-radius:2rem;">Contact Dealer</button></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                        </span>
                    </div>
                </section>


       
        


            </div>

        </div>
          


        <script>
            filterObjects("all");
    
            function filterObjects(c) {
                var x, i;
                x = document.getElementsByClassName("box");
                if (c == "all") c = "";
                for (i = 0; i < x.length; i++) {
                    removeClass(x[i], "show");
                    if (x[i].className.indexOf(c) > -1) addClass(x[i], "show")
                }
            }
    
            function addClass(element, name) {
                var i, arr1, arr2;
                arr1 = element.className.split(" ");
                arr2 = name.split(" ");
                for (i = 0; i < arr2.length; i++) {
                    if (arr1.indexOf(arr2[i]) == -1) {
                        element.className += " " + arr2[i];
                    }
                }
            }
    
            function removeClass(element, name) {
                var i, arr1, arr2;
                arr1 = element.className.split(" ");
                arr2 = name.split(" ");
                for (i = 0; i < arr2.length; i++) {
                    while (arr1.indexOf(arr2[i]) > -1) {
                        arr1.splice(arr1.indexOf(arr2[i]), 1);
                    }
                }
    
                element.className = arr1.join(" ");
            }
    
        </script>





    </div>

    </div>
</body>

</html>

