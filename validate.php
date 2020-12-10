<?php
 session_start();
 include('connction.php');
 $name=$_POST['user'];
 $pass=$_POST['pass'];
$repass=$_POST['repass'];

if($repass==$pass){

    echo "password match";
 $str_name=password_hash($pass,PASSWORD_BCRYPT);
            if(!$name=="" && !$pass==""){
                        $s= "SELECT * FROM loginform where username='$name' ";
                        $result= mysqli_query($conn,$s);
                        $num=mysqli_num_rows($result);
                        if ($num==1)
                        {
                            echo "result xist";
                        }
                        else{
                            $query = "INSERT INTO loginform (username, password) VALUES ('$name','$str_name' )";
                            $data = mysqli_query($conn, $query);
                                if ($data)
                            {
                                echo '<script>alert("successfully entered")</script>'; 
                            
                                
                            }
                        }

                        }
                    
                    }
 else{
  die("PASSWORD DOESNNOT MATCH");

    echo '<script>alert("password doesnt match")</script>';
    
 }
