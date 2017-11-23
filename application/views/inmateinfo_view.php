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
                                <li class="active"><a href="#profile">Personal Details</a></li>
                                <li><a href="<?php echo base_url('inmate/cases/'.$inmate_info->inmate_id) ?>">Case</a></li>
                                <li><a href="<?php echo base_url('inmate/appearances/'.$reason_info->id) ?>">Appearances</a></li>
                            </ul>
                            <div class="tab-content">
                                <div id="info_content" role="tabpanel" class="tab-pane active">
                                    <div class="col-lg-6">
                                        <div class="form-horizontal" style="margin-top: 20px;">
                                            <div class="form-group">
                                                <label class="col-lg-5 control-label" style="">Inmate ID :</label>
                                                <div class="col-sm-7" style="margin-top: 7px;">
                                                    <?php echo $inmate_info->inmate_id ?>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-lg-5 control-label" style="">Alias :</label>
                                                <div class="col-sm-7" style="margin-top: 7px;">
                                                    <?php echo $inmate_info->inmate_alias?>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-lg-5 control-label" style="">Status :</label>
                                                <div class="col-sm-7" style="margin-top: 7px;">
                                                    <?php echo $inmate_info->status ?>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-lg-5 control-label" style="">Nationality :</label>
                                                <div class="col-sm-7" style="margin-top: 7px;">
                                                    <?php echo $inmate_info->nationality?>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-lg-5 control-label" style="">Civil Status :</label>
                                                <div class="col-sm-7" style="margin-top: 7px;">
                                                    <?php echo $inmate_info->inmate_info_status?>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-lg-5 control-label" style="">Birthday :</label>
                                                <div class="col-sm-7" style="margin-top: 7px;">
                                                    <?php echo date("M d, Y",strtotime($inmate_info->birthdate)) ?>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-lg-5 control-label" style="">Age :</label>
                                                <div class="col-sm-7" style="margin-top: 7px;">
                                                    <?php
                                                        $then_ts = strtotime($inmate_info->birthdate);
                                                        $then_year = date('Y', $then_ts);
                                                        $age = date('Y') - $then_year;
                                                        if(strtotime('+' . $age . ' years', $then_ts) > time()) $age--;
                                                        echo $age.' years old';
                                                    ?>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-lg-5 control-label" style="">Gender :</label>
                                                <div class="col-sm-7" style="margin-top: 7px;">
                                                    <?php echo $inmate_info->gender ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-horizontal" style="margin-top: 20px;">
                                            
                                            <div class="form-group">
                                                <label class="col-lg-5 control-label" style="">Place of Birth :</label>
                                                <div class="col-sm-7" style="margin-top: 7px;">
                                                    <?php echo $inmate_info->born_in ?>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-lg-5 control-label" style="">Home Address :</label>
                                                <div class="col-sm-7" style="margin-top: 7px;">
                                                    <?php echo $inmate_info->home_add ?>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-lg-5 control-label" style="">Province Address :</label>
                                                <div class="col-sm-7" style="margin-top: 7px;">
                                                    <?php echo $inmate_info->province_add ?>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-lg-5 control-label" style="">Occupation :</label>
                                                <div class="col-sm-7" style="margin-top: 7px;">
                                                    <?php echo $inmate_info->occupation ?>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-lg-5 control-label" style="">Father :</label>
                                                <div class="col-sm-7" style="margin-top: 7px;">
                                                    <?php echo $inmate_info->father ?>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-lg-5 control-label" style="">Mother :</label>
                                                <div class="col-sm-7" style="margin-top: 7px;">
                                                    <?php echo $inmate_info->mother ?>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-lg-5 control-label" style="">Relative :</label>
                                                <div class="col-sm-7" style="margin-top: 7px;">
                                                    <?php echo $inmate_info->relative ?>
                                                </div>
                                            </div>
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