<?php

session_start();
session_destroy();

require_once "connection.php";

if(isset($_POST['login']) && $_SERVER['REQUEST_METHOD'] === 'POST'){

    $email = $_POST['email'];
    $password = $_POST['password'];   

        $sql = "SELECT * FROM `users` WHERE `Email_Address`='$email'";

        $query = mysqli_query($conn,$sql);

        if(mysqli_num_rows($query) > 0){
            $row = mysqli_fetch_assoc($query);

            $pass = $row['Password'];
            $type = $row['User_Type'];

        if(md5($password) == $pass){

                session_start();

                if ($type == "Administrator") {
                $_SESSION['adminname'] = $row['User_ID'];
                header("Location: index.php");
                }else if ($type == "Hospital Representative") {

                $_SESSION['hosiname'] = $row['User_ID'];
                $_SESSION['hosiname1'] = $row['Address'] . " reach out on " . $row['Phone_Number'] . " or " . $row['Email_Address'];  
                 
                header("Location: index1.php");
                }
                else if ($type == "Driver") {

                $_SESSION['driname'] = $row['User_ID'];
                $_SESSION['driname1'] = $row['Fullname'] . " reach out on " . $row['Phone_Number'] . " or " . $row['Email_Address'];  
                 
                header("Location: index2.php");
                }else if ($type == "User") {

                $_SESSION['username'] = $row['User_ID'];
                $_SESSION['username1'] = $row['Fullname'] . " reach out on " . $row['Phone_Number'] . " or " . $row['Email_Address'];  
                 
                header("Location: index3.php");
                }
            }else{
               echo "An Error Occured: Incorrect Password."; 
            }
        }else{
            echo "An Error Occured: User Not Found.";
        }
}
           
?>