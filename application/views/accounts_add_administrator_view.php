<div id="page-wrapper">

    <div class="row">
        <div class="col-lg-12">
            <h3 class="page-header">Accounts
            </h3>
        </div>
    </div>
   
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <i class="fa fa-plus"></i> NEW
                </div>
                <div class="panel-body">
                    <?php if (validation_errors()): ?>
                        <div class="alert alert-danger">
                            <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
                            <?php echo validation_errors(); ?>
                        </div>
                    <?php endif ?>
                    
                    <?php if ($this->session->flashdata('success_msg')): ?>
                        <div class="alert alert-success">
                            <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
                            <?php echo $this->session->flashdata('success_msg') ?>
                        </div>
                    <?php endif ?>

                    <?php if ($this->session->flashdata('error_msg')): ?>
                        <div class="alert alert-danger">
                            <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
                            <?php echo $this->session->flashdata('error_msg') ?>
                        </div>
                    <?php endif ?>

                    <?php echo form_open(current_url_full(), 'class="form-horizontal"'); ?>
                        <div class="form-group">
                            <label for="first_name" class="col-sm-3 control-label">First Name</label>
                            <div class="col-sm-6">
                                <?php echo form_input('first_name', set_value('first_name') ? set_value('first_name') : '', 'id="first_name" class="form-control" required'); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="middle_name" class="col-sm-3 control-label">Middle Name</label>
                            <div class="col-sm-6">
                                <?php echo form_input('middle_name', set_value('middle_name') ? set_value('middle_name') : '', 'id="middle_name" class="form-control"'); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="last_name" class="col-sm-3 control-label">Last Name</label>
                            <div class="col-sm-6">
                                <?php echo form_input('last_name', set_value('last_name') ? set_value('last_name') : '', 'id="last_name" class="form-control" required'); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="birthday" class="col-sm-3 control-label">Date of Birth</label>
                            <div class="col-sm-6">
                                <?php echo form_input('birthday', set_value('birthday') ? set_value('birthday') : '', 'id="birthday" class="form-control" required'); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="gender" class="col-sm-3 control-label">Gender</label>
                            <div class="col-sm-6">
                                <?php echo form_dropdown('gender', array('Male'=>'Male','Female'=>'Female'), set_value('gender') ? set_value('gender') : 'Male', 'id="gender" class="form-control"'); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="position" class="col-sm-3 control-label">Position</label>
                            <div class="col-sm-6">
                                <?php $positions = array('Position 1'=>'Position 1','Position 2'=>'Position 2') ?>
                                <?php echo form_dropdown('position', $positions, set_value('position') ? set_value('position') : 'Male', 'id="position" class="form-control"'); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="email" class="col-sm-3 control-label">Email Address</label>
                            <div class="col-sm-6">
                                <input type="email" value="<?php echo set_value('email') ? set_value('email') : '' ?>" name="email" class="form-control" id="email" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="username" class="col-sm-3 control-label">Username</label>
                            <div class="col-sm-6">
                                <?php echo form_input('username', set_value('username') ? set_value('username') : '', 'id="username" class="form-control" required'); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-10">
                                <button type="submit" class="btn btn-primary">Submit</button>
                                <input class="btn btn-danger" type="reset" value="Reset" />
                            </div>
                        </div>
                    <?php echo form_close(); ?>
                </div>
            </div>
        </div>
    </div>
</div>