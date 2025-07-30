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

	if(isset($_POST['nominate'])){
		$id = $_POST['holder_id'];
        $nom_type = $_POST['nominee_role'];
		
		$sqla = "SELECT username FROM admin WHERE id = '".$_SESSION['admin']."'";
		$query1 = $conn->query($sqla);
		$user = $query1->fetch_assoc();
		$inputter = $user['username'];

        $sql_d = "SELECT value FROM att_parameter WHERE shortname = 'AD'";
		$query_d = $conn->query($sql_d);
		$att_date = $query_d->fetch_assoc();
		$datee_1 = $att_date['value'];

        $sql = "SELECT sh_id FROM elc_nominee WHERE sh_id = '$id'";
		$query = $conn->query($sql);
		$holder = $query->fetch_assoc();
		$holder_idd = $holder['sh_id'];

        $sql1 = "SELECT id FROM shareholder WHERE id = '$id'";
		$query1 = $conn->query($sql1);
		$holder1 = $query1->fetch_assoc();
		$holder_idd1 = $holder1['id'];

        /////////// check parameter for no of nominee ///////////////
        $sql_elc = "SELECT value FROM elc_parameter WHERE  elc_date = '$datee_1' AND shortname='NN1'";
		$query_elc = $conn->query($sql_elc);
		$candid = $query_elc->fetch_assoc();
		$max_candidd = $candid['value'];
        $max_candid = number_format($max_candidd);

        $sql_elc_ORD = "SELECT value FROM elc_parameter WHERE  elc_date = '$datee_1' AND shortname='NN'";
		$query_elc_ORD = $conn->query($sql_elc_ORD);
		$candid_ORD = $query_elc_ORD->fetch_assoc();
		$max_candidd_ORD = $candid_ORD['value'];
        $max_candid_ORD = number_format($max_candidd_ORD);
        
        $sql_nomi = "SELECT * FROM elc_nominee where elc_date='$datee_1' AND remark='INF'";
        $query_nomi = $conn->query($sql_nomi);
        $no_nomi = $query_nomi->num_rows;
        ///////////// count nominees (ordinary)///////////////////////
        $sql_nomi_ORD = "SELECT * FROM elc_nominee where elc_date='$datee_1' AND remark='ORD'";
        $query_nomi_ORD = $conn->query($sql_nomi_ORD);
        $no_nomi_ORD = $query_nomi_ORD->num_rows;

        if($nom_type == "INF"){
            if($max_candid > $no_nomi){

                if($holder_idd == $id){
    
                    $_SESSION['error'] = "Duplicate Entry!!!!! ID: ".$holder_idd;
                }else{
                    if($holder_idd1 != $id){
                        $_SESSION['error'] = 'Shareholder ID doesnot Exist !! Please try again';
                    }else{
                        $sqlcan = "INSERT INTO elc_nominee (sh_id, status, status1, timestamp, inputter, authorizer,elc_date,remark) 
                        VALUES ('$id','N', 'ACTIVE', '$tm', '$inputter', '$inputter','$datee_1', '$nom_type')";
                        if($conn->query($sqlcan)){
                            $_SESSION['success'] = 'Successfully';
                        }
                        else{
                            $_SESSION['error'] = $conn->error;
                        }
                    }   
                }
            }else{
                $_SESSION['error'] = 'Maximum no Infulential of Nominee............ please contact system administrator ';
            }
        }elseif($nom_type == "ORD"){
            if($max_candid_ORD > $no_nomi_ORD){

                if($holder_idd == $id){
    
                    $_SESSION['error'] = "Duplicate Entry!!!!! ID: ".$holder_idd;
                }else{
                    if($holder_idd1 != $id){
                        $_SESSION['error'] = 'Shareholder ID doesnot Exist !! Please try again';
                    }else{
                        $sqlcan = "INSERT INTO elc_nominee (sh_id, status, status1, timestamp, inputter, authorizer,elc_date,remark) 
                        VALUES ('$id','N', 'ACTIVE', '$tm', '$inputter', '$inputter','$datee_1', '$nom_type')";
                        if($conn->query($sqlcan)){
                            $_SESSION['success'] = 'Successfully';
                        }
                        else{
                            $_SESSION['error'] = $conn->error;
                        }
                    }   
                }
            }else{
                $_SESSION['error'] = 'Maximum no Ordinary  of Nominee............ please contact system administrator ';
            }
        }else{
            $_SESSION['error'] = "Unable to process your request!! Please contact system administrator";
        }
	}
	else{
		$_SESSION['error'] = 'Internal Error!! Please Contact system admins';
	}

	header('location: elc_nominee.php');
