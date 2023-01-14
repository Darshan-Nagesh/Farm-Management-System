<!DOCTYPE html>
<?php 
include('func.php');
$con=mysqli_connect("localhost","root","","fms");
$username = $_SESSION['username'];
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

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    
    <link href="https://fonts.googleapis.com/css?family=IBM+Plex+Sans&display=swap" rel="stylesheet">
      <nav class="navbar navbar-expand-lg navbar-dark bg-primary fixed-top">
  <a class="navbar-brand" href="#"><i class="fa fa-user-plus" aria-hidden="true"></i> ADMT Farm Management </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

    <style >
      .btn-outline-light:hover{
        color: #25bef7;
        background-color: #f8f9fa;
        border-color: #f8f9fa;
      }
    </style>

  <style >
    .bg-primary {
    background: -webkit-linear-gradient(left, #3931af, #00c6ff);
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
    <h3 style = "margin-left: 40%; padding-bottom: 20px;font-family:'IBM Plex Sans', sans-serif;"> Welcome &nbsp<?php echo $_SESSION['username'] ?>  </h3>
    <div class="row">
  <div class="col-md-4" style="max-width:18%;margin-top: 3%;">
    <div class="list-group" id="list-tab" role="tablist">
      <a class="list-group-item list-group-item-action active" href="#list-dash" role="tab" aria-controls="home" data-toggle="list">Dashboard</a>
      <a class="list-group-item list-group-item-action" href="#list-plant" id="list-plant-list" role="tab" data-toggle="list" aria-controls="home">Plants</a>
      <a class="list-group-item list-group-item-action" href="#list-med" id="list-med-list" role="tab" data-toggle="list" aria-controls="home">Medicine</a>
      <a class="list-group-item list-group-item-action" href="#list-method" id="list-method-list" role="tab" data-toggle="list" aria-controls="home">Methods</a>
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
                      <span class="fa-stack fa-2x"> <i class="fa fa-square fa-stack-2x text-primary"></i> <i class="fa fa-list fa-stack-1x fa-inverse"></i> </span>
                      <h4 class="StepTitle" style="margin-top: 5%;"> View Plants</h4>
                      <script>
                        function clickDiv(id) {
                          document.querySelector(id).click();
                        }
                      </script>                      
                      <p class="links cl-effect-1">
                        <a href="#list-plant" onclick="clickDiv('#list-plant-list')">
                          Plant List
                        </a>
                      </p>
                    </div>
                  </div>
                </div>

                <div class="col-sm-4" style="left: -3%">
                  <div class="panel panel-white no-radius text-center">
                    <div class="panel-body">
                      <span class="fa-stack fa-2x"> <i class="fa fa-square fa-stack-2x text-primary"></i> <i class="fa fa-list-ul fa-stack-1x fa-inverse"></i> </span>
                      <h4 class="StepTitle" style="margin-top: 5%;"> View Medicines</h4>
                        
                      <p class="links cl-effect-1">
                        <a href="#list-med" onclick="clickDiv('#list-med-list')">
                          Medicines List
                        </a>
                      </p>
                    </div>
                  </div>
                </div>
                
                <div class="col-sm-4">
                  <div class="panel panel-white no-radius text-center">
                    <div class="panel-body">
                      <span class="fa-stack fa-2x"> <i class="fa fa-square fa-stack-2x text-primary"></i> <i class="fa fa-list-ul fa-stack-1x fa-inverse"></i> </span>
                      <h4 class="StepTitle" style="margin-top: 5%;"> View Methods</h4>
                        
                      <p class="links cl-effect-1">
                        <a href="#list-method" onclick="clickDiv('#list-method-list')">
                          Methods List
                        </a>
                      </p>
                    </div>
                  </div>
                </div>
              </div>
  
           </div>
         </div>
    

    <div class="tab-pane fade" id="list-plant" role="tabpanel" aria-labelledby="list-plant-list">
        
              <table class="table table-hover">
                <thead>
                  <tr>
                    <th scope="col">Plant Id</th>
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
                    $query = "select * from plant;";
                    $result = mysqli_query($con,$query);
                    while ($row = mysqli_fetch_array($result)){
                      ?>
                      <tr>
                      <td><?php echo $row['plant_id'];?></td>
                        <td><?php echo $row['plant_name'];?></td>
                        <td><?php echo $row['plant_type'];?></td>
                        <td><?php echo $row['plant_desc'];?></td>
                        <td><?php echo $row['soil_type'];?></td>
                        <td>
                    </td>
                   
                      </tr></a>
                    <?php } ?>
                </tbody>
              </table>
        <br>
      </div>

      

      <div class="tab-pane fade" id="list-method" role="tabpanel" aria-labelledby="list-method-list">
        <table class="table table-hover">
                <thead>
                  <tr>
                    
                    <th scope="col">Method ID</th>
                    
                    <th scope="col">Method Name</th>
                    <th scope="col">Method Type</th>
                    <th scope="col">Method Description</th>
                    
                  </tr>
                </thead>
                <tbody>
                  <?php 

                    $con=mysqli_connect("localhost","root","","fms");
                    global $con;

                    $query = "select * from method;";
                    
                    $result = mysqli_query($con,$query);
                    if(!$result){
                      echo mysqli_error($con);
                    }
                    

                    while ($row = mysqli_fetch_array($result)){
                  ?>
                      <tr>
                        <td><?php echo $row['method_id'];?></td>
                        <td><?php echo $row['method_name'];?></td>
                        <td><?php echo $row['method_type'];?></td>
                        <td><?php echo $row['method_desc'];?></td>
                        
                    
                      </tr>
                    <?php }
                    ?>
                </tbody>
              </table>
      </div>

      <div class="tab-pane fade" id="list-med" role="tabpanel" aria-labelledby="list-med-list">
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

                    $query = "select * from medicines;";
                    
                    $result = mysqli_query($con,$query);
                    if(!$result){
                      echo mysqli_error($con);
                    }
                    

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
                    <?php }
                    ?>
                </tbody>
              </table>
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