<?php
session_start();
include('includes/config.php');

if (isset($_POST['feedback-submit']) && !isset($_SESSION['alogin'])) {

	$reciver = 'Admin';
	$name = $_POST['feedback-name'];
	$email = $_POST['feedback-email'];
	$subject = $_POST['feedback-subject'];
	$message = $_POST['feedback-message'];

	$sql1 = "INSERT INTO feedback (sender,email, reciver, title,feedbackdata) VALUES (:name,:email,:reciver,:subject,:message)";
	$query1 = $dbh->prepare($sql1);
	$query1->bindParam(':name', $name, PDO::PARAM_STR);
	$query1->bindParam(':email', $email, PDO::PARAM_STR);
	$query1->bindParam(':reciver', $reciver, PDO::PARAM_STR);
	$query1->bindParam(':subject', $subject, PDO::PARAM_STR);
	$query1->bindParam(':message', $message, PDO::PARAM_STR);
	$query1->execute();
	echo "<script>alert('Feedback Sent!!');</script>";
	header("location:main.php");

} else {

	if (isset($_POST['feedback-submit']) && isset($_SESSION['alogin'])) {

		$reciver = 'Admin';
		$email = $_SESSION['alogin'];
		$sql = "SELECT * from users where email = (:email);";
		$query = $dbh->prepare($sql);
		$query->bindParam(':email', $email, PDO::PARAM_STR);
		$query->execute();
		$result = $query->fetch(PDO::FETCH_OBJ);

		$name = $result->name;
		$subject = $_POST['feedback-subject'];
		$message = $_POST['feedback-message'];

		$sql1 = "INSERT INTO feedback (sender,email, reciver, title,feedbackdata) VALUES (:name,:email,:reciver,:subject,:message)";
		$query1 = $dbh->prepare($sql1);
		$query1->bindParam(':name', $name, PDO::PARAM_STR);
		$query1->bindParam(':email', $email, PDO::PARAM_STR);
		$query1->bindParam(':reciver', $reciver, PDO::PARAM_STR);
		$query1->bindParam(':subject', $subject, PDO::PARAM_STR);
		$query1->bindParam(':message', $message, PDO::PARAM_STR);
		$query1->execute();
		echo "<script>alert('Feedback Sent!!');</script>";
		header("location:main.php");
	}
}
?>