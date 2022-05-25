<?php

class Register
{
    private $error = "";

    public function create_register($userid, $data)
    {
          if($data != "") 
          {
            $user_name = ucfirst($data['user_name']);
            $position = ucfirst($data['position']);
            $phone = $data['phone'];
            $email = $data['email'];
            $DOB = $data['DOB'];
            $address = $data['address'];
            $state = $data['state'];
            $city = $data['city'];


         
             $register_id = $this->create_registerid();

             $query = "INSERT INTO `service_register`(`register_id`, `userid`, `user_name`, `position`, `phone`, `email`, `DOB`, `address`, `state`, `city`) VALUES ('$register_id','$userid','$user_name','$position','$phone','$email','$DOB','$address','$state','$city')";
            
             
               $DB = new Database();
               $DB->save($query);

               if($DB)
               {
                   echo '<script type="text/javascript"> alert ("Data Saved"); window.location = "service_register.php"  </script>';
                   
                  
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

    private function create_registerid()
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

