<?php
session_start();
$con=mysqli_connect("localhost","root","","fms");
if(isset($_POST['usersub1'])){
	$fname=$_POST['fname'];
  $lname=$_POST['lname'];
  $gender=$_POST['gender'];
  $email=$_POST['email'];
  $contact=$_POST['contact'];
	$password=$_POST['password'];
  $cpassword=$_POST['cpassword'];
  if($password==$cpassword){
  	$query="insert into userreg(fname,lname,gender,email,contact,password,cpassword) values ('$fname','$lname','$gender','$email','$contact','$password','$cpassword');";
    $result=mysqli_query($con,$query);
    if($result){
        $_SESSION['username'] = $_POST['fname']." ".$_POST['lname'];
        $_SESSION['fname'] = $_POST['fname'];
        $_SESSION['lname'] = $_POST['lname'];
        $_SESSION['gender'] = $_POST['gender'];
        $_SESSION['contact'] = $_POST['contact'];
        $_SESSION['email'] = $_POST['email'];
        header("Location:admin-panel.php");
    } 

    $query1 = "select * from userreg;";
    $result1 = mysqli_query($con,$query1);
    if($result1){
      $_SESSION['pid'] = $row['pid'];
    }

  }
  else{
    header("Location:error1.php");
  }
}

if(isset($_POST['emp_sub']))
{
	$name=$_POST['name'];
	$query="insert into emptb(name)values('$name')";
	$result=mysqli_query($con,$query);
	if($result)
		header("Location:addemp.php");
}

?>
