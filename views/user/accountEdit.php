<!--for editing confirm dialog-->
<div id="confirmDialog" hidden="" title="Confirmation Required">
    <p>Do you need to update account information?</p>
</div>
<div class="row">
    <div class='col-lg-5'>
    <div class="col-lg-12">
        <legend class="lead">Edit User Account</legend>

    </div>
    <form class="editForm form-horizontal well" id="userForm" method="post" action="<?php echo URL; ?>user/accountEditSave/<?php echo $this->user[0]['serviceNumber']; ?>" >

        <div class="form-group">
            <div class=" col-lg-4">
                <label for="name" class="control-label"><span class="badge">Name</span></label>
            </div>
            <div class="col-lg-8">
                <input type="text" readonly class="form-control" name="name" value="<?php echo $this->user[0]['name']; ?>">
            </div>
        </div>
        <div class="form-group">
            <div class=" col-lg-4">
                <label for="serviceNumber" class="control-label"><span class="badge">Service Number</span></label>
            </div>
            <div class="col-lg-8">
                <input type="text" class="form-control" readonly name="serviceNumber"  value="<?php echo $this->user[0]['serviceNumber']; ?>" style="width: 80px">
            </div>
        </div>
        <!--<div id="passwordDiv">-->
        <div class="form-group">
            <div class=" col-lg-4">
                <label for="newPassword" class="control-label"><span class="badge">Password</span></label>
            </div>
            <div class="col-lg-6">
                <input id="newPassword" type="password" class="form-control" name="newPassword"  placeholder="Add new Password">
            </div>
        </div>
        <div class="form-group">
            <div class=" col-lg-4">
                <label for="confirmPassword" class="control-label"><span class="badge">Confirm Password</span></label>       
            </div>
            <div class="col-lg-6">
                <input id="confirmPassword" type="password" class="form-control" name="confirmPassword"  placeholder="Confirm new Password">
            </div>
        </div>
        <div class="form-group">
            <div class=" col-lg-4">
                <label for="email" class="control-label" ><span class="badge">Email</span></label>   
            </div>
            <div class="col-lg-8">
                <input id="email" type="email" class="form-control" name="email" value="<?php echo $this->user[0]['email']; ?>">
            </div>
        </div>
        <div class="form-group">
            <div class=" col-lg-4">
                <label for="mobile" class="control-label"><span class="badge">Mobile</span></label>
            </div>
            <div class="col-lg-8">
                <input id="mobile" type="tel" class="form-control" name="mobile" value="<?php echo $this->user[0]['mobile']; ?>">
            </div>
        </div>
        <div class="form-group">
            <div class=" col-lg-4">
                <label class="control-label" for="code"><span class="badge">Code Letter</span></label>
            </div>
            <div class="controls text-right col-lg-8">
                <Input type="text" name="code" class="form-control" readonly style="width: 90px" value="<?php echo $this->user[0]['code'] ?>">        
            </div>
        </div>
        <div class="form-group">
            <div class=" col-lg-4">
                <label class="control-label" for="role"><span class="badge">User role</span></label>
            </div>
            <div class="controls text-right col-lg-8">
                <Input type="text" name="role" class="form-control" readonly style="width: 90px" value="<?php echo $this->user[0]['role'] ?>">
            </div>

        </div>
        
        <div class="form-group">
            <label class="control-label col-lg-2"></label>
            <div class="text-right col-lg-12">
                <div id="addUserGroup" class="btn">
                    <button type="button" id="user" class="btn btn-success"   style="width: 100px" >Edit <span class="glyphicon glyphicon-edit"></span></button>
                </div> 
                <a href="javascript:history.go(-1)"><span class="glyphicon glyphicon-backward" ></span>&nbsp;Back&nbsp;<span class="glyphicon glyphicon-backward" ></span></a>
            </div>
        </div>
    </form>
</div>
</div>