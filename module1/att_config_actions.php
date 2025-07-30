<?php
	include 'includes/session_popup.php';

	if(isset($_POST['addc'])){
		$shortname = $_POST['shortname'];
		$description = $_POST['description'];
		$value = $_POST['value'];
		$remarks = $_POST['remarks'];
		
		$sqla = "SELECT username FROM admin WHERE id = '".$_SESSION['admin']."'";
		$query1 = $conn->query($sqla);
		$user = $query1->fetch_assoc();
		$inputter = $user['username'];

		$sqlc = "SELECT shortname FROM att_parameter WHERE shortname ='".$_POST['shortname']."'";
		$queryc = $conn->query($sqlc);
		$check = $queryc->fetch_assoc();
		$checkk = $check['shortname'];

		if($checkk != $shortname){

			$sql = "INSERT INTO att_parameter (shortname, description, value, remarks, inputter, authorizer) 
			VALUES ('$shortname','$description', '$value', '$remarks', '$inputter', '$inputter')";
			if($conn->query($sql)){
				$_SESSION['success'] = 'Attendance Configuration added successfully';
			}
			else{
				$_SESSION['error'] = $conn->error;
			}
		}else{
			$_SESSION['error'] = "Duplicate Entry............";
		}
		

	}
	elseif(isset($_POST['delete'])){
		$id = $_POST['id'];
		$backup="INSERT INTO att_parameter_his SELECT * FROM att_parameter WHERE id='$id'";
		//$queryB = $conn->query($backup);
		$sql = "DELETE FROM att_parameter WHERE id = '$id'";
		if($conn->query($backup)){
			if($conn->query($sql)){
				$_SESSION['success'] = 'Configuration deleted successfully';}
		}
		else{
			$_SESSION['error'] = $conn->error;
		}
	}
	elseif(isset($_POST['editco'])){ 
		$shortname = $_POST['shortname'];
		$value = $_POST['value'];
        //$description = $_POST['description'];

        $sqla = "SELECT username FROM admin WHERE id = '".$_SESSION['admin']."'";
		$query1 = $conn->query($sql);
		$user = $query1->fetch_assoc();
		$inputter = $user['username'];

		$sql = "SELECT * FROM att_parameter WHERE shortname = '$shortname'";
		$query = $conn->query($sql);
		$row = $query->fetch_assoc();


		$sql = "UPDATE att_parameter SET value = '$value', inputter='$inputter' WHERE shortname = '$shortname'";
		$sql_date_up = "UPDATE elc_parameter SET elc_date = '$value'";
		if($conn->query($sql)){
			if($shortname == 'AD'){
				if($conn->query($sql_date_up)){
					$_SESSION['success'] = 'Configuration updated successfully ';
				}else{
					$_SESSION['error'] = $conn->error;
				}
			}else{
				$_SESSION['success'] = 'Configuration updated successfully ';
			}
		}
		else{
			$_SESSION['error'] = $conn->error;
		}
	}
	else{
		$_SESSION['error'] = 'Fill up form firstt';
	}

	header('location: att_configuration.php');
?>