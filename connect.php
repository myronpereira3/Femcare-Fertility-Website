<?php
	$name = $_POST['name'];
	$email = $_POST['email'];
	

	// Database connection
	$conn = new mysqli('localhost','root','','mydb');
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {
		$stmt = $conn->prepare("insert into call_back(name, email) values(?, ?)");
		$stmt->bind_param("ss", $name, $email);
		$execval = $stmt->execute();
		
		?>
		<script>

			alert('Thankyou for your response');
		</script>
		<?php
		
		$stmt->close();
		$conn->close();
	}
?>