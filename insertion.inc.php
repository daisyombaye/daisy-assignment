<?php 
 
require 'connection.php';

session_start();

//Register User
if (isset($_POST['regu'])) {
 $fname = $_POST['fname'];
 $email = $_POST['email'];
 $phone = $_POST['phone'];
 $regno = $_POST['regno'];
 $mod = $_POST['mod'];
 $price = $_POST['price']; 
 $add = $_POST['add'];  
 $password = $_POST['password'];
 $passwordconfirm = $_POST['cpassword'];

 if ($password == $passwordconfirm) {
     if (!isset($_SESSION['adminname'])) {
  $sql = "INSERT INTO `users`(`Fullname`, `Phone_Number`, `Email_Address`, `Password`, `User_Type`) VALUES ('$fname','$phone','$email',md5('$password'),'User')";
     mysqli_query($conn, $sql);
  header("Location: index.html?userregistration=success");
     }else{

if ($mod == 0) {
  $sql = "INSERT INTO `users`(`Fullname`, `Phone_Number`, `Email_Address`, `Password`, `User_Type`, `Address`) VALUES ('$fname','$phone','$email',md5('$password'),'Hospital Representative','$add')";
     mysqli_query($conn, $sql);   
}else{

    $filename = $_FILES['image']['name'];

$valid_extensions = array("jpg","png","jpeg");

$extension = pathinfo($filename, PATHINFO_EXTENSION);

if((in_array(strtolower($extension),$valid_extensions))) {

if((move_uploaded_file($_FILES['image']['tmp_name'], "images/".$filename))){

        $sql2 = "SELECT COUNT(`User_ID`) AS `No_of_Users` FROM `users`";
        $query = mysqli_query($conn,$sql2);
        $row = mysqli_fetch_assoc($query);
        $unum = $row['No_of_Users'] + 1;

  $sql = "INSERT INTO `users`(`Fullname`, `Phone_Number`, `Email_Address`, `Password`, `User_Type`, `Address`) VALUES ('$fname','$phone','$email',md5('$password'),'Driver','$add')";
     mysqli_query($conn, $sql);
  $sql1 = "INSERT INTO `ambulance`(`User_ID`, `Price`, `Reg_No`, `Image`) VALUES ('$unum','$price','$regno','$filename')";
     mysqli_query($conn, $sql1); 

  }else{
  echo "An Error Occured: Image directory not found.";
}
}else{
  echo "An Error Occured: Kindly check the image format, current format is not accepted.";
}      
     }

     } 

  header("Location: index.php?userregistration=success");

}else{
  echo "Passwords do not match.";
 }
}

//Update User
if (isset($_POST['upu'])) {
 $uid = $_POST['uid'];
 $fname = $_POST['fname'];
 $email = $_POST['email'];
 $password = $_POST['password'];
 $passwordconfirm = $_POST['cpassword'];
 $phone = $_POST['phone'];
 $mod = $_POST['mod'];

 if ($password == $passwordconfirm) {
  if ($mod == 1) {
  $sql = "UPDATE `users` SET `Fullname`='$fname',`Email_Address`='$email',`Phone_Number`='$phone',`Password`=md5('$password') WHERE `User_ID`='$uid'";
     mysqli_query($conn, $sql);
  header("Location: index.php?updateadministrator=success");
  }else if ($mod == 2) {
  $sql = "UPDATE `users` SET `Fullname`='$fname',`Email_Address`='$email',`Phone_Number`='$phone',`Password`=md5('$password') WHERE `User_ID`='$uid'";
     mysqli_query($conn, $sql);
  header("Location: index1.php?updatehospital=success");
  }else if ($mod == 3) {
  $sql = "UPDATE `users` SET `Fullname`='$fname',`Email_Address`='$email',`Phone_Number`='$phone',`Password`=md5('$password') WHERE `User_ID`='$uid'";
     mysqli_query($conn, $sql);
  header("Location: index2.php?updatedriver=success");
  }else if ($mod == 4) {
  $sql = "UPDATE `users` SET `Fullname`='$fname',`Email_Address`='$email',`Phone_Number`='$phone',`Password`=md5('$password') WHERE `User_ID`='$uid'";
     mysqli_query($conn, $sql);
  header("Location: index3.php?updateuser=success");
  }
 }else{
  echo "Passwords do not match.";
 }
}

