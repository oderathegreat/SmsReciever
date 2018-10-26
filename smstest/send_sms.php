<?php
class Sendsms{




      public function sending($username,$password,$msg,$receiver){

              

             
                $newusername=md5($username);                   

                $fields = array("username"=>"".$newusername,"password"=>"".$password,"msg"=>"".$msg,"receiver"=>"".$receiver);

                $ch = curl_init();                 

                curl_setopt($ch, CURLOPT_URL,"https://users.tumatext.co.ke/api/amfratech");
                curl_setopt($ch, CURLOPT_POST, true);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
                curl_setopt($ch, CURLOPT_POSTFIELDS,$fields);
                $server_output = curl_exec ($ch);
                curl_close ($ch);

              
                                 
               
      }



}


//get the variables passed via post method
$username=$_POST['username'];
$password=$_POST['password'];
$msg=$_POST['msg'];
$receiver=$_POST['receiver'];

$sendsmsobject=new Sendsms();//create object of sendsms class
$sendsmsobject->sending($username,$password,$msg,$receiver);//call function to send sms


?>