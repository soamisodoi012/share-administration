<?php
session_start();
if (isset($_SESSION['admin'])) {
  header('location:att_home.php');
}
?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="../module1/static/css/simplebar.css">
  <link href="../module1/static/css/style.css" rel="stylesheet">
  <link rel="stylesheet" href="../bower_components/font-awesome/css/font-awesome.min.css">
  <title>Login</title>
</head>

<body>
  <div class="bg-light min-vh-100 d-flex flex-row align-items-center">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-8">
          <div class="card-group d-block d-md-flex row">
            <div class="card col-md-7 p-4 mb-0">
              <div class="card-body">
                <h1>Login</h1>
                <p class="text-medium-emphasis">Sign In to your account</p>
                <form action="login.php" method="POST">

                  <div class="input-group mb-3"><span class="input-group-text">
                      <i class="fa fa-user icon"></i></span>
                    <input class="form-control" type="text" name="username" placeholder="Username" required>
                  </div>
                  <div class="input-group mb-4"><span class="input-group-text">
                      <i class="fa fa-lock icon"></i></span>
                    <input class="form-control" type="password" name="password" placeholder="Password" required>
                  </div>

                  <div class="row">
                    <div class="col-6">
                      <button class="btn btn-primary px-4" type="submit" name="login">Login</button>
                    </div>
                  </div>
                </form>
              </div>
              <?php
              if (isset($_SESSION['error'])) {
                echo "
                        <div class='callout callout-danger text-center mt20'>
                            <p>" . $_SESSION['error'] . "</p> 
                        </div>
                    ";
                unset($_SESSION['error']);
              }
              ?>
            </div>
            <div class="card col-md-5 text-white bg-primary py-5">
              <div class="card-body text-center">
                <div>
                  <img id='myImg' src='../images/logo2.png' width='200' height='200' align='center'>
                  <p>Share Administration Portal</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <?php include 'includes/scripts.php' ?>
</body>

</html>