

<?php
	$name = $_POST['name'];
    $mobileno = $_POST['mobileNumber'];
	$email = $_POST['email'];
    $datetime = $_POST['datetime'];
	

	// Database connection
	$conn = new mysqli('localhost','root','','appointment');
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {
		$stmt = $conn->prepare("insert into patient_appointment(name, phnumber, email, datatime) values(?, ?, ?, ?)");
		$stmt->bind_param("siss", $name, $mobileno, $email, $datetime);
  
		$execval = $stmt->execute();
		
		?>
		<script>

			alert('Appointment Booked');
		</script>
		<?php
		
		$stmt->close();
		$conn->close();
	}
?>

