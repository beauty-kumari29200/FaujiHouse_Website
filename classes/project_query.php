<?php

class ProjectBuyer
{
    private $error = "";

    public function create_buyer($userid, $data)
    {
          if($data != "") 
          {
            $email = $data['email'];
            //  $post = addslashes($data['post']);
             $project_Query_id = $this->create_buyerid();

             $query = "insert into project_query (userid,project_Query_id,email) values ('$userid','$project_Query_id','$email')";
            
             
             $DB = new Database();
               $DB->save($query);  

               if($DB)
               {
                   echo '<script type="text/javascript"> alert ("Data saved .. we will contact you soon..");  window.location = "project.php" </script>';
                  
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

