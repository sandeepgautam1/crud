<!DOCTYPE html>
<html lang="en">

<html>
<title>
    database view
</title>
<link href=style.css rel="stylesheet" type="text/css">


<body>
<form action="search.php" method="POST">
<div class="topnav">
  <a class="active" href="INDEX.PHP">Home</a>
  
  <a href="VIEW.PHP">DATA TABLE</a>
  <a href='logout.php'>LOG OUT</a>      
  

<div class="search"><input type="text" name="search" ></div>
<div class="sub"><input type="submit" name = "submit" placeholder="search" style=" text-align: right;
    background-color: #4CAF50;
    border: none;
    color: white;
    padding: 10px 20px;
    text-decoration: none;
    margin: 4px 2px;
    cursor: pointer;
    border: blanchedalmond;
    border-radius: 10px;
    transition: 150px;">
        
     
</div>
</div>


        <h1>Table from database</h1>
        <table style border="20%" ;>
        <tr>
            <th>id</th>
            <th>first name</th>
            <th>last name</th>
            <th> city</th>
            <th>email</th>
            <th>gender</th>
            <th>Address</th>
            <th>occupation</th>
            <th>desciption</th>
            <th>image</th>
            <th>delete</th>
            <th>update/edit</th>
        </tr>

        <?php

        $conn = mysqli_connect("localhost", "root", "", "mydb2");
        if ($conn->connect_error) {
            die("connection failed" . $conn->connect_error);
        }
       
        $limit = 10;    
        $sql = "SELECT * FROM registered ";
        $result = mysqli_query($conn, $sql) or die("error");         
        $total_records = mysqli_num_rows($result);

        $no_of_pages = ceil($total_records/$limit);
        if (isset($_GET['page'])) {
            $page = $_GET['page'];
        } else {
            $page = 1;
        }
         
        $offset = ($page-1) * $limit;
        //
        $sql = "SELECT *FROM  registered LIMIT " . $offset . ',' . $limit;
        $result = mysqli_query($conn, $sql) or die("error");         
    
        while ($row = mysqli_fetch_array($result)) {  
            echo "<tr>         
                    <td>" . $row['id'] . "</td>   
                    <td>" . $row["firstname"] . "</td>
                    <td>" . $row["lastname"] . "</td>
                    <td>" . $row["city"] . "</td>
                    <td>" . $row["email"] . "</td>
                    <td>" . $row["gender"] . "</td>
                    <td>" . $row["address"] . "</td>
                    <td>" . $row["occupation"] . "</td>
                    <td>" . $row["desciptiion"] . "</td>
                    <td>" . $row["photo"] . "</td>       
                   <td> <a href='delete.php?rn=$row[id]'>Delete</a></td>
                    <td>  <a href ='update.php?rn=$row[id]'>edit</a></td>
                    </tr>";
            }
            echo "</table>";

            
           
            echo '<ul class="pagination">';
            if($page>1){
            echo '<li><a href="view.php?page='.($page-1).'">Prev</a></li>';}
            for ($i = 1; $i <= $no_of_pages; $i++) {   
            if($i==$page){
                 $active="active";
             }
             else
             {
                 $active="";
             }             
                echo '<li class="'.$active.'"><a href="view.php?page= ' . $i. '">' . $i ."    ". '</a></li>';       
            }          
            if($no_of_pages>$page){
                echo '<li><a href="view.php?page='.($page+1).'">Next</a></li>';}
            echo '</ul>';
            ?>

</body>
</html>