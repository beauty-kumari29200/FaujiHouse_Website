           
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <script src="https://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="sp_lp.css" />
  <title> Fauji House /Sign in & Sign up Form</title>
</head>

<body>
  <div class="container">
    <div class="forms-container">
      <div class="signin-signup">
        <form  class="sign-in-form" method="post">
          <h2 class="title">Log in</h2>
          <div class="input-field">
            <i class="fas fa-envelope"></i>
            <input name ="email" type="email" placeholder="email" />
          </div>
          <div class="input-field">
            <i class="fas fa-lock"></i>
            <input name="password" type="password" placeholder="Password" />
          </div>
          <input type="submit" value="Login" class="btn solid" />
          <p class="social-text">Or Sign in with social platforms</p>
          <div class="social-media">
            <a href="#" class="social-icon">
              <i class="fab fa-facebook-f"></i>
            </a>
            <a href="#" class="social-icon">
              <i class="fab fa-twitter"></i>
            </a>
            <a href="#" class="social-icon">
              <i class="fab fa-google"></i>
            </a>
            <a href="#" class="social-icon">
              <i class="fab fa-linkedin-in"></i>
            </a>
          </div>
        </form>
        <form action="" class="sign-up-form" method="post">
           <?php
                include("classes/connect.php");
                include("classes/signup.php");

               $name= "";
               $email= "";
               $password= "";

              if($_SERVER['REQUEST_METHOD'] == 'POST')
                   {
  
                    $signup = new Signup();
                    $result = $signup->evaluate($_POST);

                      if($result != "")
                           {
                              echo "<div style='text-align:center;color:white;background-color:grey;'>";
                              echo " The following errors occured<br> ";
                              echo $result;
                              echo "</div>";
                           }else
                          {
    
                         header("Location: firstpage.html");
                         die;
                          }

                         $name= $_POST['name'];
                         $email=  $_POST['email'];
                        $password=  $_POST['password'];
                          }
           ?>
         <h2 class="title">Sign up</h2>
          <div class="input-field">
            <i class="fas fa-user"></i>
            <input  name="name" type="text" placeholder="Username" />
          </div>
          <div class="input-field">
            <i class="fas fa-envelope"></i>
            <input value="<?php echo $email ?>" name="email" type="email" placeholder="Email" />
          </div>
          <div class="input-field">
            <i class="fas fa-lock"></i>
            <input name="password" type="password" placeholder="Password" />
          </div>
          <input type="submit" class="btn" value="Sign up" />
          <p class="social-text">Or Sign up with social platforms</p>
          <div class="social-media">
            <a href="#" class="social-icon">
              <i class="fab fa-facebook-f"></i>
            </a>
            <a href="#" class="social-icon">
              <i class="fab fa-twitter"></i>
            </a>
            <a href="#" class="social-icon">
              <i class="fab fa-google"></i>
            </a>
            <a href="#" class="social-icon">
              <i class="fab fa-linkedin-in"></i>
            </a>
          </div>
        </form>
      </div>
    </div>

    <div class="panels-container">
      <div class="panel left-panel">
        <div class="content">
          <div class="img2"></div>
          <h3 style="font-size: 3rem;">New here ?</h3>
          <p>
            Lorem ipsum, dolor sit amet consectetur adipisicing elit. Debitis,
            ex ratione. Aliquid!
          </p>
          <button class="btn transparent" id="sign-up-btn">
            Sign up
          </button>
        </div>
        <img src="img/soldier.png" class="image" alt="" />
      </div>
      <div class="panel right-panel">
        <div class="content">
          <div class="img2" style="left:35rem; top:1.5rem ;"></div>
          <h3 style="font-size: 3rem;">One of us ?</h3>

          <p>
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Nostrum
            laboriosam ad deleniti.
          </p>
          <button class="btn transparent" id="sign-in-btn">
            Log in
          </button>
        </div>
        <!-- <img src="img/register.svg" class="image" alt="" /> -->
        <img src="img/swat.png" class="image" alt="" />
      </div>
    </div>
  </div>



  <script src="app.js"></script>




</body>

</html>

 