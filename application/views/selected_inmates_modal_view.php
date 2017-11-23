<div class="modal-content">
	<div class="modal-header">
		<h4 class="modal-title">Inmates</h4>
	</div>
	<div class="modal-body">
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
                        	<td><img width="40" src="<?php echo inmatephoto_url($inmate->filename) ?>"></td>
                        	<td><?php echo $inmate->inmate_fname ?></td>
                        	<td><?php echo $inmate->inmate_lname ?></td>
                        	<td><?php echo $inmate->inmate_mi ?></td>
                        	<td><?php echo $inmate->status ?></td>
                        	<td><a href="<?php echo base_url('inmate/personal/'.$inmate->inmate_id) ?>"><i class="fa fa-user"></i></a></td>
                        </tr>
					<?php endforeach; ?>
                    
                </tbody>
            </table>
        </div>
	</div>
	<div class="modal-footer">
		<button type="button" class="colorboxClose btn btn-default" data-dismiss="modal">Close</button>
	</div>
</div>
