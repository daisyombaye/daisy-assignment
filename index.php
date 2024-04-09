<?php
require_once 'connection.php';
session_start();

if (!isset($_SESSION['adminname'])) {
    header("Location: index.html");
}else{
  $filter = $_SESSION['adminname'];
  $query=mysqli_query($conn,"SELECT * FROM `users` WHERE `User_ID`='$filter'")or die(mysqli_error());
  $row1=mysqli_fetch_array($query);
}
?>



<!DOCTYPE html>
  <head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Anisa - Administrator Homepage</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Facebook and Twitter integration -->
  <meta property="og:title" content=""/>
  <meta property="og:image" content=""/>
  <meta property="og:url" content=""/>
  <meta property="og:site_name" content=""/>
  <meta property="og:description" content=""/>
  <meta name="twitter:title" content="" />
  <meta name="twitter:image" content="" />
  <meta name="twitter:url" content="" />
  <meta name="twitter:card" content="" />

  <link href="https://fonts.googleapis.com/css?family=Raleway:200,300,400,700" rel="stylesheet">
  
  <!-- Animate.css -->
  <link rel="stylesheet" href="css/animate.css">
  <!-- Icomoon Icon Fonts-->
  <link rel="stylesheet" href="css/icomoon.css">
  <!-- Bootstrap  -->
  <link rel="stylesheet" href="css/bootstrap.css">
  <!-- Flexslider  -->
  <link rel="stylesheet" href="css/flexslider.css">
  <!-- Owl Carousel  -->
  <link rel="stylesheet" href="css/owl.carousel.min.css">
  <link rel="stylesheet" href="css/owl.theme.default.min.css">
  <!-- Theme style  -->
  <link rel="stylesheet" href="css/style.css">

  <!-- Modernizr JS -->
  <script src="js/modernizr-2.6.2.min.js"></script>

  </head>

 <style type="text/css">
        
          table{
    align-items: center;
  }

   th, tr, td{
    padding: 10px 10px;
  }
    </style>

            <script type="text/javascript">
function printData()
{
   var divToPrint=document.getElementById("printTable");
   newWin= window.open("");
   newWin.document.write(divToPrint.outerHTML);
   newWin.print();
   newWin.close();
}

$('button').on('click',function(){
printData();
})  
</script>

            <script type="text/javascript">
function printData1()
{
   var divToPrint=document.getElementById("printTable1");
   newWin= window.open("");
   newWin.document.write(divToPrint.outerHTML);
   newWin.print();
   newWin.close();
}

$('button').on('click',function(){
printData1();
})  
</script>

            <script type="text/javascript">
function printData2()
{
   var divToPrint=document.getElementById("printTable2");
   newWin= window.open("");
   newWin.document.write(divToPrint.outerHTML);
   newWin.print();
   newWin.close();
}

$('button').on('click',function(){
printData2();
})  
</script>

  <body>
  
  
  <div id="fh5co-page">
  <header id="fh5co-header" role="banner">
    <div class="container">
      <div class="header-inner">
        <h1><a href="#">Anisa</a></h1>
        <nav role="navigation">
          <ul>
            <li><a href="#data">View Database</a></li>
            <li><a href="#mod">My Module</a></li>
            <li><a href="#contact">Contact</a></li>
            <li class="cta"><a href="logout.php">Logout</a></li>
          </ul>
        </nav>
      </div>
    </div>
  </header>
  
  <div class="container">
    
  </div>
  <aside id="fh5co-hero" class="js-fullheight">
    <div class="flexslider js-fullheight">
      <ul class="slides">
        <li style="background-image: url(images/s1.jpg);">
          <div class="overlay-gradient"></div>
          <div class="container">
            <div class="col-md-10 col-md-offset-1 text-center js-fullheight slider-text">
              <div class="slider-text-inner">
                <h2>Welcome <?php echo $row1['User_Type']; ?>, <?php echo $row1['Fullname']; ?>!</h2>
                <p><a href="#data" class="btn btn-primary btn-lg">View Database</a></p>
              </div>
            </div>
          </div>
        </li>
        <li style="background-image: url(images/s2.jpg);">
          <div class="container">
            <div class="col-md-10 col-md-offset-1 text-center js-fullheight slider-text">
              <div class="slider-text-inner">
                <h2>Welcome <?php echo $row1['User_Type']; ?>, <?php echo $row1['Fullname']; ?>!</h2>
                <p><a href="logout.php" class="btn btn-primary btn-lg">Logout</a></p>
              </div>
            </div>
          </div>
        </li>
        <li style="background-image: url(images/s3.jpg);">
          <div class="container">
            <div class="col-md-10 col-md-offset-1 text-center js-fullheight slider-text">
              <div class="slider-text-inner">
                <h2>Welcome <?php echo $row1['User_Type']; ?>, <?php echo $row1['Fullname']; ?>!</h2>
                <p><a href="#mod" class="btn btn-primary btn-lg">My Module</a></p>
              </div>
            </div>
          </div>
        </li>
        </ul>
      </div>
  </aside>
    <div id="data" class="fh5co-about animate-box">
    <div class="col-md-12 text-center fh5co-heading">
      <h2>View Database</h2>
      <br>
      <h3>List of Users</h3>
      <br>
 <table id="printTable">
