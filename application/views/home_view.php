<div id="page-wrapper">

    <div class="row">
        <div class="col-lg-12">
            <h3 class="page-header">Prison Data Year 
            </h3>
        </div>
    </div>
   
    <div class="row">
        <div class="col-lg-5">
            <form id="overview" class="form-horizontal" method="get">
                <div class="form-group">
                    <label for="" class="col-sm-4 col-md-4 control-label">Select a Year</label>
                    <div class="col-sm-3 col-md-4">
                        <?php
                            $current_year = intval(mdate("%Y",now()));
                            $old_year = $current_year - 120;
                            $date_range = array();
                            for ($i=$current_year; $i >= $old_year ; $i--) { 
                                $date_range[$i] = $i;
                            }
                        ?>
                        <?php echo form_dropdown('year', $date_range, isset($_GET['year']) && array_search(intval($_GET['year']), $date_range) ? intval($_GET['year']) : $current_year,'id="selectYear" class="form-control input-md"'); ?>
                    </div>
                    <div class="col-sm-2 col-md-3 ">
                        <button class="btn btn-primary" type="submit">Go</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-6">
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-yellow">
                        <div class="panel-heading">
                            Population
                        </div>
                        <div class="panel-body">
                            <div class="dataTable_wrapper table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="table-population">
                                    <thead>
                                        <tr>
                                            <th>Month</th>
                                            <th>Convict</th>
                                            <th>Detainee</th>
                                            <th>Probation</th>
                                            <th>Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $overall_convict = 0; ?>
                                        <?php $overall_detainee = 0; ?>
                                        <?php $overall_probation = 0; ?>
                                        <?php $overall_total = 0; ?>
                                        <?php foreach ($reports as $month => $report): ?>
                                            <?php if (empty($report)): ?>
                                                <tr class="odd gradeX">
                                                    <td><?php echo $month ?></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                </tr>
                                            <?php else: ?>
                                                
                                                <tr class="odd gradeX">
                                                    
                                                    <td><?php echo $month ?></td>
                                                    <td>
                                                        <?php if (intval($report->convict) !== 0): ?>
                                                            <?php $overall_convict += $report->convict ?>
                                                            <a class="ajax" href="<?php echo base_url('home/getinmates?year='.$selectedYear.'&month='.$report->month.'&status=Convict') ?>"><?php echo intval($report->convict) ?></a>
                                                        <?php endif ?>
                                                    </td>
                                                    <td>
                                                        <?php if (intval($report->detainee) !== 0): ?>
                                                            <?php $overall_detainee += $report->detainee ?>
                                                            <a class="ajax" href="<?php echo base_url('home/getinmates?year='.$selectedYear.'&month='.$report->month.'&status=Detainee') ?>"><?php echo intval($report->detainee) ?></a>
                                                        <?php endif ?>
                                                    </td>
                                                    <td>
                                                        <?php if (intval($report->probation) !== 0): ?>
                                                            <?php $overall_probation += $report->probation ?>
                                                            <a class="ajax" href="<?php echo base_url('home/getinmates?year='.$selectedYear.'&month='.$report->month.'&status=Probation') ?>"><?php echo intval($report->probation) ?></a>
                                                        <?php endif ?>
                                                    </td>
                                                    <td>
                                                        <?php if (intval($report->total) !== 0): ?>
                                                            <?php $overall_total += $report->total ?>
                                                            <a class="ajax" href="<?php echo base_url('home/getinmates?year='.$selectedYear.'&month='.$report->month.'&status=total') ?>"><?php echo intval($report->total) ?></a>
                                                        <?php endif ?>
                                                    </td>
                                                </tr>

                                            <?php endif ?>
                                            
                                        <?php endforeach ?>
                                        <tr>
                                            <td><strong>Total</strong></td>
                                            <td><strong><?php echo $overall_convict ?></strong></td>
                                            <td><strong><?php echo $overall_detainee ?></strong></td>
                                            <td><strong><?php echo $overall_probation ?></strong></td>
                                            <td><strong><?php echo $overall_total ?></strong></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-green">
                        <div class="panel-heading">
                            Crime Index of Inmates
                        </div>
                        <div class="panel-body">
                            <div class="dataTable_wrapper table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="table-crime">
                                    <thead>
                                        <tr>
                                            <th class="text-center">No</th>
                                            <th>Name of Violation</th>
                                            <th>Level</th>
                                            <th class="text-center">Convict</th>
                                            <th class="text-center">Detainee</th>
                                            <th class="text-center">Probation</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $ctr = 1; ?>
                                        <?php if (empty($crimes)): ?>
                                            <tr>
                                                <td class="text-center" colspan="5">-- No Crime Found --</td>
                                            </tr>
                                        <?php endif ?>
                                        <?php foreach ($crimes as $crime): ?>
                                            <tr class="odd gradeX">
                                                <td style="width: 50px; text-align:center"><?php echo $ctr++ ?></td>
                                                <td><?php echo $crime->name ?></td>
                                                <td class="text-center"><?php echo $crime->level ?></td>
                                                <td class="text-center" style="width: 80px">
                                                    <?php if ($crime->convict == 0): ?>
                                                        -
                                                    <?php else: ?>
                                                        <a class="ajax" href="<?php echo base_url('home/getcrimeindex?status=Convict&vid='.$crime->violation_id.'&year='.$selectedYear) ?>"><?php echo $crime->convict == 0 ? '-' : $crime->convict ?></a>
                                                    <?php endif ?>
                                                </td>
                                                <td class="text-center" style="width: 90px">
                                                    <?php if ($crime->detainee == 0): ?>
                                                        -
                                                    <?php else: ?>
                                                        <a class="ajax" href="<?php echo base_url('home/getcrimeindex?status=Detainee&vid='.$crime->violation_id.'&year='.$selectedYear) ?>"><?php echo $crime->detainee == 0 ? '-' : $crime->detainee ?></a>
                                                    <?php endif ?>
                                                </td>
                                                <td class="text-center" style="width: 90px">
                                                    <?php if ($crime->probation == 0): ?>
                                                        -
                                                    <?php else: ?>
                                                        <a class="ajax" href="<?php echo base_url('home/getcrimeindex?status=Probation&vid='.$crime->violation_id.'&year='.$selectedYear) ?>"><?php echo $crime->probation == 0 ? '-' : $crime->probation ?></a>
                                                    <?php endif ?>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>
                       </div>
                </div>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-green">
                        <div class="panel-heading">
                            Current Month Population (<?php echo $current_mon_f ?> <?php echo $current_yr ?>)
                        </div>
                        <div class="panel-body">
                            <div class="dataTable_wrapper table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="table-current-month-population">
                                    <thead>
                                        <tr>
                                            <th>Convict</th>
                                            <th>Detainee</th>
                                            <th>Probation</th>
                                            <th>Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php if (empty($current_month_pop)): ?>
                                            <tr>
                                                <td> </td>
                                                <td> </td>
                                                <td> </td>
                                                <td> </td>
                                            </tr>
                                        <?php else: ?>
                                            <?php $ctr=0 ?>
                                            <?php foreach ($current_month_pop as $data): ?>
                                                <?php if ($current_mon_f == $data->monthname): ?>
                                                    <?php $ctr++ ?>
                                                    <tr class="odd gradeX">
                                                        <td>
                                                            <?php if (intval($data->convict) !== 0): ?>
                                                                <a class="ajax" href="<?php echo base_url('home/getinmates?year='.$current_yr.'&month='.$data->month.'&status=Convict') ?>"><?php echo intval($data->convict) ?></a>
                                                            <?php endif ?>
                                                        </td>
                                                        <td>
                                                            <?php if (intval($data->detainee) !== 0): ?>
                                                                <a class="ajax" href="<?php echo base_url('home/getinmates?year='.$current_yr.'&month='.$data->month.'&status=Detainee') ?>"><?php echo intval($data->detainee) ?></a>
                                                            <?php endif ?>
                                                        </td>
                                                        <td>
                                                            <?php if (intval($data->probation) !== 0): ?>
                                                                <a class="ajax" href="<?php echo base_url('home/getinmates?year='.$current_yr.'&month='.$data->month.'&status=Probation') ?>"><?php echo intval($data->probation) ?></a>
                                                            <?php endif ?>
                                                        </td>
                                                        <td>
                                                            <?php if (intval($data->total) !== 0): ?>
                                                                <a class="ajax" href="<?php echo base_url('home/getinmates?year='.$current_yr.'&month='.$data->month.'&status=total') ?>"><?php echo intval($data->total) ?></a>
                                                            <?php endif ?>
                                                        </td>
                                                    </tr>
                                                <?php endif ?>
                                            <?php endforeach ?>
                                            <?php if ($ctr == 0): ?>
                                                <tr class="odd gradeX">
                                                    <td> </td>
                                                    <td> </td>
                                                    <td> </td>
                                                    <td> </td>
                                                </tr>
                                            <?php endif ?>
                                            
                                        <?php endif ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-green">
                        <div class="panel-heading">
                            Current Month Population Graph (<?php echo $current_mon_f ?> <?php echo $current_yr ?>)
                        </div>
                        <div class="panel-body">
                            <div id="populationgraph"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-green">
                        <div class="panel-heading">
                            Current Month Crime Index Graph
                        </div>
                        <div class="panel-body">
                            <div id="crimegraph"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>