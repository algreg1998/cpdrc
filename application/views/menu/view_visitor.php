<?php foreach ($viewing as $key) { ?>
<div class="row">
	<div class="col-md-4" align="center"> 

				<div class="panel panel-warning">
					<div class="panel-body">
						<div class="list-group">
							<p align="center"><img src="<?=base_url()?>uploads/visitors/<?=$key['filename']?>" width="50%" height="50%"/></p>
						</div>
					</div>
				</div>	
	
	</div>
	<div class="col-md-6">
				<div class="panel-body">
					<div class="table-responsive">
	 					<table class="table table-bordered table-hover table-striped tablesorter">
	                    <tbody>
	                    	<tr>
		                    	<th>Visitor number</th>
		                    	<td><?=$key['id']?></td>
		                    </tr>
		                    <tr>
		                    	<th>Fullname</th>
		                    	<td><?=$key['full_name']?></td>
		                    </tr>
		                    <tr>
		                    	<th>Relation to <?=$key['inmate_fname']." ".$key['inmate_lname']?></th>
		                    	<td><?=$key['relation']?></td>
		                    </tr>
		                    <tr>
		                    	<th>Current Address</th>
		                    	<td><?=$key['address']?></td>
		                    </tr>
		                    <tr>
		                    	<th>Contact Number</th>
		                    	<td><?=$key['contact_number']?></td>
		                    </tr>
		                    <tr>
		                    	<th>Added by</th>
		                    	<td><?=$key['user_fname']." ".$key['user_lname']?></td>
		                    </tr>
		                    <tr>
		                    	<th>Date & Time added</th>
		                    	<td><?=$key['datetime']?></td>
		                    </tr>

	                    </tbody>
	                  </table>
	                 
					</div>
				</div>		
	</div>
</div>
<?php } ?>