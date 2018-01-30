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