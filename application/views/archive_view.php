<div id="page-wrapper">

    <div class="row">
        <div class="col-lg-12">
            <h3 class="page-header">Archive
            </h3>
        </div>
    </div>
   
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-yellow">
                <div class="panel-heading">
                    Manage
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
                        <table class="table table-striped table-bordered table-hover datatable" id="table-archive">
                            <thead>
                                <tr>
                                    <th>Case Number</th>
                                    <th>Violation</th>
                                    <th>Description</th>
                                    <th>Level</th>
                                    <th>RA</th>
                                    <th>Reasons</th>
                                    <th style="width: 40px;"></th>
                                </tr>
                            </thead>
                            <tbody class="text-center">
                                <?php foreach ($archive_cases as $case): ?>
                                    <tr class="odd gradeX">
                                        <td><?php echo $case->case_no ?></td>
                                        <td><?php echo $case->name ?></td>
                                        <td><?php echo $case->description ?></td>
                                        <td><?php echo $case->level ?></td>
                                        <td><?php echo $case->RepublicAct ?></td>
                                        <td><?php echo $case->case_reasons ?></td>
                                        <td class="text-center" ><a class="btnRestore" data-item="<?php echo $case->case_no ?>" data-type="" title="Restore" href="<?php echo base_url('manage/restorearchive/'.$case->case_id) ?>"><i class="fa fa-refresh"></i></a></td>
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