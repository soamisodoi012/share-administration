<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

  <title>Share Administration</title>
  
  <link rel="stylesheet" href="../module1/static/css/simplebar.css">
  <link href="../module1/static/css/style.css" rel="stylesheet">
  <!-- Theme style -->
  <link rel="stylesheet" href="../dist/css/AdminLTE.min.css">
  <style type="text/css">
    .bold{
      font-weight:bold;
    }
    
    #candidate_list{
      margin-top:20px;
    }

    #candidate_list ul{
      list-style-type:none;
    }

    #candidate_list ul li{ 
      margin:0 30px 30px 0; 
      vertical-align:top
    }

    .clist{
      margin-left: 20px;
    }

    .cname{
      font-size: 25px;
    }
    
  </style>
</head>
<body>
  <div class="sidebar sidebar-dark sidebar-fixed" id="sidebar">
    <div class="sidebar-brand d-none d-md-flex">
      
    </div>

    <?php include 'base_menubar.php';?>

    <button class="sidebar-toggler" type="button" data-coreui-toggle="unfoldable"></button>
  </div>
  <div class="wrapper d-flex flex-column min-vh-100 bg-light">
    <header class="header header-sticky mb-4">
      <div class="container-fluid">
        <button class="header-toggler px-md-0 me-md-3" type="button" onclick="coreui.Sidebar.getInstance(document.querySelector('#sidebar')).toggle()">
          <svg class="icon icon-lg">
            <use xlink:href="../module1/static/svg/free.svg#cil-menu"></use>
          </svg>
        </button>
        <ul class="header-nav d-none d-md-flex">
          <li class="nav-item"><a class="nav-link" href="att_home.php">Dashboard</a></li>
          <!--li class="nav-item"><a class="nav-link" href="#">Settings</a></li-->
        </ul>
        <ul class="header-nav ms-auto">
          <li class="nav-item"><a class="nav-link" href="#">
              <svg class="icon icon-lg">
                <use xlink:href="../module1/static/svg/free.svg#cil-bell"></use>
              </svg></a></li>
        </ul>
        <ul class="header-nav ms-3">
          <li class="nav-item dropdown"><a class="nav-link py-0" data-coreui-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
              <div class="avatar avatar-md"><img class="avatar-img" src="<?php echo (!empty($user['photo'])) ? '../images/'.$user['photo'] : '../images/profile.jpg'; ?>" class="user-image" alt="User Image"></div></a>
            <div class="dropdown-menu dropdown-menu-end pt-0">
              <div class="dropdown-header bg-light py-2">
                <!--div class="fw-semibold">Account</div-->
                <div class="fw-bold"><span class="hidden-xs"><?php echo $user['firstname'].' '.$user['lastname']; ?></span></div>
              </div>
              <a class="dropdown-item" data-toggle="modal" id="module1_profile" href="#profile">
                <svg class="icon me-2">
                  <use xlink:href="../module1/static/svg/free.svg#cil-lock-locked"></use>
                </svg> Profile</a>
                <a class="dropdown-item" href="logout.php">
                <svg class="icon me-2">
                  <use xlink:href="../module1/static/svg/free.svg#cil-account-logout"></use>
                </svg> Logout</a>
            </div>
          </li>
        </ul>
      </div>
      <div class="header-divider"></div>
    </header>

<script type="text/javascript">
  function newPopup(url) {
    popupWindow = window.open(
      url,'popUpWindow','height=500,width=400,left=10,top=10,resizable=yes,scrollbars=yes,toolbar=yes,menubar=no,location=no,directories=no,status=yes')
  }
</script>
<script src="../static/js/chart.min.js"></script>
<script src="../static/js/coreui-chartjs.js"></script>
<script src="../static/js/coreui-utils.js"></script>
<script src="../static/js/main.js"></script>
<!--?php include 'includes/header.php'; ?-->