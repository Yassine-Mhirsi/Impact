<?php
session_start();
error_reporting(0);
include('includes/config.php');
if (strlen($_SESSION['alogin']) == 0) {
	header('location:main.php');
} else {

	if (isset($_POST['submit'])) {

		$reciver = 'Admin';
		$email = $_SESSION['alogin'];
		$sql = "SELECT * from users where email = (:email);";
		$query = $dbh->prepare($sql);
		$query->bindParam(':email', $email, PDO::PARAM_STR);
		$query->execute();
		$result = $query->fetch(PDO::FETCH_OBJ);

		$name = $result->name;
		$subject = $_POST['title'];
		$message = $_POST['description'];

		$sql1 = "INSERT INTO feedback (sender,email, reciver, title,feedbackdata) VALUES (:name,:email,:reciver,:subject,:message)";
		$query1 = $dbh->prepare($sql1);
		$query1->bindParam(':name', $name, PDO::PARAM_STR);
		$query1->bindParam(':email', $email, PDO::PARAM_STR);
		$query1->bindParam(':reciver', $reciver, PDO::PARAM_STR);
		$query1->bindParam(':subject', $subject, PDO::PARAM_STR);
		$query1->bindParam(':message', $message, PDO::PARAM_STR);
		$query1->execute();
		echo "<script>alert('Feedback Sent!!');</script>";
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

		<title>Edit Profile</title>

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

		<script type="text/javascript" src="../vendor/countries.js"></script>
		<style>
			.errorWrap {
				padding: 10px;
				margin: 0 0 20px 0;
				background: #dd3d36;
				color: #fff;
				-webkit-box-shadow: 0 1px 1px 0 rgba(0, 0, 0, .1);
				box-shadow: 0 1px 1px 0 rgba(0, 0, 0, .1);
			}

			.succWrap {
				padding: 10px;
				margin: 0 0 20px 0;
				background: #5cb85c;
				color: #fff;
				-webkit-box-shadow: 0 1px 1px 0 rgba(0, 0, 0, .1);
				box-shadow: 0 1px 1px 0 rgba(0, 0, 0, .1);
			}
		</style>


	</head>

	<body>
		<?php
		$sql = "SELECT * from users;";
		$query = $dbh->prepare($sql);
		$query->execute();
		$result = $query->fetch(PDO::FETCH_OBJ);
		$cnt = 1;
		?>
		<?php include('includes/header.php'); ?>
		<div class="ts-main-content">
			<?php include('includes/leftbar.php'); ?>
			<div class="content-wrapper">
				<div class="container-fluid">
					<div class="row">
						<div class="col-md-12">
							<div class="row">

								<div class="col-md-12">
									<h2>Give us Feedback</h2>
									<div class="panel panel-default">
										<div class="panel-heading">Edit Info</div>
										<?php if ($error) { ?>
											<div class="errorWrap"><strong>ERROR</strong>:
												<?php echo htmlentities($error); ?>
											</div>
										<?php } else if ($msg) { ?>
												<div class="succWrap"><strong>SUCCESS</strong>:
												<?php echo htmlentities($msg); ?>
												</div>
										<?php } ?>

										<div class="panel-body">
											<form method="post" class="form-horizontal" enctype="multipart/form-data">

												<div class="form-group">
													<input type="hidden" name="user"
														value="<?php echo htmlentities($result->email); ?>">
													<label class="col-sm-2 control-label">Title<span
															style="color:red">*</span></label>
													<div class="col-sm-4">
														<input type="text" name="title" class="form-control" required>
													</div>
												</div>

												<div class="form-group">
													<label class="col-sm-2 control-label">Description<span
															style="color:red">*</span></label>
													<div class="col-sm-10">
														<textarea class="form-control" rows="5"
															name="description"></textarea>
													</div>
												</div>

												<div class="form-group">
													<div class="col-sm-8 col-sm-offset-2">
														<button class="btn btn-primary" name="submit"
															type="submit">Send</button>
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
				setTimeout(function () {
					$('.succWrap').slideUp("slow");
				}, 3000);
			});
		</script>
	</body>

	</html>
<?php } ?>