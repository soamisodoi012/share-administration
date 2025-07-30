<ul class="sidebar-nav" data-coreui="navigation" data-simplebar>
  <li class="nav-item"><a class="nav-link" href="att_home.php">
    <svg class="nav-icon">
      <use xlink:href="../module1/static/svg/free.svg#cil-speedometer"></use>
    </svg> Dashboard</a></li>
    <li class="nav-title">ATTENDANCE</li>
    <li class="nav-group"><a class="nav-link nav-group-toggle" href="att_home.php">
        <svg class="nav-icon">
          <use xlink:href="../module1/static/svg/free.svg#cil-people"></use>
        </svg> Share Holders</a>
      <ul class="nav-group-items">
        <li class="nav-item"><a class="nav-link" href="JavaScript:newPopup('att_shareholders.php');"><span class="nav-icon"></span>Attendance</a></li>
        <li class="nav-item"><a class="nav-link" href="JavaScript:newPopup('present_shareholders.php');"><span class="nav-icon"></span>Attended Holders</a></li>
        <li class="nav-item"><a class="nav-link" href="JavaScript:newPopup('absent_shareholders.php');"><span class="nav-icon"></span>Absent Holders</a></li>
        <li class="nav-item"><a class="nav-link" href="JavaScript:newPopup('att_configuration.php');"><span class="nav-icon"></span>Attendance Settings</a></li>
      </ul>
    </li>
    <li class="nav-title">ELECTION</li>
    <li class="nav-group"><a class="nav-link nav-group-toggle" href="att_home.php">
        <svg class="nav-icon">
          <use xlink:href="../module1/static/svg/free.svg#cil-people"></use>
        </svg> Share Holders</a>
      <ul class="nav-group-items">
        <li class="nav-item"><a class="nav-link" href="JavaScript:newPopup('elc_nominee.php');"><span class="nav-icon"></span>Nominee</a></li>
        <li class="nav-item"><a class="nav-link" href="JavaScript:newPopup('elc_election.php');"><span class="nav-icon"></span>Election</a></li>
        <li class="nav-item"><a class="nav-link" href="#"><span class="nav-icon"></span>Count</a></li>
        <li class="nav-item"><a class="nav-link" href="JavaScript:newPopup('elc_configuration.php');"><span class="nav-icon"></span>Election Settings</a></li>
      </ul>
    </li>
  </ul>
<script type="text/javascript">
  function newPopup(url) {
    popupWindow = window.open(
      url,'popUpWindow','height=500,width=400,left=10,top=10,resizable=yes,scrollbars=yes,toolbar=yes,menubar=no,location=no,directories=no,status=yes')
  }
</script>
<?php include 'scripts.php'; ?>