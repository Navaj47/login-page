<?php
        require("connect.php");
       

if($_SERVER["REQUEST_METHOD"]=="POST"){
    $email=$_POST['Email'];
    $pas=$_POST['Password'];
    

    $sql= "SELECT * FROM `data` WHERE (`Email` = '".$email."')";
    $result=mysqli_query($conn , $sql);
  
    $num=mysqli_num_rows($result);
 if($num == 1){
    while($row=mysqli_fetch_assoc($result)){
     
        if(password_verify($pas , $row['Password'])){
        $exist=true;
        }
    }
    
 }

 else{
    $exist=false;

 }
 if($exist){


    session_start();
    $_SESSION['login']=true;
    $_SESSION['email']=$email;
    header("location: a.php");

 }
else{
    $error=true;
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
            <h1>Login</h1>
            <br><br>
            <a href="sign_up.php">Sign Up</a>

            <div class="div1">
                <form method="post" action="login.php">
                    <input type="email" placeholder="Enter Your Email" maxlength="25" name="Email">
                    <br><br>

                    <input type="password" placeholder="Password" maxlength="23" name="Password">
                    <br><br>

                    <input type="submit" name="submit" value="Login" id="btn">
                    <br><br>


                </form>
                <br><br>


            </div>



            <?php
 
 
// if($nr){
//     echo "<h3 class='error';>data not send</h3>";
// }
if(@$error){
    echo "<h3 class='error';>wrong Email OR Password</h3>";
}


            ?>
    </body>

</html>