<div id="page-wrapper">
	<div class="row">
		<div class="col-lg-12">
			<div class="panel">
				<div class='panel-body'>
					<div class="row">
						<!-- <div class="row">
				              <div class="col-md-6" align="left">
				                <h1 class="text-warning" id="h1">About CPDRC IPS</h1>
				                
				              </div> 
				         </div> -->
				         <br>
				        
				         <div class="row">
				         	<div class="col-md-12">
								<div class="panel panel-primary">
									<div class="panel-heading">
										<h3 class="panel-title" id="paneltitle">
											Releases

										</h3>
									</div>
									<div class="panel-body">
					<?php echo form_open(current_url_full(), 'class="form-horizontal gender-form"'); ?>
                        <div style="display: inline;">
                            <label> Filter by Gender: </label><br>
                            <select name="gender" class='form-control gender-select' style='width:20%; display: inline' >
                                <option value='both' <?php if($gender == "both"){echo "selected";}?>> All </option>
                                <option value='male' <?php if($gender == "male"){echo "selected";}?>> Male</option>
                                <option value='female' <?php if($gender == "female"){echo "selected";}?>>Female</option>
                            </select> 
                        </div>    
                        <button type="submit" class="btn btn-success submit">Submit</button>
                    <?php echo form_close(); ?> 
									<a href="<?php echo site_url()?>cpdrc/pages/printMunicipality/<?php echo $gender; ?>"><button class="btn btn-default" ><i class="fa fa-print"></i> Print</button></a>
									
									<div class="row">
										<div class="col-md-12" align="center">
											<h2>GEOGRAPHICAL ORIGIN OF DETAINEE</h2>
											<h1>
											</h1>
										</div>
									</div>
									
										<div class="table-responsive">
						 					<table class="table table-bordered table-hover table-striped tablesorter datatable">
						 						<thead align="center">
						 							<th>No.</th>
						 							<th>PLACE</th>
						 							<th>TOTAL</th>
						 						</thead>
						 						<tbody>
						 							
						 							<?php
						 							$a = json_decode(json_encode($municipalities));
						 							
						 							for ($i=0;$i<count($municipalities); $i++) {?>
						 							<tr align="center">

						 								<td><?php echo $i+1;?></td>
						 								<td><?php echo $a[$i][0]->place;?></td>
						 								<td><?php echo $a[$i][0]->count;?></td>
						 							</tr>
						 							<?php } ?>
						 							
						 						</tbody>
							                </table>
							            </div>
				         			</div>
				         		</div>

				         	</div>
				         </div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>


<?php $this->load->view('cpdrc/footer'); ?>