<tr style="text-align: left;
  padding: 8px;">
<th style="text-align: left;
  padding: 8px;">User ID</th>
<th style="text-align: left;
  padding: 8px;">Fullname</th>
  <th style="text-align: left;
  padding: 8px;">Email Address</th>
 <th style="text-align: left;
  padding: 8px;">Phone Number</th>
 <th style="text-align: left;
  padding: 8px;">Hospital Address</th>
  <th style="text-align: left;
  padding: 8px;">User Type</th>
   <th style="text-align: left; padding: 8px;"></th>
</tr>

<?php

$sql = "SELECT `User_ID`, `Fullname`, `Phone_Number`, `Email_Address`, `Password`, `User_Type`, `Address` FROM `users`";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
// output data of each row
while($row = $result->fetch_assoc()) {
?>
<tr>
<td><?php echo($row["User_ID"]); ?></td>
<td><?php echo($row["Fullname"]); ?></td>
<td><?php echo($row["Email_Address"]); ?></td>
<td><?php echo($row["Phone_Number"]); ?></td>
<td><?php echo($row["Address"]); ?></td>
<td><?php echo($row["User_Type"]); ?></td>
<td><button class="btn btn-primary py-3 px-5" onclick="return confirm('Are you sure that you want to delete this user?')?window.location.href='insertion.inc.php?action=deleteU&id=<?php echo($row["User_ID"]); ?>':true;" title='Delete User'>Delete</button></td>
</tr>
<?php
}
} else { echo "No results"; }
?>

</table>
<br>
            <div class="col-md-12">
              <div class="form-group">
                <p><a onclick="printData();" class="btn btn-primary">Print</a><p>
                <br>
              </div>
            </div>
    </div> 
        <div class="col-md-12 text-center fh5co-heading">
      <h3>List of Ambulances</h3>
      <br>
 <table id="printTable1">
<tr style="text-align: left;
  padding: 8px;">
<th style="text-align: left;
  padding: 8px;">Ambulance ID</th>
<th style="text-align: left;
  padding: 8px;">User ID</th>
  <th style="text-align: left;
  padding: 8px;">Price (in kshs.)</th>
 <th style="text-align: left;
  padding: 8px;">Registration Number</th>
 <th style="text-align: left;
  padding: 8px;">Picture</th>
   <th style="text-align: left; padding: 8px;"></th>
</tr>

<?php

$sql = "SELECT `Ambulance_ID`, `User_ID`, `Price`, `Reg_No`, `Image` FROM `ambulance`";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
// output data of each row
while($row = $result->fetch_assoc()) {
?>
<tr>
<td><?php echo($row["Ambulance_ID"]); ?></td>
<td><?php echo($row["User_ID"]); ?></td>
<td><?php echo($row["Price"]); ?></td>
<td><?php echo($row["Reg_No"]); ?></td>
<td><img src="images/<?php echo($row["Image"]); ?>" style="width: 150px;" alt=""></td>
</tr>
<?php
}
} else { echo "No results"; }
?>

</table>
<br>
            <div class="col-md-12">
              <div class="form-group">
                                <a value="Print" onclick="printData1();" class="btn btn-primary">Print</a>
                <br>
              </div>
            </div>
    </div> 
        <div class="col-md-12 text-center fh5co-heading">
      <h3>List of Bookings</h3>
      <br>
 <table id="printTable2">
<tr style="text-align: left;
  padding: 8px;">
<th style="text-align: left;
  padding: 8px;">Booking ID</th>
<th style="text-align: left;
  padding: 8px;">User Details</th>
<th style="text-align: left;
  padding: 8px;">Hospital Details</th>
