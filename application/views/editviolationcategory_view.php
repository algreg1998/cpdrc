<div id="page-wrapper">

    <div class="row">
        <div class="col-lg-12">
            <h3 class="page-header">Manage
            </h3>
        </div>
    </div>
   
    <div class="row">
        <div class="col-lg-12">
            <div style="margin-bottom: 10px">
                <a class="btn btn-default" href="<?php echo base_url('manage/addviolation') ?>"><i class="fa fa-arrow-left"></i> Back</a>
            </div>
            <div class="panel panel-green">
                
                <div class="panel-heading">
                    Edit Violations
                </div>
                <div class="panel-body">
                    <div class="dataTable_wrapper table-responsive">
                        <div class="col-lg-12">
                            <?php echo form_open(current_url_full(), 'class="form-horizontal" style="margin-top: 30px;"'); ?>
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
                                    <label for="name" class="col-sm-2 control-label">Name</label>
                                    <div class="col-lg-7">
                                        <?php echo form_input('name', set_value('name') ? set_value('name') : $violation_info->name, 'id="name" class="form-control" required'); ?>
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <label for="description" class="col-sm-2 control-label">Description</label>
                                    <div class="col-lg-7">
                                        <?php echo form_textarea('description', set_value('description') ? set_value('description') : $violation_info->description, 'id="description" class="form-control" required style="height: 100px"'); ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-offset-2 col-lg-7">
                                        <button id="btnSave" type="submit" class="btn btn-default">Update</button>
                                    </div>
                                </div>
                            <?php echo form_close() ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>