<?php
session_start();
$con=mysqli_connect("localhost","root","","fms");
if(isset($_POST['usersub'])){
	$email=$_POST['email'];
	$password=$_POST['password2'];
	$query="select * from userreg where email='$email' and password='$password';";
	$result=mysqli_query($con,$query);
	if(mysqli_num_rows($result)==1)
	{
		while($row=mysqli_fetch_array($result,MYSQLI_ASSOC)){
      $_SESSION['username'] = $row['fname']." ".$row['lname'];
    }
		header("Location:admin-panel.php");
	}
  else {
    echo("<script>alert('Invalid Username or Password. Try Again!');
          window.location.href = 'index1.php';</script>");
    // header("Location:error.php");
  }
		
}


if(isset($_POST['emp_sub']))
{
	$emp=$_POST['username'];
  $emppassword=$_POST['password'];
  $empemail=$_POST['email'];
  $empFees=$_POST['docFees'];
	$query="insert into emptb(username,password,email,salary)values('$emp','$emppassword','$empemail','$empFees')";
	$result=mysqli_query($con,$query);
	if($result)
		header("Location:addemp.php");
}

?>