<th style="text-align: left;
  padding: 8px;">Driver Details</th>  
  <th style="text-align: left;
  padding: 8px;">Ambulance ID</th>
 <th style="text-align: left;
  padding: 8px;">Date & Time</th>
 <th style="text-align: left;
  padding: 8px;">Status</th>
  <th style="text-align: left;
  padding: 8px;"></th>
   <th style="text-align: left; padding: 8px;"></th>
</tr>

<?php

$sql = "SELECT `Booking_ID`, `User_ID`, `Driver_ID`, `Hospital_ID`, `Ambulance_ID`, `Details`, `Date_Time`, `Created_At`, `Status` FROM `bookings`";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
// output data of each row
while($row = $result->fetch_assoc()) {
?>
<tr>
<td><?php echo($row["Booking_ID"]); ?></td>
<td><?php echo($row["User_ID"]); ?></td>
<?php
if(!($row['Hospital_ID'] == "")){
?>
<td><?php echo($row["Hospital_ID"]); ?></td>
<?php
}else{
?>
<td></td>
<?php
}
?>
<?php
if(!($row['Driver_ID'] == "")){
?>
<td><?php echo($row["Driver_ID"]); ?></td>
<?php
}else{
?>
<td></td>
<?php
}
?>
<td><?php echo($row["Ambulance_ID"]); ?></td>
<td><?php echo($row["Date_Time"]); ?></td>
<td><?php echo($row["Status"]); ?></td>
<?php
if (isset($_SESSION['hosiname']) && ($row['Status'] == "Pending")) {
  //Hospital Accepts
  ?>
<td><button class="btn btn-primary py-3 px-5" onclick="return confirm('Are you sure that you want to accept this booking?')?window.location.href='insertion.inc.php?action=acceptB&id=<?php echo($row["Booking_ID"]); ?>':true;" title='Accept Booking'>Accept</button></td>
<?php
}else if (isset($_SESSION['hosiname']) && ($row['Status'] == "Accepted by Hospital & Driver")) {
  //Hospital Receives Payment
  ?>
<td><button class="btn btn-primary py-3 px-5" onclick="return confirm('Are you sure that you want to pay for this booking?')?window.location.href='insertion.inc.php?action=payB&id=<?php echo($row["Booking_ID"]); ?>':true;" title='Pay for Booking'>Pay</button></td>
<?php
}else if (isset($_SESSION['driname']) && ($row['Status'] == "Accepted by Hospital")) {
  //Driver Accepts
  ?>
<td><button class="btn btn-primary py-3 px-5" onclick="return confirm('Are you sure that you want to accept this booking?')?window.location.href='insertion.inc.php?action=acceptB&id=<?php echo($row["Booking_ID"]); ?>':true;" title='Accept Booking'>Accept</button></td>
<?php
}else if (isset($_SESSION['driname']) && ($row['Status'] == "Paid For")) {
  //Driver Completes 
  ?>
<td><button class="btn btn-primary py-3 px-5" onclick="return confirm('Are you sure that you want to complete this booking?')?window.location.href='insertion.inc.php?action=completeB&id=<?php echo($row["Booking_ID"]); ?>':true;" title='Complete Booking'>Complete</button></td>
<?php
}else if (isset($_SESSION['username']) && ($row['Status'] != "Paid For") || ($row['Status'] != "Completed")) {
  //User Can Cancel Booking
  ?>
<td><button class="btn btn-primary py-3 px-5" onclick="return confirm('Are you sure that you want to cancel this booking?')?window.location.href='insertion.inc.php?action=cancelB&id=<?php echo($row["Booking_ID"]); ?>':true;" title='Cancel Booking'>Cancel</button></td>
<?php
}
?>
</tr>
<?php
}
} else { echo "No results"; }
?>

