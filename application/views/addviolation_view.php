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
                <a class="btn btn-default" href="<?php echo base_url('manage') ?>"><i class="fa fa-arrow-left"></i> Back</a>
            </div>
            <div class="panel panel-green">
                
                <div class="panel-heading">
                    Add Violation
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

                                <div style='display: none' class="">
                                    <label for="violations_category_id" class="col-sm-2 control-label">Categories</label>
                                    <div class="col-lg-6">
                                        <input type="text" name="violations_category_id" value="0">
                                        <!-- <?php echo form_dropdown('violations_category_id',$categories, set_value('violations_category_id') ? set_value('violations_category_id') : '', 'id="violations_category_id" value='); ?> -->
                                    </div>
                                    <div class="col-lg-1">
                                        <a class="btn btn-default" href="<?php echo base_url('manage/addviolationcategories') ?>"><i class="fa fa-plus"></i></a>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="name" class="col-sm-2 control-label">Name</label>
                                    <div class="col-lg-7">
                                        <?php echo form_input('name', set_value('name') ? set_value('name') : '', 'id="name" class="form-control" required'); ?>
                                    </div>
                                </div>
                                
<!--                                <div class="form-group">-->
<!--                                    <label for="description" class="col-sm-2 control-label">Description</label>-->
<!--                                    <div class="col-lg-7">-->
<!--                                        --><?php //echo form_textarea('description', set_value('description') ? set_value('description') : '', 'id="description" class="form-control" required style="height: 100px"'); ?>
<!--                                    </div>-->
<!--                                </div>-->

                                <div style='display: none' class="form-group">
                                    <label for="level" class="col-sm-2 control-label">Level</label>
                                    <div class="col-lg-7">
                                        <?php $levels = array('1' => '1','2'=>'2','3'=>'3','4'=>'4','5'=>'5','lifetime'=>'lifetime','none'=>'none') ?>
                                        <?php echo form_dropdown('level',$levels, set_value('level') ? set_value('level') : '', 'id="level" class="form-control"'); ?>
                                    </div>
                                </div>

<!--                                <div class="form-group">-->
<!--                                    <label for="RepublicAct" class="col-sm-2 control-label">Republic Act</label>-->
<!--                                    <div class="col-lg-7">-->
<!--                                        --><?php //echo form_input('RepublicAct', set_value('RepublicAct') ? set_value('RepublicAct') : '', 'id="RepublicAct" class="form-control" required'); ?>
<!--                                    </div>-->
<!--                                </div>-->

                                <div id="timeInfo" class="form-group">
                                    <label for="time_departed" class="col-sm-2 control-label">Min Penalty</label>
                                    <div class="col-lg-2">
                                        <?php echo form_input('min_year', set_value('min_year') ? set_value('min_year') : '', 'id="min_year" class="form-control" placeholder="Year"'); ?>
                                    </div>
                                    <div class="col-lg-2">
                                        <?php echo form_input('min_month', set_value('min_month') ? set_value('min_month') : '', 'id="min_month" class="form-control" placeholder="Month"'); ?>
                                    </div>
                                    <div class="col-lg-2">
                                        <?php echo form_input('min_day', set_value('min_day') ? set_value('min_day') : '', 'id="min_day" class="form-control" placeholder="Day"'); ?>
                                    </div>
                                </div>
                                <div id="timeInfo" class="form-group">
                                    <label for="time_departed" class="col-sm-2 control-label">Max Penalty</label>
                                    <div class="col-lg-2">
                                        <?php echo form_input('max_year', set_value('max_year') ? set_value('max_year') : '', 'id="max_year" class="form-control" placeholder="Year"'); ?>
                                    </div>
                                    <div class="col-lg-2">
                                        <?php echo form_input('max_month', set_value('max_month') ? set_value('max_month') : '', 'id="max_month" class="form-control" placeholder="Month"'); ?>
                                    </div>
                                    <div class="col-lg-2">
                                        <?php echo form_input('max_day', set_value('max_day') ? set_value('max_day') : '', 'id="max_day" class="form-control" placeholder="Day"'); ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-offset-2 col-lg-7">
                                        <button id="btnSave" type="submit" class="btn btn-default">Save</button>
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