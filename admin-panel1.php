<!DOCTYPE html>
<?php 
$con=mysqli_connect("localhost","root","","fms");

include('newfunc.php');

if(isset($_POST['empsub']))
{
  $emp=$_POST['emp'];
  $emppassword=$_POST['emppassword'];
  $empemail=$_POST['empemail'];
  $phone=$_POST['phone'];
  $salary=$_POST['salary'];
  $query="insert into emptb(username,password,email,phone,salary)values('$emp','$emppassword','$empemail','$phone','$salary')";
  $result=mysqli_query($con,$query);
  if($result)
    {
      echo "<script>alert('Employee added successfully!');</script>";
  }
}


if(isset($_POST['empsub1']))
{
  $empemail=$_POST['empemail'];
  $query="delete from emptb where email='$empemail';";
  $result=mysqli_query($con,$query);
  if($result)
    {
      echo "<script>alert('Employee removed successfully!');</script>";
  }
  else{
    echo "<script>alert('Unable to delete!');</script>";
  }
}

?>
<html lang="en">
  <head>

	<title>ADMT Farm Management</title>
	<link rel="shortcut icon" type="image/x-icon" href="logo.jpeg"/>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" type="text/css" href="font-awesome-4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="style.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="vendor/fontawesome/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css?family=IBM+Plex+Sans&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
      <nav class="navbar navbar-expand-lg navbar-dark bg-primary fixed-top">

        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <a class="navbar-brand" href="#"><i class="fa fa-user-plus" aria-hidden="true"></i>ADMT Farm Management</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <script >
    var check = function() {
  if (document.getElementById('dpassword').value ==
    document.getElementById('cdpassword').value) {
    document.getElementById('message').style.color = '#5dd05d';
    document.getElementById('message').innerHTML = 'Matched';
  } else {
    document.getElementById('message').style.color = '#f55252';
    document.getElementById('message').innerHTML = 'Not Matching';
  }
}

    function alphaOnly(event) {
  var key = event.keyCode;
  return ((key >= 65 && key <= 90) || key == 8 || key == 32);
};
  </script>

  <style >
    .bg-primary {
    background: -webkit-linear-gradient(left, #3931af, #00c6ff);
}

.col-md-4{
  max-width:20% !important;
}

.list-group-item.active {
    z-index: 2;
    color: #fff;
    background-color: #342ac1;
    border-color: #007bff;
}
.text-primary {
    color: #342ac1!important;
}

#cpass {
  display: -webkit-box;
}

#list-app{
  font-size:15px;
}

.btn-primary{
  background-color: #3c50c1;
  border-color: #3c50c1;
}
  </style>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
     <ul class="navbar-nav mr-auto">
       <li class="nav-item">
        <a class="nav-link" href="logout1.php"><i class="fa fa-sign-out" aria-hidden="true"></i>Logout</a>
      </li>
       <li class="nav-item">
        <a class="nav-link" href="#"></a>
      </li>
    </ul>
  </div>
