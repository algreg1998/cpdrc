<div id="page-wrapper">

    <div class="row">
        <div class="col-lg-12">
            <h3 class="page-header">Manage Courts
            </h3>
        </div>
    </div>
   
    <div class="row">
        <div class="col-lg-12">
            <div style="margin-bottom: 10px">
                <a class="btn btn-default" href="<?php echo base_url('manage/addcourt');?>"><i class="fa fa-plus"></i> Add Court</a>
            </div>
            <div class="panel panel-green">
                
                <div class="panel-heading">
                    Courts
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
                        <table class="table table-striped table-bordered table-hover datatable" >
                            <thead>
                                <tr>
                                    <th style="">Court Id</th>
                                    <th style="">Court Name, Municipality</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody class="text-center">
                                <?php foreach ($courts as $court): ?>
                                   <tr class="odd gradeX">
                                        <td><?php echo $court->court_id ?></td>
                                        <td><?php echo $court->court_name ?></td>
                                        <td>
                                            <a data-type="edit" data-item="Court: <?php echo $court->court_name ?>" href="<?php echo base_url('manage/editcourt/'.$court->court_id) ?>"  class="generalAlertify"><button class="btn btn-warning"><i class="fa fa-edit"></i> Edit</button></a>
                                            <a data-type="delete" data-item="Court: <?php echo $court->court_name ?>" class="generalAlertify" href="<?php echo base_url('manage/deletecourt/'.$court->court_id) ?>" ><button class="btn btn-danger"><i class="fa fa-trash"></i> Delete</button></a>
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