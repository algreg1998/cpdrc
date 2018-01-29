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

                    <div class="panel-body">
                        <div id="error" class="alert alert-danger" role="alert">
                            <i class="fa fa-exclamation-triangle" aria-hidden="true"></i> Sorry, you are only allowed to upload a <strong>CSV</strong> file.
                        </div>
                        <h5> <em> Please select the CSV file you want to import. </em></h5>
                         <form action="<?php echo base_url('import/uploadData');?>" method="post" enctype="multipart/form-data" id="importFrm">
                            <input type="file" name="file" id="file" required/><br>
                            <input type="submit" class="btn btn-primary" id="importSubmit" name="importSubmit" value="Import CSV File">
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>