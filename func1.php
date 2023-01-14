<?php
session_start();
$con=mysqli_connect("localhost","root","","fms");
if(isset($_POST['empsub1'])){
	$empname=$_POST['username3'];
	$emppass=$_POST['password3'];
	$query="select * from emptb where username='$empname' and password='$emppass';";
	$result=mysqli_query($con,$query);
	if(mysqli_num_rows($result)==1)
	{
    while($row=mysqli_fetch_array($result,MYSQLI_ASSOC)){
    
		$_SESSION['eid']=$row['eid'];
		$_SESSION['empname']=$row['username'];
      
    }
		header("Location:emp-panel.php");
	}
	else{
    // header("Location:error2.php");
    echo("<script>alert('Invalid Username or Password. Try Again!');
          window.location.href = 'index.php';</script>");
  }
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
?>