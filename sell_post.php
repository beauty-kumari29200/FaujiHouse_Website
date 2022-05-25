<?php
session_start();

include("classes/user.php");
include("classes/connect.php");
include("classes/login.php");
include("classes/selldetails.php");

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
    $sell_detail = new Sell();
    $id = $_SESSION['faujihouse_userid'];
    $result =  $sell_detail->create_sell($id, $_POST);

    // print_r($_POST);
}

?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sell Form</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>

    <!-- Popper JS -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>


    <style>
     body{
         font-family:'Poppin',sans-serif ;
         background-color: white;
         background-attachment: fixed;
     }
     .btn-file{
         position: relative;
         overflow: hidden;
     }
     .btn-file input[type=file]{
         position: absolute;
         top:0;
         right:0;
         min-width: 100%;
         min-height: 100%;
         font-size: 100px;
         text-align: right;
         filter: alpha(opacity=0);
         opacity: 0;
         background:white;
         outline:none;
         cursor:pointer;
         display: flex;

     }
    </style>
</head>

<body>
    <div class="container-fuild" style="margin-top:30px ;"></div>
    <div class="row">
        <div class="col-md-10 offset-md-1">
            <div class="card" style="border-color: blue;">
                <div class="card-header bg-info text-white">
                    <h><b>Property or Project Details</b></h>
                </div> 
                <div class="card-body" style="background-color: #e9ecef;">
                    <form action="" Method="POST" enctype="multipart/form-data" role="form">
                        <div class="row">
                            <div class="col-md-8">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="empno">Property Name or project</label>
                                            <input type="text" class="form-control" name="name" id="empno" required>
                                            <span id="available"></span>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                       <fieldset class="form-group">
                                           <p>Sell / Rent </p>

                                           <div class="form-check-inline">
                                               <label class="form-check-label">
                                                   <input type="radio" class="form-check-input" name="sell_type" value="project">Project </label>
                                           </div>

                                           <div class="form-check-inline">
                                            <label class="form-check-label">
                                                <input type="radio" class="form-check-input" name="sell_type" value="property">Property</label>
                                        </div>

                                       </fieldset>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="empname">Area(in sq.ft) </label>
                                            <input type="number" class="form-control" name="area"  required>
                                            <span id="available"></span>
                                        </div>
                                    </div>


                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="Date_Birth">No. of Bathrooms</label>
                                            <!-- <input type="number" class="form-control" name="bathroom"  required> -->
                                          <select class="form-control" name="bathroom" required > 
                                             
                                            <option value="">Select Number of Bathrooms</option>
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            <option value="6">6</option>
                                            <option value="7+">7+</option>
                                            </select> 
                                           
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="Date_Birth">No. of Bedrooms</label>
                                            <!-- <input type="number" class="form-control" name="room"  required> -->
                                            <select class="form-control" name="room" required >
                                             
                                             <option value="">Select Number of Bedrooms</option>
                                             <option value="1">1</option>
                                             <option value="2">2</option>
                                             <option value="3">3</option>
                                             <option value="4">4</option>
                                             <option value="5">5</option>
                                             <option value="6">6</option>
                                             <option value="7+">7+</option>
                                             </select>
                                           
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="Date_Birth">No. of Kitchen</label>
                                            <!-- <input type="number" class="form-control" name="kitchen"  required> -->
                                            <select class="form-control"name="kitchen" required >
                                             
                                             <option value="">Select Number of Kitchen</option>
                                             <option value="1">1</option>
                                             <option value="2">2</option>
                                             <option value="3">3</option>
                                             <option value="4+">4+</option>
                                             </select>
                                           
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                          <div class="form-group">
                                                 <label for="salary">Upload Property Picture</label>
                                                 <input class="form-control" type="file" accept="image/*" name="sell_picture" multiple required> 
                                            </div>
                                      </div>

                                      <div class="col-md-6">
                                          <div class="form-group">
                                                 <label for="salary">Upload Property Video</label>
                                                 <input class="form-control" type="file" accept="video/*" name="video"  required> 
                                            </div>
                                      </div>


                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="address">Address </label>
                                           <textarea class="form-control"  name="address"  rows="4" required></textarea>
                                           
                                        </div>
                                    </div>


                                </div>
                            </div>

                            <!-- display image -->
                            <div class="col-md-4">
                                <div class="row">

                                    <div class="col-md-12">
                                        <div style="text-align:center ;">
                                        <img id="img-upload">
                                        <div id="tem_img">
                                            <img src="img/placeholder.png" alt="" width="150px" height="180px;" required>
                                        </div> <br><br>
                                        <div class="input-group">
                                            <span class="input-group-btn">
                                                <span class="btn btn-info btn-file">
                                                   Property / project Images (choose)<input type="file" id="imginp" name="file_img" required>
                                                </span>
                                            </span>
                                            <input type="text" class="form-control" readonly>
                                        </div>
                                        
                                        </div>

                                    </div>

                                  

                                    
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="District">District</label>
                                            <input type="text" class="form-control" name="district" required >
                                           
                                        </div>
                                    </div>

                                    <!-- Department -->
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="state">State</label>
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
                                    </div>
                                        <br>
                                      
                                           <!-- property type -->
                                     
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="property_type">Property Type</label>
                                          <select class="form-control" name="property_type"  required>
                                             
                                            <option value="">Select Property Type</option>
                                            <option value="Residential Apartment">Residential Apartment</option>
                                            <option value="Studio Apartment">Studio Apartment</option>
                                            <option value="Independent House<">Independent House</option>
                                            <option value="Villa">Villa</option>
                                            <option value="Independent Builder Floor">Independent Builder Floor</option>
                                            <option value="Residential Builder Floor">Residential Builder Floor</option>
                                            <option value="Residential Land">Residential Land</option>
                                            <option value="Farm House">Farm House</option>
                                            <option value="Duplex House">Duplex House</option>
                                            <option value="Bungalow">Bungalow</option>
                                            <option value="Flats">Flats</option>

                                          </select>
                                        </div>
                                    </div>
                                     
                                </div>
                            </div>

                           

                                     <!-- incentive -->
                                     <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="price">Price (in rupee)</label>
                                     <!-- <input class="form-control" type="number" id="incentive" name="price" required >  -->

                                     <select class="form-control"  name="price" required>
                                             
                                             <option value="">Select Price range</option>
                                             <option value="less than 50k">less than 50k</option>
                                             <option value=" more than 50k"> more than 50k</option>
                                             <option value="1 lac +"> 1 lac +</option>
                                             <option value="5 lac +">5 lac +</option>
                                             <option value="6 lac+"> 6 lac+</option>
                                             <option value="10 lac+"> 10 lac+</option>
                                             <option value="15 lac +">15 lac +</option>
                                             <option value="20 lac+">20 lac+</option>
                                             <option value="30 lac +">30 lac +</option>
                                             <option value="40 lac +">40 lac +</option>
                                             <option value="50 lac +">50 lac +</option>
                                             <option value="80 lac +">80 lac +</option>
                                             <option value="1 cr">1 cr</option>
                                             <option value="1 cr+">1 cr+</option>
 
                                           </select>
                                       
                                        </div>
                                    </div>

                                     <!-- salary -->
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="salary">Signature</label>
                                    <input class="form-control" type="file" accept="image/*" name="signature_image"  required onchange="showPreview(event);"> 
                                      <div  id="preview">
                                         <img id="file-ip-1-preview" style="width:100%; height:80px; "> 
                                      </div>
                               
                                </div>
                            </div>

                            <script>
                                function showPreview(event)
                                {
                                    if(event.target.files.length > 0)
                                    {
                                        var src = URL.createObjectURL(event.target.files[0]);
                                        var preview = document.getElementById("file-ip-1-preview");
                                        preview.src = src;
                                        preview.style.display = "block";
                                    }
                                }
                            </script>

                                     <!-- langugae -->
                                     <div class="col-md-4">
                                    <fieldset class="form-group" required>
                                             <p>Language</p>
                                             <div class="form-check-inline">
                                                 <label class="form-check-label">
                                                     <input type="radio" class="form-check-input" name="language" value="English"> English
                                                 </label>
                                             </div>
                                             <div class="form-check-inline">
                                                 <label class="form-check-label">
                                                     <input type="radio" class="form-check-input" name="language" value="hindi"> Hindi
                                                 </label>
                                             </div>
                                             <div class="form-check-inline">
                                                <label class="form-check-label">
                                                    <input type="radio" class="form-check-input" name="language" value="others"> Others
                                                </label>
                                            </div>
                                        </fieldset>
                                    </div>

                                    <!-- btn -->
                                    <div class="col-md-12" style="text-align: center;">
                                    <input type="submit" id="btn" name="btn" value="Submit" class="btn btn-primary" style="width:100px; border-radius:10px;">
                                    &nbsp;    &nbsp;
                                    <input type="reset" id="reset" name="reset" value="Cancel" class="btn btn-warning" style="width:100px; border-radius:10px;">
                                      &nbsp;    &nbsp;
                                      <button onclick="window.location.reload(true)" class="btn btn-success" style="width:100px; border-radius:10px;">Refresh</button>
                                    </div>
                        </div>

                    </form>
                </div>
            </div>
            <br><br>
        </div>
    </div>

</body>

</html>