<?php
$showAlert=false;
$showError=false;
 session_start();

 if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true){
     header("location:login.php");
     exit;
 }
 else{
 include "dbconnect.php";

 if(isset($_POST['edit1']))
 {
    $username=$_SESSION['username'];
    $full_name=$_POST['full_name'];
    $Mno=$_POST['Mno'];
    $address=$_POST['address'];
    // $Gender=$_POST['Gender'];
    // $state=$_POST['state'];
    // $city=$post['city'];

    //$email=$_POST['email'];
    $select= "select * from users where username='$username'";
    $sql = mysqli_query($conn,$select);
    $row = mysqli_fetch_assoc($sql);
    $res= $row['username'];
    if($res === $username)
    {
       
       $update = "update users set full_name='$full_name',Mno='$Mno',address='$address' where username='$username'";
       $sql2=mysqli_query($conn,$update);
if($sql2)
       { 
           $showAlert=true;
           /*Successful*/
           header('location:welcome.php');
       }
       else
       {
           /*sorry your profile is not update*/
           $showError=true;
           header('location:welcome.php');
       }
    }
    }
    else
    {
        /*sorry your id is not match*/
        header('location:edit-profile.php');
    }
 }

?>