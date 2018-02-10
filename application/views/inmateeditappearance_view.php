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
                                        <form class="form-horizontal" style="margin-top: 30px;">
                                            <div class="form-group">
                                                <label for="inputEmail3" class="col-sm-2 control-label">Schedule</label>
                                                <div class="col-lg-7">
                                                    <input type="text" class="form-control" id="inputEmail3">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="inputPassword3" class="col-sm-2 control-label">Status</label>
                                                <div class="col-lg-7">
                                                    <input type="text" class="form-control" id="inputPassword3">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="inputPassword3" class="col-sm-2 control-label">Place</label>
                                                <div class="col-lg-7">
                                                    <input type="text" class="form-control" id="inputPassword3">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="" class="col-sm-2 control-label">Handling Judge</label>
                                                <div class="col-lg-7">
                                                    <input type="text" class="form-control" id="">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="lawyers" class="col-sm-2 control-label">Lawyers</label>
                                                <div class="col-lg-7">
                                                    <?php echo form_input('lawyers', set_value('lawyers') ? set_value('lawyers') : '', 'id="lawyers" class="form-control"'); ?>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="jail_officer" class="col-sm-2 control-label">Assisting Jail Officer</label>
                                                <div class="col-lg-7">
                                                    <?php echo form_input('jail_officer', set_value('jail_officer') ? set_value('jail_officer') : '', 'id="jail_officer" class="form-control"'); ?>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="v" class="col-sm-2 control-label">Vehicle #</label>
                                                <div class="col-lg-7">
                                                    <input type="text" class="form-control" id="v">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="inputPassword3" class="col-sm-2 control-label">Remarks</label>
                                                <div class="col-lg-7">
                                                    <input type="text" class="form-control" id="">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="inputPassword3" class="col-sm-2 control-label">Time Departed</label>
                                                <div class="col-lg-7">
                                                    <input type="text" class="form-control" id="inputPassword3">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="inputPassword3" class="col-sm-2 control-label">Time Returned</label>
                                                <div class="col-lg-7">
                                                    <input type="text" class="form-control" id="inputPassword3">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-sm-offset-2 col-lg-7">
                                                    <button id="btnSave" type="submit" class="btn btn-default">Save</button>
                                                </div>
                                            </div>
                                        </form>
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