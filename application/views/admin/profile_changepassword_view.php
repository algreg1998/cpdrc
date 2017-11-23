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
                    Change Password
                </div>
                <div class="panel-body">
                    <?php echo form_open(current_url_full(), 'class="form-horizontal"'); ?>
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
                    <div class="form-group">
                            <label for="" class="col-sm-3 control-label">Current Password</label>
                            <div class="col-sm-7">
                                <?php echo form_password('current_password', set_value('current_password') ? set_value('current_password') : '','id="current_password" class="form-control"'); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="" class="col-sm-3 control-label">New Password</label>
                            <div class="col-sm-7">
                                <?php echo form_password('new_password', set_value('new_password') ? set_value('new_password') : '','id="new_password" class="form-control"'); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="" class="col-sm-3 control-label">Confirm New Password</label>
                            <div class="col-sm-7">
                                <?php echo form_password('confirm_new_password', set_value('confirm_new_password') ? set_value('confirm_new_password') : '','id="confirm_new_password" class="form-control"'); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-7">
                                <button type="submit" class="btn btn-default">Change</button>
                            </div>
                        </div>
                    <?php echo form_close(); ?>
                </div>
            </div>
        </div>
    </div>
</div>