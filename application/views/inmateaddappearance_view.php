<div id="page-wrapper">

    <div class="row">
        <div class="col-lg-12">
            <h3 class="page-header">Inmates
            </h3>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-yellow">
                <div class="panel-heading">
                    PROFILE
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-3 ">
                            <img class="thumbnail" src="<?php echo images_url('192x192.jpg') ?>" alt="" width="192">
                        </div>


                        <div class="col-lg-9">
                           <div class="form-horizontal">
                                <div class="form-group">
                                    <label class="col-lg-3 control-label" style="font-size: 16px">Inmate ID :</label>
                                    <div class="col-sm-9" style="margin-top: 7px; font-size: 16px">
                                        <?php echo $inmate_info->inmate_id ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-lg-3 control-label" style="font-size: 16px">Inmate Name :</label>
                                    <div class="col-sm-9" style="margin-top: 7px; font-size: 16px">
                                        <?php echo $inmate_info->inmate_lname.', '.$inmate_info->inmate_fname.' '.$inmate_info->inmate_mi ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-lg-3 control-label" style="font-size: 16px">Start Date :</label>
                                    <div class="col-sm-9" style="margin-top: 7px; font-size: 16px">
                                        <?php 
                                            if ($inmate_info->inmate_type == 'Detainee') {
                                                echo ($reason_info->start_date == NULL) ? "N/A" : mdate("%M %d, %Y",strtotime($inmate_info->date_detained));
                                            }elseif ($inmate_info->inmate_type == 'Probation') {
                                                echo ($reason_info->start_date == NULL) ? "N/A" : mdate("%M %d, %Y",strtotime($inmate_info->date_probation));
                                            }elseif ($inmate_info->inmate_type == 'Convict') {
                                                echo ($reason_info->start_date == NULL) ? "N/A" : mdate("%M %d, %Y",strtotime($inmate_info->date_convicted));
                                            }
                                        ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-lg-3 control-label" style="font-size: 16px">Estimated Release Date :</label>
                                    <div class="col-sm-9" style="margin-top: 7px; font-size: 16px">
                                        <?php echo ($reason_info->release_date == NULL) ? "N/A" : mdate("%M %d, %Y",strtotime($reason_info->release_date)) ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div style="margin-top: 20px;">
                        <div role="tabpanel">
                            <ul class="nav nav-tabs" role="tablist">
                                <li><a href="<?php echo base_url('inmate/personal/'.$inmate_info->inmate_id) ?>">Personal Details</a></li>
                                <li><a href="<?php echo base_url('inmate/cases/'.$inmate_info->inmate_id) ?>">Case</a></li>
                                <li class="active"><a href="#">Appearances</a></li>
                            </ul>
                            <div class="tab-content">
                                <div id="info_content" role="tabpanel" class="tab-pane active">
                                    <div class="col-lg-12 text-left" style="margin-top: 30px;">
                                        <a href="<?php echo base_url('inmate/appearances/'.$reason_info->id) ?>" class="btn btn-default"><i class="fa fa-calendar"></i> View All Schedules</a>
                                    </div>
                                    <div class="col-lg-12">

                                        <?php echo form_open(current_url_full(), 'id="addAppearanceForm" class="form-horizontal" style="margin-top: 30px;"'); ?>
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
                                                <label for="schedule" class="col-sm-2 control-label">Schedule</label>
                                                <div class="col-lg-7">
                                                    <?php echo form_input('schedule', set_value('schedule') ? set_value('schedule') : '', 'id="schedule" class="form-control" required'); ?>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="status" class="col-sm-2 control-label">Status</label>
                                                <div class="col-lg-7">
                                                    <?php $statuses = array(
                                                                        'Pending' => 'Pending') ?>
                                                    <?php echo form_dropdown('status',$statuses, set_value('status') ? set_value('status') : '', 'id="status" class="form-control"'); ?>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="place" class="col-sm-2 control-label">Court</label>
                                                <div class="col-lg-7">
                                                <?php $c = array();
                                                    foreach ($courts as $court) {
                                                         $data =  array($court->court_name => $court->court_name );
                                                         $c = array_merge($c,$data);
                                                     } 
                                                    
                                                            ?>
                                                    <?php echo form_dropdown('place',$c, set_value('place') ? set_value('place') : '', 'id="place" class="form-control"'); ?>

                                                    <!-- <?php echo form_input('place', set_value('place') ? set_value('place') : '', 'id="place" class="form-control" required'); ?> -->
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="ac1" class="col-sm-2 control-label">Assisted Court</label>
                                                <div class="col-lg-7">
                                                <?php
                                                 $c = array();
                                                    foreach ($courts as $court) {
                                                         $data =  array($court->court_name => $court->court_name );
                                                         $c = array_merge($c,$data);
                                                     } 
                                                    
                                                            ?>
                                                    <?php echo form_dropdown('ac1',$c,'', 'id="ac1" class="form-control"'); ?>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="ac2" class="col-sm-2 control-label">Assisting Court</label>
                                                <div class="col-lg-7">
                                                <?php $c = array();
                                                $data =  array("default" => "Choose court" );
                                                 $c = array_merge($c,$data);
                                                    foreach ($courts as $court) {
                                                         $data =  array($court->court_name => $court->court_name );
                                                         $c = array_merge($c,$data);
                                                     } 
                                                    
                                                            ?>
                                                    <?php echo form_dropdown('ac2',$c, set_value('ac2') ? set_value('ac2') : '', 'id="ac2" class="form-control"'); ?>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="judge" class="col-sm-2 control-label">Handling Judge</label>
                                                <div class="col-lg-7">
                                                    <?php echo form_input('judge', set_value('judge') ? set_value('judge') : (!empty($exists_app) ? $judge : ''), 'id="judge" class="form-control"'); ?>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="lawyers" class="col-sm-2 control-label">Lawyers</label>
                                                <div class="col-lg-7">
                                                    <?php echo form_input('lawyers', set_value('lawyers') ? set_value('lawyers') : (!empty($exists_app) ? $lawyers : ''), 'id="lawyers" class="form-control"'); ?>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="jail_officer" class="col-sm-2 control-label">Assisting Jail Officer</label>
                                                <div class="col-lg-7">
                                                    <?php echo form_input('jail_officer', set_value('jail_officer') ? set_value('jail_officer') : (!empty($exists_app) ? $jail_officer : ''), 'id="jail_officer" class="form-control"'); ?>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="vehicle_n" class="col-sm-2 control-label">Vehicle #</label>
                                                <div class="col-lg-7">
                                                    <?php echo form_input('vehicle_no', set_value('vehicle_no') ? set_value('vehicle_no') : '', 'id="vehicle_n" class="form-control" required'); ?>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="remarks" class="col-sm-2 control-label">Remarks</label>
                                                <div class="col-lg-7">
                                                    <?php echo form_textarea('remarks', set_value('remarks') ? set_value('remarks') : '', 'id="remarks" class="form-control" style="height: 100px;"'); ?>
                                                </div>
                                            </div>
                                            <div id="timeInfo" class="form-group">
                                                <label for="time_departed" class="col-sm-2 control-label">Time Departed</label>
                                                <div class="col-lg-2">
                                                    <?php echo form_input('time_departed', set_value('time_departed') ? set_value('time_departed') : '', 'id="time_departed" class="form-control"'); ?>
                                                </div>
                                            
                                                <label for="time_returned" class="col-sm-2 control-label">Time Returned</label>
                                                <div class="col-lg-2">
                                                    <?php echo form_input('time_returned', set_value('time_returned') ? set_value('time_returned') : '', 'id="time_returned" class="form-control"'); ?>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-sm-offset-2 col-lg-7">
                                                    <button id="btnSave" type="submit" class="btn btn-default">Save</button>
                                                </div>
                                            </div>
                                        <?php echo form_close() ?>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>