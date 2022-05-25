<?php

class Sell
{
    private $error = "";

    public function create_sell($userid, $data)
    {
          if($data != "") 
          {
            $first_name = ucfirst($data['first_name']);
            $last_name = ucfirst($data['last_name']);
            $email = $data['email'];
            $phone = ucfirst($data['phone']);
            $password = $data['password'];
            $property_type = $data['property_type'];
            $purpose = $data ['purpose'];


            //  $post = addslashes($data['post']);
             $sellid = $this->create_sellid();

             $query = "insert into sell (userid,sellid,first_name,last_name,email,phone,password,property_type,purpose) values ('$userid','$sellid','$first_name','$last_name','$email','$phone','$password','$property_type','$purpose')";
            
             
               $DB = new Database();
               $DB->save($query);

               if($DB)
               {
                   echo '<script type="text/javascript"> alert ("Data Saved");  window.location = "sell_post.php" </script>';
                  
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

    private function create_sellid()
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

