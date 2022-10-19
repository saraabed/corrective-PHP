
<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['alogin'])==0)
// مش عامل لوج ان مش اي حد بدخل دون لوج ان
	{	
header('location:index.php');
}
else{
	if(isset($_POST['submit']))
	{		
		$f_name=$_POST['f_name'];
		$l_name=$_POST['l_name'];
		$phone=$_POST['phone'];
		$department=$_POST['department'];
		$task=$_POST['task'];
	  
		$sql ="INSERT INTO employees(f_name,l_name, phone, department, task) VALUES(:f_name, :l_name, :phone, :department, :task)";
		$query = $dbh->prepare($sql);
		$query-> bindParam(':f_name', $f_name, PDO::PARAM_STR);
		$query-> bindParam(':l_name', $l_name, PDO::PARAM_STR);
		$query-> bindParam(':phone', $phone, PDO::PARAM_STR);
		$query-> bindParam(':department', $department, PDO::PARAM_STR);
		$query-> bindParam(':task', $task, PDO::PARAM_STR);
		$query->execute();
		$msg=" add employee Successfully";
  }    


 ?>

<!doctype html>
<html lang="en" class="no-js">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">
	<meta name="theme-color" content="#3e454c">
	
	<title>Manage Users</title>

	<!-- Font awesome -->
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<!-- Sandstone Bootstrap CSS -->
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<!-- Bootstrap Datatables -->
	<link rel="stylesheet" href="css/dataTables.bootstrap.min.css">
	<!-- Bootstrap social button library -->
	<link rel="stylesheet" href="css/bootstrap-social.css">
	<!-- Bootstrap select -->
	<link rel="stylesheet" href="css/bootstrap-select.css">
	<!-- Bootstrap file input -->
	<link rel="stylesheet" href="css/fileinput.min.css">
	<!-- Awesome Bootstrap checkbox -->
	<link rel="stylesheet" href="css/awesome-bootstrap-checkbox.css">
	<!-- Admin Stye -->
	<link rel="stylesheet" href="css/style.css">
  <style>

	.errorWrap {
    padding: 10px;
    margin: 0 0 20px 0;
	background: #dd3d36;
	color:#fff;
    -webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
    box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
}
.succWrap{
    padding: 10px;
    margin: 0 0 20px 0;
	background: #5cb85c;
	color:#fff;
    -webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
    box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
}

		</style>

</head>

<body>
	<?php include('includes/header.php');?>

	<div class="ts-main-content">
		<?php include('includes/leftbar.php');?>
		<div class="content-wrapper">
			<div class="container-fluid">

				<div class="row">
					<div class="col-md-12">

						<h2 class="page-title">Manage  Employees</h2>

						<!-- Zero Configuration Table -->
						<div class="panel panel-default">
							<div class="panel-heading">List Employees 
							<div class="row">
					<div class="col-md-12">
						<h1 class="text-center text-bold mt-2x">Add Employee</h1>
                        <div class="hr-dashed"></div>
						<div class="well row pt-2x pb-3x bk-light text-center">
                         <form method="post" class="form-horizontal"  name="submit">
                            <div class="form-group">
                            <label class="col-sm-1 control-label">First Name<span style="color:red">*</span></label>
                            <div class="col-sm-5">
                            <input type="text" name="f_name" class="form-control" required>
                            </div>
                            <label class="col-sm-1 control-label">Last Name<span style="color:red">*</span></label>
                            <div class="col-sm-5">
                            <input type="text" name="l_name" class="form-control" required>
                            </div>
                            </div>
                     <div class="form-group">
					
                            <label class="col-sm-1 control-label">Department<span style="color:red">*</span></label>
                            <div class="col-sm-5">
                            <select name="department" class="form-control" required>
                            <option value="">Select</option>
							
<?php $sql = "SELECT * from  department ";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{				?>
                            <option value="<?php echo htmlentities($result->name);?>"><?php echo htmlentities($result->name);?></option>
                            <?php $cnt=$cnt+1; }} ?>
                            </select>
                            </div>                        


							<div class="form-group">
                            <label class="col-sm-1 control-label">Phone<span style="color:red">*</span></label>
                            <div class="col-sm-5">
                            <input type="number" name="phone" class="form-control" required>
                            </div>
							<label class="col-sm-1 control-label">Task<span style="color:red">*</span></label>
                            <div class="col-sm-5">
                            <input type="text" name="task" class="form-control" required>
                            </div>
                         
							</div>
							
                           
							</div>
                           

							
                                <button class="btn btn-primary" name="submit" type="submit">Add</button>
                                </form>
                               
							</div>
						</div>
				</div></div>
							</div>
							<div class="panel-body">
								
							<?php if($error){?><div class="errorWrap" id="msgshow"><?php echo htmlentities($error); ?> </div><?php } 
				else if($msg){?><div class="succWrap" id="msgshow"><?php echo htmlentities($msg); ?> </div><?php }?>
								<table id="zctb" class="display table table-striped table-bordered table-hover" cellspacing="0" width="100%">
									<thead>
										<tr>
										<th>#</th>
                                                <th>First Name</th>
                                                <th>Last Name</th>
                                                <th>Phone</th>
                                                <th>Department</th>
                                                <th>Task</th>
										</tr>
									</thead>
									
									<tbody>

									

<?php $sql = "SELECT * from  employees";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{				?>	
										<tr>
											<td><?php echo htmlentities($cnt);?></td>
                                            <td><?php echo htmlentities($result->f_name);?></td>
                                            <td><?php echo htmlentities($result->l_name);?></td>
                                            <td><?php echo htmlentities($result->phone);?></td>
                                            <td><?php echo htmlentities($result->department);?></td>
                                            <td><?php echo htmlentities($result->task);?> 
                                            <td>
                                            
                                            <?php if($result->status == 1)
                                                    {?>
                                                    <a href="employee.php?confirm=<?php echo htmlentities($result->id);?>" onclick="return confirm('Do you really want to Un-Confirm the Account')">Confirmed <i class="fa fa-check-circle"></i></a> 
                                                    <?php } else {?>
                                                    <a href="employee.php?unconfirm=<?php echo htmlentities($result->id);?>" onclick="return confirm('Do you really want to Confirm the Account')">Un-Confirmed <i class="fa fa-times-circle"></i></a>
                                                    <?php } ?>
</td>
                                            </td>
											
<td>
<a href="#.php?edit=<?php echo $result->id;?>" onclick="return confirm('Do you want to Edit');">&nbsp; <i class="fa fa-pencil"></i></a>&nbsp;&nbsp;
<a href="employee.php?del=<?php echo $result->id;?>&name=<?php echo htmlentities($result->email);?>" onclick="return confirm('Do you want to Delete');"><i class="fa fa-trash" style="color:red"></i></a>&nbsp;&nbsp;
</td>
										</tr>
										<?php $cnt=$cnt+1; }} ?>
										
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>

			</div>
		</div>
	</div>

	<!-- Loading Scripts -->
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap-select.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.dataTables.min.js"></script>
	<script src="js/dataTables.bootstrap.min.js"></script>
	<script src="js/Chart.min.js"></script>
	<script src="js/fileinput.js"></script>
	<script src="js/chartData.js"></script>
	<script src="js/main.js"></script>
	<script type="text/javascript">
				 $(document).ready(function () {          
					setTimeout(function() {
						$('.succWrap').slideUp("slow");
					}, 3000);
					});
		</script>
		
</body>
</html>
<?php } ?>
