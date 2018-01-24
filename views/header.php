<!DOCTYPE html >
<?php
//for assigning equipment variable due to direct entering to event php
if (!isset($_SESSION['equipment'])) {
    $_SESSION['equipment'] = 'STL';
}
?>
<html>
    <head class="noPrint">
        <title><?php
            if (isset($this->title)) {
                echo $this->title;
            } else {
                echo 'MIS for Piduruthalagala';
            }
            ?></title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="icon" href="<?php echo URL; ?>public/images/emotive-favicon.png">

        <link rel="stylesheet" href="<?php echo URL; ?>public/css/bootstrap.min.css"/>
        <!--<link rel="stylesheet" href="<?php echo URL; ?>public/css/bootstrap-theme.min.css"/>-->
        <link rel="stylesheet" href="<?php echo URL; ?>public/css/dataTables.bootstrap.min.css"/>
        <link rel="stylesheet" href="<?php echo URL; ?>public/css/jquery-ui.min.css"/>
        <!--<link rel="stylesheet" href="<?php echo URL; ?>public/css/jquery-ui.structure.min.css"/>--> 
        <link rel="stylesheet" href="<?php echo URL; ?>public/css/jquery-ui.theme.min.css"/>
        <link rel="stylesheet" href="<?php echo URL; ?>public/css/default.css"/> 


        <script type="text/javascript" src="<?php echo URL; ?>public/js/jquery.js"></script>
        <script type="text/javascript" src="<?php echo URL; ?>public/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="<?php echo URL; ?>public/js/jquery-ui.min.js"></script>
        <script type="text/javascript" src="<?php echo URL; ?>public/js/jquery.dataTables.min.js"></script>
        <!--<script type="text/javascript" src="<?php echo URL; ?>public/js/dataTables.bootstrap.min.js"></script>-->
        <script type="text/javascript" src="<?php echo URL; ?>public/js/chartsLoader.js"></script>
        <!--<script type="text/javascript" src="<?php echo URL; ?>public/js/highcharts.js"></script>-->
        <script type="text/javascript" src="<?php echo URL; ?>public/js/jquery.validate.min.js"></script>
        <script type="text/javascript" src="<?php echo URL; ?>public/js/custom.js"></script>

       
        <?php
        if (isset($this->css)) {//linking default css file relawant to calling file
            foreach ($this->css as $css) {
                echo '<link rel="stylesheet" href="' . URL . 'views/' . $css . '"/>';
            }
        }
        ?>
        <?php
        if (isset($this->js)) {//getting default js file relawant to calling file
            foreach ($this->js as $js) {
                echo '<script type="text/javascript" src="' . URL . 'views/' . $js . '"></script>';
            }
        }
        ?>
         

    </head>

    <!--header body-->
    <body  style="background-size: cover; background-image: url('<?php echo URL ?>public/images/background.jpg')">

        <!--for deleting confirm dialog-->
        <div id="deleteDialog" class="confDialog" hidden="" title="Confirmation Required">
            Do you want to delete record?
        </div>

        <!--for logout confirm dialog-->
        <div id="logoutDialog" class="confDialog" hidden="" title="Confirmation Required">
            Do you want to logout from the system?
        </div>

        <div class="row container-fluid   noPrint" style="background-color:#A7C0C4">
            <div class="col-lg-4  text-left ">
                <img src="<?php echo URL; ?>public/images/rupa_logo.png" alt="Rupavahini" >
            </div>
            <div class="col-lg-4 text-center" >
                <h4 style="font-weight: bold; color: black">Piduruthalagala Transmitting Station</h4>
            </div>
            <div class="col-lg-4" >
                <div class="pull-right text-right" style="font-weight: bold">
                    <!--Displaying welcome massage for logged users by using session['userName']-->
                    <h4 id='welcome'> Welcome  <?php
                        if (Session::get('userName') <> '') {
//                            echo 'test';die;
                            echo Session::get('userName');
                        } else {
                            echo'Guest';
                        }
                        ?>
                    </h4> 
                    <div>
                        <!--Displaying login status massage by using session['loggedIn']-->
                        <?php if (Session::get('loggedIn') == FALSE): ?>
                            <a href="<?php echo URL; ?>login" style="color: green">Login<span class="glyphicon glyphicon-off"></span></a>
                        <?php endif; ?>

                        <?php if (Session::get('loggedIn') == TRUE): ?>
                            <a href="<?php echo URL; ?>user/accountEdit/<?php echo Session::get('serviceNumber'); ?>"  style="float: left; color:#660066">Edit Account <span class="glyphicon glyphicon-edit"></span></a>
                            <a id="logout" href="<?php echo URL; ?>login/logout"  style="color: #F9621D">Logout<span class="glyphicon glyphicon-off"></span></a>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
        <!--End of welcome div-->

        <div id="header" class="col-lg-12 noPrint " style="background-color: #872F47;">
            <!--Navigation bar-->
            <ul class="nav nav-tabs">
                <!--Home tab-->
                <li id="home"><a id="homeLink" href="<?php echo URL; ?>index" >Home</a></li>
                <?php if (Session::get('loggedIn') == TRUE): ?>
                    <!--General information tab-->
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">General Info <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="<?php echo URL; ?>notice" >Staff Notice</a></li>
                            <li><a href="<?php echo URL; ?>diesel">Diesel Supply</a></li>                     
                        </ul>
                    </li>
                    <!--Equipment information tab-->
                    <li id="equepments" class="dropdown" >
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">Equipments Info<span class="caret "></span></a>
                        <ul class="dropdown-menu">
                            <li class="dropdown"><a href="<?php echo URL; ?>running">Running Hours</a></li>
                            <li class="divider"></li>
                            <li class="dropdown"  ><a href="<?php echo URL; ?>event/stl">STL</a></li>
                            <li class="dropdown" ><a href="<?php echo URL; ?>event/pcn">PCN1620SSPH/1</a> </li>
                            <li class="dropdown" ><a href="<?php echo URL; ?>event/nm">NM7200V</a></li>
                            <li class="dropdown" ><a href="<?php echo URL; ?>event/coax">Co-Axial</a></li>
                            <li class="dropdown" ><a href="<?php echo URL; ?>event/ant">Antenna</a></li>
                            <li class="dropdown" ><a href="<?php echo URL; ?>event/ups">UPS</a></li>
                            <li class="dropdown" ><a href="<?php echo URL; ?>event/gen">Generator</a></li>
                            <li class="dropdown" ><a href="<?php echo URL; ?>event/oth">Other</a></li>
                        </ul>
                    </li>
                    <li id="repeater"><a href="<?php echo URL; ?>repeater">Repeater</a></li>
                    <li id="viewer"><a href="<?php echo URL; ?>viewer">Viewer</a></li>
                    <li id="roster"><a href="<?php echo URL; ?>roster">Roster</a></li>
                    <li class="dropdown" id="general">
                        <a id="genLink" class="dropdown-toggle" data-toggle="dropdown" href="#">Amendment<span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="<?php echo URL; ?>leave" >Leave</a></li>
                            <li><a href="<?php echo URL; ?>exchange">Duty Exchange</a></li>                     
                        </ul>
                    </li>
                              <!--<li id="login"><a href="<?php echo URL; ?>dashboard">Dashboard</a></li>-->
                    <?php if (Session::get('role') == 'admin'): ?>
                        <li id="vehicle"><a href="<?php echo URL; ?>vehicle">Vehicle Reservation</a></li>
        <!--                        <li id=""><a href="<?php echo URL; ?>report">Reports</a></li>-->
                        <li id="reports" class="dropdown" >
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#">Reports<span class="caret "></span></a>
                            <ul class="dropdown-menu">
                                <li class="dropdown"><a href="<?php echo URL ?>report/noticeReport">Staff Notice Report</a></li>
                                <li class="dropdown"><a href="<?php echo URL ?>report/dieselReport">Diesel Supplying Report</a></li>
                                <li class="dropdown"><a href="<?php echo URL ?>report/dieselConsumReport">Diesel Consumption Report</a> </li>
                                <li class="dropdown"><a href="<?php echo URL ?>report/runningReport">Running Hours Report</a></li>
                                <li class="dropdown"><a href="<?php echo URL ?>report/eventReport">Equipment Events Report</a></li>
                                <li class="dropdown"><a href="<?php echo URL ?>report/mtceReport">Scheduled Maintenance Report</a></li>
                                <li class="dropdown"><a href="<?php echo URL ?>report/repeaterReport">Microwave Repeating Report</a></li>
                                <li class="dropdown"><a href="<?php echo URL ?>report/leaveReport">Leave Summery Report</a></li>
                            </ul>
                        </li>
                        <li id="login"><a href="<?php echo URL; ?>user">User</a></li>
                    <?php endif; ?>
                <?php endif; ?>
            </ul>
        </div> <!--end for header navigation div-->
        <!--------------------alerts--------------------->
        <div class="noPrint col-lg-12"  style="float: right">
            <?php
            if (isset($_GET['success'])) {//success alert
                echo '<div id="success" class="alert alert-success ">'
                . '<span class="glyphicon glyphicon-ok"></span><strong> Congratulation!</strong> Successfully done.'
                . '</div>';
            }
            ?>  
            <?php
            if (isset($_GET['noAccess'])) {//warning alert for no access
                echo '<div id="noAccess" class="alert alert-warning">'
                . '<span class="glyphicon glyphicon-info-sign"></span><strong> Warning! </strong> You need to login as Admin or record initiated User.'
                . '</div>';
            }
            ?>  
            <?php
            if (isset($_GET['error'])) {//warning alert for error
                echo '<div id="error" class="alert alert-warning">'
                . '<span class="glyphicon glyphicon-info-sign"></span><strong> Warning! <?strong>Please check your information and try again.'
                . '</div>';
            }
            ?>  
        </div>

