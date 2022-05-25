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

<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
 
    <link rel="stylesheet" href="css/admin.css">
 
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
   </head>
<body>
  <div class="sidebar">
    <div class="logo-details">

      <a href="#" class="logo"><img class="flag" src="img/flag.jpg"></a>
      <span class="logo_name">Fauji House</span>
    </div>
      <ul class="nav-links">
        <li>
          <a href="admin.php" class="active">
            <i class='bx bx-grid-alt' ></i>
            <span class="links_name">Dashboard</span>
          </a>
        </li>
        <li>
          <a href="admin_total_property.php">
            <i class='bx bx-box' ></i>
            <span class="links_name">Property</span>
          </a>
        </li>
        <li>
          <a href="admin.order_list.php">
            <i class='bx bx-list-ul' ></i>
            <span class="links_name">Order list</span>
          </a>
        </li>
        <li>
          <a href="admin.query.php">
            <i class='bx bx-pie-chart-alt-2' ></i>
            <span class="links_name">Visitors</span>
          </a>
        </li>
        <li>
          <a href="admin.sell.php">
            <i class='bx bx-coin-stack' ></i>
            <span class="links_name">Sell</span>
          </a>
        </li>
      
        <li>
          <a href="admin.team.php">
            <i class='bx bx-user' ></i>
            <span class="links_name">Team</span>
          </a>
        </li>
        <li>
          <a href="admin.service.php">
            <i class='bx bx-message' ></i>
            <span class="links_name">Service Apply</span>
          </a>
        </li>
        <li>
          <a href="admin.msg.php">
            <i class='bx bx-message' ></i>
            <span class="links_name">Messages</span>
          </a>
        </li>
        <li>
          <a href="#">
            <i class='bx bx-heart' ></i>
            <span class="links_name">Favrorites</span>
          </a>
        </li>
        <li>
          <a href="#">
            <i class='bx bx-cog' ></i>
            <span class="links_name">Setting</span>
          </a>
        </li>
        <li class="log_out">
          <a href="logout.php">
            <i class='bx bx-log-out'></i>
            <span class="links_name">Log out</span>
          </a>
        </li>
      </ul>
  </div>
  <section class="home-section">
    <nav>
      <div class="sidebar-button">
        <i class='bx bx-menu sidebarBtn'></i>
        <span class="dashboard">Dashboard</span>
      </div>
      <div class="search-box">
        <input type="text" placeholder="Search...">
        <i class='bx bx-search' ></i>
      </div>
      <div class="profile-details">
        <img src="img/c1.jpg" alt="">
        <span class="admin_name"> <?php 
                                    error_reporting(E_ERROR | E_PARSE );
                                   if( $user_data != "")
                                    {
                                      echo $user_data['name'] ;
          
                                  }else{
                                  echo "Login / Sign up";
                                    }
                              ?></a></span>
        <i class='bx bx-chevron-down' ></i>
      </div>
    </nav>

    <div class="home-content">
      <div class="overview-boxes">
        <div class="box">
          <div class="right-side">
            <div class="box-topic">Total Request</div>
            <?php
                      $query_buy = 'SELECT COUNT(id) AS count FROM buyer ';
                 
                      $connection =  new Database();
                      $conn = $connection->connect();
     
                      $result_buy = mysqli_query($conn, $query_buy);
                          
                      while($row = mysqli_fetch_assoc($result_buy))
                      {
                        $output1 = $row['count'];
                      }

                      $query_project = 'SELECT COUNT(id) AS count FROM project_buy';

                      $result_project = mysqli_query($conn, $query_project);

                      while($row = mysqli_fetch_assoc($result_project))
                      {
                        $output2 = $row['count'];
                      }

                      $sum = $output1 + $output2;         
                      
            ?>
            <div class="number"><?php  echo $sum ?></div>
            <div class="indicator">
              <i class='bx bx-up-arrow-alt'></i>
              <span class="text">Up from today</span>
            </div>
          </div>
          <i class='bx bx-cart-alt cart'></i>
        </div>
        <div class="box">
          <div class="right-side">
            <div class="box-topic">Total Sales  <span style="color:grey; font-size:0.7rem;">(lacs.)</span></div>
            <?php
                        $query_buy = 'SELECT SUM(price) AS sum FROM buyer ';
                 
                        $connection =  new Database();
                        $conn = $connection->connect();
       
                        $result_buy = mysqli_query($conn, $query_buy);
                            
                        while($row = mysqli_fetch_assoc($result_buy))
                        {
                          $output1 = $row['sum'];
                        }

                        $query_project = 'SELECT SUM(price) AS sum FROM project_buy ';
                        $result_project = mysqli_query($conn,$query_project);
                            
                        while($row = mysqli_fetch_assoc($result_project))
                        {
                          $output2 = $row['sum'];
                        }

                        $output = $output1 + $output2;      
            ?>
            <div class="number"> &#8377;<?php echo $output; ?></div>
            <div class="indicator">
              <i class='bx bx-up-arrow-alt'></i>
              <span class="text">Up from today</span>
            </div>
          </div>
          <i class='bx bxs-cart-add cart two' ></i>
        </div>
        <div class="box">
          <div class="right-side">
            <div class="box-topic">Total Profit</div>
            <div class="number">&#8377;12,876</div>
            <div class="indicator">
              <i class='bx bx-up-arrow-alt'></i>
              <span class="text">Up from today</span>
            </div>
          </div>
          <i class='bx bx-cart cart three' ></i>
        </div>
        <div class="box">
          <div class="right-side">
            <div class="box-topic">Total Cancelled</div>
            <div class="number">11,086</div>
            <div class="indicator">
              <i class='bx bx-down-arrow-alt down'></i>
              <span class="text">Down From Today</span>
            </div>
          </div>
          <i class='bx bxs-cart-download cart four' ></i>
        </div>
      </div>

      <div class="sales-boxes">
    
        <div class="recent-sales box" style="width:100%;">
          <div class="title"> All Requests </div>
          <div class="sales-details">
            <?php
                //  $sql = 'SELECT * FROM buyer ORDER BY created_at';
                $sql_buyer = 'SELECT * FROM buyer ';
                 
                 $connection =  new Database();
                 $conn = $connection->connect();

                 $result_buyer = mysqli_query($conn, $sql_buyer);

                 $buyer = mysqli_fetch_all($result_buyer , MYSQLI_ASSOC);

                 //free result from memory
                 mysqli_free_result($result_buyer);

                 $sql_property = 'SELECT * FROM project_buy';
                 $result_property = mysqli_query($conn,$sql_property);

                 $property = mysqli_fetch_all($result_property  , MYSQLI_ASSOC);

                 //close connection
                 mysqli_close($conn);


      
            ?>
            <ul class="details">
             
              <li class="topic">Property Name</li>
              <?php foreach($buyer as $buyers) {?>
                
                <li><?php  echo htmlspecialchars($buyers['property_name'] ) ?></li>
            
             <?php } ?>
             
             <?php foreach($property as $properties) {?>
                
                <li><?php  echo htmlspecialchars($properties['project_name'] ) ?></li>
            
             <?php } ?>

            </ul>
            <ul class="details">
            <li class="topic">State</li>

            <?php foreach($buyer as $buyers) {?>
            <li><?php  echo htmlspecialchars($buyers['state'] ); ?></li>

            <?php } ?>
            <?php foreach($property as $properties) {?>
                
                <li><?php  echo htmlspecialchars($properties['state'] ) ?></li>
            
             <?php } ?>
            
          </ul>
          <ul class="details">
            <li class="topic">City</li>
            <?php foreach($buyer as $buyers) {?>
              <li><?php  echo htmlspecialchars($buyers['district'] ); ?></li>
              <?php } ?>

              <?php foreach($property as $properties) {?>
                
                <li><?php  echo htmlspecialchars($properties['district'] ) ?></li>
            
             <?php } ?>
          </ul>
        

          <ul class="details">
            <li class="topic">Area <span style="color:grey; font-size:0.7rem;">(sq.ft)</span></li>
        
            <?php foreach($buyer as $buyers) {?>
                <li><?php  echo htmlspecialchars($buyers['area'] ); ?></li>
              <?php } ?>
              <?php foreach($property as $properties) {?>
                
                <li><?php  echo htmlspecialchars($properties['area'] ) ?></li>
            
             <?php } ?>
          </ul>

          <ul class="details">
            <li class="topic">Price <span style="color:grey; font-size:0.7rem;">(lacs.)</span></li>
            <?php foreach($buyer as $buyers) {?>
              <li>&#8377;<?php  echo htmlspecialchars($buyers['price'] ); ?></li>
              <?php } ?>
              <?php foreach($property as $properties) {?>
                
                <li>&#8377;<?php  echo htmlspecialchars($properties['price'] ) ?></li>
            
             <?php } ?>
          </ul>

          <ul class="details">
            <li class="topic">BHK</li>
            <?php foreach($buyer as $buyers) {?>
              <li><?php  echo htmlspecialchars($buyers['bhk'] ); ?></li>
              <?php } ?>
              <?php foreach($property as $properties) {?>
                
                <li><?php  echo htmlspecialchars($properties['bhk'] ) ?></li>
            
             <?php } ?>
          </ul>
          <ul class="details">
            <li class="topic">Purpose</li>
            <?php foreach($buyer as $buyers) {?>
              <li><?php  echo htmlspecialchars($buyers['purpose'] ); ?></li>
              <?php } ?>
              <?php foreach($property as $properties) {?>
                
                <li><?php  echo "Buy" ?></li>
            
             <?php } ?>
          </ul>
          <ul class="details">
            <li class="topic"> Type</li>
            <?php foreach($buyer as $buyers) {?>
              <li><?php  echo "Property"; ?></li>
              <?php } ?>

              <?php foreach($property as $properties) {?>
                
                <li><?php  echo "Project" ?></li>
            
             <?php } ?>
          </ul>

          <ul class="details">
            <li class="topic">Purchesed By</li>
            <?php foreach($buyer as $buyers) {?>
              <li><?php  echo htmlspecialchars($buyers['first_name']. ' '. $buyers['last_name'] ); ?></li>
              <?php } ?>
              <?php foreach($property as $properties) {?>
                
                <li><?php  echo htmlspecialchars($properties['first_name']. ' '. $properties['last_name'] ); ?></li>
            
             <?php } ?>
          </ul>
          <ul class="details">
            <li class="topic">Phone</li>
            <?php foreach($buyer as $buyers) {?>
              <li><?php  echo htmlspecialchars($buyers['phone']); ?></li>
              <?php } ?>
              <?php foreach($property as $properties) {?>
                
                <li><?php  echo htmlspecialchars($properties['phone'] ); ?></li>
            
             <?php } ?>
          </ul>
          <ul class="details">
            <li class="topic">Email</li>
            <?php foreach($buyer as $buyers) {?>
              <li><?php  echo htmlspecialchars($buyers['email']); ?></li>
              <?php } ?>
              <?php foreach($property as $properties) {?>
                
                <li><?php  echo htmlspecialchars($properties['email'] ); ?></li>
            
             <?php } ?>
          </ul>
          </div>
          <br>
          <div class="button">
            <a href="#">See All</a>
          </div>
        </div>
      </div>
    </div>
  </section>

  <script>
let sidebar = document.querySelector(".sidebar");
let sidebarBtn = document.querySelector(".sidebarBtn");
sidebarBtn.onclick = function() {
  sidebar.classList.toggle("active");
  if(sidebar.classList.contains("active")){
  sidebarBtn.classList.replace("bx-menu" ,"bx-menu-alt-right");
}else
  sidebarBtn.classList.replace("bx-menu-alt-right", "bx-menu");
}
 </script>

</body>
</html>

