<div id="page-wrapper">

    <div class="row">
        <div class="col-lg-12">
            <h3 class="page-header">Profile
            </h3>
        </div>
    </div>
   
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-yellow">
                <div class="panel-heading">
                    My Profile Information
                </div>
                <div class="panel-body">
                    <?php echo form_open(current_url_full(), 'class="form-horizontal"'); ?>
                        <?php if (validation_errors()): ?>
                            <div class="alert alert-danger">
                                <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
                                <strong>Error!</strong>
                                <?php echo validation_errors(); ?>
                            </div>
                        <?php endif ?>
                        
                        <?php if ($this->session->flashdata('success_msg')): ?>
                            <div class="alert alert-success">
                                <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
                                <strong>Success!</strong>
                                <?php echo $this->session->flashdata('success_msg') ?>
                            </div>
                        <?php endif ?>

                        <?php if ($this->session->flashdata('error_msg')): ?>
                            <div class="alert alert-danger">
                                <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
                                <strong>Error!</strong>
                                <?php echo $this->session->flashdata('error_msg') ?>
                            </div>
                        <?php endif ?>

                        <div class="form-group">
                            <label for="" class="col-sm-3 control-label">First Name</label>
                            <div class="col-sm-7">
                                <?php echo form_input('user_fname', set_value('user_fname') ? set_value('user_fname') : $profile_info->user_fname, 'id="first_name" class="form-control"'); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="" class="col-sm-3 control-label">Middle Name</label>
                            <div class="col-sm-7">
                                <?php echo form_input('user_mi', set_value('user_mi') ? set_value('user_mi') : $profile_info->user_mi, 'id="middle_name" class="form-control"'); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="" class="col-sm-3 control-label">Last Name</label>
                            <div class="col-sm-7">
                                <?php echo form_input('user_lname', set_value('user_lname') ? set_value('user_lname') : $profile_info->user_lname, 'id="last_name" class="form-control"'); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="" class="col-sm-3 control-label">Username</label>
                            <div class="col-sm-7">
                                <?php echo form_input('username', set_value('username') ? set_value('username') : $profile_info->username, 'id="username" class="form-control"'); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="" class="col-sm-3 control-label">Email</label>
                            <div class="col-sm-7">
                                <?php echo form_input('email', set_value('email') ? set_value('email') : $profile_info->email, 'id="email" class="form-control"'); ?>
                            </div>
                        </div>
                        <!-- <div class="form-group">
                            <label for="" class="col-sm-3 control-label">Position</label>
                            <div class="col-sm-7">
                                <?php echo form_input('position', set_value('position') ? set_value('position') : '', 'id="position" class="form-control"'); ?>
                            </div>
                        </div> -->
                        <!-- <div class="form-group">
                            <label for="" class="col-sm-3 control-label">Status</label>
                            <div class="col-sm-7">
                                <?php echo form_input('status', set_value('status') ? set_value('status') : '', 'id="status" class="form-control"'); ?>
                            </div>
                        </div> -->
                        <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-10">
                                <button type="submit" class="btn btn-default">Update</button>
                            </div>
                        </div>
                    <?php echo form_close(); ?>
                </div>
            </div>
        </div>
    </div>
</div>