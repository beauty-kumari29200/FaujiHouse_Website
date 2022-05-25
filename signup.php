           
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
            <?php
                include("classes/connect.php");
                include("classes/signup.php");

                $name= "";
                $email= "";
                $phone = "";
                $city = "";
                $state = "";
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
    
                         header("Location: checklogin.php");
                         die;
                          }

                         $name= $_POST['name'];
                         $email=  $_POST['email'];
                         $phone = $_POST['phone'];
                         $city = $_POST['city'];
                         $state = $_POST['state'];
                        $password=  $_POST['password'];
                        
                          }
           ?>
        <h2 class="title">Sign up</h2>
        <div class="input-field">
            <i class="fas fa-user"></i>
            <input  name="name" type="text" placeholder="Username" required/>
          </div>
          <div class="input-field">
            <i class="fas fa-envelope"></i>
            <input value="<?php echo $email ?>" name="email" type="email" placeholder="Email" required />
          </div>
          <div class="input-field">
          <i class='fas fa-phone-volume'></i>
            <input value="<?php echo $phone ?>" name="phone" type="number" placeholder="Phone Number" required />
          </div>
          <div class="input-field">
          <i class='fas fa-house-user'></i>
            <input value="<?php echo $city ?>" name="city" type="text" placeholder="City" required />
          </div>
          <div class="input-field">
          <i class='fas fa-home'></i>
          <select class="form-control" name="state" style="background: #f0f0f0; border:none; border-radius:2rem; color: #333; font-size:1rem;"  required>
                                             
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
          <div class="input-field">
            <i class="fas fa-lock"></i>
            <input name="password" type="password" placeholder="Password" required/>
          </div>
          <input type="submit" class="btn" value="Sign up" />
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
      </div>
    </div>

    <div class="panels-container">
      <div class="panel left-panel">
        <div class="content">
          <div class="img2"></div>
          <h3 style="font-size: 3rem;">One of us ?</h3>
          <p>
            Lorem ipsum, dolor sit amet consectetur adipisicing elit. Debitis,
            ex ratione. Aliquid!
          </p>
         <a href="checklogin.php">  <button class="btn transparent" id="sign-up-btn">
          Log in
          </button></a>
        </div>
        <img src="img/swat.png" class="image" alt="" />
      </div>
    
    </div>
  </div>

  <script src="app.js"></script>




</body>

</html>

 