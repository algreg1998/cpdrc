<div id="page-wrapper">

    <div class="row">
        <div class="col-lg-12">
            <h3 class="page-header">Profile
            </h3>
        </div>
    </div>
   
    <div class="row">
        <div class="col-lg-12">
            <div style="margin-bottom: 10px">
                <a class="btn btn-default" href="<?php echo base_url(isset($_GET['year']) ? '?year='.$_GET['year'] : '') ?>"><i class="fa fa-arrow-left"> Back</i></a>
            </div>
            <div class="panel panel-yellow">
                <div class="panel-heading">
                    Inmates
                </div>
                <div class="panel-body">
                   
                    <div class="dataTable_wrapper table-responsive">
                        <table class="table table-striped table-bordered table-hover" id="table-inmateslist-modal">
                            <thead>
                                <tr>
                                    <th>Photo</th>
                                    <th>Last Name</th>
                                    <th>First Name</th>
                                    <th>Middle Name</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($inmates as $inmate): ?>
                                    <tr>
                                        <td><img width="40" src="<?php echo inmatephoto_url("inmate/".$inmate->filename) ?>"></td>
                                        <td><?php echo $inmate->inmate_lname ?></td>
                                        <td><?php echo $inmate->inmate_fname ?></td>
                                        <td><?php echo $inmate->inmate_mi ?></td>
                                        <td><?php echo $inmate->inmate_type ?></td>
                                        <td><a href="<?php echo base_url('inmate/personal/'.$inmate->inmate_id) ?>"><i class="fa fa-user"></i></a></td>
                                    </tr>
                                <?php endforeach; ?>
                                
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>