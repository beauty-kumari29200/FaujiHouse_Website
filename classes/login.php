<?php



class Login
{
    Private $error = "";

   public function evaluatelogin($data)
    {
      $email = addslashes($data['email']);
      $password = addslashes($data['password']);

     
      $query = "select * from users where email = '$email' limit 1 ";

      $DB = new Database();
      $result = $DB->read($query);

      if($result)
      {
          
        $row = $result[0];

        if($password == $row['password'])
        {
            //create session data
            $_SESSION['faujihouse_userid'] = $row['userid'];

        }else
        {
            $this->error .= "Wrong password !<br>";
        }

      }else
      {
          $this->error .= "No such email was found !<br>";
      }
          return $this->error;
      
     
    
    }

    public function check_login($id)
    {

             
      $query = "select userid from users where userid = '$id' limit 1 ";

      $DB = new Database();
      $result = $DB->read($query);

      if($result)
      {
           return true;
      }

      return false;
           
    }


} 


