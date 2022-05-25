<?php
session_start();

include("classes/user.php");
include("classes/connect.php");
include("classes/login.php");
include("classes/sell.php");

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
    $sell = new Sell();
    $id = $_SESSION['faujihouse_userid'];
    $result =  $sell->create_sell($id, $_POST);

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
  
      <!-- JavaScript Bundle with Popper -->
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
      <script src="js/owl.carousel.min.js"></script>


      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css" />
      <!-- link to css -->
      <link rel="stylesheet" href="firstpage.css">
      <!-- Box icon -->
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
      <!-- <link rel="script" href="script.js"> -->
      <link rel="script" href="slide.js">
  
  

</head>

<body>

    <input type="checkbox" id="check">
    <nav>
        <div class="icon">
            <div class="logo-container">
                <a href="firstpage.php" class="logo"><img class="flag" src="img/flag.jpg"></a>
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
           <li> <a href="signup.php">
         <?php 
          error_reporting(E_ERROR | E_PARSE );
           if( $user_data != "")
           {
            echo $user_data['name'] ;
          
           }else{
            echo "Login / Sign up";
           }
           ?></a></li> 
           <!-- login / sign-up -->

        </ol>
        <label for="check" class="bar">
            <span class="fa fa-bars" id="bars"></span>
            <span class="fa fa-times" id="times"></span>
        </label>
    </nav>

    <div class="intro" style=" display:realtive; top: 2rem; height: 900px; width:100%; ">
        <section class="box1box2"
            style="display: grid;grid-template-columns: repeat(auto-fit,minmax(200px,auto)); gap:1rem;padding: 0 0px; width: 100%; height:100%;">
            <div class="box1" style="width: 80%; height: 100%; ">
                <h1 style="display: absolute; margin-top:8rem ; text-align: center;"><b>Sell or Rent Your <br>Property
                        on Fauji House</b> <br></h1>
                <div class="svg" style="display: absolute; margin-top:4rem ; margin-left: 4rem;">
                    <svg xmlns="http://www.w3.org/2000/svg" data-name="Layer 1" width="737.38976" height="544"
                        viewBox="0 0 737.38976 544" xmlns:xlink="http://www.w3.org/1999/xlink">
                        <path
                            d="M504.621,513.18165,351.97511,545.35672a17.01916,17.01916,0,0,1-20.14075-13.12822L305.64055,407.95909a17.01916,17.01916,0,0,1,13.12823-20.14074l152.64588-32.17507A17.01915,17.01915,0,0,1,491.5554,368.7715l26.19381,124.26941A17.01916,17.01916,0,0,1,504.621,513.18165Zm-185.4397-123.4063a15.017,15.017,0,0,0-11.58373,17.77124L333.79136,531.816a15.017,15.017,0,0,0,17.77124,11.58373l152.64588-32.17508a15.017,15.017,0,0,0,11.58374-17.77124L489.59841,369.184a15.017,15.017,0,0,0-17.77125-11.58373Z"
                            transform="translate(-231.30512 -178)" fill="#3f3d56" />
                        <path id="ea648e8d-1b31-4ae2-9566-f54bfd0d94c9-39" data-name="Path 411"
                            d="M461.93038,396.61842,384.892,412.85676a2.73089,2.73089,0,0,1-3.22932-1.86307,2.63064,2.63064,0,0,1,1.99859-3.25411L462.08161,391.21c3.06195,1.72557,2.09419,4.93517-.15219,5.40867Z"
                            transform="translate(-231.30512 -178)" fill="#ccc" />
                        <path id="b4f9d9e0-1a47-44a2-8a19-0d88a6e9c18f-40" data-name="Path 412"
                            d="M464.77869,410.13147l-77.03838,16.23835a2.73089,2.73089,0,0,1-3.22931-1.86308,2.63063,2.63063,0,0,1,1.99859-3.2541L464.92993,404.723c3.06195,1.72558,2.09418,4.93518-.1522,5.40867Z"
                            transform="translate(-231.30512 -178)" fill="#ccc" />
                        <path id="e168965a-63e1-4676-8cbb-3e09d33a4a3f-41" data-name="Path 413"
                            d="M372.70815,437.57411l-23.51136,4.95578a2.962,2.962,0,0,1-3.50569-2.28509l-5.84823-27.74533a2.962,2.962,0,0,1,2.28509-3.50569l23.51137-4.95578a2.963,2.963,0,0,1,3.50569,2.28509l5.84823,27.74536a2.962,2.962,0,0,1-2.28509,3.50569Z"
                            transform="translate(-231.30512 -178)" fill="#ccc" />
                        <path id="af0ff97e-1a3a-4f6f-a511-2c807a938985-42" data-name="Path 414"
                            d="M470.38655,437.84676,352.81186,462.62944a2.73086,2.73086,0,0,1-3.22929-1.86306,2.63063,2.63063,0,0,1,1.99859-3.25412l118.95758-25.07417c3.06195,1.72557,2.09419,4.93517-.15219,5.40867Z"
                            transform="translate(-231.30512 -178)" fill="#ccc" />
                        <path id="e60f2d91-ad3b-421b-94cb-3aa0f5092f21-43" data-name="Path 415"
                            d="M473.2357,451.36376,355.661,476.14645a2.73087,2.73087,0,0,1-3.22929-1.86306,2.63063,2.63063,0,0,1,1.99858-3.25412l118.95759-25.07418c3.06195,1.72558,2.09418,4.93518-.15219,5.40867Z"
                            transform="translate(-231.30512 -178)" fill="#ccc" />
                        <path id="a5554f8b-57e8-4c3b-815c-c76cc46b61b5-44" data-name="Path 416"
                            d="M476.083,464.87193,358.50829,489.65462a2.73088,2.73088,0,0,1-3.22929-1.86307,2.63062,2.63062,0,0,1,1.99859-3.25411l118.95759-25.07418c3.06195,1.72558,2.09418,4.93517-.1522,5.40867Z"
                            transform="translate(-231.30512 -178)" fill="#ccc" />
                        <path id="eee68bf7-fbe9-4bfc-85ae-b0141fb14f45-45" data-name="Path 417"
                            d="M478.93192,478.38793,361.35723,503.17062a2.73087,2.73087,0,0,1-3.22929-1.86307,2.63061,2.63061,0,0,1,1.99858-3.25411l118.95759-25.07418c3.06195,1.72558,2.09418,4.93517-.15219,5.40867Z"
                            transform="translate(-231.30512 -178)" fill="#ccc" />
                        <path id="b9a7afa1-162f-46e2-88e2-f572ab59fc71-46" data-name="Path 418"
                            d="M481.77942,491.89711,364.20473,516.6798a2.73087,2.73087,0,0,1-3.22929-1.86307,2.6306,2.6306,0,0,1,1.99858-3.25411l118.95759-25.07418c3.062,1.72558,2.09418,4.93518-.15219,5.40867Z"
                            transform="translate(-231.30512 -178)" fill="#ccc" />
                        <path
                            d="M500.534,430.03021a10.52747,10.52747,0,0,0-.68327,1.51012l-48.13337,11.94434-8.37345-8.66256-14.725,10.92831,13.33321,16.77594a8,8,0,0,0,9.289,2.428l52.22933-21.34222a10.49709,10.49709,0,1,0-2.93641-13.5819Z"
                            transform="translate(-231.30512 -178)" fill="#ffb8b8" />
                        <path
                            d="M336.23731,536.32254a10.7427,10.7427,0,0,0,6.37825-15.18767l33.12422-92.06728-23.00366-4.07668-25.32663,91.781a10.8009,10.8009,0,0,0,8.82782,19.55061Z"
                            transform="translate(-231.30512 -178)" fill="#ffb8b8" />
                        <path
                            d="M371.533,445.41054l-22.71252-8.71684a4.81687,4.81687,0,0,1-2.46974-6.863l11.915-21.1257a13.37737,13.37737,0,0,1,24.95,9.65954l-5.25553,23.59756a4.81687,4.81687,0,0,1-6.42721,3.44849Z"
                            transform="translate(-231.30512 -178)" fill="#6c63ff" />
                        <polygon
                            points="191.493 531.175 203.752 531.175 209.585 483.887 191.491 483.888 191.493 531.175"
                            fill="#ffb8b8" />
                        <path
                            d="M419.67063,705.17279l24.1438-.001h.001A15.38605,15.38605,0,0,1,459.20188,720.558v.5l-39.53051.00146Z"
                            transform="translate(-231.30512 -178)" fill="#2f2e41" />
                        <polygon
                            points="122.493 531.175 134.752 531.175 140.585 483.887 122.491 483.888 122.493 531.175"
                            fill="#ffb8b8" />
                        <path
                            d="M350.67063,705.17279l24.1438-.001h.001A15.38605,15.38605,0,0,1,390.20188,720.558v.5l-39.53051.00146Z"
                            transform="translate(-231.30512 -178)" fill="#2f2e41" />
                        <path
                            d="M366.6504,690.14248H351.13575a4.50042,4.50042,0,0,1-4.49487-4.71387l7.36938-158.332.46436-.0127,74.91919-1.95312,14.6604,158.42285a4.50022,4.50022,0,0,1-4.12085,4.91113l-17.42627,1.39356a4.50225,4.50225,0,0,1-4.76709-3.582L395.44972,573.4999a1.45375,1.45375,0,0,0-1.469-1.19922h-.0061a1.45449,1.45449,0,0,0-1.46631,1.21094l-21.44263,113A4.50951,4.50951,0,0,1,366.6504,690.14248Z"
                            transform="translate(-231.30512 -178)" fill="#2f2e41" />
                        <circle cx="163.765" cy="183.32358" r="24.56103" fill="#ffb8b8" />
                        <path
                            d="M386.83448,545.65127c-11.7063,0-23.73022-3.07715-33.698-12.17481a4.55187,4.55187,0,0,1-1.46949-3.84961c1.0669-9.58594,6.24219-59.081,3.32764-92.14355a40.01955,40.01955,0,0,1,12.95557-33.30469,39.59814,39.59814,0,0,1,33.96215-9.834h.00025c.30591.05468.61157.1123.91772.17089,19.66358,3.80567,33.32593,22.00391,31.78,42.33106-2.25586,29.66016-4.27807,69.7793-1.10278,92.46777a4.49262,4.49262,0,0,1-2.4148,4.63672C423.86793,537.60146,405.76661,545.65127,386.83448,545.65127Z"
                            transform="translate(-231.30512 -178)" fill="#6c63ff" />
                        <path
                            d="M418.88372,447.17782a4.81168,4.81168,0,0,1-2.10947-3.41136l-2.99231-23.98982a13.37737,13.37737,0,0,1,25.75414-7.24809l9.85629,22.16112a4.81688,4.81688,0,0,1-3.10993,6.59769l-23.43727,6.522A4.81146,4.81146,0,0,1,418.88372,447.17782Z"
                            transform="translate(-231.30512 -178)" fill="#6c63ff" />
                        <path
                            d="M386.496,385.53781a17.59793,17.59793,0,0,1-6.79721-1.2298c-.95139-.36664-1.939-.668-2.88862-1.03489-8.38662-3.24017-13.91121-12.17188-14.10907-21.16048s4.457-17.71287,11.36912-23.46238,15.865-8.70134,24.82986-9.38394c9.65661-.73527,20.53026,1.7136,25.92627,9.7556,1.43633,2.14065,2.44084,4.73783,1.58976,7.32246a4.68564,4.68564,0,0,1-1.32028,2.028c-2.40979,2.144-4.81223.53191-7.2688.38948-3.37653-.19576-6.40925,2.53734-7.49925,5.73908s-.61019,6.7266.26991,9.99228a24.96206,24.96206,0,0,1,1.25825,6.07589,6.1083,6.1083,0,0,1-2.53094,5.37854c-2.10991,1.27536-4.88078.53724-6.99193-.73607s-3.93535-3.04373-6.21577-3.98072-5.3442-.72915-6.6715,1.34848a7.379,7.379,0,0,0-.84344,2.43522c-1.18992,5.42125-.91644,5.102-2.10636,10.52322Z"
                            transform="translate(-231.30512 -178)" fill="#2f2e41" />
                        <path
                            d="M726.69488,352h-156a17.01917,17.01917,0,0,1-17-17V208a17.01917,17.01917,0,0,1,17-17h156a17.01917,17.01917,0,0,1,17,17V335A17.01917,17.01917,0,0,1,726.69488,352Zm-156-159a15.017,15.017,0,0,0-15,15V335a15.017,15.017,0,0,0,15,15h156a15.017,15.017,0,0,0,15-15V208a15.017,15.017,0,0,0-15-15Z"
                            transform="translate(-231.30512 -178)" fill="#3f3d56" />
                        <path id="eb40ba0f-f2ca-41e6-ba2e-bd824fb45cdc-47" data-name="Path 411"
                            d="M708.96338,229.138H630.23221a2.73088,2.73088,0,0,1-2.77562-2.48906,2.63064,2.63064,0,0,1,2.62678-2.77193h80.14349c2.64021,2.32,1.03128,5.261-1.26446,5.261Z"
                            transform="translate(-231.30512 -178)" fill="#ccc" />
                        <path id="ea390b26-798a-41d7-8695-eb41cfeb13d4-48" data-name="Path 412"
                            d="M708.96338,242.948H630.23221a2.73088,2.73088,0,0,1-2.77562-2.48906,2.63064,2.63064,0,0,1,2.62678-2.77193h80.14349c2.64021,2.32,1.03128,5.261-1.26446,5.261Z"
                            transform="translate(-231.30512 -178)" fill="#ccc" />
                        <path id="f9b4f79e-9356-48bc-89d8-91f80de67df3-49" data-name="Path 413"
                            d="M613.21237,250.811h-24.028a2.962,2.962,0,0,1-2.959-2.959V219.497a2.962,2.962,0,0,1,2.959-2.959h24.028a2.963,2.963,0,0,1,2.959,2.959v28.355a2.962,2.962,0,0,1-2.959,2.959Z"
                            transform="translate(-231.30512 -178)" fill="#3f3d56" />
                        <path id="f3294a48-db04-45e1-afc8-dab6eb28e529-50" data-name="Path 414"
                            d="M708.73437,271.224H588.57619a2.73087,2.73087,0,0,1-2.7756-2.489,2.63061,2.63061,0,0,1,2.62677-2.77194H709.99883c2.64022,2.32,1.03128,5.261-1.26446,5.261Z"
                            transform="translate(-231.30512 -178)" fill="#ccc" />
                        <path id="bb6dba8b-bb0a-4f92-a6ea-c6252f741607-51" data-name="Path 415"
                            d="M708.73437,285.038H588.57619a2.73087,2.73087,0,0,1-2.7756-2.48905,2.63061,2.63061,0,0,1,2.62677-2.77194H709.99883c2.64022,2.32,1.03128,5.261-1.26446,5.261Z"
                            transform="translate(-231.30512 -178)" fill="#ccc" />
                        <path id="b1d451cb-91ad-40cf-876e-6a74c98e5c4f-52" data-name="Path 416"
                            d="M708.73437,298.843H588.57619a2.73086,2.73086,0,0,1-2.7756-2.48905,2.63061,2.63061,0,0,1,2.62677-2.77194H709.99883c2.64022,2.32,1.03128,5.261-1.26446,5.261Z"
                            transform="translate(-231.30512 -178)" fill="#ccc" />
                        <path id="bcef27e7-bcca-4cc4-a6d4-200e9e04132c-53" data-name="Path 417"
                            d="M708.73437,312.656H588.57619a2.73086,2.73086,0,0,1-2.7756-2.489,2.63061,2.63061,0,0,1,2.62677-2.77194H709.99883c2.64022,2.32,1.03128,5.261-1.26446,5.261Z"
                            transform="translate(-231.30512 -178)" fill="#ccc" />
                        <path id="ed29f808-f3a3-4ac8-bd45-563f73aa9d8b-54" data-name="Path 418"
                            d="M708.73437,326.462H588.57619a2.73087,2.73087,0,0,1-2.7756-2.48905,2.63062,2.63062,0,0,1,2.62677-2.77195H709.99883c2.64022,2.32,1.03128,5.261-1.26446,5.261Z"
                            transform="translate(-231.30512 -178)" fill="#ccc" />
                        <path
                            d="M692.69488,178a5.00573,5.00573,0,0,1,5,5v16a5.00573,5.00573,0,0,1-5,5h-88a5.00573,5.00573,0,0,1-5-5V183a5.00573,5.00573,0,0,1,5-5"
                            transform="translate(-231.30512 -178)" fill="#6c63ff" />
                        <path
                            d="M951.69488,509h-156a17.01917,17.01917,0,0,1-17-17V365a17.01917,17.01917,0,0,1,17-17h156a17.01917,17.01917,0,0,1,17,17V492A17.01917,17.01917,0,0,1,951.69488,509Zm-156-159a15.017,15.017,0,0,0-15,15V492a15.017,15.017,0,0,0,15,15h156a15.017,15.017,0,0,0,15-15V365a15.017,15.017,0,0,0-15-15Z"
                            transform="translate(-231.30512 -178)" fill="#3f3d56" />
                        <path id="ab56b95a-ad0a-4db6-b885-1de339e59248-55" data-name="Path 411"
                            d="M933.96338,386.138H855.23221a2.73088,2.73088,0,0,1-2.77562-2.48906,2.63064,2.63064,0,0,1,2.62678-2.77193h80.14349c2.64021,2.32,1.03128,5.261-1.26446,5.261Z"
                            transform="translate(-231.30512 -178)" fill="#3f3d56" />
                        <path id="a65ba0e0-92d5-467b-b937-6962ba88422c-56" data-name="Path 412"
                            d="M933.96338,399.948H855.23221a2.73088,2.73088,0,0,1-2.77562-2.48906,2.63064,2.63064,0,0,1,2.62678-2.77193h80.14349c2.64021,2.32,1.03128,5.261-1.26446,5.261Z"
                            transform="translate(-231.30512 -178)" fill="#3f3d56" />
                        <path id="fb801fe4-3edc-4e65-9957-dec023933e0a-57" data-name="Path 413"
                            d="M838.21237,407.811h-24.028a2.962,2.962,0,0,1-2.959-2.959V376.497a2.962,2.962,0,0,1,2.959-2.959h24.028a2.963,2.963,0,0,1,2.959,2.959v28.355a2.962,2.962,0,0,1-2.959,2.959Z"
                            transform="translate(-231.30512 -178)" fill="#ccc" />
                        <path id="faab0864-6611-44c5-86ab-6dd51d336b1d-58" data-name="Path 413"
                            d="M933.21237,484.811h-24.028a2.962,2.962,0,0,1-2.959-2.959V465.497a2.962,2.962,0,0,1,2.959-2.959h24.028a2.963,2.963,0,0,1,2.959,2.959v16.355a2.962,2.962,0,0,1-2.959,2.959Z"
                            transform="translate(-231.30512 -178)" fill="#3f3d56" />
                        <path id="ada3facf-2b93-40cb-83c6-b6d8dc380c35-59" data-name="Path 414"
                            d="M933.73437,428.224H813.57619a2.73087,2.73087,0,0,1-2.7756-2.489,2.63061,2.63061,0,0,1,2.62677-2.77194H934.99883c2.64022,2.32,1.03128,5.261-1.26446,5.261Z"
                            transform="translate(-231.30512 -178)" fill="#ccc" />
                        <path id="a50891a7-c495-4965-ab40-a1f907e5cce2-60" data-name="Path 415"
                            d="M933.73437,442.038H813.57619a2.73087,2.73087,0,0,1-2.7756-2.48905,2.63061,2.63061,0,0,1,2.62677-2.77194H934.99883c2.64022,2.32,1.03128,5.261-1.26446,5.261Z"
                            transform="translate(-231.30512 -178)" fill="#ccc" />
                        <path id="f645be9d-0c31-4d92-bfb2-feede413f090-61" data-name="Path 416"
                            d="M933.73437,455.843H813.57619a2.73086,2.73086,0,0,1-2.7756-2.48905,2.63061,2.63061,0,0,1,2.62677-2.77194H934.99883c2.64022,2.32,1.03128,5.261-1.26446,5.261Z"
                            transform="translate(-231.30512 -178)" fill="#ccc" />
                        <path id="f96ba49d-c571-4857-91da-e214cd5ba82f-62" data-name="Path 417"
                            d="M870.73437,469.656H813.57619a2.73086,2.73086,0,0,1-2.7756-2.489,2.63061,2.63061,0,0,1,2.62677-2.77194h58.57147c2.64022,2.32,1.03128,5.261-1.26446,5.261Z"
                            transform="translate(-231.30512 -178)" fill="#ccc" />
                        <path id="a7214c6f-9d52-425a-b9ef-635698aec079-63" data-name="Path 418"
                            d="M870.73437,483.462H813.57619a2.73087,2.73087,0,0,1-2.7756-2.48905,2.63062,2.63062,0,0,1,2.62677-2.77195h58.57147c2.64022,2.32,1.03128,5.261-1.26446,5.261Z"
                            transform="translate(-231.30512 -178)" fill="#ccc" />
                        <path
                            d="M917.69488,361h-88a5.00573,5.00573,0,0,1-5-5V340a5.00573,5.00573,0,0,1,5-5h88a5.00573,5.00573,0,0,1,5,5v16A5.00573,5.00573,0,0,1,917.69488,361Z"
                            transform="translate(-231.30512 -178)" fill="#6c63ff" />
                        <path d="M613.30512,722h-381a1,1,0,0,1,0-2h381a1,1,0,0,1,0,2Z"
                            transform="translate(-231.30512 -178)" fill="#3f3d56" />
                        <circle cx="96.76378" cy="23.3243" r="6.46689" fill="#f2f2f2" />
                        <circle cx="96.76378" cy="49.0976" r="6.46689" fill="#f2f2f2" />
                        <circle cx="96.76378" cy="74.8709" r="6.46689" fill="#f2f2f2" />
                        <circle cx="96.76378" cy="100.6442" r="6.46689" fill="#f2f2f2" />
                        <circle cx="123.76378" cy="23.3243" r="6.46689" fill="#f2f2f2" />
                        <circle cx="123.76378" cy="49.0976" r="6.46689" fill="#f2f2f2" />
                        <circle cx="123.76378" cy="74.8709" r="6.46689" fill="#f2f2f2" />
                        <circle cx="123.76378" cy="100.6442" r="6.46689" fill="#f2f2f2" />
                        <circle cx="150.76378" cy="23.3243" r="6.46689" fill="#f2f2f2" />
                        <circle cx="150.76378" cy="49.0976" r="6.46689" fill="#f2f2f2" />
                        <circle cx="150.76378" cy="74.8709" r="6.46689" fill="#f2f2f2" />
                        <circle cx="150.76378" cy="100.6442" r="6.46689" fill="#f2f2f2" />
                        <circle cx="177.76378" cy="23.3243" r="6.46689" fill="#f2f2f2" />
                        <circle cx="177.76378" cy="49.0976" r="6.46689" fill="#f2f2f2" />
                        <circle cx="177.76378" cy="74.8709" r="6.46689" fill="#f2f2f2" />
                        <circle cx="177.76378" cy="100.6442" r="6.46689" fill="#f2f2f2" />
                        <circle cx="204.76378" cy="23.3243" r="6.46689" fill="#f2f2f2" />
                        <circle cx="204.76378" cy="49.0976" r="6.46689" fill="#f2f2f2" />
                        <circle cx="204.76378" cy="74.8709" r="6.46689" fill="#f2f2f2" />
                        <circle cx="204.76378" cy="100.6442" r="6.46689" fill="#f2f2f2" />
                        <circle cx="231.76378" cy="23.3243" r="6.46689" fill="#f2f2f2" />
                        <circle cx="231.76378" cy="49.0976" r="6.46689" fill="#f2f2f2" />
                        <circle cx="231.76378" cy="74.8709" r="6.46689" fill="#f2f2f2" />
                        <circle cx="231.76378" cy="100.6442" r="6.46689" fill="#f2f2f2" />
                        <circle cx="601.76378" cy="381.3243" r="6.46689" fill="#f2f2f2" />
                        <circle cx="601.76378" cy="407.0976" r="6.46689" fill="#f2f2f2" />
                        <circle cx="601.76378" cy="432.8709" r="6.46689" fill="#f2f2f2" />
                        <circle cx="628.76378" cy="381.3243" r="6.46689" fill="#f2f2f2" />
                        <circle cx="628.76378" cy="407.0976" r="6.46689" fill="#f2f2f2" />
                        <circle cx="628.76378" cy="432.8709" r="6.46689" fill="#f2f2f2" />
                        <circle cx="655.76378" cy="381.3243" r="6.46689" fill="#f2f2f2" />
                        <circle cx="655.76378" cy="407.0976" r="6.46689" fill="#f2f2f2" />
                        <circle cx="655.76378" cy="432.8709" r="6.46689" fill="#f2f2f2" />
                        <circle cx="682.76378" cy="381.3243" r="6.46689" fill="#f2f2f2" />
                        <circle cx="682.76378" cy="407.0976" r="6.46689" fill="#f2f2f2" />
                        <circle cx="682.76378" cy="432.8709" r="6.46689" fill="#f2f2f2" />
                    </svg>
                </div>

            </div>
            <div class="box2">
                <div class="form" style="display: absolute; margin-top:10rem ; margin-left: 9rem; margin-right: 6rem;">

                    <div class="container">
                        <div class="title">Begin Posting Your Property</div>
                        <br>
                        <span>Add Basic details</span><br><br>
                        <h5>You're Looking to..</h5>
                        <!--  <input type="radio" name="sell"  value="yes" >

                             <label for="card" style=" height: 40px; width: 80px; border: 3px solid #192f6a; border-radius: 10px; color:#192f6a;">
                               <span style="font-size:20px; text-align:center ">Sell</span>
                             </label>

                          <input type="radio" name="rent" value="yes">

                         <label for="card" style=" height: 40px; border: 3px solid #192f6a; border-radius: 10px; color:#192f6a;">
                          <span style="font-size:20px; text-align:center ">Rent / Lease</span> </label>

                          <input type="radio" name="payment" id="card">
                          <label for="card">
                                 <span>Card</span>
                               </label>
                            <input type="radio" name="payment" id="cash">
                           <label for="cash">
                            <span>Cash</span>
                        </label>  -->
                        <!-- <div class="button-option">

                            <button  id="sell"
                                style="width:80px; padding: 4px 15px; border-radius: 1rem; border-color:rgb(75, 238, 167); background: rgb(198, 238, 236);"> 
                                <b>Sell</b></button>
                                &nbsp &nbsp &nbsp
                            <button  id="rent"
                                style="width:120px; padding: 4px 15px; border-radius: 1rem; border-color:rgb(75, 238, 167); background: rgb(198, 238, 236);"><b>Rent/Lease</b></button>
                        </div> -->
                        <div class="content">
                            <form action="#" method="post"><br>

                            <div class="gender-details" style=" position: relative; top :-10%;" required>
                                    <input type="radio" name="purpose" id="dot-4" value="Sell" >
                                    <input type="radio" name="purpose" id="dot-5" value= "Rent / Lease">
                                    <span class="gender-title"></span>
                                    <div class="category">
                                        <label for="dot-4">
                                            <span type ="radio" class="dot four"></span>
                                            <span class="gender">Sell</span>
                                        </label>
                                        <label for="dot-5">
                                            <span type="radio" class="dot five"></span>
                                            <span class="gender">Rent / Lease</span>
                                        </label>
                                    </div>
                                 </div>

                                <h4>Your Contact details For Buyer Reached To You.. </h4>
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
                                        <span class="details">Password</span>
                                        <input name="password" type="text" placeholder="Enter your password" required>
                                    </div>
                                    <div class="input-box">
                                        <span class="details">Confirm Password</span>
                                        <input name="password1" type="text" placeholder="Confirm your password" required>
                                    </div>
                                </div>
                                <div class="gender-details">
                                    <input type="radio" name="property_type" id="dot-1" value="Residential" >
                                    <input type="radio" name="property_type" id="dot-2" value= "Commercial">
                                    <input type="radio" name="property_type" id="dot-3" value="Prefer not to say">
                                    <span class="gender-title">Property is ..?</span>
                                    <div class="category">
                                        <label for="dot-1">
                                            <span class="dot one"></span>
                                            <span class="gender">Residential</span>
                                        </label>
                                        <label for="dot-2">
                                            <span class="dot two"></span>
                                            <span class="gender">Commercial</span>
                                        </label>
                                        <label for="dot-3">
                                            <span class="dot three"></span>
                                            <span class="gender">Prefer not to say</span>
                                        </label>
                                    </div>
                                </div>

                                <div class="button">
                                  <a href="sell_post.php"><input type="submit" value="Begin To Post Your Property"></a>  
                                </div>
                            </form>
                        </div>

         
                    </div>

                </div>
        </section>

    </div><br><br><br><br>

    <h2 style="text-align: center;"><b>Post Your Propert In 3 Steps..</b></h2>
    <hr>

    <div class="topost"
        style="display: grid;grid-template-columns: repeat(auto-fit,minmax(400px,auto)); gap:1rem;padding: 0 0px; width: 100%; height:600px; ">

        <div class="step1">
            <div class="stepimg"
                style="width:60%; height:60%;  background-image:url('img/step1.png');  background-repeat: no-repeat; background-size: cover; background-position:center ; margin-left: 4rem ; ">
            </div>
            <br>
            <div> <span style="color: darkblue;font-size: 2.5rem; margin-left: 2rem;"><b>01.</b></span><span
                    style="font-size: 2rem;">&nbsp Add details of your Property</span></div>
            <br>
            <p style="margin-left: 4rem; font-size: 1.1rem;"> <b>The few basic details of propety like property type ,
                    area etc</b></p>

        </div>
        <div class="step2">
            <div class="stepimg"
                style="width:60%; height:60%; background-image:url('img/step2.png'); background-repeat: no-repeat; background-size: cover; background-position:center ; margin-left: 4rem ;">
            </div>
            <br>
            <br>
            <div> <span style="color: darkblue;font-size: 2.5rem; margin-left: 2rem;"><b>02.</b></span><span
                    style="font-size: 2rem;">&nbsp Upload Photoes & Videos</span></div>
            <br>
            <p style="margin-left: 4rem; font-size: 1.1rem;"> <b>Upload Photoes and videos of your Property <br> either
                    with desktop and Phone.
                    area etc</b></p>

        </div>

        <div class="step3">
            <div class="stepimg"
                style="width:60%; height:60%; background-image:url('img/step3.png'); background-repeat: no-repeat; background-size: cover; background-position:center ; margin-left: 4rem ;">
            </div>
            <br>
            <br>
            <div> <span style="color: darkblue;font-size: 2.5rem; margin-left: 2rem;"><b>03.</b></span><span
                    style="font-size: 2rem;">Add Pricing and Ownership</span></div>
            <br>
            <p style="margin-left: 4rem; font-size: 1.1rem;"> <b>Update your property ownership details <br> and your
                    expected price.
                    area etc</b></p>

        </div>

    </div><br><br>

    <div class="postdetails"
        style="width:90%; height:400px;border-radius: 3.5rem; margin-left: 4rem; background-image:url('img/project1.jpg'); background-repeat: no-repeat; background-size: cover; background-position:center ;  ">

        <div class="infoupperbox"
            style="width:50%; height:400px; background: white; float: right;box-shadow: 0 5px 10px rgba(26, 22, 22, 0.15);  padding: 25px 30px;">
            <h1 style="text-align: center; margin-top: 5rem;">
                <i class="fa fa-quote-right"></i><br>
                <b><i>With maximum numbers of vistiors<br> with Fauji house Your Property <br>gets maximum
                        Visiblity.</i></b>
            </h1>

        </div>


    </div><br><br><br>

    <h5 style="margin-left: 2rem; font-size: 1.5rem;">Additional Benifits</h5><br>


    <div class="benifits"
        style="display: grid;grid-template-columns: repeat(auto-fit,minmax(400px,auto)); gap:1rem;padding: 0 0px; width: 100%; height:600px; ">

        <div class="step1">

            <br>
            <div> <span style="color: darkblue;font-size: 2.5rem; margin-left: 2rem;"><b>There is a lot more to
                        it..</b></span><span style="font-size: 2rem;"></span></div>
            <br>
            <p style="margin-left: 4rem; font-size: 1.1rem;">Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                Aliquam eius dicta aut ducimus hic quisquam<br>
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquam eius dicta aut ducimus hic
                quisquam<br>
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquam eius dicta aut ducimus hic
                quisquam<br>
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquam eius dicta aut ducimus hic
                quisquam<br>
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquam eius dicta aut ducimus hic
                quisquam<br>
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquam eius dicta aut ducimus hic
                quisquam<br>
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquam eius dicta aut ducimus hic
                quisquam<br>
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquam eius dicta aut ducimus hic
                quisquam<br>
            </p>



        </div>
        <div class="step2">
            <div class="stepimg"
                style="width:80%; height:90%; background-image:url('img/benifit.png'); background-repeat: no-repeat; background-size: cover;  opacity: 0.8; float:left">


            </div>
            <br>

        </div>


    </div>


    <!-- .owners revviews -->
    <div class="project-section" style="width:100%;  margin-top: 2rem; border-radius: 1rem; ">
        <section id="slider" class="pt-5">
            <div class="container">
                <h1 class="text-center"><b>Clients Review</b></h1>
                <div class="slider">
                    <div class="owl-carousel">
                        <div class="slider-card">
                            <div class="d-flex justify-content-center align-items-center mb-4">
                                <img src="img/project5.jpg" alt="">
                            </div>
                            <h5 class="mb-0 text-center"><b>Client 1</b></h5>
                            <p class="text-center p-4">Lorem ipsum dolor sit amet, consectetur adipisicing
                                elit. Ipsam temporibus quidem magni qui doloribus quasi natus inventore nisi
                                velit minima.</p>
                        </div>
                        <div class="slider-card">
                            <div class="d-flex justify-content-center align-items-center mb-4">
                                <img src="img/project1.jpg" alt="">
                            </div>
                            <h5 class="mb-0 text-center"><b>Client 2</b></h5>
                            <p class="text-center p-4">Lorem ipsum dolor sit amet, consectetur adipisicing
                                elit. Ipsam temporibus quidem magni qui doloribus quasi natus inventore nisi
                                velit minima.</p>
                        </div>
                        <div class="slider-card">
                            <div class="d-flex justify-content-center align-items-center mb-4">
                                <img src="img/project2.jpg" alt="">
                            </div>
                            <h5 class="mb-0 text-center"><b>Client 3</b></h5>
                            <p class="text-center p-4">Lorem ipsum dolor sit amet, consectetur adipisicing
                                elit. Ipsam temporibus quidem magni qui doloribus quasi natus inventore nisi
                                velit minima.</p>
                        </div>
                        <div class="slider-card">
                            <div class="d-flex justify-content-center align-items-center mb-4">
                                <img src="img/project3.jpg" alt="">
                            </div>
                            <h5 class="mb-0 text-center"><b>client 4</b></h5>
                            <p class="text-center p-4">Lorem ipsum dolor sit amet, consectetur adipisicing
                                elit. Ipsam temporibus quidem magni qui doloribus quasi natus inventore nisi
                                velit minima.</p>
                        </div>
                        <div class="slider-card">
                            <div class="d-flex justify-content-center align-items-center mb-4">
                                <img src="img/project4.jpg" alt="">
                            </div>
                            <h5 class="mb-0 text-center"><b>client 5</b></h5>
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


       <!-- footer -->
       <section class="footer">
        <div class="footer-container container">
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