</nav>
  </head>
  <style type="text/css">
    button:hover{cursor:pointer;}
    #inputbtn:hover{cursor:pointer;}
  </style>
  <body style="padding-top:50px;">
   <div class="container-fluid" style="margin-top:50px;">
    <h3 style = "margin-left: 40%; padding-bottom: 20px;font-family: 'IBM Plex Sans', sans-serif;"> WELCOME ADMIN </h3>
    <div class="row">
  <div class="col-md-4" style="max-width:25%;margin-top: 3%;">
    <div class="list-group" id="list-tab" role="tablist">
      <a class="list-group-item list-group-item-action active" id="list-dash-list" data-toggle="list" href="#list-dash" role="tab" aria-controls="home">Dashboard</a>
      <a class="list-group-item list-group-item-action" href="#list-emp" id="list-emp-list"  role="tab"    aria-controls="home" data-toggle="list">Employee List</a>
      <a class="list-group-item list-group-item-action" href="#list-user" id="list-user-list"  role="tab" data-toggle="list" aria-controls="home">User List</a>
      <a class="list-group-item list-group-item-action" href="#list-plant" id="list-plant-list"  role="tab" data-toggle="list" aria-controls="home">Plants List</a>
      <a class="list-group-item list-group-item-action" href="#list-med" id="list-med-list"  role="tab" data-toggle="list" aria-controls="home">Medicines List</a>
      <a class="list-group-item list-group-item-action" href="#list-method" id="list-method-list"  role="tab" data-toggle="list" aria-controls="home">Methods List</a>
      <a class="list-group-item list-group-item-action" href="#list-settings" id="list-adoc-list"  role="tab" data-toggle="list" aria-controls="home">Add Employee</a>
      <a class="list-group-item list-group-item-action" href="#list-settings1" id="list-ddoc-list"  role="tab" data-toggle="list" aria-controls="home">Delete Employee</a>
      <a class="list-group-item list-group-item-action" href="#list-mes" id="list-mes-list"  role="tab" data-toggle="list" aria-controls="home">Queries</a>

      
    </div><br>
  </div>
  <div class="col-md-8" style="margin-top: 3%;">
    <div class="tab-content" id="nav-tabContent" style="width: 950px;">



      <div class="tab-pane fade show active" id="list-dash" role="tabpanel" aria-labelledby="list-dash-list">
        <div class="container-fluid container-fullw bg-white" >
              <div class="row">
               <div class="col-sm-4">
                  <div class="panel panel-white no-radius text-center">
                    <div class="panel-body">
                      <span class="fa-stack fa-2x"> <i class="fa fa-square fa-stack-2x text-primary"></i> <i class="fa fa-users fa-stack-1x fa-inverse"></i> </span>
                      <h4 class="StepTitle" style="margin-top: 5%;">Employee List</h4>
                      <script>
                        function clickDiv(id) {
                          document.querySelector(id).click();
                        }
                      </script> 
                      <p class="links cl-effect-1">
                        <a href="#list-emp" onclick="clickDiv('#list-emp-list')">
                          View Employee
                        </a>
                      </p>
                    </div>
                  </div>
                </div>

                <div class="col-sm-4" style="left: -3%">
                  <div class="panel panel-white no-radius text-center">
                    <div class="panel-body" >
                      <span class="fa-stack fa-2x"> <i class="fa fa-square fa-stack-2x text-primary"></i> <i class="fa fa-users fa-stack-1x fa-inverse"></i> </span>
                      <h4 class="StepTitle" style="margin-top: 5%;">User List</h4>
                      
                      <p class="cl-effect-1">
                        <a href="#app-user" onclick="clickDiv('#list-user-list')">
                          View Users
                        </a>
                      </p>
                    </div>
                  </div>
                </div>
              

                <div class="col-sm-4">
                  <div class="panel panel-white no-radius text-center">
                    <div class="panel-body" >
                      <span class="fa-stack fa-2x"> <i class="fa fa-square fa-stack-2x text-primary"></i> <i class="fa fa-paperclip fa-stack-1x fa-inverse"></i> </span>
                      <h4 class="StepTitle" style="margin-top: 5%;">Plant list</h4>
                    
                      <p class="cl-effect-1">
                        <a href="#plant-hist" onclick="clickDiv('#list-plant-list')">
                          View Plants
                        </a>
                      </p>
                    </div>
                  </div>
                </div>
                </div>

                <<div class="row">
                <div class="col-sm-4">
                  <div class="panel panel-white no-radius text-center">
                    <div class="panel-body" >
                      <span class="fa-stack fa-2x"> <i class="fa fa-square fa-stack-2x text-primary"></i> <i class="fa fa-list-ul fa-stack-1x fa-inverse"></i> </span>
                      <h4 class="StepTitle" style="margin-top: 5%;">Medicines List</h4>
                    
                      <p class="cl-effect-1">
                        <a href="#list-med" onclick="clickDiv('#list-med-list')">
                          View Medicines
                        </a>
                      </p>
                    </div>
                  </div>
                </div>

                <div class="col-sm-4" style="left: -3%">
                  <div class="panel panel-white no-radius text-center">
                    <div class="panel-body" >
                      <span class="fa-stack fa-2x"> <i class="fa fa-square fa-stack-2x text-primary"></i> <i class="fa fa-list-ul fa-stack-1x fa-inverse"></i> </span>
                      <h4 class="StepTitle" style="margin-top: 5%;">Methods List</h4>
                    
                      <p class="cl-effect-1">
                        <a href="#list-method" onclick="clickDiv('#list-method-list')">
                          View Methods
                        </a>
                      </p>
                    </div>
                  </div>
                </div>

                <div class="col-sm-4">
                  <div class="panel panel-white no-radius text-center">
                    <div class="panel-body" >
                      <span class="fa-stack fa-2x"> <i class="fa fa-square fa-stack-2x text-primary"></i> <i class="fa fa-plus fa-stack-1x fa-inverse"></i> </span>
                      <h4 class="StepTitle" style="margin-top: 5%;">Manage Employees</h4>
                    
                      <p class="cl-effect-1">
                        <a href="#app-hist" onclick="clickDiv('#list-adoc-list')">Add Employee</a>
                        &nbsp|
                        <a href="#app-hist" onclick="clickDiv('#list-ddoc-list')">
                          Delete Employee
                        </a>
                      </p>
                    </div>
                  </div>
                </div>
                </div>   
                
              </div>
            </div>
      

      <div class="tab-pane fade" id="list-emp" role="tabpanel" aria-labelledby="list-emp-list">
              

              <div class="col-md-8">
      <form class="form-group" action="empsearch.php" method="post">
        <div class="row">
        <div class="col-md-10"><input type="text" name="emp_contact" placeholder="Enter Email ID" class = "form-control"></div>
        <div class="col-md-2"><input type="submit" name="emp_search_submit" class="btn btn-primary" value="Search"></div></div>
      </form>
    </div>
              <table class="table table-hover">
                <thead>
                  <tr>
                    <th scope="col">Employee Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Phone</th>
                    <th scope="col">Password</th>
                    <th scope="col">Salary</th>
                  </tr>
                </thead>
                <tbody>
                  <?php 
                    $con=mysqli_connect("localhost","root","","fms");
                    global $con;
                    $query = "select * from emptb";
                    $result = mysqli_query($con,$query);
                    while ($row = mysqli_fetch_array($result)){
                      $username = $row['username'];
                      $email = $row['email'];
                      $phone = $row['phone'];
                      $password = $row['password'];
                      $salary = $row['salary'];
                      
                      echo "<tr>
                        <td>$username</td>
                        <td>$email</td>
                        <td>$phone</td>
                        <td>$password</td>
                        <td>$salary</td>
                      </tr>";
                    }

                  ?>
                </tbody>
              </table>
        <br>
      </div>
    

    <div class="tab-pane fade" id="list-user" role="tabpanel" aria-labelledby="list-user-list">

       <div class="col-md-8">
      <form class="form-group" action="usersearch.php" method="post">
        <div class="row">
        <div class="col-md-10"><input type="text" name="user_contact" placeholder="Enter Contact" class = "form-control"></div>
        <div class="col-md-2"><input type="submit" name="user_search_submit" class="btn btn-primary" value="Search"></div></div>
      </form>
    </div>
        
              <table class="table table-hover">
                <thead>
                  <tr>
                  <th scope="col">User ID</th>
                    <th scope="col">First Name</th>
                    <th scope="col">Last Name</th>
                    <th scope="col">Gender</th>
                    <th scope="col">Email</th>
                    <th scope="col">Contact</th>
                    <th scope="col">Password</th>
                  </tr>
                </thead>
                <tbody>
                  <?php 
                    $con=mysqli_connect("localhost","root","","fms");
                    global $con;
                    $query = "select * from userreg";
                    $result = mysqli_query($con,$query);
                    while ($row = mysqli_fetch_array($result)){
                      $pid = $row['pid'];
                      $fname = $row['fname'];
                      $lname = $row['lname'];
                      $gender = $row['gender'];
                      $email = $row['email'];
                      $contact = $row['contact'];
                      $password = $row['password'];
                      
                      echo "<tr>
                        <td>$pid</td>
                        <td>$fname</td>
                        <td>$lname</td>
                        <td>$gender</td>
                        <td>$email</td>
                        <td>$contact</td>
                        <td>$password</td>
                      </tr>";
                    }

                  ?>
                </tbody>
              </table>
        <br>
      </div>


      <div class="tab-pane fade" id="list-med" role="tabpanel" aria-labelledby="list-med-list">

       <div class="col-md-8">
  
        <div class="row">
        
    
        
              <table class="table table-hover">
                <thead>
                  <tr>
                  <th scope="col">Plant ID</th>
                    <th scope="col">Medicine ID</th>
                    <th scope="col">Medicine Name</th>
                    <th scope="col">Medicine Type</th>
                    <th scope="col">Medicine Cost</th>
                    <th scope="col">Medicine Description</th>
                  </tr>
                </thead>
                <tbody>
                  <?php 
                    $con=mysqli_connect("localhost","root","","fms");
                    global $con;
                    $query = "select * from medicines";
                    $result = mysqli_query($con,$query);
                    while ($row = mysqli_fetch_array($result)){
                      ?>
                      <tr>
                        <td><?php echo $row['plant_id'];?></td>
                        <td><?php echo $row['med_id'];?></td>
                        <td><?php echo $row['med_name'];?></td>
                        <td><?php echo $row['med_type'];?></td>
                        <td><?php echo $row['med_cost'];?></td>
                        <td><?php echo $row['med_desc'];?></td>
                      </tr>
                    <?php } ?>
                </tbody>
              </table>
        <br>
      </div>
      </div>
      </div>


      <div class="tab-pane fade" id="list-method" role="tabpanel" aria-labelledby="list-method-list">

       <div class="col-md-8">
  
        <div class="row">
        
    
        
              <table class="table table-hover">
                <thead>
                  <tr>
                  <th scope="col">Method ID</th>
                    <th scope="col">Method Name</th>
                    <th scope="col">Method Type</th>
                    <th scope="col">Medicine Description</th>
                  </tr>
                </thead>
                <tbody>
                  <?php 
                    $con=mysqli_connect("localhost","root","","fms");
                    global $con;
                    $query = "select * from method";
                    $result = mysqli_query($con,$query);
                    while ($row = mysqli_fetch_array($result)){
                      ?>
                      <tr>
                        <td><?php echo $row['method_id'];?></td>
                        <td><?php echo $row['method_name'];?></td>
                        <td><?php echo $row['method_type'];?></td>
                        <td><?php echo $row['method_desc'];?></td>
                      </tr>
                    <?php } ?>
                </tbody>
              </table>
        <br>
      </div>
      </div>
      </div>

      <div class="tab-pane fade" id="list-plant" role="tabpanel" aria-labelledby="list-plant-list">

       <div class="col-md-8">
  
        <div class="row">
        
    
        
              <table class="table table-hover">
                <thead>
                  <tr>
                  <th scope="col">Plant ID</th>
                    <th scope="col">Plant Name</th>
                    <th scope="col">Plant Type</th>
                    <th scope="col">Plant Description</th>
                    <th scope="col">Soil Type</th>
                  </tr>
                </thead>
                <tbody>
                  <?php 
                    $con=mysqli_connect("localhost","root","","fms");
                    global $con;
                    $query = "select * from plant";
                    $result = mysqli_query($con,$query);
                    while ($row = mysqli_fetch_array($result)){
                      ?>
                      <tr>
                        <td><?php echo $row['plant_id'];?></td>
                        <td><?php echo $row['plant_name'];?></td>
                        <td><?php echo $row['plant_type'];?></td>
                        <td><?php echo $row['plant_desc'];?></td>
                        <td><?php echo $row['soil_type'];?></td>
                      </tr>
                    <?php } ?>
                </tbody>
              </table>
        <br>
      </div>
      </div>
      </div>