</table>
<br>
            <div class="col-md-12">
              <div class="form-group">
                               <a value="Print" onclick="printData2();" class="btn btn-primary">Print</a>
                <br>
              </div>
            </div>
    </div>  

  </div>
    <div id="mod" class="fh5co-contact animate-box">
    <div class="container">
      <div class="row">
        <div class="col-md-12 animate-box">
          <h2>My Module</h2>
        </div>
        <div class="col-md-6">
          <h3>Update My Details</h3>
          <br>
          <form action="insertion.inc.php" method="POST">
          <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                <input class="form-control" placeholder="Fullname" value="<?php echo $row1['Fullname']; ?>" type="text" required name="fname">
                <input type="hidden" value="1" name="mod" required>
                <input type="hidden" value="<?php echo $filter; ?>" name="uid" required>                
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <input class="form-control" placeholder="Email Address" value="<?php echo $row1['Email_Address']; ?>" type="text" required name="email">
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <input class="form-control" placeholder="Phone Number" value="<?php echo $row1['Phone_Number']; ?>" type="text" required name="phone">
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <input class="form-control" placeholder="Password" type="password" required name="password">
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <input class="form-control" placeholder="Confirm Password" type="password" required name="cpassword">
              </div>
            </div>
            <div class="col-md-12">
              <div class="form-group">
                <input value="Update" name="upu" class="btn btn-primary" type="submit">
              </div>
            </div>
          </div>
        </form>
        </div>
        <div class="col-md-6 col-sm-12 col-sm-push-0 col-xs-12 col-xs-push-0">
          <h3>Register A User</h3>
          <br>
          <form action="insertion.inc.php" method="POST" enctype="multipart/form-data">
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <input class="form-control" placeholder="Fullname" type="text" required name="fname">
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <input class="form-control" placeholder="Email Address" type="text" required name="email">
              </div>
            </div>
              <div class="col-md-12">
              <div class="form-group">
                <input class="form-control" placeholder="Name & Address of Hospital" type="text" required name="add">
              </div>
            </div>
            <div class="col-md-12">
              <div class="form-group">
                <input class="form-control" placeholder="Phone Number" type="text" required name="phone">
              </div>
            </div>
            <div class="col-md-12">
              <div class="form-group">
                <label>Picture of Ambulance (if User Type is an Ambulance Driver):</label>
                <br>
                <input class="form-control" type="file" accept=".jpg, .png, .jpeg" name="image">
              </div>
            </div>
            <div class="col-md-12">
              <div class="form-group">
                <select class="form-control" required name="mod">
                  <option value="" disabled selected>Kindly Select A User Type</option>
                  <option value="0">Hospital Representative</option>
                  <option value="1">Ambulance Driver</option>
                </select>
              </div>
            </div>            
            <div class="col-md-12">
              <div class="form-group">
                <input class="form-control" placeholder="Price for Booking (in kshs. & if user is an Ambulance Driver)" type="number" min="0" name="price">
              </div>
            </div>
            <div class="col-md-12">
              <div class="form-group">
                <input class="form-control" placeholder="Registration No. (if user is an Ambulance Driver)" type="text" name="regno">
              </div>
            </div>
                        <div class="col-md-6">
              <div class="form-group">
                <input class="form-control" placeholder="Password" type="password" required name="password">
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <input class="form-control" placeholder="Confirm Password" type="password" required name="cpassword">
              </div>
            </div>
            <div class="col-md-12">
              <div class="form-group">
                <input value="Register" name="regu" class="btn btn-primary" type="submit">
              </div>
            </div>
          </div>
        </form>
        </div>
      </div>
    </div>  
  </div>

  
  <footer id="fh5co-footer" role="contentinfo">
  
    <div class="container">
      <div class="col-md-6 col-sm-12 col-sm-push-0 col-xs-12 col-xs-push-0">
        <h3>About Us</h3>
        <p>Trusted by Thousands; We Set the Standard for Quality Care.</p>
        <p><a href="logout.php" class="btn btn-primary btn-outline with-arrow btn-sm">Logout <i class="icon-arrow-right"></i></a></p>
      </div>

      <div class="col-md-6 col-sm-12 col-sm-push-0 col-xs-12 col-xs-push-0">
        <h3>Follow Us</h3>
        <ul class="fh5co-social">
          <li><a href="#"><i class="icon-twitter"></i></a></li>
          <li><a href="#"><i class="icon-facebook"></i></a></li>
          <li><a href="#"><i class="icon-instagram"></i></a></li>
        </ul>
      </div>
      
      
      <div class="col-md-12 fh5co-copyright text-center">
        <p>&copy; 2024. All Rights Reserved.</p>  
      </div>
      
    </div>
  </footer>
  </div>
  
  
  <!-- jQuery -->
  <script src="js/jquery.min.js"></script>
  <!-- jQuery Easing -->
  <script src="js/jquery.easing.1.3.js"></script>
  <!-- Bootstrap -->
  <script src="js/bootstrap.min.js"></script>
  <!-- Waypoints -->
  <script src="js/jquery.waypoints.min.js"></script>
  <!-- Owl Carousel -->
  <script src="js/owl.carousel.min.js"></script>
  <!-- Flexslider -->
  <script src="js/jquery.flexslider-min.js"></script>

  <!-- MAIN JS -->
  <script src="js/main.js"></script>

  </body>
</html>