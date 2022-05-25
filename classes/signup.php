<?php



class Signup
{
    Private $error = "";

   public function evaluate($data)
    {
        foreach ($data as $key => $value)
        {
            if(empty($value))
            {
                $this->error = $this->error . $key .  " is empty!<br>";
            }

            if($key == "name")
            {
                if(is_numeric($value))
                {
                    $this->error = $this->error . "Invalid user name ! <br>";
                }
            }
        }

        if($this->error == "")
        {
             //no error

             $this->create_user($data);
        }else
        {
            return $this->error;
        }

    }

   public function create_user($data)
    {
      $name = ucfirst($data['name']);
      $email = $data['email'];
      $phone = $data['phone'];
      $city = $data['city'];
      $state = $data['state'];
      $password = $data['password'];

      //create these
      $userid = $this->create_userid();

     
      $query = "insert into users (userid,name,email,phone,city,state,password) values ('$userid','$name','$email','$phone','$city','$state','$password')";
       

      $DB = new Database();
      $DB->save($query);
     
    
    }

    private function create_userid()
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