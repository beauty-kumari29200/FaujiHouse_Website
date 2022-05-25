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
        <!-- <div class="box">
          <div class="right-side">
            <div class="box-topic">Total Members</div>
            <?php
                        $query_buy = 'SELECT COUNT(id) AS count FROM firstpage_query ';
                 
                        $connection =  new Database();
                        $conn = $connection->connect();
       
                        $result_buy = mysqli_query($conn, $query_buy);
                            
                        while($row = mysqli_fetch_assoc($result_buy))
                        {
                          $output1 = $row['count'];
                        }      
                      
            ?>
            <div class="number"><?php  echo $output1 ?></div>
            <div class="indicator">
              <i class='bx bx-up-arrow-alt'></i>
              <span class="text">Up from today</span>
            </div>
          </div>
          <i class='bx bx-cart-alt cart'></i>
        </div> -->
        <div class="box">
          <div class="right-side">
            <div class="box-topic">Solved</div>
            <?php
                        $query = "SELECT COUNT(id) AS count FROM firstpage_query WHERE issue_state ='solved'";
                 
                        $connection =  new Database();
                        $conn = $connection->connect();
       
                        $result = mysqli_query($conn, $query);
                            
                        while($row = mysqli_fetch_assoc($result))
                        {
                          $output = $row['count'];
                        } 
            ?>
            <div class="number"> <?php echo $output; ?></div>
            <div class="indicator">
              <i class='bx bx-up-arrow-alt'></i>
              <span class="text">Up from today</span>
            </div>
          </div>
          <i class='bx bxs-cart-add cart two' ></i>
        </div>
        <div class="box">
          <div class="right-side">
            <div class="box-topic">Processing</div>
            <?php
                        $query = "SELECT COUNT(id) AS count FROM firstpage_query WHERE issue_state ='processing'";
                 
                        $connection =  new Database();
                        $conn = $connection->connect();
       
                        $result = mysqli_query($conn, $query);
                            
                        while($row = mysqli_fetch_assoc($result))
                        {
                          $output3 = $row['count'];
                        } 
            ?>
            <div class="number"> <?php echo $output3; ?></div>
            <div class="indicator">
              <i class='bx bx-up-arrow-alt'></i>
              <span class="text">Up from today</span>
            </div>
          </div>
          <i class='bx bx-cart cart three' ></i>
        </div>
        <div class="box">
          <div class="right-side">
            <div class="box-topic">Pending</div>
            <?php
                        $query = "SELECT COUNT(id) AS count FROM firstpage_query WHERE issue_state ='pending'";
                 
                        $connection =  new Database();
                        $conn = $connection->connect();
       
                        $result = mysqli_query($conn, $query);
                            
                        while($row = mysqli_fetch_assoc($result))
                        {
                          $output2 = $row['count'];
                        } 
            ?>
            <div class="number"> <?php echo $output2; ?></div>
            <div class="indicator">
              <i class='bx bx-up-arrow-alt'></i>
              <span class="text">Up from today</span>
            </div>
          </div>
          <i class='bx bx-cart cart three' ></i>
        </div>
        
        <div class="box">
          <div class="right-side">
            <div class="box-topic">Not Solved</div>
            <?php
                        $query = "SELECT COUNT(id) AS count FROM firstpage_query WHERE issue_state ='not solved'";
                 
                        $connection =  new Database();
                        $conn = $connection->connect();
       
                        $result = mysqli_query($conn, $query);
                            
                        while($row = mysqli_fetch_assoc($result))
                        {
                          $output4 = $row['count'];
                        } 
            ?>
            <div class="number"><?php echo $output4; ?></div>
            <div class="indicator">
              <i class='bx bx-down-arrow-alt down'></i>
              <span class="text">Down From Today</span>
            </div>
          </div>
          <i class='bx bxs-cart-download cart four' ></i>
        </div>
      
       
      </div>

      <div class="sales-boxes">
    
        <div class="recent-sales box" style="width:100%">
          <div class="title"> All Members </div>
          <div class="sales-details">
            <?php
              
                $sql = 'SELECT * FROM   firstpage_query';
                 
                 $connection =  new Database();
                 $conn = $connection->connect();

                 $result = mysqli_query($conn, $sql);

                 $buyer = mysqli_fetch_all($result , MYSQLI_ASSOC);

                
                 mysqli_free_result($result);

                
                 mysqli_close($conn);

               
      
            ?>
              <ul class="details">
             
             <li class="topic"> S.No</li>
             <?php foreach($buyer as $buyers) {?>
               
               <li><?php  echo htmlspecialchars($buyers['id'] ) ?></li>
           
            <?php } ?>
           </ul>

            <ul class="details">
             
              <li class="topic"> Name</li>
              <?php foreach($buyer as $buyers) {?>
                
                <li><?php  echo htmlspecialchars($buyers['name'] ) ?></li>
            
             <?php } ?>
            </ul>
          
          <ul class="details">
            <li class="topic">Email</li>
            <?php foreach($buyer as $buyers) {?>
              <li><?php  echo htmlspecialchars($buyers['email'] ); ?></li>
              <?php } ?>
          </ul>

          <ul class="details">
            <li class="topic">Phone </li>
        
            <?php foreach($buyer as $buyers) {?>
                <li><?php  echo htmlspecialchars($buyers['phone'] ); ?></li>
              <?php } ?>
          </ul>


          <ul class="details">
            <li class="topic">Messages</li>
            <?php foreach($buyer as $buyers) {?>
              <li><?php  echo htmlspecialchars($buyers['msgs'] ); ?></li>
              <?php } ?>
          </ul>
          <ul class="details">
            <li class="topic">Issue State</li>
            <?php foreach($buyer as $buyers) {?>
              <li><?php  echo htmlspecialchars($buyers['issue_state'] ); ?></li>
              <?php } ?>
          </ul>
         
         
          <ul class="details">
            <li class="topic"> Date</li>
            <?php foreach($buyer as $buyers) {?>
                <li><?php  $wop= htmlspecialchars($buyers['date'] ) ; print date ("d/M/y",strtotime($wop)) ?></li>  
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

