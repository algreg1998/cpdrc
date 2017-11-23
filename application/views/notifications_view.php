<div id="page-wrapper" class="notificationsWrapper">

    <div class="row">
        <div class="col-lg-12">
            <h3 class="page-header">Notification
            </h3>
        </div>
    </div>
   
    <div class="row">
        <div class="col-lg-12">
            <div class="panel-group" id="Accord1" role="tablist" aria-multiselectable="true" style="margin-top: 20px;">
                <div class="panel panel-info">
                    <div class="panel-heading" role="tab" id="headingOne">
                        <h3 class="panel-title">
                            <a class="collapsed accordion-toggle" data-toggle="collapse" data-parent="#Accord1" href="#acc1" aria-expanded="true" aria-controls="collapseOne">
                                Releases (convict(s) for the month of <?php echo $current_month_f ?>)
                            </a>
                            <?php if ($release_inmatesCount > 0): ?>
                                <label class="badge alert-warning pull-right" style="margin-right: 10px"><?php echo $release_inmatesCount ?></label>
                            <?php endif ?>
                        </h3>
                    </div>
                    <div id="acc1" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
                        <div class="panel-body">
                            <div class="dataTable_wrapper table-responsive">
                                <table class="table table-bordered" id="table-releases" style="margin-bottom:0px">
                                    <thead>
                                        <tr>
                                            <th class="text-center" style="width: 110px;">Prisoner ID</th>
                                            <th>Name</th>
                                            <th style="width: 220px;">Date of Release</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($release_inmates as $release): ?>
                                            <tr class="odd gradeX <?php echo intval($release->iis_read) == 1 ? 'read' : 'unread' ?>" data-href="<?php echo base_url('inmate/personal/'.$release->inmate_id . ( intval($release->iis_read) == 1 ? '' : '?is_read=1' ) ) ?>">
                                                <td class="text-center"><?php echo $release->inmate_id ?></td>
                                                <td><?php echo $release->inmate_fname.' '.$release->inmate_mi.' '.$release->inmate_lname ?></td>
                                                <td><?php echo mdate("%M %d, %Y",strtotime($release->release_date)) ?></td>
                                            </tr>
                                        <?php endforeach ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="panel-group" id="Accord2" role="tablist" aria-multiselectable="true" style="margin-top: 20px;">
                <div class="panel panel-success">
                    <div class="panel-heading" role="tab" id="headingOne">
                        <h3 class="panel-title">
                            <a class="collapsed accordion-toggle" data-toggle="collapse" data-parent="#Accord2" href="#acc2" aria-expanded="true" aria-controls="collapseOne">
                                Schedule for Appearances (for the month of <?php echo $current_month_f ?>)
                            </a>
                            <?php if ($appearancesCount > 0): ?>
                                <label class="badge alert-info pull-right" style="margin-right: 10px"><?php echo $appearancesCount ?></label>
                            <?php endif ?>
                        </h3>
                    </div>
                    <div id="acc2" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
                        <div class="panel-body">
                            <div class="dataTable_wrapper table-responsive">
                                <table class="table table-bordered" id="table-schedule" style="margin-bottom:0px">
                                    <thead>
                                        <tr>
                                            <th class="text-center" style="width: 110px;">Prisoner ID</th>
                                            <th>Name</th>
                                            <th style="width: 220px;">Date of Appearance</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($appearances as $appearance): ?>
                                            <tr class="odd gradeX <?php echo intval($appearance->ais_read) == 1 ? 'read' : 'unread' ?>" data-href="<?php echo base_url('inmate/schedule/'.$appearance->schedule_id . ( intval($appearance->ais_read) == 1 ? '' : '?is_read=1' ) ) ?>">
                                                <td class="text-center"><?php echo $appearance->inmate_id ?></td>
                                                <td><?php echo $appearance->inmate_fname .' '. $appearance->inmate_mi .' ' . $appearance->inmate_lname ?></td>
                                                <td><?php echo mdate("%M %d, %Y @ %h:%i:%s %A",strtotime($appearance->date)) ?></td>
                                            </tr>
                                        <?php endforeach ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="panel-group" id="Accord3" role="tablist" aria-multiselectable="true" style="margin-top: 20px;">
                <div class="panel panel-danger">
                    <div class="panel-heading" role="tab" id="headingOne">
                        <h3 class="panel-title">
                            <a class="collapsed accordion-toggle" data-toggle="collapse" data-parent="#Accord3" href="#acc3" aria-expanded="true" aria-controls="collapseOne">
                                Near End of Stay (detainees &amp; probation for the month of <?php echo $current_month_f ?>)
                            </a>
                            <?php if ($nearendstayCount > 0): ?>
                                <label class="badge alert-primary pull-right" style="margin-right: 10px"><?php echo $nearendstayCount ?></label>
                            <?php endif ?>
                        </h3>
                    </div>
                    <div id="acc3" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
                        <div class="panel-body">
                            <div class="dataTable_wrapper table-responsive">
                                <table class="table table-bordered" id="table-releases" style="margin-bottom:0px">
                                    <thead>
                                        <tr>
                                            <th class="text-center" style="width: 110px;">Prisoner ID</th>
                                            <th>Name</th>
                                            <th>Status</th>
                                            <th style="width: 220px;">Date of Release</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($nearendstay as $nes): ?>
                                            <tr class="odd gradeX <?php echo intval($nes->iis_read) == 3 ? 'read' : 'unread' ?> " data-href="<?php echo base_url('inmate/personal/'.$nes->inmate_id . ( intval($nes->iis_read) == 3 ? '' : '?is_read=3' ) ) ?>">
                                                <td class="text-center"><?php echo $nes->inmate_id ?></td>
                                                <td><?php echo $nes->inmate_fname . ' ' . $nes->inmate_mi . ' ' . $nes->inmate_lname ?></td>
                                                <td style="width: 150px;"><?php echo $nes->type ?></td>
                                                <td><?php echo mdate("%M %d, %Y",strtotime($nes->release_date)) ?></td>
                                            </tr>
                                        <?php endforeach ?>
                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="panel-group" id="Accord4" role="tablist" aria-multiselectable="true" style="margin-top: 20px;">
                <div class="panel panel-warning">
                    <div class="panel-heading" role="tab" id="headingOne">
                        <h3 class="panel-title">
                            <a class="collapsed accordion-toggle" data-toggle="collapse" data-parent="#Accord4" href="#acc4" aria-expanded="true" aria-controls="collapseOne">
                                Overstaying (detainees &amp; probation)
                            </a>
                            <?php if ($overstayingCount > 0): ?>
                        <label class="badge alert-danger pull-right" style="margin-right: 10px"><?php echo $overstayingCount ?></label>
                    <?php endif ?>
                        </h3>
                    </div>
                    <div id="acc4" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
                        <div class="panel-body">
                            <div class="dataTable_wrapper table-responsive">
                                <table class="table table-bordered" id="table-releases" style="margin-bottom:0px">
                                    <thead>
                                        <tr>
                                            <th class="text-center" style="width: 110px;">Prisoner ID</th>
                                            <th>Name</th>
                                            <th style="width: 150px;">Status</th>
                                            <th style="width: 220px;">Overstayed Days</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($overstaying as $os): ?>
                                            <tr class="odd gradeX <?php echo intval($os->iis_read) == 5 ? 'read' : 'unread' ?>" data-href="<?php echo base_url('inmate/personal/'.$os->inmate_id . ( intval($os->iis_read) == 5 ? '' : '?is_read=5' )) ?>">
                                                <td class="text-center"><?php echo $os->inmate_id ?></td>
                                                <td><?php echo $os->inmate_fname . ' ' . $os->inmate_mi . ' ' . $os->inmate_lname ?></td>
                                                <td><?php echo $os->type ?></td>
                                                <td><?php echo $os->overstayingday > 1 ? $os->overstayingday .' days' : $os->overstayingday .' day' ?></td>
                                            </tr>
                                        <?php endforeach ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="panel-group" id="Accord5" role="tablist" aria-multiselectable="true" style="margin-top: 20px;">
                <div class="panel panel-default">
                    <div class="panel-heading" role="tab" id="headingOne">
                        <h3 class="panel-title">
                            <a class="collapsed accordion-toggle" data-toggle="collapse" data-parent="#Accord5" href="#acc5" aria-expanded="true" aria-controls="collapseOne">
                                Edit Request 
                            </a>
                            <?php if ($editRequestCount > 0): ?>
                        <label class="badge alert-danger pull-right" style="margin-right: 10px"><?php echo $editRequestCount ?></label>
                    <?php endif ?>
                        </h3>
                    </div>
                    <div id="acc5" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
                        <div class="panel-body">
                            <div class="dataTable_wrapper table-responsive">
                                <table class="table table-bordered" id="table-releases" style="margin-bottom:0px">
                                    <thead>
                                        <tr>
                                            <th class="text-center" style="width: 110px;">Prisoner ID</th>
                                            <th>Name</th>
                                            <th style="width: 150px;">Reason</th>
                                            <th style="width: 150px;">Judged By</th>
                                            <th style="width: 150px;">Judged On</th>
                                            <th style="width: 220px;">Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($editRequest as $er): ?>
                                            <tr data-href="<?php echo base_url('inmate/personal/'.$er->inmate_id); ?>">
                                                <td class="text-center"><?php echo $er->inmate_id ?></td>
                                                <td><?php echo $er->inmateName?></td>
                                                <td><?php echo $er->reason; ?></td>
                                                <td><?php echo $er->judgedByName; ?></td>
                                                <td><?php echo $er->judgedOn; ?></td>
                                                <td>
                                                    <?php if($er->status =="approved"){?>
                                                        <label class="label label-success" style="font-size: 100%;"><?php echo ucwords($er->status); ?></label>
                                                    <?php }?>
                                                    <?php if($er->status =="pending"){?>
                                                        <label class="label label-default" style="font-size: 100%;"><?php echo ucwords($er->status); ?></label>
                                                    <?php }?>
                                                    <?php if($er->status =="rejected"){?>
                                                        <label class="label label-danger" style="font-size: 100%;"><?php echo ucwords($er->status); ?></label>
                                                    <?php }?>
                                                    <?php if($er->status =="finished"){?>
                                                        <label class="label label-primary" style="font-size: 100%;"><?php echo ucwords($er->status); ?></label>
                                                    <?php }?>
                                                </td>
                                            </tr>
                                        <?php endforeach ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>