//Delete A User
if($_REQUEST['action'] == 'deleteU' && !empty($_REQUEST['id'])){ 
$deleteItem = $_REQUEST['id'];
$sql = "DELETE FROM `users` WHERE `User_ID` = '$deleteItem'";
mysqli_query($conn, $sql); 
$sql1 = "DELETE FROM `bookings` WHERE `User_ID` = '$deleteItem'";
mysqli_query($conn, $sql1); 
$sql2 = "DELETE FROM `ambulance` WHERE `User_ID` = '$deleteItem'";
mysqli_query($conn, $sql2); 
header("Location: index.php?deleteuser=success");
}

//Book An Ambulance
if (isset($_POST['bookA'])) {
    $uid = $_SESSION['username1'];
    $hd = explode(',', $_POST['aid']);
    $aid = $hd[0];
    $hid = $hd[1];
    $dt = $_POST['time'] . " on " . $_POST['date'];
    $det = $_POST['det'];
    
$sql = "INSERT INTO `bookings`(`User_ID`, `Ambulance_ID`, `Details`, `Date_Time`) VALUES('$uid','$aid','$det','$dt')";

   mysqli_query($conn, $sql);

  header("Location: index3.php?bookanAmbulance=success");

}

//Delete A Booking 
if($_REQUEST['action'] == 'deleteB' && !empty($_REQUEST['id'])){ 
$deleteItem = $_REQUEST['id'];
$sql = "DELETE FROM `bookings` WHERE `Booking_ID` = '$deleteItem'";
mysqli_query($conn, $sql);
header("Location: index3.php?deleteaBooking=success");
}

//Cancel A Booking 
if($_REQUEST['action'] == 'cancelB' && !empty($_REQUEST['id'])){ 
$deleteItem = $_REQUEST['id'];
$sql = "UPDATE `bookings` SET `Status` = 'Cancelled' WHERE `Booking_ID` = '$deleteItem'";
mysqli_query($conn, $sql); 
header("Location: index3.php?cancelaBooking=success");
}

//Pay for A Booking 
if($_REQUEST['action'] == 'payB' && !empty($_REQUEST['id'])){ 
$deleteItem = $_REQUEST['id'];
$sql = "UPDATE `bookings` SET `Status` = 'Paid For' WHERE `Booking_ID` = '$deleteItem'";
mysqli_query($conn, $sql); 
header("Location: index1.php?payforaBooking=success");
}

//Accept for A Booking 
if($_REQUEST['action'] == 'acceptB' && !empty($_REQUEST['id'])){ 
$deleteItem = $_REQUEST['id'];
if (isset($_SESSION['hosiname1'])) {
$uid = $_SESSION['hosiname1'];
$sql = "UPDATE `bookings` SET `Status` = 'Accepted by Hospital', `Hospital_ID` = '$uid' WHERE `Booking_ID` = '$deleteItem'";
mysqli_query($conn, $sql); 
header("Location: index1.php?acceptaBooking=success");
}else if(isset($_SESSION['driname1'])){
$uid = $_SESSION['driname1'];
$sql = "UPDATE `bookings` SET `Status` = 'Accepted by Hospital & Driver', `Driver_ID` = '$uid' WHERE `Booking_ID` = '$deleteItem'";
mysqli_query($conn, $sql); 
header("Location: index2.php?acceptaBooking=success");
}else{
   echo "An Error Occured: Unauthorised User.";
}
}

//Complete A Booking
if($_REQUEST['action'] == 'completeB' && !empty($_REQUEST['id'])){ 
$updateItem = $_REQUEST['id'];
$sql = "UPDATE `bookings` SET `Status` = 'Completed' WHERE `Booking_ID` = '$updateItem'";
mysqli_query($conn, $sql); 
header("Location: index2.php?completeaBooking=success");
}

?>