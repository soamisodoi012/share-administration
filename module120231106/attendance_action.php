<?php
	include 'includes/session_popup.php';

    ///////////////// current Date time /////////////////////
    $sqltm = "SELECT CURRENT_TIMESTAMP() as time1;";
    $querytm =$conn->query($sqltm);
    $time_rel = $querytm->fetch_assoc();
    $tm = $time_rel['time1'];
    ///////////////// current Date time /////////////////////
    $sqlDA = "SELECT CURRENT_DATE as date1;";
    $queryDA =$conn->query($sqlDA);
    $date_da = $queryDA->fetch_assoc();
    $da = $date_da['date1'];

	if(isset($_POST['attendd'])){
		$id = $_POST['holder_id'];
		
		$sqla = "SELECT username FROM admin WHERE id = '".$_SESSION['admin']."'";
		$query1 = $conn->query($sqla);
		$user = $query1->fetch_assoc();
		$inputter = $user['username'];

        $sql_d = "SELECT value FROM att_parameter WHERE shortname = 'AD'";
		$query_d = $conn->query($sql_d);
		$att_date = $query_d->fetch_assoc();
		$datee_1 = $att_date['value'];

        $sql_s = "SELECT value FROM att_parameter WHERE shortname = 'AS'";
		$query_s = $conn->query($sql_s);
		$att_stat = $query_s->fetch_assoc();
		$at_stat = $att_stat['value'];

        $sql = "SELECT id FROM att_shareholder WHERE id = '$id'";
		$query = $conn->query($sql);
		$holder = $query->fetch_assoc();
		$holder_idd = $holder['id'];

        $sql1 = "SELECT id FROM shareholder WHERE id = '$id'";
		$query1 = $conn->query($sql1);
		$holder1 = $query1->fetch_assoc();
		$holder_idd1 = $holder1['id'];

        if($at_stat == "OPEN"){
        
            if($datee_1 == $da){
                if($holder_idd == $id){

                    $_SESSION['error'] = "Duplicate Entry!!!!! ID: ".$holder_idd;
                }else{
                    if($holder_idd1 != $id){
                        $_SESSION['error'] = 'Shareholder ID doesnot Exist !! Please try again';
                    }else{
                        $sql = "INSERT INTO att_shareholder (id, status, att_date, timestamp, inputter, authorizer) 
                        VALUES ('$id','P', '$da', '$tm', '$inputter', '$inputter')";
                        if($conn->query($sql)){
                            $_SESSION['success'] = 'Successfull!!! Shareholder ID : '.$id;
                        }
                        else{
                            $_SESSION['error'] = $conn->error;
                        }
                    }   
                }
            }else{
                $_SESSION['error'] = 'Attendance Date is not opened for the meeting';
            }
        }else{
            $_SESSION['error'] = 'Attendance status is CLOSED. Please Contact system admin';
        }
	}
	else{
		$_SESSION['error'] = 'Internal Error!! Please Contact system admins';
	}

	header('location: att_shareholders.php');
