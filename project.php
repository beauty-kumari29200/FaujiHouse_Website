<?php
session_start();

include("classes/user.php");
include("classes/connect.php");
include("classes/login.php");
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

// print_r($user_data);

if($_SERVER['REQUEST_METHOD'] == "POST")
{
    $project_query = new ProjectBuyer();
    $id = $_SESSION['faujihouse_userid'];
    $result = $project_query ->create_buyer($id, $_POST);

    print_r($_POST);
}

?>





<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <!-- CSS only -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <!-- JavaScript Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
    crossorigin="anonymous"></script>

  <link rel="stylesheet" href="project.css" />
  <link rel="stylesheet" href="firstpage.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
  <title>Fauji House / Project</title>

  <style>
    .box {
      float: left;
      background: #016261;
      min-width: 300px;
      min-height: 400px;
      max-width: 400px;
      max-height: 470px;
      text-align: center right;
      margin: 10px;
      display: none;
      background-repeat: no-repeat;
      background-size: cover;
      background-position: center;
    }

    .objects {
      max-height: 400px;
    }

    .box:hover {
      transition: 0.5s ease-in-out;
      cursor: pointer;
    }

    .show {
      display: block;
    }

    .btn {
      border: none;
      outline: none;
      margin-bottom: 20px;
      padding: 12px 16px;
      cursor: pointer;
      margin-left: 8.5rem;
    }
  </style>
</head>

<body>
  <header>
    <div class="container11">
      <input type="checkbox" name="" id="check">

      <div class="logo-container">
        <a href="firstpage.php" class="logo"><img class="flag" src="img/flag.jpg"></a>
        <h3 class="logo"><strong>Fauji</strong><span>House</span></h3>
      </div>

      <div class="nav-btn">
        <div class="nav-links">
          <ul>
            <li class="nav-link" style="--i: 1.1s">
              <a href="#">Buy & Rent<i class="fas fa-caret-down"></i></a>
              <div class="dropdown">
                <ul>
                  <li class="dropdown-link">
                    <a href="testbuy.php">Home for sale </a>
                  </li>
                  <li class="dropdown-link">
                    <a href="testbuy.php">Open Houses</a>
                  </li>
                  <li class="dropdown-link">
                    <a href="testbuy.php">New Homes</a>
                  </li>
                  <li class="dropdown-link">
                    <a href="404.php">Manage Rentals</a>
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
                    <a href="project.php">Projects</a>
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

            <li class="nav-link" style="--i: 1.1s">
              <a href="#">Services<i class="fas fa-caret-down"></i></a>
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
                    <a href="services.php">More<i class="fas fa-caret-down"></i></a>
                    <div class="dropdown second">
                      <ul>
                        <li class="dropdown-link">
                          <a href="service_register.html">register</a>
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

          </ul>
        </div>

        <div class="log-sign" style="--i: 1.8s">
          <a href="lp_figma.html" class="btn transparent"><?php 
                                    error_reporting(E_ERROR | E_PARSE );
                                   if( $user_data != "")
                                    {
                                      echo $user_data['name'] ;
          
                                  }else{
                                  echo "Login / Sign up";
                                    }
                              ?></a>
          <!-- <a href="sp_figma.html" class="btn solid">Sign up</a> -->
        </div>
      </div>

      <div class="hamburger-menu-container">
        <div class="hamburger-menu">
          <div></div>
        </div>
      </div>
    </div>
  </header>

  <div class="banner">
    <div class="banner-left">
      <h1 class="banner-title">Deals at Great Prices with <span>Fauji House Projects</span></h1>
      <p class="banner-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Neque nulla maiores tenetur omnis
        harum quaerat dolor dicta necessitatibus officiis non.</p>
        <form class = "header-form" action="" method="POST">
          <div class = "form-item">
              <input type = "email" class = "form-control" placeholder="Email Address" name="email">
              <button type = "submit" class = "submit-btn">Query</button>
          </div>
      </form>

      <ul class="social-links">
        <li>
          <a href="#"><i class="fab fa-instagram"></i></a>
        </li>
        <li>
          <a href="#"><i class="fab fa-facebook-f"></i></a>
        </li>
        <li>
          <a href="#"><i class="fab fa-twitter"></i></a>
        </li>
        <li>
          <a href="#"><i class="fab fa-youtube"></i></a>
        </li>
        <li>
          <a href="#"><i class="fab fa-whatsapp"></i></a>
        </li>
      </ul>
    </div>

    <div class="banner-right">
      <img src="img/banner_img.png" alt="banner image">
    </div>
  </div>
  <script>
  let resizeTimer;
  window.addEventListener('resize', () => {
      document.body.classList.add('resize-animation-stopper');
      clearTimeout(resizeTimer);
      resizeTimer = setTimeout(() => {
          document.body.classList.remove('resize-animation-stopper');
      }, 400);
  });
