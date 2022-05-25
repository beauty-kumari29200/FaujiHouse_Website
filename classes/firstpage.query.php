<?php

class Query
{
    private $error = "";

    public function create_buyer($userid, $data)
    {
          if($data != "") 
          {
            $name = $data['name'];
            $email = $data['email'];
            $phone = $data['phone'];
             $msgs = addslashes($data['msgs']);

             $query_id = $this->create_buyerid();

             $query = "insert into  firstpage.query (userid,query_id,name,email,phone,msgs) values ('$userid','$query_id','$name','$email','$phone','$msgs')";
            
             
             $DB = new Database();
               $DB->save($query);  

               if($DB)
               {
                   echo '<script type="text/javascript"> alert ("Data saved .. we will contact you soon..");  window.location = "firstpage.php" </script>';
                  
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

