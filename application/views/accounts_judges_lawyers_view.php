<div id="page-wrapper">

    <div class="row">
        <div class="col-lg-12">
            <h3 class="page-header">Accounts
            </h3>
        </div>
    </div>
   
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    JUDGES &amp; LAWYERS
                </div>
                <div class="panel-body">
                    <div class="text-right" style="margin-bottom:10px;">
                        <a href="<?php echo base_url('accounts/add-judge-lawyer') ?>" class="btn btn-primary"><i class="fa fa-plus"></i> Judge/Lawyer</a>
                    </div>

                    <table class="table table-striped table-bordered table-hover" id="table-inmaterecords">
                        <thead>
                            <tr>
                                <th>Last Name</th>
                                <th>First Name</th>
                                <th>Middle Name</th>
                                <th>Position</th>
                                <th class="text-center" style="width: 90px;">Status</th>
                                <th class="text-center" style="width: 90px;">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($users as $user): ?>
                                    <tr class="odd gradeX">
                                        <td style="vertical-align: middle"><?php echo $user->first_name ?></td>
                                        <td style="vertical-align: middle"><?php echo $user->middle_name ?></td>
                                        <td style="vertical-align: middle"><?php echo $user->last_name ?></td>
                                        <td style="vertical-align: middle"><?php echo ucfirst($user->position )?></td>
                                        <td class="text-center" style="vertical-align: middle">
                                            <?php if ($user->status == 'active'): ?>
                                                <label class="label label-success"><i class="fa fa-check"></i> Active</label>
                                            <?php elseif($user->status == 'blocked'): ?>
                                                <label class="label label-danger"><i class="fa fa-check"></i> Blocked</label>
                                            <?php endif ?>
                                        </td>
                                        <td class="text-center" style="vertical-align: middle">
                                            <a href="<?php echo base_url('accounts/administrator-info?id='.$user->id) ?>"><i class="fa fa-user"></i></a>
                                            <a href="<?php echo base_url('accounts/administrator-delete?id='.$user->id) ?>" class="generalAlertify" title="Delete" data-item="<?php echo $user->first_name.' '.$user->middle_name.' '.$user->last_name ?>" data-type="delete"><i class="fa fa-trash"></i></a>
                                        </td>
                                    </tr>
                                <?php endforeach ?>
                        </tbody>
                    </table>
                    <nav class="text-center">
                        <?php echo isset($page) ? $page : '' ?>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>