

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>task1</title>
    <link href=style.css rel="stylesheet" type="text/css">
    <script type= "text/javascript" src = "script.js"></script>
    <script src="js/form-validation.js"></script>    
    <style>
        .error{
            color: red;
            font-style: italic;
            font-size: smaller;
        }
    </style>
</head>


<body>
    <div>
    
        <div class="topnav">
            <a class="active" href="#home">Home</a>

            <a href="VIEW.PHP">DATA TABLE</a>
<a href='logout.php'>LOG OUT</a>            
        </div>
     
        <form id="index" 
        action="data.php" method="POST" enctype="multipart/form-data">

            First Name:<input type="text" name="firstname" value=""  style="font-weight: bold;" id="fn"><br /></br>
            <!or first name as input!>

                Last Name:<input type="text" name="lastname" value=""  style="font-weight: bold;" id="ln"><br /></br>
                <!for last name as input!>

                    Address:<input type="textarea" name="address" value="" style="font-weight: bold;" id="ad"><br /></br>
                    <!for address as input!>
                        City:<input type="text" name="city" value=""  style="font-weight: bold;" id="ci"><br /></br>
                        <!for city name as input!>
                            Emailid:<input type="text" name="Email" value="" id="em"></br></br>
                            <!for email name as input!>

Select Your gender:
					<div class="gender">
					                Male<input value="M"  type="radio" name="gender"/>
					                Female<input type="radio" name="gender" value="F"/>
					</div>
                                       
         
                                        Select image to upload: <!//uplaoad the image!>
                                            <input type="file" name="uploadfile" value=" " >


                                            <br />
                                            <br />

                                            Desciption:<input type="textarea" name="desciption" value="">
                                            <br />
                                            <br />
                          <div class="occupation">
                                            <! <!//description!> Occupation: <!// Occupation!>
                                            Employed<input value="E"  type="radio" name="occupation"/>
					                Unemployed<input type="radio" name="occupation" value="U"/>
                          </div>
                                                <br />
                                                <br />

                                                <! //for submit button!>
                                                    <input type="submit" name="submit">
    </div>
    </form>


<script  src="https://code.jquery.com/jquery-3.5.1.min.js"
  integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="
  crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.2/dist/jquery.validate.js">
</script>
<script src="register.js"></script>
</body>

</html>
