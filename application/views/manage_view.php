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
                <a class="btn btn-default" href="<?php echo base_url('manage/addviolation') ?>"><i class="fa fa-plus"></i> Add Violation</a>
            </div>
            <div class="panel panel-green">
                
                <div class="panel-heading">
                    Violations
                </div>
                <div class="panel-body">
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
                    <div class="dataTable_wrapper table-responsive">
                        <table class="table table-striped table-bordered table-hover" id="table-releases">
                            <thead>
                                <tr>
                                    <th style="">Violation Name</th>
                                    <th style="">Description</th>
                                    <th style="">Republic Act</th>
                                    <th style="">Lvl</th>
                                    <th style="">Min Penalty</th>
                                    <th style="">Max Penalty</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($violations as $violation): ?>
                                   <tr class="odd gradeX">
                                        <td><?php echo $violation->name ?></td>
                                        <td><?php echo $violation->description ?></td>
                                        <td><?php echo $violation->RepublicAct ?></td>
                                        <td><?php echo $violation->level ?></td>
                                        <td>
                                            <?php $min_pen = array(); ?>
                                            <?php if (intval($violation->min_year) > 0): ?>
                                                <?php $min_pen[] = $violation->min_year == 1 ? $violation->min_year . ' year ' : $violation->min_year . ' years' ?>
                                            <?php endif ?>
                                            <?php if (intval($violation->min_month) > 0): ?>
                                                <?php $min_pen[] = $violation->min_month == 1 ? $violation->min_month . ' month ' : $violation->min_month . ' months' ?>
                                            <?php endif ?>
                                            <?php if (intval($violation->min_day) > 0): ?>
                                                <?php $min_pen[] = $violation->min_day == 1 ? $violation->min_day . ' day ' : $violation->min_day . ' days' ?>
                                            <?php endif ?>
                                            <?php echo implode(", ", $min_pen) ?>
                                        </td>
                                        <td>
                                            <?php $max_pen = array(); ?>
                                            <?php if (intval($violation->max_year) > 0): ?>
                                                <?php $max_pen[] = $violation->max_year == 1 ? $violation->max_year . ' year ' : $violation->max_year . ' years' ?>
                                            <?php endif ?>
                                            <?php if (intval($violation->max_month) > 0): ?>
                                                <?php $max_pen[] = $violation->max_month == 1 ? $violation->max_month . ' month ' : $violation->max_month . ' months' ?>
                                            <?php endif ?>
                                            <?php if (intval($violation->max_day) > 0): ?>
                                                <?php $max_pen[] = $violation->max_day == 1 ? $violation->max_day . ' day ' : $violation->max_day . ' days' ?>
                                            <?php endif ?>
                                            <?php echo implode(", ", $max_pen) ?>
                                        </td>
                                        <td style="text-align:center !important">
                                            <!-- <a data-type="" data-item="<?php echo $violation->name ?>" href="<?php echo base_url('manage/editviolation/'.$violation->id) ?>"><i class="fa fa-edit"></i></a> -->
                                            <a data-type="delete" data-item="<?php echo $violation->name ?>" href="<?php echo base_url('manage/deleteviolation/'.$violation->id) ?>" class="generalAlertify"><i class="fa fa-trash"></i></a>
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