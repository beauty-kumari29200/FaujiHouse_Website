           
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
    session_start();      
include("classes/connect.php");
include("classes/login.php");

$email= "";
$password= "";

if($_SERVER['REQUEST_METHOD'] == 'POST')
{ 
  $login = new Login();
  $resultlogin = $login->evaluatelogin($_POST);

if($resultlogin != "")
{
 echo "<div style='text-align:center;color:white;background-color:grey;'>";
 echo "The following errors occured<br>";
 echo $resultlogin;
 echo "</div>";
}
else if ($_POST['type']=='Contact Us')
{
  header("Location: portfolio.html");
  die;
}else if ($_POST['type']=='Buy Properties')
{
  header("Location:buy.php");
  die;
}else if ($_POST['type']=='Buy projects')
{
  header("Location:project.php");
  die;
}
else if ($_POST['type']=='Rent properties')
{
  header("Location:testbuy.php");
  die;
}
else if ($_POST['type']=='Sell Projects')
{
  header("Location: postproperty.php");
  die;
}
else if ($_POST['type']=='Sell Properties')
{
  header("Location:postproperty.php");
  die;
}
else if ($_POST['type']=='Register as an empyloyee')
{
  header("Location:service_register.php");
  die;
}
else if ($_POST['type']=='Loan')
{
  header("Location:loan.html");
  die;
}
else if ($_POST['type']=='Servies')
{
  header("Location:services.php");
  die;
}

else{
  header("Location:admin.php");
  die;

}

$email=  $_POST['email'];
$password=  $_POST['password'];
}

// print_r($_POST);
?> 
          <h2 class="title">Log in</h2>
          <div class="input-field">
            <i class="fas fa-envelope"></i>
            <input name ="email" type="email" placeholder="email" />
          </div>
          <div class="input-field">
            <i class="fas fa-lock"></i>
            <input name="password" type="password" placeholder="Password" />
          </div>
          <div class="input-field">
          <i class="fas fa-cog fa-pulse"></i>
          <select  name="type"  required style="background: #f0f0f0; border:none; border-radius:2rem; color: #333; font-size:1rem;">
                                             
                                             <option value="">Select Field </option>
                                             <option value="Buy Properties">Buy Properties</option>
                                             <option value="Buy projects">Buy projects</option>
                                             <option value="Rent properties">Rent properties</option>
                                             <option value="Sell Projects">Sell Projects</option>
                                             <option value="Sell Properties">Sell Properties</option>
                                             <option value="Register as an empyloyee">Register as an empyloyee</option>
                                             <option value="Loan">Loan</option>
                                             <option value="Servies">Servies</option>
                                             <option value="admin">Admin</option>
                                             <option value="Contact Us">Contact Us</option>
                </select>
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
          <a href="signup.php"> <button class="btn transparent" id="sign-up-btn">
           Sign up
          </button></a>
        </div>
        <img src="img/soldier.png" class="image" alt="" />
      </div>
    </div>
  </div>
  <script src="app.js"></script>

</body>

</html>

 
