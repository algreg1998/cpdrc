<div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h3 class="page-header">Import CSV</h3>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-green">
                    <div class="panel-heading">
                        Import
                    </div>
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
                    <div class="panel-body">
                        <h5> <em> Please select the CSV file you want to import. </em></h5>
                         <form action="<?php echo base_url('import/uploadData');?>" method="post" enctype="multipart/form-data" id="importFrm">
                            <input type="file" name="file" required/><br>
                            <input type="submit" class="btn btn-primary" name="importSubmit" value="Import CSV File">
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>