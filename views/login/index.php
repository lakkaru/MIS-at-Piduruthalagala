<!--for login dialog-->
<div id="loginDialog" hidden title="Login for MIS Piduruthalagala">
    <form action="login/run" method="post" class="loginForm"><!--fires the login ->run() with submit-->
        <div class="form-group">
            <label class="control-label col-lg-7">Service Number</label>
            <div class="col-lg-5">
                <input type="number" name="serviceNumber" class="form-control" /><br/>
            </div>
            <label class="control-label col-lg-7">Password</label>
            <div class="col-lg-5">
                <input type="password" name="password" class="form-control"/><br/>
            </div>
            <?php
        if (Session::get('loggedIn') === FALSE) {
                echo '<p id="mismatch" style="color:red">Service Number and Password not matched.</p>';
        }
        ?>
            <div class="col-lg-5" hidden>
                <input type="submit" id="submitLogin" />
            </div>
        </div>   
    </form>
</div>
<div class='row' style="display:block;height:570px ;background-image: url('<?php echo URL ?>public/images/background.jpg')">
</div>
