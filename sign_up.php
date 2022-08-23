  <?php
        require("connect.php");
        $exist=false;
        $dpas=false;

if($_SERVER["REQUEST_METHOD"]=="POST"){
    $email=$_POST['Email'];
    $pas=$_POST['Password'];
    $cpas=$_POST['CPassword'];

    $sql= "SELECT * FROM `data` WHERE (`Email` = '".$email."')";
    $result=mysqli_query($conn , $sql);
    $num=mysqli_num_rows($result);
 if($num > 0){
     $exist=true;
 }

 else{
    $exist=false;

 }
 if(!$exist){
    if($pas == $cpas && $pas!=""){
        $hash=password_hash($pas, PASSWORD_DEFAULT);
        $query="INSERT INTO `data` (`Email`, `Password`) VALUES ('".$email."', '".$hash."');
        ";
        $result=mysqli_query($conn , $query);

    header("location:a.php");
    }


else{
    $dpas=true;
}
 }
else{
    $exist=true;
}

}
else{
    $nr=true;
}

?>



  <html>

      <body>


          <link href="css.css" rel="stylesheet">
          <link rel="preconnect" href="https://fonts.googleapis.com">
          <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
          <link href="https://fonts.googleapis.com/css2?family=Irish+Grover&display=swap" rel="stylesheet">






          <div class="myDiv">

              <h1>Sign Up</h1>
              <br><br>
              <a href="login.php">Login</a>
              <div class="div1">
                  <form method="post" action="sign_up.php">
                      <input type="email" placeholder="Enter Your Email" maxlength="25" name="Email">
                      <br><br>

                      <input type="password" placeholder="Password" maxlength="23" name="Password">
                      <br><br>

                      <input type="password" placeholder="Conferm password" name="CPassword">
                      <br><br>

                      <input type="submit" name="submit" value="Sign Up" id="btn">
                      <br><br>


                  </form>
                  <br><br>


              </div>

              <?php

              if($exist){
                  echo "User already exist";
              }
              
              if($dpas){
                echo "password do not mach";
            }

            // if($nr){
            //     echo "data not send";
            // }

              ?>
      </body>

  </html>