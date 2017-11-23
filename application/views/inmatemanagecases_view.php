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
                            <div class="col-lg-12" style="margin: 20px 0 0">
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
                                            
                                                if ($inmate_info->status == 'Detainee') {
                                                    // echo ($reason_info->start_date == NULL) ? "N/A" : mdate("%M %d, %Y",strtotime($inmate_info->date_detained));
                                                    echo "asdasd";
                                                }elseif ($inmate_info->status == 'Probation') {
                                                    echo ($reason_info->start_date == NULL) ? "N/A" : mdate("%M %d, %Y",strtotime($inmate_info->date_probation));
                                                }elseif ($inmate_info->status == 'Convict') {
                                                    echo ($reason_info->start_date == NULL) ? "N/A" : mdate("%M %d, %Y",strtotime($inmate_info->date_convicted));
                                                }
                                            ?>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-lg-3 control-label" style="font-size: 16px">Release Date :</label>
                                        <div class="col-sm-9" style="margin-top: 7px; font-size: 16px">
                                            <?php echo ($reason_info->release_date == NULL) ? "N/A" : mdate("%M %d, %Y",strtotime($reason_info->release_date)) ?>
                                        </div>
                                    </div>
                                </div>
                            </div>  
                        </div>
                    </div>
                    <div style="margin-top: 20px;">
                        <div role="tabpanel">
                            <ul class="nav nav-tabs" role="tablist">
                                <li><a href="<?php echo base_url('inmate/personal/'.$inmate_info->inmate_id) ?>">Personal Details</a></li>
                                <li class="active"><a href="#">Case</a></li>
                                <li><a href="<?php echo base_url('inmate/appearances/'.$reason_info->id) ?>">Appearances</a></li>
                            </ul>
                            <div class="tab-content">
                                <div id="info_content" role="tabpanel" class="tab-pane active">
                                    <div class="">
                                        <div class="row">
                                            <div class="col-lg-12" style="margin: 15px 15px 0">
                                                <a href="<?php echo base_url('inmate/cases/'.$inmate_info->inmate_id) ?>" class="btn btn-default"><i class="fa fa-file"></i> Case info</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-lg-12">
                                            <?php if (validation_errors()): ?>
                                                <div class="alert alert-danger" style="margin-top: 15px;">
                                                    <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
                                                    <?php echo validation_errors(); ?>
                                                </div>
                                            <?php endif ?>
                                            
                                            <?php if ($this->session->flashdata('success_msg')): ?>
                                                <div class="alert alert-success" style="margin-top: 15px;">
                                                    <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
                                                    <?php echo $this->session->flashdata('success_msg') ?>
                                                </div>
                                            <?php endif ?>

                                            <?php if ($this->session->flashdata('error_msg')): ?>
                                                <div class="alert alert-danger" style="margin-top: 15px;">
                                                    <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
                                                    <?php echo $this->session->flashdata('error_msg') ?>
                                                </div>
                                            <?php endif ?>

                                            <?php echo form_open(current_url_full(), 'id="addCase" class="form-horizontal" style="margin-top: 30px;"'); ?>
                                                <div class="form-group">
                                                    <label for="" class="col-sm-2 control-label">Add Case</label>
                                                    <div class="col-lg-3">
                                                        <?php echo form_input('case_no', set_value('case_no') ? set_value('case_no') : '', 'id="case_no" class="form-control" placeholder="Case No." required'); ?>
                                                    </div>
                                                    <div class="col-lg-5">
                                                        <?php echo form_dropdown('violations', $violations, 'default','id="violations" class="form-control"'); ?>
                                                    </div>
                                                    <div class="col-lg-1 text-right">
                                                        <button id="btnSave" class="btn btn-default"><i class="fa fa-save"></i></button>
                                                    </div>
                                                </div>
                                            <?php echo form_close() ?>
                                        
                                            <table class="table table-striped table-bordered table-hover" style="margin-bottom:20px; margin-top:10px">
                                                <thead>
                                                    <tr>
                                                        <th>Case No</th>
                                                        <th>Violation</th>
                                                        <th>Description</th>
                                                        <th>Level</th>
                                                        <th>RA</th>
                                                        <th style="width: 20px;"></th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php foreach ($cases as $case): ?>
                                                        <tr>
                                                            <td style="width: 150px"><?php echo $case->case_no ?></td>
                                                            <td><?php echo $case->name ?></td>
                                                            <td><?php echo $case->description ?></td>
                                                            <td><?php echo $case->level ?></td>
                                                            <td><?php echo $case->RepublicAct ?></td>
                                                            <td><a href="<?php echo base_url('inmate/deletecase/'.$reason_info->id.'?cno='.$case->case_no) ?>" class="delCase" data-type="delete" data-item="Case #<?php echo $case->case_no ?>"><i class="fa fa-trash"></i></a></td>
                                                        </tr>
                                                    <?php endforeach; ?>
                                                </tbody>
                                            </table>
                                        </div>
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