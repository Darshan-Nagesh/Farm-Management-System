<!DOCTYPE html>
<?php 
include('func1.php');
$con=mysqli_connect("localhost","root","","fms");

  $eid = $_SESSION['eid'];
  $emp = $_SESSION['empname'];


if(isset($_POST['psub']))
{
  $pid=$_POST['pid'];
  $pname=$_POST['pname'];
  $ptype=$_POST['ptype'];
  $pdesc=$_POST['pdesc'];
  $stype=$_POST['stype'];
  $query="insert into plant(plant_id,plant_name,plant_type,plant_desc,soil_type)values('$pid','$pname','$ptype','$pdesc','$stype')";
  $result=mysqli_query($con,$query);
  if($result)
    {
      echo "<script>alert('Plant added successfully!');</script>";
  }
}

if(isset($_POST['psub1']))
{
  $pname=$_POST['pname'];
  $query="delete from plant where plant_name='$pname';";
  $result=mysqli_query($con,$query);
  if($result)
    {
      echo "<script>alert('Plant removed successfully!');</script>";
  }
  else{
    echo "<script>alert('Unable to delete!');</script>";
  }
} 

if(isset($_POST['msub']))
{
  $pid=$_POST['pid'];
  $mid=$_POST['mid'];
  $mname=$_POST['mname'];
  $mtype=$_POST['mtype'];
  $mcost=$_POST['mcost'];
  $mdesc=$_POST['mdesc']; 
  $query="insert into medicines(plant_id,med_id,med_name,med_type,med_cost,med_desc)values('$pid','$mid','$mname','$mtype','$mcost','$mdesc')";
  $result=mysqli_query($con,$query);
  if($result)
    {
      echo "<script>alert('Medicine added successfully!');</script>";
  }
}

if(isset($_POST['msub1']))
{
  $mname=$_POST['mname'];
  $query="delete from medicines where med_name='$mname';";
  $result=mysqli_query($con,$query);
  if($result)
    {
      echo "<script>alert('Medicine removed successfully!');</script>";
  }
  else{
    echo "<script>alert('Unable to delete!');</script>";
  }
} 

if(isset($_POST['mdsub']))
{
  $mdid=$_POST['mdid'];
  $mdname=$_POST['mdname'];
  $mdtype=$_POST['mdtype'];
  $mddesc=$_POST['mddesc'];
  $query="insert into method(method_id,method_name,method_type,method_desc)values('$mdid','$mdname','$mdtype','$mddesc')";
  $result=mysqli_query($con,$query);
  if($result)
    {
      echo "<script>alert('Method added successfully!');</script>";
  }
}

if(isset($_POST['mdsub1']))
{
  $mdname=$_POST['mdname'];
  $query="delete from method where method_name='$mdname';";
  $result=mysqli_query($con,$query);
  if($result)
    {
      echo "<script>alert('Method removed successfully!');</script>";
  }
  else{
    echo "<script>alert('Unable to delete!');</script>";
  }
} 

function generate_bill(){
  $con=mysqli_connect("localhost","root","","fms");
  $eid = $_SESSION['eid'];
  $output='';
  $query=mysqli_query($con,"select m.eid,m.ename,m.plant_id,m.plant_name,m.med_id,m.med_name,m.salary from manages m inner join emptb e on m.eid=e.eid and m.eid = '$eid' and m.ename = '".$_GET['ename']."'");
  while($row = mysqli_fetch_array($query)){
    $output .= '
    <label> Employee ID : </label>'.$row["eid"].'<br/><br/>
    <label> Employee Name : </label>'.$row["ename"].'<br/><br/>
    <label> Plant ID : </label>'.$row["plant_id"].'<br/><br/>
    <label> Plant Name : </label>'.$row["plant_name"].'<br/><br/>
    <label> Medicine ID : </label>'.$row["med_id"].'<br/><br/>
    <label> Medicine Name : </label>'.$row["med_name"].'<br/><br/>
    <label> Salary : </label>'.$row["salary"].'<br/><br/>
   
    ';

  }
  
  return $output;
}


