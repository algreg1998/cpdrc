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
                <a class="btn btn-default" href="<?php echo base_url('manage/addviolation') ?>"><i class="fa fa-arrow-left"></i> Back</a>
            </div>
            <div class="panel panel-green">
                
                <div class="panel-heading">
                    Categories
                </div>
                <div class="panel-body">
                    <div class="dataTable_wrapper table-responsive">
                        <div class="col-lg-12">
                            <?php echo form_open(current_url_full(), 'id="addViolationForm" class="form-horizontal" style="margin-top: 30px;"'); ?>
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

                              
                                <div class="form-group">
                                    <label for="name" class="col-sm-2 control-label">Name</label>
                                    <div class="col-lg-7">
                                        <?php echo form_input('name', set_value('name') ? set_value('name') : '', 'id="name" class="form-control" required'); ?>
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <label for="description" class="col-sm-2 control-label">Description</label>
                                    <div class="col-lg-7">
                                        <?php echo form_textarea('description', set_value('description') ? set_value('description') : '', 'id="description" class="form-control" required style="height: 100px"'); ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-offset-2 col-lg-7">
                                        <button id="btnSave" type="submit" class="btn btn-default">Save</button>
                                    </div>
                                </div>
                            <?php echo form_close() ?>
                        </div>
                        <div class="col-lg-12">
                            <table class="table table-striped table-bordered table-hover" id="table-releases">
                            <thead>
                                <tr>
                                    <th style="">Name</th>
                                    <th style="">Description</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($categories as $category): ?>
                                   <tr class="odd gradeX">
                                        <td><?php echo $category->name ?></td>
                                        <td><?php echo $category->description ?></td>
                                        <td>
                                        <a data-type="edit" data-item="<?php echo $category->name ?>" class="generalAlertify" href="<?php echo base_url('manage/editviolationcategories/'.$category->id) ?>" ><button class="btn btn-warning"><i class="fa fa-edit"></i> Edit</button></a>
                                            <a data-type="delete" data-item="<?php echo $category->name ?>" class="generalAlertify" href="<?php echo base_url('manage/deleteviolationcategories/'.$category->id) ?>"><button class="btn btn-danger"><i class="fa fa-trash"></i> Delete</button></a>
                                            <!-- 
                                            <a href="<?php echo base_url('manage/editviolationcategories/'.$category->id) ?>"><i class="fa fa-edit"></i></a>
                                            <a data-type="delete" data-item="<?php echo $category->name ?>" class="generalAlertify" href="<?php echo base_url('manage/deleteviolationcategories/'.$category->id) ?>"><i class="fa fa-trash"></i></a> -->
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

