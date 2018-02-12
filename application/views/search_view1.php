<div id="page-wrapper">

    <div class="row">
        <div class="col-lg-12">
            <h3 class="page-header">Search Inmates</h3>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-red">
                <div class="panel-heading">
                    Unfinished Inmates
                </div>
                <div class="panel-body">
                     <div class="dataTable_wrapper table-responsive">
                        <table class="table table-striped table-bordered table-hover" id="table-releases">
                            <thead>
                                <tr>
                                    <th>Inmate ID</th>
                                    <th>Last Name</th>
                                    <th>First Name</th>
                                    <th>Middle Name</th>
                                    <!-- <th>Step #</th> -->
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                                if(isset($inmates)){
                                    foreach ($inmates as $inmate) {
                                        ?>
                                        <tr>
                                            <td><?php echo $inmate->inmate_id; ?></td>
                                            <td><?php echo $inmate->inmate_lname; ?></td>
                                            <td><?php echo $inmate->inmate_fname; ?></td>
                                            <td><?php echo $inmate->inmate_mi; ?></td>
                                            <!-- <td><?php echo $inmate->step; ?></td> -->
                                            <td style='text-align: center'>
                                                <a href="<?php echo site_url()?>cpdrc/addinmate/profiling/<?php echo $inmate->inmate_id;?>">
                                                    <button type="submit" class="btn btn-danger"> <i class="fa fa-arrow-right" aria-hidden="true"></i> Proceed to <b> Step <?php echo $inmate->step; ?> </b></button> 
                                                </a>
                                            </td>
                                        </tr>
                                        <?php
                                    }
                                }
                            ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>