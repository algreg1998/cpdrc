<div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h3 class="page-header">Edit Requests</h3>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-green">
                    <div class="panel-heading">
                        Requests
                    </div>

                    <div class="panel-body">
                         <form action="<?php echo base_url('import/uploadData');?>" method="post" enctype="multipart/form-data" id="importFrm">
                            <input type="file" name="file" />
                            <input type="submit" class="btn btn-primary" name="importSubmit" value="IMPORT">
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>