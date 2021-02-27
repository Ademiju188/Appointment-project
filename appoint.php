<?php
  session_start();

  function validate($first_name)
{
  if(isset($_SESSION[$first_name])) {
    return "<p class='text-success'>". $_SESSION[$first_name]."</p>";
  }
}

function old($first_name)
{
  if(isset($_SESSION[$first_name])) {
    return $_SESSION[$first_name];
  }
  return;
}
?>


<!DOCTYPE html>
<html lang="eng">

<head>
    <title>Project Appointment</title>
    <meta charset="utf-8">
    <meta name="viewpoint" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/welcome.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <!-- Bootstrap Core and vandor -->
    <link rel="stylesheet" href="assets/plugins/bootstrap/css/bootstrap.min.css" />

    <!-- Plugins css -->
    <link rel="stylesheet" href="assets/plugins/charts-c3/c3.min.css" />

    <!-- Core css -->
    <link rel="stylesheet" href="assets/css/main.css" />
    <link rel="stylesheet" href="assets/css/theme1.css" />
    <script src="js/jquery.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>

</head>

<body>

    <div id="main_content">

        <div id="header_top" class="header_top">
            <div class="container">
                <div class="hleft">
                    <a class="header-brand" href="index.php"><i class="fa fa-home brand-logo"></i></a>
                    <div class="dropdown">
                        <a href="javascript:void(0)" class="nav-link user_btn"><img class="avatar" src="img/user.png"
                                alt="" data-toggle="tooltip" data-placement="right" title="User Menu" /></a>
                    </div>
                </div>
                <div class="hright">
                    <div class="dropdown">
                        <a href="javascript:void(0)" class="nav-link icon settingbar"><i class="fa fa-gear fa-spin"
                                data-toggle="tooltip" data-placement="right" title="Settings"></i></a>
                        <a href="javascript:void(0)" class="nav-link icon menu_toggle"><i
                                class="fa  fa-align-left"></i></a>
                    </div>
                </div>
            </div>
        </div>





        <div id="left-sidebar" class="sidebar ">
            <h5 class="brand-name">PRO-APP<a href="javascript:void(0)" class="menu_option float-right"></a></h5>
            <nav id="left-sidebar-nav" class="sidebar-nav">
                <ul class="metismenu">
                    <li class="g_heading">
                        <?php
                    if(!isset($_SESSION['email'])) {
                      echo "Access Denied!";
                      exit;
                    }else{
                      echo $_SESSION['email'];
                    }
                    ?>
                    </li>
                    <li><a href="welcome.php"><i class="fa fa-dashboard"></i><span>Dashboard</span></a></li>
                    <li class="active"><a href="appoint.php"><i class="fa fa-book"></i><span>Appointment</span></a></li>


                </ul>
            </nav>
        </div>

        <div class="page">
            <div id="page_top" class="section-body top_dark">
                <div class="container-fluid">
                    <div class="page-header">
                        <div class="left">
                            <a href="javascript:void(0)" class="icon menu_toggle mr-3"><i
                                    class="fa  fa-align-left"></i></a>
                            <h1 class="page-title">Dashboard</h1>
                        </div>
                        <div class="right">
                            <div class="input-icon xs-hide mr-4">
                                <input type="text" class="form-control" placeholder="Search for...">
                                <span class="input-icon-addon"><i class="fa fa-search"></i></span>
                            </div>

                            <div class="dropdown2">
                                <a class="nav-link icon d-none d-md-flex btn btn-default btn-icon ml-2"
                                    data-toggle="dropdown"><i class="fa fa-user"></i></a>
                                <div class="dropdown2-content">
                                    <a href="logout.php">Log Out</a>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <div class="section-body mt-3">
                <div class="container-fluid">
                    <div class="row clearfix">
                        <div class="col-lg-12">
                            <div class="mb-4">

                                <h4>
                                    <?php
                              if(!isset($_SESSION['email'])) {
                                echo "Access Denied!";
                                exit;
                              }else{
                                echo 'WELCOME' ." ". ucfirst( $_SESSION['email']);
                              }
                              ?>
                                </h4>
                                <form action="storeappoint.php" method="POST">
                                    <input type="hidden" name="" value=''>
                                    <div class="form-group">
                                        <label for="name">First Name:</label>
                                        <input type="name" class="form-control" id="first_name" placeholder="First Name"
                                            name="first_name" value='<?=old("first_name");?>' required>
                                        <?=validate('first_name_error');?>
                                    </div>
                                    <div class="form-group">
                                        <label for="name">Last Name:</label>
                                        <input type="name" class="form-control" id="last_name" placeholder="Last Name"
                                            name="last_name" value="<?=old('last_name');?>" required>
                                        <?=validate('last_name_error');?>
                                    </div>
                                    <div class="form-group">
                                        <label for="number">Phone Number:</label>
                                        <input type="number" class="form-control" id="phone_number"
                                            placeholder="Phone Number" name="phone_number"
                                            value="<?=old('phone_number');?>" required>
                                        <?=validate('phone_number_error');?>
                                    </div>
                                    <div class="form-group">
                                        <label for="email">Email:</label>
                                        <input type="email" class="form-control" id="email" placeholder="Enter email"
                                            name="email" value="<?=old('email');?>" required>
                                        <?=validate('email_error');?>
                                        <div class="form-group">
                                            <!-- Date input -->
                                            <label class="control-label" for="date">Date:</label>
                                            <input class="form-control" id="date" name="date" placeholder="MM/DD/YYY"
                                                type="text" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="body">Purpose of Meeting:</label>
                                            <textarea rows="5" class="form-control" id="body" name="purpose"
                                                required></textarea> <?=validate('purpose_error');?>
                                        </div>
                                        <button type="submit" name="submit" onclick="myFunction()"
                                            class="btn btn-primary">Submit</button>


                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>



        <script src="assets/bundles/lib.vendor.bundle.js"></script>
        <script src="assets/bundles/apexcharts.bundle.js"></script>
        <script src="assets/bundles/counterup.bundle.js"></script>
        <script src="assets/bundles/knobjs.bundle.js"></script>
        <script src="assets/bundles/c3.bundle.js"></script>
        <script src="assets/js/core.js"></script>
        <script src="assets/js/page/project-index.js"></script>
        <script src="js/script.js"></script>


</body>

</html>