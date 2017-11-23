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
                    <div id="profile-info" class="form-horizontal">
                        <div class="form-group">
                            <label for="" class="col-sm-2 control-label"></label>
                            <div class="col-sm-3 thumbnail">
                                <?php if ($profile_info->user_filename == "192x192.jpg"): ?>
                                    <img src="<?php echo base_url('assets/images/default.png') ?>">
                                <?php else: ?>
                                    <img src="<?php echo base_url('uploads/admin/'.$profile_info->user_id.'/'.$profile_info->user_filename) ?>">
                                <?php endif ?>
                                <span id="changepic" ><a href="<?php echo base_url('admin/profile/changepicture') ?>">Change Picture</a></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="" class="col-sm-3 control-label">Full Name</label>
                            <div class="col-sm-7">
                                <span class="form-control">
                                    <?php echo $profile_info->user_fname ?> 
                                    <?php echo $profile_info->user_mi ?> 
                                    <?php echo $profile_info->user_lname ?> 
                                </span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="" class="col-sm-3 control-label">Email</label>
                            <div class="col-sm-7">
                                <span class="form-control">
                                    <?php echo $profile_info->email ?>
                                </span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="" class="col-sm-3 control-label">Username</label>
                            <div class="col-sm-7">
                                <span class="form-control">
                                    <?php echo $profile_info->username ?>
                                </span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="" class="col-sm-3 control-label">Position</label>
                            <div class="col-sm-7">
                                <span class="form-control">
                                    <?php echo $profile_info->type ?> 
                                </span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="" class="col-sm-3 control-label">Status</label>
                            <div class="col-sm-7">
                                <span class="form-control">
                                    <?php echo ucfirst($profile_info->status) ?> 
                                </span>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-10">
                                <a href="<?php echo base_url('admin/profile/edit') ?>" class="btn btn-default">Edit</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    $(function(){
        $(".thumbnail").mouseover(function(){
            $("#changepic").show()
        });
        $(".thumbnail").mouseout(function(){
            $("#changepic").hide()
        });
    })
</script>