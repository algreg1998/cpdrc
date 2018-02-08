<div id="page-wrapper">

    <div class="row">
        <div class="col-lg-12">
            <h3 class="page-header">Logs
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
                        <table class="table table-striped table-bordered table-hover datatable">
                            <thead>
                                <tr>
                                    <th style="width: 130px;">User</th>
                                    <th>Subject</th>
                                    <th>Reasons</th>
                                    <th class="text-center" style="width: 140px;">Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($logs as $log): ?>
                                    <tr class="odd gradeX">
                                        <td><?php echo $log->user_fname.' '.$log->user_lname ?></td>
                                        <td><?php echo $log->subject ?></td>
                                        <td><?php echo $log->reasons ?></td>
                                        <td class="text-center"><?php echo mdate("%F %d, %Y %h:%i:%s %A") ?></td>
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