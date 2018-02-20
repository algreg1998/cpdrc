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
                                        <label class="col-lg-3 control-label" style="font-size: 16px">Estimated Release Date :</label>
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
                                <li><a href="<?php echo base_url('inmate/cases/'.$inmate_info->inmate_id) ?>">Case</a></li>
                                <li class="active"><a href="#">Appearances</a></li>
                            </ul>
                            <div class="tab-content">
                                <div id="info_content" role="tabpanel" class="tab-pane active">
                                    <?php if (!empty($cases)): ?>
                                        <div class="col-lg-12 text-right" style="margin-top: 30px;">
                                            <a href="<?php echo base_url('inmate/addappearance/'.$reason_info->id) ?>" class="btn btn-default"><i class="fa fa-plus"></i> Add Schedule</a>
                                        </div>
                                        <div class="col-lg-12" style="margin: 20px 0;">
                                            <div class="dataTable_wrapper table-responsive">
                                                <table class="table table-striped table-bordered table-hover" id="table-releases">
                                                    <thead>
                                                        <tr>
                                                            <th style="width: 130px;">Schedule</th>
                                                            <th style="width: 130px;">Status</th>
                                                            <th style="width: 180px;">Place</th>
                                                            <th style="width: 100px;">Assisted Court</th>
                                                            <th style="width: 100px;">Assisting Court</th>
                                                            <th style="width: 100px;">Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php foreach ($appearances as $appearance): ?>
                                                           <tr class="odd gradeX">
                                                                <td><?php echo mdate("%F %d, %Y",strtotime($appearance->date)) ?></td>
                                                                <td><?php echo $appearance->status ?></td>
                                                                <td><?php echo $appearance->place ?></td>
                                                                <td><?php echo $appearance->assistedCourt ?></td>
                                                                <td><?php echo $appearance->assistingCourt ?></td>
                                                                <td><a href="<?php echo base_url('inmate/schedule/'.$appearance->id) ?>">View More</a></td>
                                                            </tr> 
                                                        <?php endforeach ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    <?php else: ?>
                                        <div class="col-lg-12" style="margin: 20px 0 0;">
                                            <div class="alert alert-info">
                                                Please add some case first. Click here to view <a href="<?php echo base_url('inmate/cases/'.$inmate_info->inmate_id) ?>">case info</a>.
                                            </div>
                                        </div>
                                    <?php endif ?>
                                    
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