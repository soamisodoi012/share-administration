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

    $sqla = "SELECT username FROM admin WHERE id = '".$_SESSION['admin']."'";
    $query1 = $conn->query($sqla);
    $user = $query1->fetch_assoc();
    $inputter = $user['username'];

    $sql_d = "SELECT value FROM att_parameter WHERE shortname = 'AD'";
    $query_d = $conn->query($sql_d);
    $att_date = $query_d->fetch_assoc();
    $datee_1 = $att_date['value'];

	if(isset($_POST['nominee_vote'])){

        $sh_id = $_POST['holder_id'];
        $v_value = $_POST['subscribed_share'];
		
        $selectedRecords = $_POST['record'];
        $selectedRecords2 = $_POST['record1'];
        $countt = count($selectedRecords) ?? 0;
        /*$selectedRecords = $_POST["record"];
        if(count($selectedRecords) != NULL){
            $countt = count($selectedRecords);
        }else{
            $countt = 0;
        }*/
        

        $sql_elect = "SELECT sh_id FROM elc_result where sh_id='$sh_id'";
        $query_elect = $conn->query($sql_elect);
        $check_elc = $query_elect->num_rows;

        $sql_att = "SELECT id FROM att_shareholder where id='$sh_id'";
        $query_att = $conn->query($sql_att);
        $check_att = $query_att->num_rows;

        $sql_elc = "SELECT value FROM elc_parameter WHERE shortname = 'NV'";
        $query_elc = $conn->query($sql_elc);
        $row_elc = $query_elc->fetch_assoc();
        $max_vote = $row_elc['value'];

        if($max_vote >= $countt){
            if($check_att > 0){
                if($check_elc <= 0){
                    foreach ($selectedRecords as $recordID){
                        $sql = "INSERT INTO elc_result (sh_id, candidate_id, v_value, status, elc_date, inputter, authorizer) VALUES ('$sh_id', '$recordID', '$v_value', 'ORD', '$datee_1', '$inputter', '$inputter')";
                        if ($conn->query($sql) === TRUE) {
                            $_SESSION['success']="Voted successfully. Shareholder ID   : ".$sh_id;
                        }else{
                            $_SESSION['error'] = "Unable to process the records!! ..... please contact system admin";
                        }
                    }
                    foreach ($selectedRecords2 as $recordID1){

                        $sql1 = "INSERT INTO elc_result (sh_id, candidate_id, v_value, status, elc_date, inputter, authorizer) VALUES ('$sh_id', '$recordID1', '$v_value', 'INF', '$datee_1', '$inputter', '$inputter')";
                        if ($conn->query($sql1) === TRUE) {
                            $_SESSION['success']="Voted successfully. Shareholder ID   : ".$sh_id;
                        }else{
                            $_SESSION['error'] = "Unable to process the records!!..... please contact system admin";
                        }
                    }
                }else{
                    $_SESSION['error'] = "Duplicate entry.............. ";
                }
            }else{
                $_SESSION['error'] = "Share holder is not attended.... please insert attended shareholder ID only";
            }
        }else{
            $_SESSION['error'] = "Error ....!!!! Vote cannot exceed ".$max_vote." Votes";
        }
	}
	else{
		$_SESSION['error'] = 'Internal Error!! Please Contact system admins';
	}

	header('location: elc_election.php');
