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
                            <img class="thumbnail" src="<?php echo inmatephoto_url("inmate/".$inmate_info->filename) ?>" alt="" width="192">
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
                                        <label class="col-lg-3 control-label" style="font-size: 16px">Estimated Release Date:</label>
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

                                        <?php echo form_open(current_url_full(), 'id="caseForm" class="form-horizontal" style="margin-top: 30px;"'); ?>
                                            <?php echo form_hidden('oldtype', $inmate_info->status); ?>
                                            <div class="form-group">
                                                <label for="type" class="col-sm-2 control-label">Type</label>
                                                <div class="col-lg-7">
                                                    <?php
                                                        if ($inmate->inmate_type == 'Pending')
                                                            $type['Pending'] = 'Pending';
                                                        
                                                        $type['Detainee']= 'Detainee';
                                                        $type['Convict']= 'Convict';
                                                        $type['Probation']= 'Probation';

                                                        if ($inmate->inmate_type == 'Convict') {
                                                            $type = array();
                                                            $type['Convict']= 'Convict';
                                                        }

                                                        if ($inmate->inmate_type == 'Probation') {
                                                            $type = array();
                                                            $type['Probation']= 'Probation';
                                                            $type['Convict']= 'Convict';
                                                        }

                                                        echo form_dropdown('type', $type, set_value('type') ? set_value('type') : ($inmate->inmate_type == NULL ? "" : $inmate->inmate_type),'id="type" class="form-control"');
                                                    ?>
                                                </div>
                                            </div>
                                            <?php if ($inmate_info->status !== 'Pending'): ?>
                                                <div id="allCasesWrapper" class="form-group">
                                                    <label class="col-sm-2 control-label">Case</label>
                                                    <div class="col-lg-7">
                                                        <table class="table table-striped table-bordered table-hover" style="margin-bottom:0">
                                                            <thead>
                                                                <tr>
                                                                    <th>Case No</th>
<!--                                                                    <th>RA</th>-->
                                                                    <th>Violation</th>
<!--                                                                    <th>Level</th>-->
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr>
                                                                    <?php if (empty($cases)): ?>
                                                                         <td colspan="4" class="text-center">-- No Case --</td>
                                                                    <?php else: ?>
                                                                        <?php foreach ($cases as $case): ?>
                                                                            <tr>
                                                                                <td style="width: 150px"><?php echo $case->case_no ?></td>
<!--                                                                                <td>--><?php //echo $case->RepublicAct ?><!--</td>-->
                                                                                <td><?php echo $case->name ?></td>
<!--                                                                                <td>--><?php //echo $case->level ?><!--</td>-->
                                                                            </tr>
                                                                        <?php endforeach; ?>
                                                                    <?php endif ?>
                                                                   
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                        <div class="col-lg-12" style="font-style: italic; margin-top: 5px; text-align: right; padding: 0px;">
                                                            click <a href="<?php echo base_url('inmate/managecases/'.$reason_info->id) ?>">here</a> to manage case
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php endif ?>
                                            <div class="form-group">
                                                <label for="start_date" class="col-sm-2 control-label">Start Date</label>
                                                <div class="input-group date col-lg-7 start_date" style="padding: 0 15px">
                                                <?php
                                                    $s_date = NULL;
                                                    if ($inmate_info->status == 'Detainee') {
                                                        $s_date = $inmate_info->date_detained;
                                                    }elseif ($inmate_info->status == 'Probation') {
                                                        $s_date = $inmate_info->date_probation;
                                                    }elseif ($inmate_info->status == 'Convict') {
                                                        $s_date = $inmate_info->date_convicted;
                                                    }
                                                    //echo $s_date;
                                                ?>
                                                    <?php echo form_input('start_date', set_value('start_date') ? set_value('start_date') : $s_date != NULL ? mdate("%m/%d/%Y",strtotime($s_date)) : '', 'id="start_date" class="form-control" required'); ?>
                                                    <span class="input-group-addon">
                                                        <span class="glyphicon glyphicon-calendar"></span>
                                                    </span>
                                                </div>
                                            </div>


                                            <div id="periodofstay_wrapper" class="form-group">
                                                <label for="period_stay" class="col-sm-2 control-label">Period of Stay</label>
                                                <div class="col-lg-3">
                                                    <?php
                                                        $max_pen = array();
                                                        $ps_years = "";
                                                        $ps_months = "";
                                                        $ps_days = "";

                                                    ?>
                                                    <?php if (intval($reason_info->number_of_years) > 0): ?>
                                                        <?php $ps_years = $reason_info->number_of_years; ?>
                                                    <?php endif ?>
                                                    <?php if (intval($reason_info->number_of_months) > 0): ?>
                                                        <?php $ps_months = $reason_info->number_of_months?>
                                                    <?php endif ?>
                                                    <?php if (intval($reason_info->number_of_days) > 0): ?>
                                                        <?php $ps_days = $reason_info->number_of_days?>
                                                    <?php endif ?>
                                                    <?php $mp = implode(", ", $max_pen) ?>

                                                    <?php echo form_input('ps_years', set_value('ps_years') ? set_value('ps_years') : $ps_years, 'id="ps_years" class="form-control" placeholder="Year(s)"'); ?>
                                                    <?php echo form_input('ps_months', set_value('ps_months') ? set_value('ps_months') : $ps_months, 'id="ps_months" class="form-control" placeholder="Month(s)"'); ?>
                                                    <?php echo form_input('ps_days', set_value('ps_days') ? set_value('ps_days') : $ps_days, 'id="ps_days" class="form-control" placeholder="Day(s)"'); ?>
                                                </div>
                                                <div class="col-lg-4">
                                                    <?php echo form_input('worst_case', set_value('worst_case') ? set_value('worst_case') : $max_vio_name, 'id="worst_case" class="form-control" readonly="readonly"'); ?>
                                                </div>

                                            </div>

                                            <div id="court_order_number_wrap" class="form-group">
                                                <label for="court_order_number" class="col-sm-2 control-label">Court Decison #</label>
                                                <div class="col-lg-3" style="padding: 0 15px">
                                                    <input type="text" name="court_order_number" id="courtOrder_number" class="form-control">
                                                    
                                                </div>
                                            </div>

                                            <!-- <div id="releasedate_wrapper" class="form-group hidden">
                                                <label for="period_stay" class="col-sm-2 control-label">Release Date</label>
                                                <div class="col-lg-7">
                                                <?php echo form_input('release_date', set_value('release_date') ? set_value('release_date') : '', 'id="release_date" class="form-control"'); ?>
                                                </div>
                                            </div> -->
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