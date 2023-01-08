<?php
session_start();
$con=mysqli_connect("localhost","root","","fms");
if(isset($_POST['adsub'])){
	$username=$_POST['username1'];
	$password=$_POST['password2'];
	$query="select * from admintb where username='$username' and password='$password';";
	$result=mysqli_query($con,$query);
	if(mysqli_num_rows($result)==1)
	{
		$_SESSION['username']=$username;
		header("Location:admin-panel1.php");
	}
	else
		// header("Location:error2.php");
		echo("<script>alert('Invalid Username or Password. Try Again!');
          window.location.href = 'index.php';</script>");
}

function display_emps()
{
	global $con;
	$query="select * from emptb";
	$result=mysqli_query($con,$query);
	while($row=mysqli_fetch_array($result))
	{
		$name=$row['name'];
		# echo'<option value="" disabled selected>Select Employee</option>';
		echo '<option value="'.$name.'">'.$name.'</option>';
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