</script>

  <div class="container">
    <div id="buttons">

      <button class="btn" onclick="filterObjects('all')">Show All</button>
      <button class="btn" onclick="filterObjects('recent')">Recent Project</button>
      <button class="btn" onclick="filterObjects('top')">Top Projects</button>
      <button class="btn" onclick="filterObjects('exclusive')">Exclusive Project </button>
      <button class="btn" onclick="filterObjects('Popular')">Popular Project</button>

    </div>


    <div class="objects">
      <div class="box top">
        <div class="card">
          <img src="img/project1.jpg" class="card-img-top" alt="...">
          <div class="card-body">
            <h4> Project</h4>
               <span style=" color:blue;"> <h8><b>Pune</b></h8></span> &nbsp;&nbsp; &nbsp;&nbsp;
               <span style=" color:blue;"><h8><b>&#8377; 3.51-3.54cr</h8></b> </span> &nbsp;&nbsp; &nbsp;&nbsp;
               <span style=" color:blue;"> <h8><b>1,381-1,397<sub>sq.ft</sub></b></h8></span> 
               <span style="float:right;color:blue;"> <h8><b>1 BHK</b></h48> </span> <br>
               <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's
              content.</p>
              <a href="project_buy.php"><button id="dealer"style="background:#0a5071;color:white;width:10rem;border-radius:2rem;">Contact Dealer</button></a>
          </div>
        </div>
      </div>


      <div class="box recent top">
        <div class="card">
          <img src="img/project2.jpg" class="card-img-top" alt="...">
          <div class="card-body">
            <h4> Project 2</h4>
            <span style=" color:blue;"> <h8><b>Pune</b></h8></span> &nbsp;&nbsp; &nbsp;&nbsp;
               <span style=" color:blue;"><h8><b>&#8377; 3.51-3.54cr</h8></b> </span> &nbsp;&nbsp; &nbsp;&nbsp;
               <span style=" color:blue;"> <h8><b>1,381-1,397<sub>sq.ft</sub></b></h8></span> 
               <span style="float:right;color:blue;"> <h8><b>1 BHK</b></h48> </span> <br>
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's
              content.</p>
              <a href="project_buy.php"><button id="dealer"style="background:#0a5071;color:white;width:10rem;border-radius:2rem;">Contact Dealer</button></a>
          </div>
        </div>
      </div>
      <div class="box top">
        <div class="card">
          <img src="img/project3.jpg" class="card-img-top" alt="...">
          <div class="card-body">
            <h4> Project 3</h4>
            <span style=" color:blue;"> <h8><b>Pune</b></h8></span> &nbsp;&nbsp; &nbsp;&nbsp;
               <span style=" color:blue;"><h8><b>&#8377; 3.51-3.54cr</h8></b> </span> &nbsp;&nbsp; &nbsp;&nbsp;
               <span style=" color:blue;"> <h8><b>1,381-1,397<sub>sq.ft</sub></b></h8></span> 
               <span style="float:right;color:blue;"> <h8><b>1 BHK</b></h48> </span> <br>
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's
              content.</p>
              <a href="project_buy.php"><button id="dealer"style="background:#0a5071;color:white;width:10rem;border-radius:2rem;">Contact Dealer</button></a>
          </div>
        </div>
      </div>

      <div class="box exclusive">
        <div class="card">
          <img src="img/project4.jpg" class="card-img-top" alt="...">
          <div class="card-body">
            <h4> Project 4</h4>
            <span style=" color:blue;"> <h8><b>Pune</b></h8></span> &nbsp;&nbsp; &nbsp;&nbsp;
               <span style=" color:blue;"><h8><b>&#8377; 3.51-3.54cr</h8></b> </span> &nbsp;&nbsp; &nbsp;&nbsp;
               <span style=" color:blue;"> <h8><b>1,381-1,397<sub>sq.ft</sub></b></h8></span> 
               <span style="float:right;color:blue;"> <h8><b>1 BHK</b></h48> </span> <br>
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's
              content.</p>
              <a href="project_buy.php"><button id="dealer"style="background:#0a5071;color:white;width:10rem;border-radius:2rem;">Contact Dealer</button></a>
          </div>
        </div>
      </div>
      <div class="box Popular">
        <div class="card">
          <img src="img/project1.jpg" class="card-img-top" alt="...">
          <div class="card-body">
            <h4> Project 5</h4>
            <span style=" color:blue;"> <h8><b>Pune</b></h8></span> &nbsp;&nbsp; &nbsp;&nbsp;
               <span style=" color:blue;"><h8><b>&#8377; 3.51-3.54cr</h8></b> </span> &nbsp;&nbsp; &nbsp;&nbsp;
               <span style=" color:blue;"> <h8><b>1,381-1,397<sub>sq.ft</sub></b></h8></span> 
               <span style="float:right;color:blue;"> <h8><b>1 BHK</b></h48> </span> <br>
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's
              content.</p>
              <a href="project_buy.php"><button id="dealer"style="background:#0a5071;color:white;width:10rem;border-radius:2rem;">Contact Dealer</button></a>
          </div>
        </div>
      </div>
      <div class="box Popular exclusive">
        <div class="card">
          <img src="img/project1.jpg" class="card-img-top" alt="...">
          <div class="card-body">
            <h4> Project 6</h4>
            <span style=" color:blue;"> <h8><b>Pune</b></h8></span> &nbsp;&nbsp; &nbsp;&nbsp;
               <span style=" color:blue;"><h8><b>&#8377; 3.51-3.54cr</h8></b> </span> &nbsp;&nbsp; &nbsp;&nbsp;
               <span style=" color:blue;"> <h8><b>1,381-1,397<sub>sq.ft</sub></b></h8></span> 
               <span style="float:right;color:blue;"> <h8><b>1 BHK</b></h48> </span> <br>
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's
              content.</p>
              <a href="project_buy.php"><button id="dealer"style="background:#0a5071;color:white;width:10rem;border-radius:2rem;">Contact Dealer</button></a>
          </div>
        </div>
      </div>
      <div class="box top recent">
        <div class="card">
          <img src="img/project3.jpg" class="card-img-top" alt="...">
          <div class="card-body">
            <h4> Project 7</h4>
            <span style=" color:blue;"> <h8><b>Pune</b></h8></span> &nbsp;&nbsp; &nbsp;&nbsp;
               <span style=" color:blue;"><h8><b>&#8377; 3.51-3.54cr</h8></b> </span> &nbsp;&nbsp; &nbsp;&nbsp;
               <span style=" color:blue;"> <h8><b>1,381-1,397<sub>sq.ft</sub></b></h8></span> 
               <span style="float:right;color:blue;"> <h8><b>1 BHK</b></h48> </span> <br>
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's
              content.</p>
              <a href="project_buy.php"><button id="dealer"style="background:#0a5071;color:white;width:10rem;border-radius:2rem;">Contact Dealer</button></a>
          </div>
        </div>
      </div>
      <div class="box top Popular">
        <div class="card">
          <img src="img/project2.jpg" class="card-img-top" alt="...">
          <div class="card-body">
            <h4> Project 8</h4>
            <span style=" color:blue;"> <h8><b>Pune</b></h8></span> &nbsp;&nbsp; &nbsp;&nbsp;
               <span style=" color:blue;"><h8><b>&#8377; 3.51-3.54cr</h8></b> </span> &nbsp;&nbsp; &nbsp;&nbsp;
               <span style=" color:blue;"> <h8><b>1,381-1,397<sub>sq.ft</sub></b></h8></span> 
               <span style="float:right;color:blue;"> <h8><b>1 BHK</b></h48> </span> <br>
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's
              content.</p>
              <a href="project_buy.php"><button id="dealer"style="background:#0a5071;color:white;width:10rem;border-radius:2rem;">Contact Dealer</button></a>
          </div>
        </div>
      </div>
      <div class="box top">
        <div class="card">
          <img src="img/project3.jpg" class="card-img-top" alt="...">
          <div class="card-body">
            <h4> Project 9</h4>
            <span style=" color:blue;"> <h8><b>Pune</b></h8></span> &nbsp;&nbsp; &nbsp;&nbsp;
               <span style=" color:blue;"><h8><b>&#8377; 3.51-3.54cr</h8></b> </span> &nbsp;&nbsp; &nbsp;&nbsp;
               <span style=" color:blue;"> <h8><b>1,381-1,397<sub>sq.ft</sub></b></h8></span> 
               <span style="float:right;color:blue;"> <h8><b>1 BHK</b></h48> </span> <br>
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's
              content.</p>
              <a href="project_buy.php"><button id="dealer"style="background:#0a5071;color:white;width:10rem;border-radius:2rem;">Contact Dealer</button></a>
          </div>
        </div>
      </div>
      <div class="box recent">
        <div class="card">
          <img src="img/project4.jpg" class="card-img-top" alt="...">
          <div class="card-body">
            <h4> Project 10</h4>
            <span style=" color:blue;"> <h8><b>Pune</b></h8></span> &nbsp;&nbsp; &nbsp;&nbsp;
               <span style=" color:blue;"><h8><b>&#8377; 3.51-3.54cr</h8></b> </span> &nbsp;&nbsp; &nbsp;&nbsp;
               <span style=" color:blue;"> <h8><b>1,381-1,397<sub>sq.ft</sub></b></h8></span> 
               <span style="float:right;color:blue;"> <h8><b>1 BHK</b></h48> </span> <br>
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's
              content.</p>
              <a href="project_buy.php"><button id="dealer"style="background:#0a5071;color:white;width:10rem;border-radius:2rem;">Contact Dealer</button></a>
          </div>
        </div>
      </div>
      <div class="box recent">
        <div class="card">
          <img src="img/project5.jpg" class="card-img-top" alt="...">
          <div class="card-body">
            <h4> Project 11</h4>
            <span style=" color:blue;"> <h8><b>Pune</b></h8></span> &nbsp;&nbsp; &nbsp;&nbsp;
               <span style=" color:blue;"><h8><b>&#8377; 3.51-3.54cr</h8></b> </span> &nbsp;&nbsp; &nbsp;&nbsp;
               <span style=" color:blue;"> <h8><b>1,381-1,397<sub>sq.ft</sub></b></h8></span> 
               <span style="float:right;color:blue;"> <h8><b>1 BHK</b></h48> </span> <br>
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's
              content.</p>
              <a href="project_buy.php"><button id="dealer"style="background:#0a5071;color:white;width:10rem;border-radius:2rem;">Contact Dealer</button></a>
          </div>
        </div>
      </div>
      <div class="box Popular">
        <div class="card">
          <img src="img/project4.jpg" class="card-img-top" alt="...">
          <div class="card-body">
            <h4> Project 12</h4>
            <span style=" color:blue;"> <h8><b>Pune</b></h8></span> &nbsp;&nbsp; &nbsp;&nbsp;
               <span style=" color:blue;"><h8><b>&#8377; 3.51-3.54cr</h8></b> </span> &nbsp;&nbsp; &nbsp;&nbsp;
               <span style=" color:blue;"> <h8><b>1,381-1,397<sub>sq.ft</sub></b></h8></span> 
               <span style="float:right;color:blue;"> <h8><b>1 BHK</b></h48> </span> <br>
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's
              content.</p>
              <a href="project_buy.php"><button id="dealer"style="background:#0a5071;color:white;width:10rem;border-radius:2rem;">Contact Dealer</button></a>
          </div>
        </div>
      </div>
      <div class="box Popular top">
        <div class="card">
          <img src="img/project4.jpg" class="card-img-top" alt="...">
          <div class="card-body">
            <h4> Project 13</h4>
            <span style=" color:blue;"> <h8><b>Pune</b></h8></span> &nbsp;&nbsp; &nbsp;&nbsp;
               <span style=" color:blue;"><h8><b>&#8377; 3.51-3.54cr</h8></b> </span> &nbsp;&nbsp; &nbsp;&nbsp;
               <span style=" color:blue;"> <h8><b>1,381-1,397<sub>sq.ft</sub></b></h8></span> 
               <span style="float:right;color:blue;"> <h8><b>1 BHK</b></h48> </span> <br>
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's
              content.</p>
              <a href="project_buy.php"><button id="dealer"style="background:#0a5071;color:white;width:10rem;border-radius:2rem;">Contact Dealer</button></a>
          </div>
        </div>
      </div>
      <div class="box recent recent">
        <div class="card">
          <img src="img/project1.jpg" class="card-img-top" alt="...">
          <div class="card-body">
            <h4> Project 14</h4>
            <span style=" color:blue;"> <h8><b>Pune</b></h8></span> &nbsp;&nbsp; &nbsp;&nbsp;
               <span style=" color:blue;"><h8><b>&#8377; 3.51-3.54cr</h8></b> </span> &nbsp;&nbsp; &nbsp;&nbsp;
               <span style=" color:blue;"> <h8><b>1,381-1,397<sub>sq.ft</sub></b></h8></span> 
               <span style="float:right;color:blue;"> <h8><b>1 BHK</b></h48> </span> <br>
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's
              content.</p>
              <a href="project_buy.php"><button id="dealer"style="background:#0a5071;color:white;width:10rem;border-radius:2rem;">Contact Dealer</button></a>
          </div>
        </div>
      </div>
      <div class="box recent">
        <div class="card">
          <img src="img/project5.jpg" class="card-img-top" alt="...">
          <div class="card-body">
            <h4> Project 15</h4>
            <span style=" color:blue;"> <h8><b>Pune</b></h8></span> &nbsp;&nbsp; &nbsp;&nbsp;
               <span style=" color:blue;"><h8><b>&#8377; 3.51-3.54cr</h8></b> </span> &nbsp;&nbsp; &nbsp;&nbsp;
               <span style=" color:blue;"> <h8><b>1,381-1,397<sub>sq.ft</sub></b></h8></span> 
               <span style="float:right;color:blue;"> <h8><b>1 BHK</b></h48> </span> <br>
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's
              content.</p>
              <a href="project_buy.php"><button id="dealer"style="background:#0a5071;color:white;width:10rem;border-radius:2rem;">Contact Dealer</button></a>
          </div>
        </div>
      </div>
      <div class="box recent">
        <div class="card">
          <img src="img/project4.jpg" class="card-img-top" alt="...">
          <div class="card-body">
            <h4> Project 16</h4>
            <span style=" color:blue;"> <h8><b>Pune</b></h8></span> &nbsp;&nbsp; &nbsp;&nbsp;
               <span style=" color:blue;"><h8><b>&#8377; 3.51-3.54cr</h8></b> </span> &nbsp;&nbsp; &nbsp;&nbsp;
               <span style=" color:blue;"> <h8><b>1,381-1,397<sub>sq.ft</sub></b></h8></span> 
               <span style="float:right;color:blue;"> <h8><b>1 BHK</b></h48> </span> <br>
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's
              content.</p>
              <a href="project_buy.php"><button id="dealer"style="background:#0a5071;color:white;width:10rem;border-radius:2rem;">Contact Dealer</button></a>
          </div>
        </div>
      </div>
      <div class="box exclusive">
        <div class="card">
          <img src="img/project3.jpg" class="card-img-top" alt="...">
          <div class="card-body">
            <h4> Project 17</h4>
            <span style=" color:blue;"> <h8><b>Pune</b></h8></span> &nbsp;&nbsp; &nbsp;&nbsp;
               <span style=" color:blue;"><h8><b>&#8377; 3.51-3.54cr</h8></b> </span> &nbsp;&nbsp; &nbsp;&nbsp;
               <span style=" color:blue;"> <h8><b>1,381-1,397<sub>sq.ft</sub></b></h8></span> 
               <span style="float:right;color:blue;"> <h8><b>1 BHK</b></h48> </span> <br>
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's
              content.</p>
              <a href="project_buy.php"><button id="dealer"style="background:#0a5071;color:white;width:10rem;border-radius:2rem;">Contact Dealer</button></a>
          </div>
        </div>
      </div>
      <div class="box exclusive">
        <div class="card">
          <img src="img/project2.jpg" class="card-img-top" alt="...">
          <div class="card-body">
            <h4> Project 18</h4>
            <span style=" color:blue;"> <h8><b>Pune</b></h8></span> &nbsp;&nbsp; &nbsp;&nbsp;
               <span style=" color:blue;"><h8><b>&#8377; 3.51-3.54cr</h8></b> </span> &nbsp;&nbsp; &nbsp;&nbsp;
               <span style=" color:blue;"> <h8><b>1,381-1,397<sub>sq.ft</sub></b></h8></span> 
               <span style="float:right;color:blue;"> <h8><b>1 BHK</b></h48> </span> <br>
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's
              content.</p>
              <a href="project_buy.php"><button id="dealer"style="background:#0a5071;color:white;width:10rem;border-radius:2rem;">Contact Dealer</button></a>
          </div>
        </div>
      </div>
      <div class="box exclusive">
        <div class="card">
          <img src="img/project1.jpg" class="card-img-top" alt="...">
          <div class="card-body">
            <h4> Project 19</h4>
            <span style=" color:blue;"> <h8><b>Pune</b></h8></span> &nbsp;&nbsp; &nbsp;&nbsp;
               <span style=" color:blue;"><h8><b>&#8377; 3.51-3.54cr</h8></b> </span> &nbsp;&nbsp; &nbsp;&nbsp;
               <span style=" color:blue;"> <h8><b>1,381-1,397<sub>sq.ft</sub></b></h8></span> 
               <span style="float:right;color:blue;"> <h8><b>1 BHK</b></h48> </span> <br>
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's
              content.</p>
              <a href="project_buy.php"><button id="dealer"style="background:#0a5071;color:white;width:10rem;border-radius:2rem;">Contact Dealer</button></a>
          </div>
        </div>
      </div>
      <div class="box exclusive">
        <div class="card">
          <img src="img/project2.jpg" class="card-img-top" alt="...">
          <div class="card-body">
            <h4> Project 20</h4>
            <span style=" color:blue;"> <h8><b>Pune</b></h8></span> &nbsp;&nbsp; &nbsp;&nbsp;
               <span style=" color:blue;"><h8><b>&#8377; 3.51-3.54cr</h8></b> </span> &nbsp;&nbsp; &nbsp;&nbsp;
               <span style=" color:blue;"> <h8><b>1,381-1,397<sub>sq.ft</sub></b></h8></span> 
               <span style="float:right;color:blue;"> <h8><b>1 BHK</b></h48> </span> <br>
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's
              content.</p>
              <a href="project_buy.php"><button id="dealer"style="background:#0a5071;color:white;width:10rem;border-radius:2rem;">Contact Dealer</button></a>
          </div>
        </div>
      </div>
      <div class="box top">
        <div class="card">
          <img src="img/project4.jpg" class="card-img-top" alt="...">
          <div class="card-body">
            <h4> Project 21</h4>
            <span style=" color:blue;"> <h8><b>Pune</b></h8></span> &nbsp;&nbsp; &nbsp;&nbsp;
               <span style=" color:blue;"><h8><b>&#8377; 3.51-3.54cr</h8></b> </span> &nbsp;&nbsp; &nbsp;&nbsp;
               <span style=" color:blue;"> <h8><b>1,381-1,397<sub>sq.ft</sub></b></h8></span> 
               <span style="float:right;color:blue;"> <h8><b>1 BHK</b></h48> </span> <br>
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's
              content.</p>
              <a href="project_buy.php"><button id="dealer"style="background:#0a5071;color:white;width:10rem;border-radius:2rem;">Contact Dealer</button></a>
          </div>
        </div>
      </div>
      <div class="box recent">
        <div class="card">
          <img src="img/project3.jpg" class="card-img-top" alt="...">
          <div class="card-body">
            <h4> Project 22</h4>
            <span style=" color:blue;"> <h8><b>Pune</b></h8></span> &nbsp;&nbsp; &nbsp;&nbsp;
               <span style=" color:blue;"><h8><b>&#8377; 3.51-3.54cr</h8></b> </span> &nbsp;&nbsp; &nbsp;&nbsp;
               <span style=" color:blue;"> <h8><b>1,381-1,397<sub>sq.ft</sub></b></h8></span> 
               <span style="float:right;color:blue;"> <h8><b>1 BHK</b></h48> </span> <br>
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's
              content.</p>
              <a href="project_buy.php"><button id="dealer"style="background:#0a5071;color:white;width:10rem;border-radius:2rem;">Contact Dealer</button></a>
          </div>
        </div>
      </div>
      <div class="box Popular">
        <div class="card">
          <img src="img/project2.jpg" class="card-img-top" alt="...">
          <div class="card-body">
            <h4> Project 23</h4>
            <span style=" color:blue;"> <h8><b>Pune</b></h8></span> &nbsp;&nbsp; &nbsp;&nbsp;
               <span style=" color:blue;"><h8><b>&#8377; 3.51-3.54cr</h8></b> </span> &nbsp;&nbsp; &nbsp;&nbsp;
               <span style=" color:blue;"> <h8><b>1,381-1,397<sub>sq.ft</sub></b></h8></span> 
               <span style="float:right;color:blue;"> <h8><b>1 BHK</b></h48> </span> <br>
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's
              content.</p>
              <a href="project_buy.php"><button id="dealer"style="background:#0a5071;color:white;width:10rem;border-radius:2rem;">Contact Dealer</button></a>
          </div>
        </div>
      </div>
      <div class="box recent">
        <div class="card">
          <img src="img/project1.jpg" class="card-img-top" alt="...">
          <div class="card-body">
            <h4> Project 24</h4>
            <span style=" color:blue;"> <h8><b>Pune</b></h8></span> &nbsp;&nbsp; &nbsp;&nbsp;
               <span style=" color:blue;"><h8><b>&#8377; 3.51-3.54cr</h8></b> </span> &nbsp;&nbsp; &nbsp;&nbsp;
               <span style=" color:blue;"> <h8><b>1,381-1,397<sub>sq.ft</sub></b></h8></span> 
               <span style="float:right;color:blue;"> <h8><b>1 BHK</b></h48> </span> <br>
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's
              content.</p>
              <a href="project_buy.php"><button id="dealer"style="background:#0a5071;color:white;width:10rem;border-radius:2rem;">Contact Dealer</button></a>
          </div>
        </div>
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


    <section class="features-section ">
      <div class="feature-item">
        <img src="img/icon-online.svg" alt="" />
        <h1>Online Loans</h1>
        <p>Our modern web and mobile<br />
          applications allow you to keep<br />
          track of your finances whereever<br />
          you are in the world.</p>
      </div>
      <div class="feature-item">
        <img src="img/icon-budgeting.svg" alt="" />
        <h1>Simple Budgeting</h1>
        <p>See exactly where your money<br />
          goes every month.Recieve<br />
          notifications when you're close to<br />
          hitting your limits./p >
        </p>
      </div>

      <div class="feature-item">
        <img src="img/icon-onboarding.svg" alt="" />
        <h1>Fast Onboarding</h1>
        <p>We don't do branches.Open your<br />
          accound minutes online and start<br />
          taking controll of your finances<br />
          right away.</p>
      </div>
      <div class="feature-item">
        <img src="img/icon-api.svg" alt="" />
        <h1>Open API</h1>
        <p>Manage your savings, investments,<br />
          pension and much more from one<br />
          account.Tracking your money has<br />
          never been easier.</p>
      </div>
    </section>

    <section class="blog-section" style="position: relative; top:-6rem;">
      <h1>Latest Articles</h1>
      <div class="article-container">
        <div class="article">
          <img src="img/image-currency.jpg" alt="" />
          <div class="content">
            <p>Arslan Jajja</p>
            <h4>Recieve money in any<br />
              currency with no fees.</h4>
            <p>The world is getting smaller and<br />
              we are becoming more mobile.So,<br />
              why should you be forced to only<br />
              recieve money in a single...</p>
          </div>
        </div>
        <div class="article">
          <img src="img/project1.jpg" alt="" />
          <div class="content">
            <p>Arslan Jajja</p>
            <h4>Recieve money in any<br />
              currency with no fees.</h4>
            <p>Our simple budgeting feature<br />
              allow to seperate out your<br />
              spending and set realistic limits<br />
              each month.That means you...</p>
          </div>
        </div>
        <div class="article">
          <img src="img/project3.jpg" alt="" />
          <div class="content">
            <p>Arslan Jajja</p>
            <h4>Take Your Easybank card<br />whereever you go.</h4>
            <p>We want you to enjoy your travels.<br />This is why we don't
              charge any<br />fees on purchase while you're <br />abroad.We'll
              even show you...</p>
          </div>
        </div>
        <div class="article">
          <img src="img/project4.jpg" alt="" />
          <div class="content">
            <p>Arslan Jajja</p>
            <h4>Our invite-only Beta<br />accounts are live now!</h4>
            <p>After a lot of hardwork by the<br />
              whole team,we're excited to launch<br />
              our closed beta.It's easy to request <br />an invite through the
              site.</p>
          </div>
        </div>

        <div class="article">
          <img src="img/project3.jpg" alt="" />
          <div class="content">
            <p>Arslan Jajja</p>
            <h4>Take Your Easybank card<br />whereever you go.</h4>
            <p>We want you to enjoy your travels.<br />This is why we don't
              charge any<br />fees on purchase while you're <br />abroad.We'll
              even show you...</p>
          </div>
        </div>

     

      </div>
    </section>

    <section class="clt-section">
      <h1>Find out more<br />
        about how we work.</h1>
      <button>How we work</button>
    </section>

    <div class="statistics-container" style="position: relative; top:-2rem;">
      <h1>Advanced Statistics</h1>
      <p>Track how your links are performing across with<br />our
        advanced statistics dashboard.</p>
    </div>
    <section class="features-section" style="position: relative; top:-8rem;">
      <div class="feature-item">
        <img src="img/icon-brand-recognition.svg" alt="" />
        <h1> Projects </h1>
        <p>Boost your recognition with<br />each click.Generic links
          don't mean a<br />
          thing.Branded links helps instil<br />
          confidence in your content.</p>
      </div>
      <div class="feature-item">
        <img src="img/icon-detailed-records.svg" alt="" />
        <h1> Details Records</h1>
        <p>Gain insights into who is clicking your<br />
          links.Knowing when and where<br />
          people engage with their content <br />helps inform better
          descisions.</p>
      </div>
      <div class="feature-item">
        <img src="img/icon-fully-customizable.svg" alt="" />
        <h1> Fully Customizeable </h1>
        <p>Improve awareness and <br />content discoverability
          through<br />
          customizeable links supercharging.</p>
      </div>
    </section>
  </div>
  </div>


  <!-- footer -->
  <section class="footer">
    <div class="footer-container">
      <h2>Fauji House</h2>
      <div class="footer-box">
        <h2>Who we are?</h2>
        <p>lorem gut maili nbahut moc amk dbkhodu <br>sndij0qila nwsjwdwd bhsuiwo snjis.</p>
        <br>
        <h2>About Us</h2>
        <a href="#">Mission & Vision</a>
        <a href="#">Why Fauji House</a>
        <a href="#">Management</a>
        <a href="#">Profile</a>

      </div>

      <div class="footer-box">
        <a href="#">
          <h2>Investements</h2>
        </a>
        <a href="#">
          <h2>Social Media</h2>
        </a>
        <a href="#">
          <h2>Career</h2>
        </a>
        <a href="#">
          <h2>Blogs</h2>
        </a>
      </div>
      <div class="footer-box">
        <h2>Locations OF Hot Places.</h2>
        <a href="#">Houses in Mumbai</a>
        <a href="#">Houses in Delhi</a>
        <a href="#">Houses in Banglore</a>
        <a href="#">Houses in Chennai</a>
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

</html>