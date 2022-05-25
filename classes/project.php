<?php

class ProjectBuyer
{
    private $error = "";

    public function create_buyer($userid, $data)
    {
          if($data != "") 
          {
            $first_name = ucfirst($data['first_name']);
            $last_name = ucfirst($data['last_name']);
            $email = $data['email'];
            $phone = ($data['phone']);
            $state = $data['state'];
            $district = $data['district'];
            $address = $data ['address'];
            $bhk = $data ['bhk'];
            $project_name = $data ['project_name'];
            $area = $data ['area'];
            $price = $data ['price'];
            $city = $data ['city'];
            $project_loan = $data ['project_loan'];
            $agree_contact = $data ['agree_contact'];
            $months = $data ['months'];
            


            //  $post = addslashes($data['post']);
             $buyerid = $this->create_buyerid();

             $query = "insert into project_buy (userid,buyerid,first_name,last_name,email,phone,state,district,address,bhk,project_name,area,price,city,project_loan,agree_contact,months) 
                                  values ('$userid','$buyerid','$first_name','$last_name','$email','$phone','$state','$district','$address','$bhk','$project_name','$area','$price','$city','$project_loan','$agree_contact','$months')";
            
             
               $DB = new Database();
               $DB->save($query);

               if($DB)
               {
                   echo '<script type="text/javascript"> alert ("Data Saved .. we will contact you soon !");  window.location = "project.php" </script>';
                  
               }else
               {
                 echo '<script type="text/javascript"> alert ("Data Not Saved") </script>';
               }
 

          }else
          {
               $this->error .= "Empty Feilds !<br>";
          }

          return $this->error;


    }

    private function create_buyerid()
    {
       $length = rand(4,19);
       $number = "";
       for ($i=0; $i < $length; $i++){

           $new_rand = rand(0,9);

           $number = $number . $new_rand;
       } 

       return $number;
    }
}