<div class="tab-pane fade" id="list-messages" role="tabpanel" aria-labelledby="list-messages-list">...</div>

      <div class="tab-pane fade" id="list-settings" role="tabpanel" aria-labelledby="list-settings-list">
        <form class="form-group" method="post" action="admin-panel1.php">
          <div class="row">
                  <div class="col-md-4"><label>Employee Name:</label></div>
                  <div class="col-md-8"><input type="text" class="form-control" name="emp" onkeydown="return alphaOnly(event);" required></div><br><br>
                  <div class="col-md-4"><label>Email ID:</label></div>
                  <div class="col-md-8"><input type="email"  class="form-control" name="empemail" required></div><br><br>
                  <div class="col-md-4"><label>Phone:</label></div>
                  <div class="col-md-8"><input type="text"  class="form-control" name="phone" required></div><br><br>
                  <div class="col-md-4"><label>Password:</label></div>
                  <div class="col-md-8"><input type="password" class="form-control"  onkeyup='check();' name="emppassword" id="emppassword"  required></div><br><br>
                  <div class="col-md-4"><label>Confirm Password:</label></div>
                  <div class="col-md-8"  id='cpass'><input type="password" class="form-control" onkeyup='check();' name="cdpassword" id="cdpassword" required>&nbsp &nbsp<span id='message'></span> </div><br><br>
                   
                  
                  <div class="col-md-4"><label>Salary:</label></div>
                  <div class="col-md-8"><input type="text" class="form-control"  name="salary" required></div><br><br>
                </div>
          <input type="submit" name="empsub" value="Add Employee" class="btn btn-primary">
        </form>
      </div>

      <div class="tab-pane fade" id="list-settings1" role="tabpanel" aria-labelledby="list-settings1-list">
        <form class="form-group" method="post" action="admin-panel1.php">
          <div class="row">
          
                  <div class="col-md-4"><label>Email ID:</label></div>
                  <div class="col-md-8"><input type="email"  class="form-control" name="empemail" required></div><br><br>
                  
                </div>
          <input type="submit" name="empsub1" value="Delete Employee" class="btn btn-primary" onclick="confirm('Do you really want to delete?')">
        </form>
      </div>


       <div class="tab-pane fade" id="list-attend" role="tabpanel" aria-labelledby="list-attend-list">...</div>

       <div class="tab-pane fade" id="list-mes" role="tabpanel" aria-labelledby="list-mes-list">

         <div class="col-md-8">
      <form class="form-group" action="messearch.php" method="post">
        <div class="row">
        <div class="col-md-10"><input type="text" name="mes_contact" placeholder="Enter Contact" class = "form-control"></div>
        <div class="col-md-2"><input type="submit" name="mes_search_submit" class="btn btn-primary" value="Search"></div></div>
      </form>
    </div>
        
              <table class="table table-hover">
                <thead>
                  <tr>
                    <th scope="col">User Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Contact</th>
                    <th scope="col">Message</th>
                  </tr>
                </thead>
                <tbody>
                  <?php 

                    $con=mysqli_connect("localhost","root","","fms");
                    global $con;

                    $query = "select * from contact;";
                    $result = mysqli_query($con,$query);
                    while ($row = mysqli_fetch_array($result)){
                  ?>
                      <tr>
                        <td><?php echo $row['name'];?></td>
                        <td><?php echo $row['email'];?></td>
                        <td><?php echo $row['contact'];?></td>
                        <td><?php echo $row['message'];?></td>
                      </tr>
                    <?php } ?>
                </tbody>
              </table>
        <br>
      </div>
    </div>
   

  </div>
</div>
   </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.10.1/sweetalert2.all.min.js"></script>
  </body>
</html>