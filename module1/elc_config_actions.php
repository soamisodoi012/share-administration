<?php
	include 'includes/session_popup.php';

    ///////////////// current Date time /////////////////////
	$sqltm = "SELECT CURRENT_TIMESTAMP() as time1;";
	$querytm =$conn->query($sqltm);
	$time_rel = $querytm->fetch_assoc();
	$tm = $time_rel['time1'];

    $sql_att = "SELECT shortname,value FROM att_parameter WHERE shortname ='AD'";
    $query_att = $conn->query($sql_att);
    $check_att = $query_att->fetch_assoc();
    $att_date = $check_att['value'];

    $sqla = "SELECT username,role FROM admin WHERE id = '".$_SESSION['admin']."'";
    $query1 = $conn->query($sql);
    $user = $query1->fetch_assoc();
    $inputter = $user['username'];
    $role_a = $user['role'];
    

	if(isset($_POST['add_e'])){
		$shortname = $_POST['shortname'];
		$description = $_POST['description'];
		$value = $_POST['value'];
		$remarks = $_POST['remarks'];
		
		/*$sqla = "SELECT username FROM admin WHERE id = '".$_SESSION['admin']."'";
		$query1 = $conn->query($sqla);
		$user = $query1->fetch_assoc();
		$inputter = $user['username'];*/

		$sqlc = "SELECT shortname FROM elc_parameter WHERE shortname ='".$_POST['shortname']."'";
		$queryc = $conn->query($sqlc);
		$check = $queryc->fetch_assoc();
		$checkk = $check['shortname'];

        

        if($att_date != ''){
            if($checkk != $shortname){

                $sql = "INSERT INTO elc_parameter (shortname, description, value, remarks, inputter, authorizer, elc_date) 
                VALUES ('$shortname','$description', '$value', '$remarks', '$inputter', '$inputter', '$att_date')";
                if($conn->query($sql)){
                    $_SESSION['success'] = 'Election Configuration added successfully';
                }
                else{
                    $_SESSION['error'] = $conn->error;
                }
            }else{
                $_SESSION['error'] = "Duplicate Entry............";
            }
		}else{
            $_SESSION['error'] = 'Attendance Date is empty........ set attendace date first!!!!'.$att_date;
        }

	}
	elseif(isset($_POST['deleteel'])){
        $id = $_POST['id'];
        $backup="INSERT INTO elc_parameter_his SELECT * FROM elc_parameter WHERE id='$id'";
        //$queryB = $conn->query($backup);
        $sql = "DELETE FROM elc_parameter WHERE id = '$id'";
        if($conn->query($backup)){
            if($conn->query($sql)){
                $_SESSION['success'] = 'Configuration deleted successfully';}
        }
        else{
            $_SESSION['error'] = $conn->error;
        }
	}
	elseif(isset($_POST['editel'])){ 

        if($att_date != ''){
            $shortname = $_POST['shortname'];
            $value = $_POST['value'];
            //$description = $_POST['description'];

           

            $sql = "SELECT * FROM elc_parameter WHERE shortname = '$shortname'";
            $query = $conn->query($sql);
            $row = $query->fetch_assoc();


            $sql = "UPDATE elc_parameter SET value = '$value', inputter='$inputter' WHERE shortname = '$shortname'";
            if($conn->query($sql)){
                $_SESSION['success'] = 'Configuration updated successfully ';
            }
            else{
                $_SESSION['error'] = $conn->error;
            }
        }else{
            $_SESSION['error'] = 'Attendance Date is empty........ set attendace date first!!!!';
        }
	}
    elseif(isset($_POST['cls_elc'])){

        if($role_a == 'admin'){

            $backup_cls="INSERT INTO elc_parameter_his SELECT * FROM elc_parameter";
            $update_cls="UPDATE elc_parameter SET VALUE=0";
            $update_cls_result="INSERT INTO elc_result_his SELECT * FROM elc_result";
            $delete_result="DELETE FROM elc_result";
            $update_nominee="INSERT INTO elc_nominee_his SELECT * FROM elc_nominee";
            $delete_nominee="DELETE FROM elc_nominee";
            $update_att="UPDATE att_parameter SET value='CLOSED' WHERE shortname='AS'";

            if($conn->query($backup_cls) && $conn->query($update_cls) && $conn->query($update_cls_result)){
                if($conn->query($delete_result) && $conn->query($update_att)){
                    if($conn->query($update_nominee) && $conn->query($delete_nominee)){
                        $_SESSION['success'] = 'Election Closed !!!!!!!';
                    }
                }
            }
            else{
                $_SESSION['error'] = $conn->error;
            }

        }
	}
	else{
		$_SESSION['error'] = 'Fill up form first';
	}

	header('location: elc_configuration.php');
