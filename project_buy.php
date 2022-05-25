<?php
session_start();

include("classes/user.php");
include("classes/connect.php");
include("classes/login.php");
include("classes/project.php");

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
    $project_buyer = new ProjectBuyer();
    $id = $_SESSION['faujihouse_userid'];
    $result =  $project_buyer->create_buyer($id, $_POST);

    // print_r($_POST);
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Post Property</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="postproperty.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css" />
      <!-- CSS only -->
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
      <link rel="stylesheet" href="css/bootstrap.min.css">
      
  
 </head>

<body>

  
                     <div class="container" style="position:reative; margin-top:3rem;">
                        <div class="title">Begin to Buy Project here..</div>
                        <br>
                        <span>Add Basic details</span><br><br>
                        <div class="content">
                            <form action="" method="post"><br>

                                <h4>Your Contact details For Dealer Reached To You.. </h4>
                                <div class="user-details">
                                    <div class="input-box">

                                        <span class="details">Full Name</span>
                                        <input name="first_name" type="text" placeholder="Enter your name" required>
                                    </div>
                                    <div class="input-box">
                                        <span class="details">Username</span>
                                        <input name="last_name" type="text" placeholder="Enter your username" required>
                                    </div>
                                    <div class="input-box">
                                        <span class="details">Email</span>
                                        <input name="email" type="text" placeholder="Enter your email" required>
                                    </div>
                                    <div class="input-box">
                                        <span class="details">Phone Number</span>
                                        <input name="phone" type="text" placeholder="Enter your number" required>
                                    </div>
                                    <div class="input-box">
                                        <span class="details">State</span>
                                        <input name="state" type="text" placeholder="Enter your password" required>
                                    </div>
                                    <div class="input-box">
                                        <span class="details">District</span>
                                        <input name="district" type="text" placeholder="Confirm your password" required>
                                    </div>
                                    <div class="input-box">
                                        <span class="details">Address</span>
                                        <input name="address" type="text" placeholder="Enter your address" required>
                                    </div>

                              

                                  
                                </div>
                                 
                                <span class="gender-title" style="font-size:1.5rem;">Project Details</span>

                                <div class="user-details">
                                    <div class="input-box">

                                        <span class="details">BHK</span>
                                        <select class="form-control" name="bhk"  required>
                                             
                                             <option value="">Select BHK</option>
                                             <option value="1 BHK"> 1 BHK</option>
                                             <option value="2 BHK"> 2 BHK</option>
                                             <option value="3 BHK"> 3 BHK</option>
                                             <option value="4 BHK"> 4 BHK</option>
                                             <option value="5 BHK"> 5 BHK</option>
                                             <option value="6 BHK"> 6 BHK</option>
                                             <option value="7 BHK"> 7 BHK</option>
                                             <option value="8 BHK"> 8 BHK</option>
                                             <option value="9 BHK"> 9 BHK</option>
                                            
                                           </select>
                                    </div>
                                    <div class="input-box">
                                        <span class="details">Name of Project</span>
                                        <input name="project_name" type="text" placeholder="Enter project name" required>
                                    </div>
                                    <div class="input-box">
                                        <span class="details">Area(in sq.ft)</span>
                                        <input name="area" type="number" placeholder="Enter property area" required>
                                    </div>
                                    <div class="input-box">
                                        <span class="details">Price(in rupees)</span>
                                        <input name="price" type="number" placeholder="Enter property price" required>
                                    </div>
                                    <div class="input-box">
                                        <span class="details">City</span>
                                        <input name="city" type="text" placeholder="Enter property located " required>
                                    </div>
                                  
                                </div>

                                <div class="gender-details">
                                    <input type="checkbox" name="project_loan" id="dot-6" value="project loan" >
                                    <input type="checkbox" name="agree_contact" id="dot-8" value="agree to contact" required>
                                    <span class="gender-title">Optional Section</span>
                                    <div class="category">
                                        <label for="dot-6">
                                            <span class="dot six"></span>
                                            <span >I am interested in project loan</span>
                                        </label> &nbsp; &nbsp; &nbsp; &nbsp;
                                       
                                        <label for="dot-8">
                                            <span class="dot eight"></span>
                                            <span > I agree to be contacted by fauji house and others for similar properties or related services via  WhatsApp, phone, sms, e-mail etc.</span>
                                        </label>
                                    </div>
                                </div>

                                <div class="gender-details">
                                    <input type="radio" name="months" id="dot-1" value="3 months" >
                                    <input type="radio" name="months" id="dot-2" value= "6 months">
                                    <input type="radio" name="months" id="dot-3" value="more than 6 months">
                                    <span class="gender-title">By when you are planning to the project?</span>
                                    <div class="category">
                                        <label for="dot-1">
                                            <span class="dot one"></span>
                                            <span class="gender">1 months</span>
                                        </label>
                                        <label for="dot-2">
                                            <span class="dot two"></span>
                                            <span class="gender">3 months</span>
                                        </label>
                                        <label for="dot-3">
                                            <span class="dot three"></span>
                                            <span class="gender">more than 3 months</span>
                                        </label>
                                    </div>
                                </div>

                                <div class="button">
                                  <a href="project.php"><input type="submit" value="Submit"></a>  
                                </div>
                            </form>
                        </div>

         
                    </div>
     

</body>
</html>
