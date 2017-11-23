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
                    ADMINISTRATORS
                </div>
                <div class="panel-body">
                    
                    <div class="text-right" style="margin-bottom:10px;">
                        <a href="<?php echo base_url('accounts/add-administrator') ?>" class="btn btn-primary"><i class="fa fa-plus"></i> Administrator</a>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover" id="table-inmaterecords">
                            <thead>
                                <tr>
                                    <th>Last Name</th>
                                    <th>First Name</th>
                                    <th>Middle Name</th>
                                    <th class="text-center" style="width: 90px;">Status</th>
                                    <th class="text-center" style="width: 90px;">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($administrators as $administrator): ?>
                                    <tr class="odd gradeX">
                                        <td style="vertical-align: middle"><?php echo $administrator->first_name ?></td>
                                        <td style="vertical-align: middle"><?php echo $administrator->middle_name ?></td>
                                        <td style="vertical-align: middle"><?php echo $administrator->last_name ?></td>
                                        <td class="text-center" style="vertical-align: middle">
                                            <?php if ($administrator->status == 'active'): ?>
                                                <label class="label label-success"><i class="fa fa-check"></i> Active</label>
                                            <?php elseif($administrator->status == 'blocked'): ?>
                                                <label class="label label-danger"><i class="fa fa-check"></i> Blocked</label>
                                            <?php endif ?>
                                        </td>
                                        <td class="text-center" style="vertical-align: middle">
                                            <a href="<?php echo base_url('accounts/administrator-info?id='.$administrator->id) ?>"><i class="fa fa-user"></i></a>
                                            <a href="<?php echo base_url('accounts/administrator-resetpassword?id='.$administrator->id) ?>" class="generalAlertify" title="Reset Password" data-item="<?php echo $administrator->first_name.' '.$administrator->middle_name.' '.$administrator->last_name ?>" data-type="reset the password of"><i class="fa fa-refresh"></i></a>
                                            <a href="<?php echo base_url('accounts/administrator-block?id='.$administrator->id) ?>" class="generalAlertify" title="Block" data-item="<?php echo $administrator->first_name.' '.$administrator->middle_name.' '.$administrator->last_name ?>" data-type="block"><i class="fa fa-ban"></i></a>
                                            <a href="<?php echo base_url('accounts/administrator-delete?id='.$administrator->id) ?>" class="generalAlertify" title="Delete" data-item="<?php echo $administrator->first_name.' '.$administrator->middle_name.' '.$administrator->last_name ?>" data-type="delete"><i class="fa fa-trash"></i></a>
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
</div>