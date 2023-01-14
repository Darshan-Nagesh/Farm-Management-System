<?php
$con=mysqli_connect("localhost","root","","fms");

function display_emps()
{
 global $con;
 $query = "select * from emptb";
 $result = mysqli_query($con,$query);
 while( $row = mysqli_fetch_array($result) )
 {
  $username = $row['username'];
  $salary = $row['salary'];
  echo '<option value="' .$username. '" data-value="'.$salary.'">'.$username.'</option>';
 }
}

if(isset($_POST['emp_sub']))
{
 $username=$_POST['username'];
 $query="insert into emptb(username)values('$username')";
 $result=mysqli_query($con,$query);
 if($result)
  header("Location:addemp.php");
}

?>