if(isset($_GET["generate_bill"])){
  require_once("TCPDF/tcpdf.php");
  $obj_pdf = new TCPDF('P',PDF_UNIT,PDF_PAGE_FORMAT,true,'UTF-8',false);
  $obj_pdf -> SetCreator(PDF_CREATOR);
  $obj_pdf -> SetTitle("Generate Bill");
  $obj_pdf -> SetHeaderData('','',PDF_HEADER_TITLE,PDF_HEADER_STRING);
  $obj_pdf -> SetHeaderFont(Array(PDF_FONT_NAME_MAIN,'',PDF_FONT_SIZE_MAIN));
  $obj_pdf -> SetFooterFont(Array(PDF_FONT_NAME_MAIN,'',PDF_FONT_SIZE_MAIN));
  $obj_pdf -> SetDefaultMonospacedFont('helvetica');
  $obj_pdf -> SetFooterMargin(PDF_MARGIN_FOOTER);
  $obj_pdf -> SetMargins(PDF_MARGIN_LEFT,'5',PDF_MARGIN_RIGHT);
  $obj_pdf -> SetPrintHeader(false);
  $obj_pdf -> SetPrintFooter(false);
  $obj_pdf -> SetAutoPageBreak(TRUE, 10);
  $obj_pdf -> SetFont('helvetica','',12);
  $obj_pdf -> AddPage();

  $content = '';

  $content .= '
      <br/>
      <h2 align ="center"> ADMT Farm Management</h2></br>
      <h3 align ="center"> Bill</h3>
      

  ';
 
  $content .= generate_bill();
  $obj_pdf -> writeHTML($content);
  ob_end_clean();
  $obj_pdf -> Output("bill.pdf",'I');

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
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    
    <link href="https://fonts.googleapis.com/css?family=IBM+Plex+Sans&display=swap" rel="stylesheet">
      <nav class="navbar navbar-expand-lg navbar-dark bg-primary fixed-top">
  <a class="navbar-brand" href="#"><i class="fa fa-user-plus" aria-hidden="true"></i>ADMT Farm Management</a>
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
    <form class="form-inline my-2 my-lg-0" method="post" action="empsearch.php">
    <div class="col-md-10"><input type="text" name="emp_contact" placeholder="Enter Email ID" class = "form-control"></div>
        <div class="col-md-2"><input type="submit" name="emp_search_submit" class="btn btn-primary" value="Search"></div></div>
    </form>
  </div>
</nav>
  </head>
  <style type="text/css">
    button:hover{cursor:pointer;}
    #inputbtn:hover{cursor:pointer;}
  </style>
  <body style="padding-top:50px;">
   <div class="container-fluid" style="margin-top:50px;">
    <h3 style = "margin-left: 40%; padding-bottom: 20px;font-family:'IBM Plex Sans', sans-serif;"> Welcome &nbsp<?php echo $_SESSION['empname'] ?>  </h3>
    <div class="row">
  <div class="col-md-4" style="max-width:18%;margin-top: 3%;">
    <div class="list-group" id="list-tab" role="tablist">
      <a class="list-group-item list-group-item-action active" href="#list-dash" role="tab" aria-controls="home" data-toggle="list">Dashboard</a>
      <a class="list-group-item list-group-item-action" href="#list-plant" id="list-plant-list" role="tab" data-toggle="list" aria-controls="home">Plants</a>
      <a class="list-group-item list-group-item-action" href="#list-med" id="list-med-list" role="tab" data-toggle="list" aria-controls="home">Medicine</a>
      <a class="list-group-item list-group-item-action" href="#list-method" id="list-method-list" role="tab" data-toggle="list" aria-controls="home">Methods</a>
      <a class="list-group-item list-group-item-action" href="#list-settings" id="list-padoc-list"  role="tab" data-toggle="list" aria-controls="home">Add Plant</a>
      <a class="list-group-item list-group-item-action" href="#list-settings1" id="list-pddoc-list"  role="tab" data-toggle="list" aria-controls="home">Delete Plant</a>
      <a class="list-group-item list-group-item-action" href="#list-settings2" id="list-madoc-list"  role="tab" data-toggle="list" aria-controls="home">Add Medicine</a>
      <a class="list-group-item list-group-item-action" href="#list-settings3" id="list-mddoc-list"  role="tab" data-toggle="list" aria-controls="home">Delete Medicine</a>
      <a class="list-group-item list-group-item-action" href="#list-settings4" id="list-mtadoc-list"  role="tab" data-toggle="list" aria-controls="home">Add Method</a>
      <a class="list-group-item list-group-item-action" href="#list-settings5" id="list-mtddoc-list"  role="tab" data-toggle="list" aria-controls="home">Delete Method</a>
      <a class="list-group-item list-group-item-action" href="#list-bill" id="list-bill-list" role="tab" data-toggle="list" aria-controls="home">Bill</a>
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

              <<div class="row">
              <div class="col-sm-4">
                  <div class="panel panel-white no-radius text-center">
                    <div class="panel-body" >
                      <span class="fa-stack fa-2x"> <i class="fa fa-square fa-stack-2x text-primary"></i> <i class="fa fa-plus fa-stack-1x fa-inverse"></i> </span>
                      <h4 class="StepTitle" style="margin-top: 5%;">Manage Plants</h4>
                    
                      <p class="cl-effect-1">
                        <a href="#app-hist" onclick="clickDiv('#list-padoc-list')">Add Plant</a>
                        &nbsp|
                        <a href="#app-hist" onclick="clickDiv('#list-pddoc-list')">
                          Delete plant
                        </a>
                      </p>
                    </div>
                  </div>
                </div>
              
                <div class="col-sm-4" style="left: -3%">
                  <div class="panel panel-white no-radius text-center">
                    <div class="panel-body" >
                      <span class="fa-stack fa-2x"> <i class="fa fa-square fa-stack-2x text-primary"></i> <i class="fa fa-plus fa-stack-1x fa-inverse"></i> </span>
                      <h4 class="StepTitle" style="margin-top: 5%;">Manage Medicine</h4>
                    
                      <p class="cl-effect-1">
                        <a href="#app-hist" onclick="clickDiv('#list-madoc-list')">Add Medicine</a>
                        &nbsp|
                        <a href="#app-hist" onclick="clickDiv('#list-mddoc-list')">
                          Delete medicine
                        </a>
                      </p>
                    </div>
                  </div>
                </div>
                
                <div class="col-sm-4">
                  <div class="panel panel-white no-radius text-center">
                    <div class="panel-body" >
                      <span class="fa-stack fa-2x"> <i class="fa fa-square fa-stack-2x text-primary"></i> <i class="fa fa-plus fa-stack-1x fa-inverse"></i> </span>
                      <h4 class="StepTitle" style="margin-top: 5%;">Manage Methods</h4>
                    
                      <p class="cl-effect-1">
                        <a href="#app-hist" onclick="clickDiv('#list-mtadoc-list')">Add method</a>
                        &nbsp|
                        <a href="#app-hist" onclick="clickDiv('#list-mtddoc-list')">
                          Delete method
                        </a>
                      </p>
                    </div>
                  </div>
                </div>
              </div> 
              
              <<div class="row">
              <div class="col-sm-4">
                  <div class="panel panel-white no-radius text-center">
                    <div class="panel-body">
                      <span class="fa-stack fa-2x"> <i class="fa fa-square fa-stack-2x text-primary"></i> <i class="fa fa-list-ul fa-stack-1x fa-inverse"></i> </span>
                      <h4 class="StepTitle" style="margin-top: 5%;">Salary</h4>
                        
                      <p class="links cl-effect-1">
                        <a href="#list-bill" onclick="clickDiv('#list-bill-list')">
                           Bill
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


      <div class="tab-pane fade" id="list-bill" role="tabpanel" aria-labelledby="list-bill-list">
        
              <table class="table table-hover">
                <thead>
                  <tr>
                    
                    <th scope="col">Employee ID</th>
                    <th scope="col">Employee Name</th>
                    <th scope="col">Plant ID</th>
                    <th scope="col">Plant Name</th>
                    <th scope="col">Medicine ID</th>
                    <th scope="col">Medicine Name</th>
                    <th scope="col">Bill Payment</th>
                  </tr>
                </thead>
                <tbody>
                  <?php 

                    $con=mysqli_connect("localhost","root","","fms");
                    global $con;

                    $query = "select eid,ename,plant_id,plant_name,med_id,med_name,salary from manages where eid='$eid';";
                    
                    $result = mysqli_query($con,$query);
                    if(!$result){
                      echo mysqli_error($con);
                    }
                    

                    while ($row = mysqli_fetch_array($result)){
                  ?>
                      <tr>
                        <td><?php echo $row['eid'];?></td>
                        <td><?php echo $row['ename'];?></td>
                        <td><?php echo $row['plant_id'];?></td>
                        <td><?php echo $row['plant_name'];?></td>
                        <td><?php echo $row['med_id'];?></td>
                        <td><?php echo $row['med_name'];?></td>
                        <td><?php echo $row['salary'];?></td>
                        <td>
                          <form method="get">
                          <!-- <a href="admin-panel.php?ID=" 
                              onClick=""
                              title="Pay Bill" tooltip-placement="top" tooltip="Remove"><button class="btn btn-success">Pay</button>
                              </a></td> -->

                              <a href="emp-panel.php?ename=<?php echo $row['ename']?>">
                              <input type ="hidden" name="ename" value="<?php echo $row['ename']?>"/>
                              <input type = "submit" onclick="alert('Bill Generated Successfully');" name ="generate_bill" class = "btn btn-success" value="Generate Bill"/>
                              </a>
                              </td>
                              </form>

                    
                      </tr>
                    <?php }
                    ?>
                </tbody>
              </table>
        <br>
      </div>

      <div class="tab-pane fade" id="list-messages" role="tabpanel" aria-labelledby="list-messages-list">...</div>

      <div class="tab-pane fade" id="list-settings" role="tabpanel" aria-labelledby="list-settings-list">
        <form class="form-group" method="post" action="emp-panel.php">
          <div class="row">
                  <div class="col-md-4"><label>Plant ID:</label></div>
                  <div class="col-md-8"><input type="text"  class="form-control" name="pid" required></div><br><br>
                   <div class="col-md-4"><label>Plant name:</label></div>
                  <div class="col-md-8"><input type="text"  class="form-control" name="pname" required></div><br><br>
                  <div class="col-md-4"><label>Plant type:</label></div>
                  <div class="col-md-8"><input type="text"  class="form-control" name="ptype" required></div><br><br>
                  <div class="col-md-4"><label>Plant description:</label></div>
                  <div class="col-md-8"><input type="text"  class="form-control" name="pdesc" required></div><br><br>
                  <div class="col-md-4"><label>Soil type:</label></div>
                  <div class="col-md-8"><input type="text"  class="form-control" name="stype" required></div><br><br>
                </div>
          <input type="submit" name="psub" value="Add Plant" class="btn btn-primary">
        </form>
      </div>

      <div class="tab-pane fade" id="list-settings1" role="tabpanel" aria-labelledby="list-settings1-list">
        <form class="form-group" method="post" action="emp-panel.php">
          <div class="row">
          
                  <div class="col-md-4"><label>Plant Name:</label></div>
                  <div class="col-md-8"><input type="text"  class="form-control" name="pname" required></div><br><br>
                  
                </div>
          <input type="submit" name="psub1" value="Delete Plant" class="btn btn-primary" onclick="confirm('Do you really want to delete?')">
        </form>
      </div>

      <div class="tab-pane fade" id="list-messages" role="tabpanel" aria-labelledby="list-messages-list">...</div>

      <div class="tab-pane fade" id="list-settings2" role="tabpanel" aria-labelledby="list-settings2-list">
        <form class="form-group" method="post" action="emp-panel.php">
          <div class="row">
                  <div class="col-md-4"><label>Plant ID:</label></div>
                  <div class="col-md-8"><input type="text"  class="form-control" name="pid" required></div><br><br>
                   <div class="col-md-4"><label>Medicine ID:</label></div>
                  <div class="col-md-8"><input type="text"  class="form-control" name="mid" required></div><br><br>
                  <div class="col-md-4"><label>Medicine Name:</label></div>
                  <div class="col-md-8"><input type="text"  class="form-control" name="mname" required></div><br><br>
                  <div class="col-md-4"><label>Medicine Type:</label></div>
                  <div class="col-md-8"><input type="text"  class="form-control" name="mtype" required></div><br><br>
                  <div class="col-md-4"><label>Medicine Cost:</label></div>
                  <div class="col-md-8"><input type="text"  class="form-control" name="mcost" required></div><br><br>
                  <div class="col-md-4"><label>Medicine description:</label></div>
                  <div class="col-md-8"><input type="text"  class="form-control" name="mdesc" required></div><br><br>
                </div>
          <input type="submit" name="msub" value="Add Medicine" class="btn btn-primary">
        </form>
      </div>

      <div class="tab-pane fade" id="list-settings3" role="tabpanel" aria-labelledby="list-settings3-list">
        <form class="form-group" method="post" action="emp-panel.php">
          <div class="row">
          
                  <div class="col-md-4"><label>Medicine Name:</label></div>
                  <div class="col-md-8"><input type="text"  class="form-control" name="mname" required></div><br><br>
                  
                </div>
          <input type="submit" name="msub1" value="Delete Medicine" class="btn btn-primary" onclick="confirm('Do you really want to delete?')">
        </form>
      </div>

      <div class="tab-pane fade" id="list-messages" role="tabpanel" aria-labelledby="list-messages-list">...</div>

      <div class="tab-pane fade" id="list-settings4" role="tabpanel" aria-labelledby="list-settings4-list">
        <form class="form-group" method="post" action="emp-panel.php">
          <div class="row">
                  <div class="col-md-4"><label>Method ID:</label></div>
                  <div class="col-md-8"><input type="text"  class="form-control" name="mdid" required></div><br><br>
                   <div class="col-md-4"><label>Method name:</label></div>
                  <div class="col-md-8"><input type="text"  class="form-control" name="mdname" required></div><br><br>
                  <div class="col-md-4"><label>Method type:</label></div>
                  <div class="col-md-8"><input type="text"  class="form-control" name="mdtype" required></div><br><br>
                  <div class="col-md-4"><label>Method description:</label></div>
                  <div class="col-md-8"><input type="text"  class="form-control" name="mddesc" required></div><br><br>
                </div>
          <input type="submit" name="mdsub" value="Add Method" class="btn btn-primary">
        </form>
      </div>


      <div class="tab-pane fade" id="list-settings5" role="tabpanel" aria-labelledby="list-settings5-list">
        <form class="form-group" method="post" action="emp-panel.php">
          <div class="row">
          
                  <div class="col-md-4"><label>Method Name:</label></div>
                  <div class="col-md-8"><input type="text"  class="form-control" name="mdname" required></div><br><br>
                  
                </div>
          <input type="submit" name="mdsub1" value="Delete Method" class="btn btn-primary" onclick="confirm('Do you really want to delete?')">
        </form>
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