<div id="page-wrapper">

    <div class="row">
        <div class="col-lg-12">
            <h3 class="page-header">Search Inmates</h3>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-green">
                <div class="panel-heading">
                    Finished Inmates
                </div>
                <div class="panel-body">
                     <?php if ($this->session->flashdata('error_msg')): ?>
                        <div class="alert alert-danger">
                            <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
                            <?php echo $this->session->flashdata('error_msg') ?>
                        </div>
                    <?php endif ?>
                    <div class="dataTable_wrapper">
                        <table class="table table-striped table-bordered table-hover" id="table-inmaterecords">
                            <thead>
                                <tr>
                                    <th>Inmate ID</th>
                                    <th>Last Name</th>
                                    <th>First Name</th>
                                    <th>Middle Name</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>