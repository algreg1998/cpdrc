<div id="page-wrapper">

    <div class="row">
        <div class="col-lg-12">
            <h3 class="page-header">Manage cells
            </h3>
        </div>
    </div>
   
    <div class="row">
        <div class="col-lg-12">
            <div style="margin-bottom: 10px">
                <a class="btn btn-default" href="<?php echo base_url('manage/addcell');?>"><i class="fa fa-plus"></i> Add Cell</a>
            </div>
            <div class="panel panel-green">
                
                <div class="panel-heading">
                    Cells
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
<!--                                    <th style="">Cell Id</th>-->
                                    <th style="">Cell Number</th>
                                    <th style="">Capacity</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody class="text-center">
                                <?php foreach ($cells as $cell): ?>
                                   <tr class="odd gradeX">
<!--                                        <td>--><?php //echo $cell->cellId ?><!--</td>-->
                                        <td><?php echo $cell->cellNumber ?></td>
                                        <td><?php echo $cell->capacity ?></td>
                                        <td>
                                            <a data-type="edit" data-item="Cell # <?php echo $cell->cellNumber ?>"  class="generalAlertify" href="<?php echo base_url('manage/editcell/'.$cell->cellId) ?>" ><button class="btn btn-warning"><i class="fa fa-edit"></i> Edit</button></a>
                                            <a data-type="delete" data-item="Cell # <?php echo $cell->cellNumber ?>"  class="generalAlertify" href="<?php echo base_url('manage/deletecell/'.$cell->cellId) ?>" ><button class="btn btn-danger"><i class="fa fa-trash"></i> Delete</button></a>
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