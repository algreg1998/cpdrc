<div id="page-wrapper">

    <div class="row">
        <div class="col-lg-12">
            <h3 class="page-header">Courts
            </h3>
        </div>
    </div>
   
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-yellow">
                <div class="panel-heading">
                    Manage
                </div>
                <div class="panel-body">
                    <div class="dataTable_wrapper table-responsive">
                        <table class="table table-striped table-bordered table-hover" id="table-logs">
                            <thead>
                                <tr>
                                    <th style="width: 130px;">User</th>
                                    <th>Subject</th>
                                    
                                    <th class="text-center" style="width: 140px;">Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($courts as $court): ?>
                                    <tr class="odd gradeX">
                                        <td><?php echo $court->court_id;?></td>
                                        <td><?php echo $court->court_name ?></td>                                        
                                    </tr>
                                <?php endforeach ?>
                            </tbody>
                        </table>

                        <?php echo $page ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>