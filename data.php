<html>

<body>

  <form action="view.php" method="post">
    <link href=style.css rel="stylesheet" type="text/css">
    <?php
    $yname = $_POST['firstname'];
    if (preg_match('/^[a-zA-Z-]+$/',$yname))
    {
      echo " valid name = ".$yname ."<br/>";}
      else{
        echo "invalid name";
      }
        
    $lname = $_POST["lastname"];
    if( preg_match('/^[a-zA-Z-]+$/',$lname)){ echo " valid last name  =".$lname."<br/>" ;    }
    
    $City = $_POST['city'];
    if( preg_match('/^[a-zA-Z-]+$/',$City))
    {echo " valid city name  = ".$City."<br / >";}
           
    $email = $_POST["Email"];
    // for validation
    if (strpos($email, '@'))
     {
      echo "ok email  =".$email."<br/>";
     } else {
      echo "wrong email <br/> ";}
      $Address = $_POST["address"];
      if( preg_match('/^[a-zA-Z-0-9-]+$/',$Address)){
        echo "ok adres =".$Address."<br/>";
      }
      
      $gender = $_POST["gender"];
      if(preg_match('/^[a-zA-Z-]+$/',$gender))
      { echo "ok gender  =".$gender."<br/>";}

      $description = $_POST["desciption"];
      if (preg_match('/^[a-zA-Z-0-9-]+$/',$description))
      {echo "ok description  =".$description."<br/>";}

      $occupation = $_POST["occupation"];
      if (preg_match('/^[a-zA-Z-0-9-]+$/',$occupation))
      {echo "ok occupation =  ".$occupation."<br/>";}

      $filename = $_FILES['uploadfile']['name'];
      $tempname = $_FILES["uploadfile"]["tmp_name"];
      $file_ext = explode('.', $filename);
      $file_ext_lower = strtolower(end($file_ext));
      $valid_extension = array('png', 'jpeg', 'jpg');
      if (in_array($file_ext_lower, $valid_extension)) {
        echo "ok format <br/>";
        $folder = "student/" . $filename;
        move_uploaded_file($tempname, $folder);}

        if (!empty($yname) && !empty($lname) &&!empty($City) && !empty($email) && !empty($Address) && !empty($gender) && !empty($description) && !empty($occupation)) {

          $DB_HOST = "localhost";
          $DB_USER = "root";
          $DB_PASSWORD = "";
          $DB_DATABASE = "mydb2";

          $conn = mysqli_connect($DB_HOST, $DB_USER, $DB_PASSWORD, $DB_DATABASE);
          // Check connection and for making  connection 

          if (!$conn) {

            die("connection failed" . mysqli_connect_error()); /// reason for connection
          } else {
            echo "ok connextion <br/>";


            /*
for inserting the value in db insert into tablename (key,) value('value')
*/
            $query = "INSERT INTO registered (firstname, lastname, city, email, gender, address, occupation, desciptiion, photo) VALUES ('$yname','$lname','$City','$email','$gender','$Address' ,'$occupation','$description','$folder' )";
            $data = mysqli_query($conn, $query);
            if ($data)

              echo "succesfully entered database <br/>" . $DB_DATABASE . "<br />";
           /*/ echo "your name is=$yname <br />";
            echo "your last name is=$lname <br />";
            echo "your city name is =$City<br/>";
            echo "your email is=$email <br />";
            echo "your adress=$Address <br />";
            echo "your gender is=$gender<br />";
            echo "your description is =$description<br/>";
            echo "your occapation is =$occupation<br/>";*/
            echo "<img src='$folder' height ='100' width ='100'/>";
            $conn->close();
          }
      }
     else { 
        echo  "invalid format <br/>";
        echo "no text inserted";
      }   
    ?>
    <br />
    <br />
    <input type="submit" name="submit">
  </form>
</body>

</html>