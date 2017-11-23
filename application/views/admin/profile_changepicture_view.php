<div id="page-wrapper">

    <div class="row">
        <div class="col-lg-12">
            <h3 class="page-header">Profile
            </h3>
        </div>
    </div>
   
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-yellow">
                <div class="panel-heading">
                    Change Picture
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
                    <div class="row">
                        

                        <div class="col-lg-6 col-md-6 col-sm-6">

                            <div class="img-container">
                               <img class="img-responsive" id="theimage" src="<?php echo images_url('placeholder.jpg') ?>">
                            </div>    
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <hr class="colorgraph">
                            <div class="d-tac">
                                <?php echo form_open_multipart( current_url_full() )?>
                                    <input class="hidden" type="file" name="photo" onchange="showimagepreview(this)">
                                    <input name="img_x" id="data-x" class="form-control" type="hidden" value="0">
                                    <input name="img_y" id="data-y" class="form-control" type="hidden" value="0">
                                    <input name="img_w" id="data-width" class="form-control" type="hidden" value="0">
                                    <input name="img_h" id="data-height" class="form-control" type="hidden" value="0">

                                    <?php echo form_button('btnSelect','Select File','class="btn btn-primary" onclick="selectFile()"')?>
                                    <?php echo form_submit('btnSave','Crop & Save','class="btn btn-info"')?>

                                <?php echo form_close() ?>
                            </div>
                            <hr class="colorgraph">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>