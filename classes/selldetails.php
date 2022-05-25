<?php

class Sell
{
    private $error = "";

    public function create_sell($userid, $data)
    {
          if($data != "") 
          {
            $name = ucfirst($data['name']);
            $sell_type = ucfirst($data['sell_type']);
            $area = $data['area'];
            $bathroom = ucfirst($data['bathroom']);
            $room = $data['room'];
            $kitchen = $data['kitchen'];
            $sell_picture = $data ['sell_picture'];
            $video = $data['video'];
            $address = $data ['address'];
            $seller_image= $data ['seller_image'];
            $district = $data ['district'];
            $state = $data ['state'];
            $property_type = $data ['property_type'];
            $price = $data ['price'];
            $signature_image = $data ['signature_image'];
            $language = $data ['language'];


            //  $post = addslashes($data['post']);
             $sell_detail_id = $this-> create_sellid_detail();

             $query = "insert into  property_details (userid,sell_detail_id,name,sell_type,area,bathroom,room,kitchen,sell_picture,video,address,seller_image,district,state,property_type,price,signature_image,language) 
                                           values ('$userid','$sell_detail_id','$name','$sell_type','$area','$bathroom','$room','$kitchen','$sell_picture',$video,'$address','$seller_image','$district','$state','$property_type','$price','$signature_image','$language')";
            
             
               $DB = new Database();
               $DB->save($query);

               if($DB)
               {
                echo '<script type="text/javascript"> alert ("Data Saved"); window.location = "postproperty.php" </script>';
                  
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

    private function create_sellid_detail()
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

