<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['alogin'])==0)
	{	
header('location:index.php');
}
else{

if(isset($_GET['edit']))
	{
		$editid=$_GET['edit'];
	}


	
if(isset($_POST['submit']))
  {	$title=$_POST['title'];
	$employee=$_POST['employee'];
	$description=$_POST['description'];
	$due_date=$_POST['due_date'];
	$idedit=$_POST['idedit'];
	
		$sql="UPDATE task SET title=(:title), employee=(:employee), description=(:description), due_date=(:due_date) WHERE id=(:idedit)";
		$query = $dbh->prepare($sql);
		$query-> bindParam(':title', $title, PDO::PARAM_STR);
		$query-> bindParam(':employee', $employee, PDO::PARAM_STR);
		$query-> bindParam(':description', $description, PDO::PARAM_STR);
		$query-> bindParam(':due_date', $due_date, PDO::PARAM_STR);
		$query-> bindParam(':idedit', $idedit, PDO::PARAM_STR);

	$msg="Data  Updated Successfully";
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
	
	<title>Edit task</title>

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

	<script type= "text/javascript" src="../vendor/countries.js"></script>
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
<?php
		$sql = "SELECT * from task where id = :editid";
		$query = $dbh -> prepare($sql);
		$query->bindParam(':editid',$editid,PDO::PARAM_INT);
		$query->execute();
		$result=$query->fetch(PDO::FETCH_OBJ);
		$cnt=1;	
?>
	<?php include('includes/header.php');?>
	<div class="ts-main-content">
	<?php include('includes/leftbar.php');?>
		<div class="content-wrapper">
			<div class="container-fluid">
				<div class="row">
					<div class="col-md-12">
						<h3 class="page-title">Edit task : <?php echo htmlentities($result->title); ?></h3>
						<div class="panel panel-default">
							<div class="panel-heading">List Tasks 
							<div class="row">
					<div class="col-md-12">
						<h1 class="text-center text-bold mt-2x">Edit task</h1>
                        <div class="hr-dashed"></div>
						<div class="well row pt-2x pb-3x bk-light text-center">
                         <form method="post" class="form-horizontal" name="imgform">
                            <div class="form-group">
                            <label class="col-sm-1 control-label">Title<span style="color:red">*</span></label>
                            <div class="col-sm-5">
                            <input type="text" name="title" class="form-control" required value="<?php echo htmlentities($result->title);?>">
                            </div>
                            <label class="col-sm-1 control-label">Description<span style="color:red">*</span></label>
                            <div class="col-sm-5">
                            <input type="text" name="description" class="form-control" required value="<?php echo htmlentities($result->description);?>">
                            </div>
                            </div>
                     <div class="form-group">
                  
                            <label class="col-sm-1 control-label">Employee<span style="color:red">*</span></label>
                            <div class="col-sm-5">
                            <select name="employee" class="form-control" required value="<?php echo htmlentities($result->employee);?>">
                            <option value="">Select</option>
							
<?php $sql = "SELECT * from  employees ";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{				?>
                            <option value="<?php echo htmlentities($result->f_name);?>"><?php echo htmlentities($result->f_name);?></option>
                            <?php $cnt=$cnt+1; }} ?>
                            </select>
                            </div>                           


						
                            <label class="col-sm-1 control-label">due_date<span style="color:red">*</span></label>
                            <div class="col-sm-5">
                            <input type="date" name="due_date" class="form-control" required value="<?php echo htmlentities($result->due_date);?>">
						</div>
						<input type="hidden" name="idedit" value="<?php echo htmlentities($result->id);?>" >   


                            </div>
                           

							
			
							<div class="form-group">
	<div class="col-sm-8 col-sm-offset-2">
		<button class="btn btn-primary" name="submit" type="submit">Save Changes</button>
	</div>
</div>

</form>                               
						
							</div>
		
									</div>
								</div>
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