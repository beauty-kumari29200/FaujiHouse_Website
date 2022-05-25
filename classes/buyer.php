<?php

class Buyer
{
    private $error = "";

    public function create_buyer($userid, $data)
    {
          if($data != "") 
          {
            $purpose = ucfirst($data['purpose']);
            $first_name = ucfirst($data['first_name']);
            $last_name = ucfirst($data['last_name']);
            $email = $data['email'];
            $phone = ($data['phone']);
            $state = $data['state'];
            $district = $data['district'];
            $address = $data ['address'];
            $bhk = $data ['bhk'];
            $property_name = $data ['property_name'];
            $area = $data ['area'];
            $price = $data ['price'];
            $city = $data ['city'];
            $home_loan = $data ['home_loan'];
            $site_visit = $data ['site_visit'];
            $agree_contact = $data ['agree_contact'];
            $months = $data ['months'];
            


            //  $post = addslashes($data['post']);
             $buyerid = $this->create_buyerid();

             $query = "insert into buyer (userid,buyerid,purpose,first_name,last_name,email,phone,state,district,address,bhk,property_name,area,price,city,home_loan,site_visit,agree_contact,months) 
                                  values ('$userid','$buyerid','$purpose','$first_name','$last_name','$email','$phone','$state','$district','$address','$bhk','$property_name','$area','$price','$city','$home_loan','$site_visit','$agree_contact','$months')";
            
             
               $DB = new Database();
               $DB->save($query);

               if($DB)
               {
                   echo '<script type="text/javascript"> alert ("Data Saved .. we will contact you soon !");  window.location = "testbuy.php" </script>';
                  
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

