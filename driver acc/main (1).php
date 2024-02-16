<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Driver login and registration</title>
    <link rel="stylesheet" href="driverstyle.css">
</head>




<body>
    <div class="container">
        <input  id="homepage" type="button" value="Homepage" >
        <div class="formbox">
            <p id="welcome">Welcome Driver</p>
            <div class="button-box">
                <div id="btn"></div>
                <button type="button" class="toggle-btn" onclick="login()">Log In</button>
                <button type="button" class="toggle-btn" onclick="register()">Register</button>
            </div>
            
            
            
            <form id="login" method="POST" class="input-group">
                 <input type="text" name="id1" class="input-field" placeholder="Cab Id" required><br><br>
                <input type="text" name="pas1" class="input-field" placeholder="Enter Password" required><br><br><br><br>
                    <button type="submit" name="log" class="submit-btn">Login</button><br><br>
                 <input type="button" class="submit-btn" value="Forgot Password">
                </form>


            
            
            <form id="register" method="POST" class="input-group" >
                <input type="text" name="cabid" class="input-field" placeholder="Cab Id" required>
                <input type="text" name="name" class="input-field" placeholder="Name" required> 
                <input type="text" name="mobile" class="input-field" placeholder="Mobile Number" required> 
                <input type="text" name="dob" class="input-field" placeholder="Date Of Birth" required> <br><br>

                <input type="radio" id="male" name="gender" value="M">
                <label  id="gender" for="male">Male</label>
                <input type="radio" id="female" name="gender" value="F">
                <label id="gender"  for="female"> Female</label>
                <input type="radio" id="other" name="gender" value="OTHER">
                <label  id="gender"  for="other"> Other</label> <br><br>

                <input type="text" name="password" class="input-field" placeholder="Create Password" required> 

                <input type="checkbox" class="check-box"><span>I agree to the terms conditions</span>
                <button type="submit" name="register" class="submit-btn">Register</button>
            </form>
        </div>
    </div>
    <script>
        var x=document.getElementById("login");
        var y=document.getElementById("register");
        var z=document.getElementById("btn");
        function register()
        {
            x.style.left="-400px";
            y.style.left="50px";
            z.style.left="110px";
        }
        function login()
        {
            x.style.left="50px";
            y.style.left="450px";
            z.style.left="0";
        }
</script>



</body>
</html>


<?php  //connection part

$server="localhost";
$user="root";
$pass="";
$db="driver";

$connect=new mysqli($server,$user,$pass,$db);

if($connect){
    echo "connected";
}
else{
    echo "connection failed";
}
?>


<?php  //adding new members

if(isset($_POST['register'])){


$sql=" INSERT INTO hub VALUES
(
'".$_POST['cabid']."',
'".$_POST['name']."',
'".$_POST['mobile']."',
'".$_POST['dob']."',
'".$_POST['gender']."',
'".$_POST['password']."'
) ";

$result=mysqli_query($connect,$sql);

if($result)
echo"<script> alert ('Registered') </script>";
else
echo"failed";
}


?>

<?php //login

if(isset($_POST['log'])){

    $cab = mysqli_real_escape_string($connect, $_POST['id1']);
    $pas = mysqli_real_escape_string($connect, $_POST['pas1']);

$sql2 = "SELECT * FROM hub WHERE id='$cab' AND pass='$pas'";

$result2=mysqli_query($connect,$sql2);
$count=mysqli_num_rows($result2);

if ($count > 0) {
    header("Location: driverprofile.php?passid=$cab");
} else {
    echo "<script> alert ('not found') </script>";
}

}
?>